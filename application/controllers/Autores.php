<?php
//Controlador de Autores
    include_once("seguridad.php");
    class Autores extends seguridad {
        public function __construct() {
            parent::__construct();
            $this->load->model("AutoresModel");

        }


        public function InsertarAutor(){
            
            $nombre = $this->input->get_post("nombre");

            $r=$this->AutoresModel->InsertarAutor($nombre);

            if ($r== 0) { 
                echo"Fallo al insertar autor";
                
            } else {
                echo"Autor insertado con exito";
                
             }
        }


        public function EliminarAutor($id){
            $r=$this->AutoresModel->EliminarAutor($id);
            if ($r== 0) { 
                echo"Fallo al eliminar autor";
                
            } else {
                echo"Autor eliminado con exito";
                
             }


        }

        public function ModificarAutor(){

            $id = $this->input->get_post("id");
            $nombre = $this->input->get_post("nombre");
            r=$this->AutoresModel->ModificarAutor($id,$nombre);

            if ($r== 0) { 
                echo"Fallo al modificar autor";
                
            } else {
                echo"Autor modificado con exito";
                
             }

        }

       
    }
