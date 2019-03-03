<?php
//Controlador de Editoriales
  include_once("Seguridad.php");
    class Buscador extends seguridad {

        public function __construct() {
            parent::__construct();
            $this->load->model("BuscadorModel");

        }

        public function buscador() {

            $valor = $this->input->get_post("buscador");

            $data["listaBusqueda"]=$this->BuscadorModel->consulta($valor);
           // $this->load->view("VistaDos.php", $data);

            $data["nombreVista"] = "VistaDos";
            $data["tituloBusqueda"] = $valor;
          $this->load->view("plantillaFront", $data);

        }

        public function Categoria() {

            //$valor = $this->input->get_post("buscador");

            $data["listaCategoria"]=$this->BuscadorModel->categorias();
           // $this->load->view("VistaDos.php", $data);

            $data["nombreVista"] = "Categorias";
            //$data["tituloBusqueda"] = $valor;
          $this->load->view("plantillaFront", $data);

        }


        public function Visor($id) {

          $data["id"]=$id;
   
          $this->load->view("visor.php", $data);

        }


          public function BuscadorCategoria($categoria) {

            //$valor = $this->input->get_post("buscador");

            $data["listaBusqueda"]=$this->BuscadorModel->LibrosCategorias($categoria);
           // $this->load->view("VistaDos.php", $data);

            $data["nombreVista"] = "VistaDos";
            $data["tituloBusqueda"] = $categoria;
          $this->load->view("plantillaFront", $data);

        }



    }