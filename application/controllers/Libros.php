<?php
//Controlador de Autores
    include_once("Seguridad.php");
    class Libros extends Seguridad {
        
        public function __construct() {
            parent::__construct();
            $this->load->model("LibrosModel");
            $this->load->model("InstitutosModel");
            $this->load->model("EditorialesModel");
            $this->load->model("UsuariosModel");
            $this->load->model("AutoresModel");
            $this->load->model("CategoriasModel");
        }

        
        /*Funcion que carga la vista de libros y sus datos*/ 
        public function VistaAjax() {
            if($this->security_check()){
                $data["listaInstitutos"] = $this->InstitutosModel->getAll();
                $data["listaEditoriales"] = $this->EditorialesModel->getAll();           
                $data["listaUsuarios"] = $this->UsuariosModel->getAll();

                if($this->session->userdata('tipoUsuario')==0){
                    $data["listaLibros"] = $this->LibrosModel->getAll();
                }else if($this->session->userdata('tipoUsuario')==1){
                    $data["listaLibros"] = $this->LibrosModel->getLibros($this->session->userdata('idUsuario'));
                }
                    $data["listaCategorias"] = $this->CategoriasModel->getAll();
                    $data["listaAutoresLibros"] = $this->LibrosModel->getAutoresLibros();
                    $data["listaLibrosCategorias"] = $this->LibrosModel->getLibrosCategorias();
                    $data["listaAutores"] = $this->AutoresModel->getAll();
                    $data["nombreVista"] = "LibroAjax";
                    $this->load->view("plantilla" , $data);
            }
        }


        /*Funcion que inserta un libro */    
        public function InsertarLibro(){ 
            if($this->security_check()){
                $id=$this->LibrosModel->getMax();

                //Si no hay libro insertado pone el 1
                if($id==0){
                    $id=1;
                }

                $isbn = $this->input->get_post("isbn");
                $titulo= $this->input->get_post("titulo");
                $descripcion = $this->input->get_post("descripcion");
                $fecha = $this->input->get_post("fecha");
                $paginas = $this->input->get_post("paginas");
                $idInstituto= $this->input->get_post("idInstituto");
                $idUsuario = $this->session->userdata('idUsuario');
                $idEditorial = $this->input->get_post("idEditorial");
                $idAutor = $this->input->post('idAutor');
                $idCategoria = $this->input->post('idCategoria');


                $r=$this->LibrosModel->InsertarLibro($isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial);

                //Una vez inserta el libro inserta los autores en la tabla ajena autor libro
                for ($i = $cont=0; $i < count($idAutor); $i++) {
                $autor = $idAutor[$i];
                $r=$this->LibrosModel->InsertarAutorLibro($autor,$id);
                }

                //Una vez inserta el libro inserta las categorias en la tabla ajena libro categoria
                for ($i = $cont=0; $i < count($idCategoria); $i++) {
                    $categoria = $idCategoria[$i];
                    $r=$this->LibrosModel->InsertarLibroCategoria($categoria,$id);
                }

                if ($r== 0) { 
                    $this->VistaAjax();
                    //Si inserta el libro crea una carpeta en el direcciorio assets con el id del libro
                } else {
                    $this->carpeta($id);
                    $this->VistaAjax();
                }
            }
        }
        
        /*Funcion que Modifica un libro */
        public function ModificarLibro(){
            if($this->security_check()){
                $id = $this->input->get_post("id");
                $isbn = $this->input->get_post("isbn");
                $titulo= $this->input->get_post("titulo");
                $descripcion = $this->input->get_post("descripcion");
                $fecha = $this->input->get_post("fecha");
                $paginas = $this->input->get_post("paginas");
                $idInstituto= $this->input->get_post("idInstituto");
                $idUsuario = $this->input->get_post("idUsuario");
                $idEditorial = $this->input->get_post("idEditorial");
                $idAutor = $this->input->get_post('idAutor');
                $idCategoria = $this->input->get_post('idCategoria');

                //Recibe un libro y luego borra los registros de tablas ajenas e inserta las nuevas
                $r=$this->LibrosModel->ModificarLibro($id,$isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial);
                $r1=$this->LibrosModel->EliminarAutorLibro($id);
                $r2=$this->LibrosModel->EliminarLibroCategoria($id);

                //Guarda el array de autores y los inserta en la tabla autor libro
                for ($i = $cont=0; $i < count($idAutor); $i++) {
                    $autor = $idAutor[$i];
                    $r=$this->LibrosModel->InsertarAutorLibro($autor,$id);
                }
    
                //Guarda el array de categorias y los inserta en la tabla categoria libro
                for ($i = $cont=0; $i < count($idCategoria); $i++) {
                    $categoria = $idCategoria[$i];
                    $r=$this->LibrosModel->InsertarLibroCategoria($categoria,$id);
                }  
                    $this->VistaAjax();  
            }
        }

        /*Funcion que elimina un libro */
        public function EliminarLibro($id){
            if($this->security_check()){
                    $r=$this->LibrosModel->EliminarLibro($id);
                if ($r== 0) { 
                    echo"Fallo al eliminar libro";              
                } else {
                    $r1=$this->LibrosModel->EliminarAutorLibro($id);
                    $r2=$this->LibrosModel->EliminarLibroCategoria($id);
                    //Si el libro da fallo en alguno de las dos muestra el mensaje de error
                    if($r1==0 || $r2==0){
                        echo"Fallo al eliminar libro";
                    }else{
                        echo"Libro eliminado con exito"; 
                    } 
                }
            }
        }
 
        //Funcion que se encarga de subir una imagen en la carpeta assets
        public function Upload($id){
            if($this->security_check()){     
                $resultado_subida = $this->LibrosModel->subirImagenPelicula($id);
                if ($resultado_subida["codigo"] == 1) {
                    $img_name=$resultado_subida["mensaje"];        
                    $total_imagenes1 = count(glob('assets/libros/'.$id.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
                    $total_imagenes2=$total_imagenes1-1;
                    $oldDir= "assets/libros/".$id."/".$img_name;
                    $newDir="assets/libros/".$id."/".$total_imagenes2.".jpg";
                    $confirm=rename($oldDir,$newDir);
                } else {
                    $data["mensaje"] = "Error al subir la imagen de la película";
                }   
            } 
        }

        //Funcion que se encarga de subir las paginas de la ventana de imagenes sueltas
        public function UploadPaginas(){
            if($this->security_check()){
                $pagina = $this->input->get_post("pagina");
                $id = $this->input->get_post("idlibro");
                $total_imagenes = count(glob('assets/libros/'.$id.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
                echo $pagina;   
                $resultado_subida = $this->LibrosModel->subirImagenPelicula($id);

                if ($resultado_subida["codigo"] == 1) {
                    $img_name=$resultado_subida["mensaje"];
                    echo $img_name;

                    for($i=$total_imagenes-1;$i>=$pagina;$i--){
                            $oldDir="assets/libros/".$id."/".$i.".jpg";
                            $newDir="assets/libros/".$id."/".($i+1).".jpg";
                            rename($oldDir,$newDir);
                    }

                    $oldDir="assets/libros/".$id."/".$img_name;
                    $newDir="assets/libros/".$id."/".$pagina.".jpg";
                    rename($oldDir,$newDir)
                }
             redirect(site_url("Libros/ModificarPaginas/$id"));
            }        
        }     

        //Funcion para modificar paginas 
        public function ModificarPaginas($id) {
            if($this->security_check()){
                $datos["id"]=$id;
                $this->load->view("ModificarImagenes",$datos);
            }
        }

        //Funcion que borra una imagen en concreto de la pagina de assets
        public function deletepag($id_libro,$num_pag,$cant_pag){
            if($this->security_check()){
                $filename="assets/libros/".$id_libro."/".$num_pag.".jpg";
                $res=unlink($filename);

                if($res){
                    for($i=$num_pag;$i<$cant_pag-1;$i++){
                        $oldDir="assets/libros/$id_libro/".($i+1).".jpg";
                        $newDir="assets/libros/$id_libro/".$i.".jpg";
                        rename($oldDir,$newDir);
                    }    
                $mensaje=1;  

                }
                else{
                    $mensaje=2;
                }
                redirect(site_url("Libros/redireccionar/$id_libro/$mensaje"));
            }
        }

        //Funcion que crea una carpeta con un id recibido en assets
        public function carpeta($id){
            if($this->security_check()){
                $ruta = "assets/libros/$id";
                mkdir($ruta);
            }
        }

        //Funcion que carga la vista de donde vemos las paginas una a una
        public function showintadmin($id){
            if($this->security_check()){
                $datos["id"]=$id;
                $this->load->view('upload_multiple',$datos);
            }
        }

        //Muestra la vista de la carpeta del libro
        public function redireccionar($id_libro,$mensaje){
            if($this->security_check()){
                $datos["id"]=$id_libro;
                $datos["mensaje"]=$mensaje;
                $this->load->view("ModificarImagenes",$datos);
            }
        }

        //Funcion que se encarga de mover una imagen a la derecha
        public function cambiarDerecha($id_libro,$num_pag){
            if($this->security_check()){
                $total_imagenes = count(glob('assets/libros/'.$id_libro.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
                echo $num_pag ;
                echo $total_imagenes;
                    if ($num_pag<$total_imagenes-1) {
                        //Coge la pagina a la derecha de la que quieres mover y le cambia el nombre
                        $oldDir="assets/libros/$id_libro/".($num_pag+1).".jpg";
                        $newDir="assets/libros/$id_libro/fotoCambio.jpg";
                        rename($oldDir,$newDir);
                        //Coge la pagina que quieres mover y la cambia a la derecha
                        $oldDir="assets/libros/$id_libro/".$num_pag.".jpg";
                        $newDir="assets/libros/$id_libro/".($num_pag+1).".jpg";
                        rename($oldDir,$newDir);
                        //Coge la pagina de la derecha y la pone a la del principio
                        $oldDir="assets/libros/$id_libro/fotoCambio.jpg";
                        $newDir="assets/libros/$id_libro/".$num_pag.".jpg";
                        rename($oldDir,$newDir);
                    }
            redirect(site_url("Libros/ModificarPaginas/$id_libro"));
            }
        }

        //Funcion que se encarga de mover una imagen a la izquierda
        public function cambiarIzquierda($id_libro,$num_pag){
            if($this->security_check()){
                if ($num_pag!=0) {
                    //Coge la pagina a la izquierda de la que quieres mover y le cambia el nombre
                    $oldDir="assets/libros/$id_libro/".($num_pag-1).".jpg";
                    $newDir="assets/libros/$id_libro/fotoCambio.jpg";
                    rename($oldDir,$newDir);
                    //Coge la pagina que quieres mover y la cambia a la izquierda
                    $oldDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    $newDir="assets/libros/$id_libro/".($num_pag-1).".jpg";
                    rename($oldDir,$newDir);
                    //Muevela pagina a de la izquierda y la pone a la del principio
                    $oldDir="assets/libros/$id_libro/fotoCambio.jpg";
                    $newDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    rename($oldDir,$newDir);
                }
             redirect(site_url("Libros/ModificarPaginas/$id_libro"));  
            }
        }

        //Funcion que se encarga de cerrar la sesion
        public function salir() {
            $this->cerrar_sesion();
        }        

}
