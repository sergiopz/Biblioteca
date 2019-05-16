<?php
//Controlador de Categorias
      include_once("Seguridad.php");

    class Categorias extends Seguridad  {

       public function __construct() {
            parent::__construct();
            $this->load->model("CategoriasModel");
        }

      //Funcion que carga la vista de categorias y sus datos
        public function VistaAjax() {
          if($this->security_check()){
            $this->load->model("CategoriasModel");
            $data["nombreVista"] = "CategoriaAjax";
            $data["listaCategorias"] = $this->CategoriasModel->getAll();
            $this->load->view("plantilla.php", $data);
            
        }
      }
      
      //Funcion que inserta una categoria
        public function InsertarCategoria(){
          if($this->security_check()){
            $nombre = $this->input->get_post("nombre");

            $resultado = $this->CategoriasModel->InsertarCategoria($nombre);
            if ($resultado == 0) {
                    $data["mensaje"] = "Error al insertar la categoria en la base de datos";
                       
                    } else {
                      redirect('Categorias/VistaAjax','refresh');
                    }

                  }
      }
    
      //Funcion que elimina una categoria
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
        //Funcion que modifica una categoria
            public function ModificarCategoria(){
              if($this->security_check()){

                $id = $this->input->post('id');
                $nombre = $this->input->post('nombre');
                $resultado = $this->CategoriasModel->ModificarCategoria($id, $nombre);

                if ($resultado==0) {
                   $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "categoria";  
                           $this->load->view("plantilla", $data);
                } else {
                   $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "categoria";   
                           $this->load->view("plantilla", $data);
                }
            }
        }

    } 