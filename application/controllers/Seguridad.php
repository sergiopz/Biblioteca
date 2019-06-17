<?php
    class Seguridad extends CI_Controller {

        //Cargamos los modelos de Usuarios, Editoriales y el buscador
        public function __construct() {
            parent::__construct();
            $this->load->model("UsuariosModel");
            $this->load->model("EditorialesModel");
            $this->load->model("BuscadorModel");
        }
    
        //Cargamos la libreria de sesion y comprobamos que existe la variable de session loguedIn
        public function security_check(){ 
                $this->load->library("session");
            if (!isset($this->session->loguedIn)){
                $data["nombreVista"] = "homeFront";
                $this->load->view("plantillaFront", $data);

                return false;
            } else {
                return true;
            }
        }

        //Creamos 4 variables de session loguedIn, identificador,nombre y el tipo del usuario
        public function crearLogin($id,$nombre,$tipo) {
                $this->load->library("session");
                $session_logued = array('loguedIn' => TRUE,'idUsuario'=>$id,'nombreUsuario'=>$nombre,'tipoUsuario'=>$tipo);
                $this->session->set_userdata($session_logued);
        }

        //Destruimos las variables de session creadas
        public function cerrar_sesion() {
            $this->load->library("session");
            $this->session->sess_destroy();
            redirect('Administrador/Index','refresh');
        }
    
    }