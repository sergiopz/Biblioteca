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
            $this->load->model("PaginasModel");
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
                 $pdf = $this->input->post('pdf');


                $r=$this->LibrosModel->InsertarLibro($isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial,$pdf);

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
                $idInstituto= $this->input->get_post("instituto"); 
                $idUsuario = $this->input->get_post("usuario");
                $idEditorial = $this->input->get_post("editorial");
                $idAutor = $this->input->get_post('autor');
                $idCategoria = $this->input->get_post('categoria');
                $pdf = $this->input->get_post('pdf');

                //Recibe un libro y luego borra los registros de tablas ajenas e inserta las nuevas
                $r=$this->LibrosModel->ModificarLibro($id,$isbn,$titulo,$descripcion,
                                                      $fecha,$paginas,$idInstituto,
                                                      $idUsuario,$idEditorial,$pdf);
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
                $resultado_subida = $this->LibrosModel->subirImagenPagina($id);
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
                 
                $resultado_subida = $this->LibrosModel->subirImagenPagina($id);

                if ($resultado_subida["codigo"] == 1) {
                    $img_name=$resultado_subida["mensaje"];
                    

                    for($i=$total_imagenes-1;$i>=$pagina;$i--){
                            $oldDir="assets/libros/".$id."/".$i.".jpg";
                            $newDir="assets/libros/".$id."/".($i+1).".jpg";
                            rename($oldDir,$newDir);
                    }

                    $oldDir="assets/libros/".$id."/".$img_name;
                    $newDir="assets/libros/".$id."/".$pagina.".jpg";
                    rename($oldDir,$newDir);
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

                   

               $mensaje=$this->PaginasModel->Eliminar($id_libro,$num_pag,$cant_pag);

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

                $this->PaginasModel->CambiarDerecha($id_libro,$num_pag);

               
            redirect(site_url("Libros/ModificarPaginas/$id_libro"));
            }
        }




        //Funcion que se encarga de mover una imagen a la izquierda
        public function cambiarIzquierda($id_libro,$num_pag){
            if($this->security_check()){

                $this->PaginasModel->CambiarIzquierda($id_libro,$num_pag);
                
                }
             redirect(site_url("Libros/ModificarPaginas/$id_libro"));  
            }
        

        //Funcion que se encarga de cerrar la sesion
        public function salir() {
            $this->cerrar_sesion();
        }        

}
