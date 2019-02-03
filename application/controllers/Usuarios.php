<?php
  //incluimos peliculas
  include_once('Seguridad.php');
  //extendemos de seguridad
    class Usuarios extends Seguridad {

        public function __construct() {
            parent::__construct();
        $this->load->model("UsuariosModel");
           $this->load->model("InstitutosModel");

       }

       public function VistaAjax() {
           $data["listaUsuarios"] = $this->UsuariosModel->getAll();
           $data["listaInstitutos"] = $this->InstitutosModel->getAll();
          $this->load->view("UsuariosAjax.php", $data);
       }
        

        public function InsertarUsuarios() {
            

                //$id = $this->input->get_post("id");
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
                       // $this->peliculasModel->borrarImagenPelicula($img_name);
                    } else {
                           $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "usuarios";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
                    }
      }
            
                
               


        public function EliminarUsuarios($id) {
                  
            //$id = $this->input->get_post("id");
            $resultado = $this->UsuariosModel->BorrarUsuarios($id);
           
               
            if ($resultado == 0) { // Error: usuario o contraseña no existen
                $this->load->view("VistaAdministrador");
            } else {
                   $data["listaUsuarios"] = $this->UsuariosModel->getAll();
                   $this->load->view("VistaAdministrador", $data);   
            }
        
      }

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
                            //$cartel = $this->input->get_post("cartel");
                $resultado = $this->UsuariosModel->ModificarUsuarios($id,$nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion);
           
               
            if ($resultado == 0) { // Error: usuario o contraseña no existen

                 $data["error"]="No se pudo modificar";
                 $data["listaUsuarios"] = $this->UsuariosModel->getAll();
               $this->load->view("VistaAdministrador", $data);

             
               

            } else {


                 $data["nombreVista"] = "VistaAdministrador";
                           $data["tabla"] = "administracion";   // La tabla que queremos que se muestre automáticamente en la vista principal
                           $this->load->view("plantilla", $data);
            }
        

        
    }
  }