<?php
   //Incluimos la vista de seguridad
    include_once('Seguridad.php');
    
   class Administrador extends Seguridad {

      //Cargamos los modelos necesarios para las consultas
      public function __construct() {
         parent::__construct();
         $this->load->model("UsuariosModel");
         $this->load->model("EditorialesModel");
         $this->load->model("BuscadorModel");
         $this->load->model("InstitutosModel");
         $this->load->model("LibrosModel");
      }

      //Cargamos la vista principal con los ultimos libros 
      public function Index() {
         $data["nombreVista"] = "homeFront";
         $data["ultimosLibros"]=$this->BuscadorModel->UltimosLibros();
         $data["institutos"]=$this->InstitutosModel->getAll();
         $data["favoritos"]=$this->LibrosModel->getLibroFavorito($this->session->userdata('idUsuario'));
         $this->load->view("plantillaFront", $data);
      }

      //Funcion de prueba para cargar la vista al borrarla
      public function IndexRefresh(){
         $this->cerrar_sesion();
      }

      //Comprobaremos si el usuario esta registrado en la plataforma
      public function ComprobarUsuario(){
         $nick = $this->input->get_post("nombre");
         $contrasena = $this->input->get_post("password");
         $usuario = $this->UsuariosModel->ComprobarUsuario($nick,$contrasena);
         //Si el usuario esta registrado
         if($usuario!=0) {
               
               //Mandamos los datos que crearan las variables de sesion

               $datosUser = $this->UsuariosModel->ComprobarTipo($nick,$contrasena);
               $idUser = $datosUser[0]['id'];
               $this->crearLogin($datosUser[0]['id'],$datosUser[0]['nombre'], $datosUser[0]['tipo']);

            if($this->session->userdata('tipoUsuario')>2){
               redirect(site_url());
            }else if( ($this->session->userdata('tipoUsuario')>=0) && ($this->session->userdata('tipoUsuario')<=2) ){
               $this->main();
            }
         //Si el usuario no esta registrado
         } else {
            $this->Index();
         }
      }

      //Si existe la variable de sesion logue in te lleva al panel de administracion
      public function main() {
        if($this->security_check()){
            if($this->session->userdata('tipoUsuario')==2){
               $this->Index();
            }else{
               redirect('Libros/VistaAjax','refresh');
            }
         }
     }

   }