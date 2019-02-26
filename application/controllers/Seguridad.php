<?php
    class Seguridad extends CI_Controller {

        //Aqui controlaremos la seguridad
        //Con public function security_check() nos dara permiso para poder entrar si es true
               public function __construct() {
            parent::__construct();
  
            $this->load->model("UsuariosModel");
                 $this->load->model("EditorialesModel");
                  $this->load->model("BuscadorModel");
        }
    
        public function security_check()
        { 
            $this->load->library("session");
            if (!isset($this->session->loguedIn)){
                $data["nombreVista"] = "homeFront";
          $this->load->view("plantillaFront", $data);

                return false;
            }else{
                
                return true;
            }
        }

        //Aqui creamos la varible de sesion
        //$this->load->library("session"); esto es obligatorio llamar a la libreia


        public function crearLogin($id,$nombre,$tipo) {
                $this->load->library("session");
                $session_logued = array('loguedIn' => TRUE,'idUsuario'=>$id,'nombreUsuario'=>$nombre,'tipoUsuario'=>$tipo);
                $this->session->set_userdata($session_logued);
        }

        //Aqui cerramos la sesion

        public function cerrar_sesion() {
            $this->load->library("session");
            $this->session->sess_destroy();
            $data["nombreVista"] = "homeFront";
            $data["ultimosLibros"]=$this->BuscadorModel->UltimosLibros();
            $this->load->view("plantillaFront", $data);
        }
    
    }
    

?>