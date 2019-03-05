<?php
//Controlador de Libros
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

        //Funcion que carga todos los datos de las tablas que necesitamos
        public function VistaAjax() {
                if($this->security_check()){
                    $data["listaInstitutos"] = $this->InstitutosModel->getAll();
                    $data["listaEditoriales"] = $this->EditorialesModel->getAll();           
                    $data["listaUsuarios"] = $this->UsuariosModel->getAll();

                //Si el tipo es 0 (Administrador) recibe todos los datos
                if($this->session->userdata('tipoUsuario')==0){
                    $data["listaLibros"] = $this->LibrosModel->getAll();

                //Si el tipo es 1 (Bibliotecario) recibe todos los datos menos la tabla usuario e institutos
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

        //Funcion que se encarga de salir sesion
        public function salir() {
            $this->cerrar_sesion();    
        }

        /*Funcion que inserta un libro */    
        public function InsertarLibro(){ 
            if($this->security_check()){

                //Esta funcion te coje el libro mas grande y le suma 1 si esta es el primer libro introduce 1
                $id=$this->LibrosModel->getMax();
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

            //Introduce los autores que tiene el libro en la tabla ajena de autores -libros
            for ($i = $cont=0; $i < count($idAutor); $i++) {
                $autor = $idAutor[$i];
                $r=$this->LibrosModel->InsertarAutorLibro($autor,$id);
            }
            
            //introduce las categorias que tiene el libro en la tabla ajena libros-categorias
            for ($i = $cont=0; $i < count($idCategoria); $i++) {
                $categoria = $idCategoria[$i];
                $r=$this->LibrosModel->InsertarLibroCategoria($categoria,$id);
            }

                //Si hay un error te vuelve a cargar la vista de libros
                if ($r== 0) { 
                    $this->VistaAjax();   

                //Si el libro se introduce se crea una carpeta con el id del libro y carga la vista de libros
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
                    
                    //Cada vez que modificamos los datos eliminamos los autores
                    $r=$this->LibrosModel->ModificarLibro($id,$isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial);
                    $r1=$this->LibrosModel->EliminarAutorLibro($id);
                    $r2=$this->LibrosModel->EliminarLibroCategoria($id);

                //Recorremos el array de autores y lo introducimos para ese libro
                for ($i = $cont=0; $i < count($idAutor); $i++) {
                    $autor = $idAutor[$i];
                    $r=$this->LibrosModel->InsertarAutorLibro($autor,$id);
                }
                    
                //Recorremos el array de categorias y lo introducimos para ese libro
                for ($i = $cont=0; $i < count($idCategoria); $i++) {
                    $categoria = $idCategoria[$i];
                    $r=$this->LibrosModel->InsertarLibroCategoria($categoria,$id);
                }
                    //Cargamos la vista de nuevo
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

                    //Si da un fallo al eliminar o las categorias o los autores lo avisa
                    if($r1==0 || $r2==0){
                        echo"Fallo al eliminar libro";
                    }else{
                        echo"Libro eliminado con exito"; 
                    } 
                }
            }
        }

        //Funcion que se crea una carpeta con el id del libro
        public function carpeta($id){
            if($this->security_check()){
                $ruta = "assets/libros/$id";
                mkdir($ruta);
            }
        }

        //Funcion que se encarga de subir las paginas
        public function Upload($id){
            if($this->security_check()){
                $resultado_subida = $this->LibrosModel->subirImagenPelicula($id);

                //Si la subida es correcta
                if($resultado_subida["codigo"] == 1) {
                    //Renombramos el archivo y lo introducimos en la carpeta que le pertenece
                    $img_name=$resultado_subida["mensaje"];                                      
                    $total_imagenes1 = count(glob('assets/libros/'.$id.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
                    $total_imagenes2=$total_imagenes1-1;
                    $oldDir= "assets/libros/".$id."/".$img_name;
                    $newDir="assets/libros/".$id."/".$total_imagenes2.".jpg";
                    $confirm=rename($oldDir,$newDir);

                //Si la subida es erronea
                } else {
                    $data["mensaje"] = "Error al subir la imagen de la película";
                }               
            } 
        }

        //Funcion que se encarga de subir las paginas en la ventana donde vemos las paginas del libro
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
                        rename($oldDir,$newDir);
                } 
         redirect(site_url("Libros/ModificarPaginas/$id"));
            }       
        }

        //Funcion que se encarga de cargar la vista con el id del libro
        public function ModificarPaginas($id) {
            if($this->security_check()){
                $datos["id"]=$id;
                $this->load->view("ModificarImagenes",$datos);
            }
        }

        //Funcion que se encarga de cargar la vista de subida de paginas con el id del libro que vamos a usar
        public function showintadmin($id){
            if($this->security_check()){   
                $datos["id"]=$id;
                $this->load->view('upload_multiple',$datos);
            }
        }

        //Funcion que se encarga de eliminar una pagina del libro en concreto de la carpeta
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



             
                //$datos["id"]=$id_libro;
              



            //$this->load->view("ModificarImagenes",$datos);

            


            redirect(site_url("Libros/redireccionar/$id_libro/$mensaje"));

        }

        //Funcion que se encarga de poner en pantalla un mensaje de error
        public function redireccionar($id_libro,$mensaje){
            if($this->security_check()){
                $datos["id"]=$id_libro;
                $datos["mensaje"]=$mensaje;           
                $this->load->view("ModificarImagenes",$datos);
            }
        }

        //Cambia una imagen y la renombra un numero a la izquierda
        public function cambiarIzquierda($id_libro,$num_pag){
            if($this->security_check()){

                //Si intentas mover una imagen a la izquierda sin pasarse del total de imagenes
                if ($num_pag!=0) {

                //La imagen de la izquierda la renombramos
                $oldDir="assets/libros/$id_libro/".($num_pag-1).".jpg";
                $newDir="assets/libros/$id_libro/fotoCambio.jpg";
                rename($oldDir,$newDir);

                //La imagen la actual la mueve al numero anterior
                $oldDir="assets/libros/$id_libro/".$num_pag.".jpg";
                $newDir="assets/libros/$id_libro/".($num_pag-1).".jpg";
                rename($oldDir,$newDir);

                //La imagen a la que hemos sustituido la pone en la posicion movida
                $oldDir="assets/libros/$id_libro/fotoCambio.jpg";
                $newDir="assets/libros/$id_libro/".$num_pag.".jpg";
                rename($oldDir,$newDir);
                }
        
                redirect(site_url("Libros/ModificarPaginas/$id_libro"));
            }
        }


        //Cambia una imagen y la renombra un numero a la derecha
        public function cambiarDerecha($id_libro,$num_pag){
            if($this->security_check()){
             $total_imagenes = count(glob('assets/libros/'.$id_libro.'/{*.jpg,*.gif,*.png}',GLOB_BRACE));
             echo $num_pag ;
             echo $total_imagenes;

                //Si intentas mover una imagen a la derecha sin pasarse del total de imagenes
                if ($num_pag<$total_imagenes-1) {

                    //La imagen de la derecha la renombramos
                    $oldDir="assets/libros/$id_libro/".($num_pag+1).".jpg";
                    $newDir="assets/libros/$id_libro/fotoCambio.jpg";
                    rename($oldDir,$newDir);

                    //La imagen la actual la mueve al siguiente numero
                    $oldDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    $newDir="assets/libros/$id_libro/".($num_pag+1).".jpg";
                    rename($oldDir,$newDir);

                    //La imagen a la que hemos sustituido la pone en la posicion movida
                    $oldDir="assets/libros/$id_libro/fotoCambio.jpg";
                    $newDir="assets/libros/$id_libro/".$num_pag.".jpg";
                    rename($oldDir,$newDir);               
                }

                redirect(site_url("Libros/ModificarPaginas/$id_libro"));
            }
        }

}