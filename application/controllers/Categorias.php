<?php

    /*include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Peliculas extends Seguridad{*/

    class Categorias extends CI_Controller {

       public function __construct() {
            parent::__construct();
            $this->load->model("CategoriasModel");
        }

        public function VistaAjax() {
            $this->load->model("CategoriasModel");
            $data["listaCategorias"] = $this->CategoriasModel->getAll();
            $this->load->view("CategoriaAjax.php", $data);
            
        }

        public function InsertarCategoria(){
            $nombre = $this->input->get_post("nombre");

            $resultado = $this->CategoriasModel->InsertarCategoria($nombre);
            if ($resultado == 0) {
                    $data["mensaje"] = "Error al insertar la categoria en la base de datos";
                       
                    } else {
                      $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "categoria";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
                    }
      }
    
        public function EliminarCategoria($id) {

            $resultado = $this->CategoriasModel->EliminarCategoria($id);
    
            if ($resultado) {

            $data["listaCategorias"] = $this->CategoriasModel->getAll();
            $this->load->view("header",$data);
            } else {
                echo "No se pudo eliminar la Categoria.";
                $this->load->view("header");
            }
    
        }

            public function ModificarCategoria(){

                $id = $this->input->post('id');
                $nombre = $this->input->post('nombre');
                $resultado = $this->CategoriasModel->ModificarCategoria($id, $nombre);

                if ($resultado) {
                    $data['mensaje'] = "Categoria modificada con éxito";
                    $data["listaCategorias"] = $this->CategoriasModel->getAll();
                    $this->load->view("header",$data);
                } else {
                   $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "categoria";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
                }
            }
        }