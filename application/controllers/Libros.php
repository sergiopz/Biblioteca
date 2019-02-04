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
                $this->VistaAjax();
            }
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

}
