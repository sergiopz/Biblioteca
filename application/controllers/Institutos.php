<?php

    /*include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Peliculas extends Seguridad{*/

    class Institutos extends CI_Controller {

       /* public function __construct() {
            parent::__construct();
            $this->load->model("CategoriaModel");
        }*/

    
        public function vistaFormInsert(){

            $this->load->view("formInsert");

        }

        public function InsertarInstituto(){

            $nombre = $this->input->get_post("nombre");
            $localidad = $this->input->get_post("localidad");
            $direccion = $this->input->get_post("direccion");
            $cp = $this->input->get_post("cp");
            $provincia = $this->input->get_post("provincia");

            $this->load->model("InstitutosModel");
            $data["instList"] = $this->InstitutosModel->getAll();
            $this->load->view("MenuInstitutos", $data);
    
        } 


        public function EliminarInstitutos($id){

            $this->load->model("InstitutosModel");
            $resultado = $this->InstitutosModel->EliminarInstitutos($id);
    
            if ($resultado) {
                $this->load->model("InstitutosModel");
                $data["instList"] = $this->InstitutosModel->getAll();
                $this->load->view("MenuInstitutos",$data);
            } else {
                echo "No se pudo eliminar el instituto.";
                $this->load->view("MenuInstitutos");
            }
    
        }

            public function ModificarInstitutos(){

                $nombre = $this->input->get_post("nombre");
                $localidad = $this->input->get_post("localidad");
                $direccion = $this->input->get_post("direccion");
                $cp = $this->input->get_post("cp");
                $provincia = $this->input->get_post("provincia");

                $this->load->model("InstitutosModel");
                $resultado = $this->InstitutosModel->ModificarInstitutos($id, $nombre, $localidad, $direccion, $cp, $provincia);

                if ($resultado) {
                    $data['mensaje'] = "Instituto modificado con éxito";
                    $this->load->model("InstitutosModel");
                    $data["instList"] = $this->InstitutosModel->getAll();
                    $this->load->view("MenuInstitutos",$data);
                } else {
                    $data["error"] = "No se pudo modificar el instituto.";
                    $data["instList"] = $this->InstitutosModel->getAll();
                    $this->load->view("MenuInstitutos",$data);
                }
  
            }
        }