<?php
//Controlador de Editoriales
  include_once("Seguridad.php");
    class Buscador extends seguridad {

        public function __construct() {
            parent::__construct();
            $this->load->model("BuscadorModel");

        }



         public function index() {





}

        public function buscador() {

            $valor = $this->input->get_post("buscador");

            $data["listaBusqueda"]=$this->BuscadorModel->consulta($valor);
            //$this->load->view("VistaDos.php", $data);

            $data["nombreVista"] = "VistaDos";
            $data["tituloBuqueda"] = $valor;
          $this->load->view("plantillaFront", $data);

        }


         public function Visor($id) {



                  // = $this->input->get_post("id");
                  $data["id"]=$id;

                

                 $data["nombreVista"] = "Visor.php";
           
          $this->load->view("plantillaFront", $data);


}









         





    }