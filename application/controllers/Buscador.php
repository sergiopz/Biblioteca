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
            echo $valor;

            $data["listaBusqueda"]=$this->BuscadorModel->consulta($valor);
            //$this->load->view("VistaDos.php", $data);


                 $data["nombreVista"] = "VistaDos";

          $this->load->view("plantillaFront", $data);

        }


          public function buscador() {



            //$this->load->view("visor.php", $data);



          }



    }