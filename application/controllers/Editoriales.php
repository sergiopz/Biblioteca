<?php
//Controlador de Editoriales
    include_once("seguridad.php");
    class Editoriales extends seguridad {

        public function __construct() {
            parent::__construct();
            $this->load->model("EditorialesModel");

        }


       
    //Funcion que carga la vista de editoriales y sus datos
        public function VistaAjax() {
            $data["listaEditoriales"] = $this->EditorialesModel->getAll();
            $this->load->view("EditorialAjax.php", $data);
        }
       

    //Funcion que inserta una editorial
        public function InsertarEditorial(){       
            $nombre = $this->input->get_post("nombre");
            $r=$this->EditorialesModel->InsertarEditorial($nombre);
            if ($r== 0) { 
                echo"Fallo al insertar Editorial";
                
            } else {
                $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "editorial";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
            }
        }

    //Funcion que elimina una editorial
        public function EliminarEditorial($id){
            $r=$this->EditorialesModel->EliminarEditorial($id);
            if ($r== 0) { 
                echo"Fallo al eliminar Editorial";
                
            } else {
                echo"Editorial eliminado con  exito";  
            }
        }

    //Funcion que modifica una editorial
        public function ModificarEditorial(){
            $id = $this->input->get_post("id");
            $nombre = $this->input->get_post("nombre"); 
            $r=$this->EditorialesModel->ModificarEditorial($id,$nombre);
            if ($r== 0) { 
                echo"Fallo al modificar Editorial";
                
            } else {
                $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "editorial";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
            }
        }
 
    }
