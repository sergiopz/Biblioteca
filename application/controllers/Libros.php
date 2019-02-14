<?php
//Controlador de Autores
    include_once("seguridad.php");
    class Libros extends seguridad {
        
        public function __construct() {
            parent::__construct();
            $this->load->model("LibrosModel");
            $this->load->model("InstitutosModel");
            $this->load->model("EditorialesModel");
            $this->load->model("UsuariosModel");
            $this->load->model("AutoresModel");
            $this->load->model("CategoriasModel");
            

        }


        public function index() {

                $oldDir="assets/libros/8/1.jpg";
                $newDir="assets/libros//69.jpg";
                $confirm=rename($oldDir,$newDir);
        
    



            echo "hasta aqui";
            
            

          
            $this->load->view("VistaLibro");
        }

        /*Funcion que carga la vista de libros y sus datos*/ 
        public function VistaAjax() {
            $data["listaInstitutos"] = $this->InstitutosModel->getAll();
            $data["listaEditoriales"] = $this->EditorialesModel->getAll();           
            $data["listaUsuarios"] = $this->UsuariosModel->getAll();
            $data["listaLibros"] = $this->LibrosModel->getAll();
            $data["listaCategorias"] = $this->CategoriasModel->getAll();
            $data["listaAutoresLibros"] = $this->LibrosModel->getAutoresLibros();
            $data["listaLibrosCategorias"] = $this->LibrosModel->getLibrosCategorias();
            $data["listaAutores"] = $this->AutoresModel->getAll();
            

            $data["nombreVista"] = "LibroAjax";
            $this->load->view("plantilla" , $data);
        }
    
        /*Funcion que inserta un libro */    
        public function InsertarLibro(){ 
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
            $idUsuario = $this->input->get_post("idUsuario");
            $idEditorial = $this->input->get_post("idEditorial");
            $idAutor = $this->input->post('idAutor');
            $idCategoria = $this->input->post('idCategoria');

            $r=$this->LibrosModel->InsertarLibro($isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial);

            for ($i = $cont=0; $i < count($idAutor); $i++) {
                $autor = $idAutor[$i];
                $r=$this->LibrosModel->InsertarAutorLibro($autor,$id);
            }
            for ($i = $cont=0; $i < count($idCategoria); $i++) {
                $categoria = $idCategoria[$i];
                $r=$this->LibrosModel->InsertarLibroCategoria($categoria,$id);
            }
            

            if ($r== 0) { 
                $this->VistaAjax();
                
            } else {
                $this->carpeta($id);
                $this->VistaAjax();
            }
        }


        public function carpeta($id){
            $ruta = "assets/libros/$id";
            mkdir($ruta);
        }


        /*Funcion que elimina un libro */
        public function EliminarLibro($id){
            $r=$this->LibrosModel->EliminarLibro($id);
            if ($r== 0) { 
                echo"Fallo al eliminar libro";
                
            } else {
                $r1=$this->LibrosModel->EliminarAutorLibro($id);
                $r2=$this->LibrosModel->EliminarLibroCategoria($id);
                if($r1==0 || $r2==0){
                    echo"Fallo al eliminar libro";
                }else{
                echo"Libro eliminado con exito"; 
               } 
            }
        }

        /*Funcion que Modifica un libro */
        public function ModificarLibro(){
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
            //var_dump($_POST);
            $idCategoria = $this->input->get_post('idCategoria');

            //Recibe un libro y luego borra los registros de tablas ajenas e inserta las nuevas
            $r=$this->LibrosModel->ModificarLibro($id,$isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial);
            $r1=$this->LibrosModel->EliminarAutorLibro($id);
            for ($i = $cont=0; $i < count($idAutor); $i++) {
                $autor = $idAutor[$i];
                $r=$this->LibrosModel->InsertarAutorLibro($autor,$id);
            }
            $r2=$this->LibrosModel->EliminarLibroCategoria($id);
            for ($i = $cont=0; $i < count($idCategoria); $i++) {
                $categoria = $idCategoria[$i];
                $r=$this->LibrosModel->InsertarLibroCategoria($categoria,$id);
            }
            

            if ($r== 0) { 
                $this->VistaAjax();
                
            } else {
                $this->VistaAjax();
            }
        }




public function showintadmin($id){

    
        $datos["id"]=$id;
   



        $this->load->view('upload_multiple',$datos);
    }


/**
     * Funcion de subida de imagenes libros al servidor
     *
     */

   
           public function Upload($id){

            

              
                $resultado_subida = $this->LibrosModel->subirImagenPelicula($id);
                if ($resultado_subida["codigo"] == 1) {
                    // Éxito
                    $img_name=$resultado_subida["mensaje"];
                    //var_dump($img_name);
                    

                $oldDir= "assets/libros/".$id."/".$img_name;
                $newDir="assets/libros/".$id."/75.jpg";
                $confirm=rename($oldDir,$newDir);
        
                  

                } else {
                    // Fallo
                    $data["mensaje"] = "Error al subir la imagen de la película";
 

                }
                
               
         
     }













}
