<?php
  //incluimos peliculas
  include_once('Seguridad.php');
  //extendemos de seguridad
    class Administrador extends Seguridad {

        public function __construct() {
            parent::__construct();
           $this->load->model("AdministradorModel");

       }

       public function main() {
           $data["listaUsuarios"] = $this->AdministradorModel->getAll();
          $this->load->view("administradorAjax.php", $data);
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

                
                    $resultado = $this->AdministradorModel->InsertarUsuarios($nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion );
                    if ($resultado == 0) {
                        $data["mensaje"] = "Error al insertar la película en la base de datos";
                       // $this->peliculasModel->borrarImagenPelicula($img_name);
                    } else {
                           $data["nombreVista"] = "VistaAdministrador";
                     $this->load->view("plantilla", $data);
                     $this->main();
                    }
      }
            
                
               


        public function EliminarUsuarios($id) {
                  
            //$id = $this->input->get_post("id");
            $resultado = $this->AdministradorModel->BorrarUsuarios($id);
           
               
            if ($resultado == 0) { // Error: usuario o contraseña no existen
                $this->load->view("VistaAdministrador");
            } else {
                   $data["listaUsuarios"] = $this->AdministradorModel->getAll();
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
                $resultado = $this->AdministradorModel->ModificarUsuarios($id,$nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion);
           
               
            if ($resultado == 0) { // Error: usuario o contraseña no existen

                 $data["error"]="No se pudo modificar";
                 $data["listaUsuarios"] = $this->AdministradorModel->getAll();
               $this->load->view("VistaAdministrador", $data);

             
               

            } else {


                 $data["mensaje"]=" modificado con exito";

                $this->load->model("AdministradorModel");
                $data["listaUsuarios"] = $this->AdministradorModel->getAll();
                $this->load->view("VistaAdministrador", $data);
            }
        

        
    }
  }