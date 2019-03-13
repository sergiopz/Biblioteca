<?php
  //Controlador de Usuarios
  include_once('Seguridad.php');
  
    class RegistroUsuarios extends Seguridad {
        public function __construct() {
            parent::__construct();
            $this->load->model("registroUsuarioModel");
            $this->load->model("InstitutosModel");
            $this->load->model("registroUsuarioModel");
        }


    public function InsertarUsuarios() {
        
        $nombre = $this->input->get_post("nombre");
        $apellidos = $this->input->get_post("apellidos");
        $nick = $this->input->get_post("nick");
        $contrasena = $this->input->get_post("contrasena");
        $correo = $this->input->get_post("correo");
        $telefono = $this->input->get_post("telefono");
        $idInstituto = $this->input->get_post("idInstituto");
        $codigoConfirmacion = $this->input->get_post("codigoConfirmacion");
            
        $resultado = $this->UsuariosModel->InsertarUsuarios($nombre,$apellidos,$nick,$contrasena,$correo,$telefono, 5,$idInstituto,$codigoConfirmacion );
            if ($resultado == 0) {
                $data["mensaje"] = "Error al realizar el registro en la base de datos";
            } else {
            
                redirect(site_url("RegistroUsuarios/redireccionRegistro"));
            }
        }

        public function redireccionRegistro(){
            $data["nombreVista"] = "VistaRegistrado";
            $this->load->view("plantillaFront", $data);
        }

        public function ComprobarNick(){
           
            $nick = $this->input->post("nick");
            $resultado = $this->registroUsuarioModel->ComprobarNick($nick);
            echo $resultado;

            
        }

    }
    