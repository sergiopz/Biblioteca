<?php
//Controlador de Autores
    include_once("Seguridad.php");
    class Autores extends Seguridad {
        
        public function __construct() {
            parent::__construct();
            $this->load->model("AutoresModel");
        }

    //Funcion que carga la vista de autores y sus datos
        public function VistaAjax() {
            $data["listaAutores"] = $this->AutoresModel->getAll();
            $data["nombreVista"] = "AutorAjax";
            $this->load->view("plantilla.php", $data);
        }
    
    //Funcion que inserta un autor
        public function InsertarAutor(){            
            $nombre = $this->input->get_post("nombre");
            $r=$this->AutoresModel->InsertarAutor($nombre);
            if ($r== 0) { 
                echo"Fallo al insertar autor";
                
            } else {
                redirect('autores/VistaAjax','refresh');          
            }
        }

    //Funcion que elimina un autor
        public function EliminarAutor($id){
            $r=$this->AutoresModel->EliminarAutor($id);
            if ($r== 0) { 
                echo"Fallo al eliminar autor";
                
            } else {
                echo"Autor eliminado con exito";  
             }
        }

    //Funcion que modifica un autor
        public function ModificarAutor(){
            $id = $this->input->get_post("id");
            $nombre = $this->input->get_post("nombre"); 
            $r=$this->AutoresModel->ModificarAutor($id,$nombre);
            if ($r== 0) { 
                echo"Fallo al modificar autor";
                
            } else {
                $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "autor";   
                           $this->load->view("plantilla", $data);
            }
        }

    }