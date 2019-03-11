<?php
  //Controlador de Usuarios
  include_once('Seguridad.php');
  
    class Usuarios extends Seguridad {
        public function __construct() {
            parent::__construct();
            $this->load->model("registroUsuarioModel");
            $this->load->model("InstitutosModel");
        }


    public function RegistrarUsuarios() {
        
        $nombre = $this->input->get_post("nombre");
        $apellidos = $this->input->get_post("apellidos");
        $nick = $this->input->get_post("nick");
        $contrasena = $this->input->get_post("contrasena");
        $correo = $this->input->get_post("correo");
        $telefono = $this->input->get_post("telefono");
        $idInstituto = $this->input->get_post("idInstituto");
        $codigoConfirmacion = $this->input->get_post("codigoConfirmacion");
            
        $resultado = $this->UsuariosModel->InsertarUsuarios($nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion );
            if ($resultado == 0) {
                $data["mensaje"] = "Error al insertar la película en la base de datos";
            } else {
                $data["nombreVista"] = "VistaAdministrador";
                $data["tabla"] = "usuarios";
                $this->load->view("plantilla", $data);
            }
        }




    }