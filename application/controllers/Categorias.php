<?php

    /*include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Peliculas extends Seguridad{*/

    class Categorias extends CI_Controller {

       /* public function __construct() {
            parent::__construct();
            $this->load->model("CategoriasModel");
        }*/

       /* public function vistaFormInsert(){

            $this->load->view("formInsert");

        }*/

        public function VistaAjax() {
            $data["listaCategorias"] = $this->CategoriasModel->getAll();
            $this->load->view("CategoriaAjax.php", $data);
            
        }

        public function InsertarCategoria(){

                $nombre = $this->input->get_post("nombre");

                $this->load->model("CategoriasModel");
                $data["catList"] = $this->CategoriasModel->getAll();
                $this->load->view("header", $data);
    
        } 

        public function EliminarCategoria($id){

                $this->load->model("CategoriasModel");
                $resultado = $this->CategoriasModel->EliminarCategoria($id);
    
                if ($resultado) {
                    $this->load->model("CategoriasModel");
                    $data["catList"] = $this->CategoriasModel->getAll();
                    $this->load->view("header",$data);
                } else {
                    echo "No se pudo eliminar la Categoria.";
                    $this->load->view("header");
                }
    
        }

            public function ModificarCategoria(){

                    $id = $this->input->post('id');
                    $titulo = $this->input->post('nombre');

                    $this->load->model("CategoriasModel");
                    $resultado = $this->CategoriasModel->ModificarCategoria($id, $nombre);

                    if ($resultado) {
                        $data['mensaje'] = "Categoria modificada con éxito";
                        $this->load->model("CategoriasModel");
                        $data["catList"] = $this->CategoriasModel->getAll();
                        $this->load->view("MenuCategorias",$data);
                    } else {
                        $data["error"] = "No se pudo modificar la categoria.";
                        $data["catList"] = $this->CategoriasModel->getAll();
                        $this->load->view("MenuCategorias",$data);
                    }

                
            }
        }