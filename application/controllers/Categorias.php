<?php

    /*include_once('seguridad.php');
    //incluimos seguridad php y extendemos de la clase seguridad.php en vez de cI_controller.
    class Peliculas extends Seguridad{*/
      include_once("Seguridad.php");

    class Categorias extends Seguridad  {

       public function __construct() {
            parent::__construct();
            $this->load->model("CategoriasModel");
        }

        public function VistaAjax() {
          if($this->security_check()){
            $this->load->model("CategoriasModel");
            $data["listaCategorias"] = $this->CategoriasModel->getAll();
            $this->load->view("CategoriaAjax.php", $data);
            
        }
      }

        public function InsertarCategoria(){
          if($this->security_check()){
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
      }
    
        public function EliminarCategoria($id) {
          if($this->security_check()){

            $resultado = $this->CategoriasModel->EliminarCategoria($id);
    
            if ($resultado) {

            $data["listaCategorias"] = $this->CategoriasModel->getAll();
            $this->load->view("header",$data);
            } else {
                echo "No se pudo eliminar la Categoria.";
                $this->load->view("header");
            }

          }
    
        }

            public function ModificarCategoria(){
              if($this->security_check()){

                $id = $this->input->post('id');
                $nombre = $this->input->post('nombre');
                $resultado = $this->CategoriasModel->ModificarCategoria($id, $nombre);

                if ($resultado==0) {
                   $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "categoria";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
                } else {
                   $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "categoria";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
                }
            }
        }
       } 