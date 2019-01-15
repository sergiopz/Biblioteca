<?php
    class Seguridad extends CI_Controller {

        //Aqui controlaremos la seguridad
        //Con public function security_check() nos dara permiso para poder entrar si es true
    
        public function security_check()
        { 
            $this->load->library("session");
            if (!isset($this->session->loguedIn)){
                echo("<script>alert('No tienes permiso para acceder a este sitio');</script>");
                $this->load->view("formLogin");

                return false;
            }else{
                
                return true;
            }
        }

        //Aqui creamos la varible de sesion
        //$this->load->library("session"); esto es obligatorio llamar a la libreia


        public function crearLogin() {
                $this->load->library("session");
                $session_logued = array('loguedIn' => TRUE);
                $this->session->set_userdata($session_logued);
        }

        //Aqui cerramos la sesion

        public function cerrar_sesion() {
            $this->load->library("session");
            $this->session->sess_destroy();
            $this->load->view("formLogin");
        }
    
    }
    

?>