<?php
//Controlador de Editoriales
    include_once("seguridad.php");
    class Editorialess extends seguridad {
        public function __construct() {
            parent::__construct();
            $this->load->model("EditorialesModel");

        }


       

        public function VistaAjax() {
            $data["listaEditoriales"] = $this->EditorialesModel->getAll();
           $this->load->view("EditorialAjax.php", $data);
        }
       


        public function InsertarEditorial(){
            
            $nombre = $this->input->get_post("nombre");

            $r=$this->EditorialesModel->InsertarEditorial($nombre);

            if ($r== 0) { 
                echo"Fallo al insertar Editorial";
                
            } else {
                echo"Editorial insertado con exito";
                
             }
        }


        public function EliminarEditorial($id){
            $r=$this->EditorialesModel->EliminarEditorial($id);
            if ($r== 0) { 
                echo"Fallo al eliminar Editorial";
                
            } else {
                echo"Editorial eliminado con  exito";
                
             }


        }

        public function ModificarEditorial(){
            $id = $this->input->get_post("id");
            $nombre = $this->input->get_post("nombre"); 
            $r=$this->EditorialesModel->ModificarEditorial($id,$nombre);
            if ($r== 0) { 
                echo"Fallo al modificar Editorial";
                
            } else {
                echo"Editorial modificado con exito";
                
             }
        }

       
    }
