<?php

    /*include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Peliculas extends Seguridad{*/

    class Categoria extends CI_Controller {

       /* public function __construct() {
            parent::__construct();
            $this->load->model("CategoriaModel");
        }*/

        public function vistaFormInsert(){

            $this->load->view("formInsert");

        }

        public function InsertarCategoria(){

                $nombre = $this->input->get_post("nombre");

                $this->load->model("CategoriaModel");
                $data["catList"] = $this->CategoriaModel->getAll();
                $this->load->view("MenuCategorias", $data);
    
        } 

        public function EliminarCategoria($id){

                $this->load->model("CategoriaModel");
                $resultado = $this->CategoriaModel->EliminarCategoria($id);
    
                if ($resultado) {
                    $this->load->model("CategoriaModel");
                    $data["catList"] = $this->CategoriaModel->getAll();
                    $this->load->view("MenuCategorias",$data);
                } else {
                    echo "No se pudo eliminar la Categoria.";
                    $this->load->view("MenuCategorias");
                }
    
        }

            public function ModificarCategoria(){

                    $id = $this->input->post('id');
                    $titulo = $this->input->post('nombre');

                    $this->load->model("CategoriaModel");
                    $resultado = $this->CategoriaModel->ModificarCategoria($id, $nombre);

                    if ($resultado) {
                        $data['mensaje'] = "Categoria modificada con éxito";
                        $this->load->model("CategoriaModel");
                        $data["catList"] = $this->CategoriaModel->getAll();
                        $this->load->view("MenuCategorias",$data);
                    } else {
                        $data["error"] = "No se pudo modificar la categoria.";
                        $data["catList"] = $this->CategoriaModel->getAll();
                        $this->load->view("MenuCategorias",$data);
                    }

                
            }
        }