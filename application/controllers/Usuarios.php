<?php
  //Controlador de Usuarios
  include_once('Seguridad.php');
  
    class Usuarios extends Seguridad {
      public function __construct() {
          parent::__construct();
          $this->load->model("UsuariosModel");
          $this->load->model("InstitutosModel");
       }

      //Funcion que carga la vista de Usuarios y sus datos
      public function VistaAjax() {
          $data["listaUsuarios"] = $this->UsuariosModel->getAll();
          $data["listaInstitutos"] = $this->InstitutosModel->getAll();
          $data["nombreVista"] = "UsuarioAjax";
          $this->load->view("plantilla.php", $data);
       }
        
      //Funcion que inserta un usuario con todos sus datos
      public function InsertarUsuarios() {
        
          $nombre = $this->input->get_post("nombre");
          $apellidos = $this->input->get_post("apellidos");
          $nick = $this->input->get_post("nick");
          $contrasena = $this->input->get_post("contrasena");
          $correo = $this->input->get_post("correo");
          $telefono = $this->input->get_post("telefono");
          $tipo = $this->input->get_post("tipo");
          $idInstituto = $this->input->get_post("idInstituto");
          $codigoConfirmacion = $this->input->get_post("codigoConfirmacion");
          
          $resultado = $this->UsuariosModel->InsertarUsuarios($nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion );
            if ($resultado == 0) {
                $data["mensaje"] = "Error al insertar la película en la base de datos";
            } else {
                redirect('Usuarios/VistaAjax','refresh');
          }

      }
      
      //Funcion que elimina un usuario
      public function EliminarUsuarios($id) {  
            $resultado = $this->UsuariosModel->BorrarUsuarios($id);     
        if ($resultado == 0) { 
            redirect('Usuarios/VistaAjax','refresh');
        } else {
            $data["listaUsuarios"] = $this->UsuariosModel->getAll();
            redirect('Usuarios/VistaAjax','refresh');  
          }
        
      }

      //Funcion que modifica un usuario
      public function ModificarUsuarios() {                 
          $id = $this->input->get_post("id");
          $nombre = $this->input->get_post("nombre");
          $apellidos = $this->input->get_post("apellidos");
          $nick = $this->input->get_post("nick");
          $contrasena = $this->input->get_post("contrasena");
          $correo = $this->input->get_post("correo");
          $telefono = $this->input->get_post("telefono");
          $tipo = $this->input->get_post("tipo");
          $idInstituto = $this->input->get_post("idInstituto");
          $codigoConfirmacion = $this->input->get_post("codigoConfirmacion");  

          $resultado = $this->UsuariosModel->ModificarUsuarios($id,$nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion);
            
         /* if ($resultado == 0) { 
              $data["error"]="No se pudo modificar";
              $data["listaUsuarios"] = $this->UsuariosModel->getAll();
              redirect('Usuarios/VistaAjax','refresh');
          } else {
              redirect('Usuarios/VistaAjax','refresh');
          }*/var_dump( $idInstituto);
      }

  }