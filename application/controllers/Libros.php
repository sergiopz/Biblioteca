<?php
//Controlador de Autores
    include_once("seguridad.php");
    class Libros extends seguridad {
        
        public function __construct() {
            parent::__construct();
            $this->load->model("LibrosModel");
            $this->load->model("InstitutosModel");
            $this->load->model("EditorialesModel");
            $this->load->model("AdministradorModel");
            

        }

        /*Funcion que carga la vista con los valores de las tablas*/ 
        public function VistaAjax() {
            $data["listaLibros"] = $this->LibrosModel->getAll();
            $data["listaInstitutos"] = $this->InstitutosModel->getAll();
            $data["listaEditoriales"] = $this->EditorialesModel->getAll();           
            $data["listaAdministradores"] = $this->AdministradorModel->getAll();
            $this->load->view("LibroAjax.php" , $data);
        }
    
        /*Funcion que inserta un librr */
        
        public function InsertarLibro(){
            
            $isbn = $this->input->get_post("isbn");
            $titulo= $this->input->get_post("titulo");
            $descripcion = $this->input->get_post("descripcion");
            $fecha = $this->input->get_post("fecha");
            $paginas = $this->input->get_post("paginas");
            $idInstituto= $this->input->get_post("idInstituto");
            $idUsuario = $this->input->get_post("idUsuario");
            $idEditorial = $this->input->get_post("idEditorial");

            $r=$this->LibrosModel->InsertarLibro($isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial);

            if ($r== 0) { 
                echo"Fallo al insertar libro";
                
            } else {
                echo"Libro insertado con exito";
                
             }
        }

        /*Funcion que elimina un libro */

        public function EliminarLibro($id){
            $r=$this->LibrosModel->EliminarLibro($id);
            if ($r== 0) { 
                echo"Fallo al eliminar libro";
                
            } else {
                echo"Libro eliminado con exito";
                
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

            $r=$this->LibrosModel->ModificarLibro($id,$isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial);
            
            if ($r== 0) { 
                echo"Fallo al modificar libro";
                
            } else {
                echo"Libro modificado con exito";
                
             }
        }


       
    }
