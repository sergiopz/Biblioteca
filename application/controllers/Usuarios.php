<?php
//Incluimos la vista de seguridad
    include_once('Seguridad.php');
    //extendemos todas las funciones de seguridad
    class Usuarios extends Seguridad {
        public function __construct() {
            parent::__construct();
            $this->load->model("AdministradorModel");
            $this->load->model("UsuariosModel");
        }

        //cargamos vista

        public function Index() {
            $this->load->view("EntradaLogin");
        }

        public function ComprobarUsuario() {
            
            $nombre = $this->input->get_post("nombre");
            $pass = $this->input->get_post("password");
            
            $resultado1 = $this->UsuariosModel->ComprobarTipo0($nombre,$pass);
            $resultado2 = $this->UsuariosModel->ComprobarTipo1($nombre,$pass);
            $resultado3 = $this->UsuariosModel->ComprobarTipo2($nombre,$pass);
            
           

              if ($resultado1 == 1) { // Error: usuario o contraseña no existen
            
             $data["listaUsuarios"] = $this->AdministradorModel->getAll();
             $data["nombreVista"] = "VistaAdministrador";
             $this->load->view("plantilla", $data);
                 
                //echo "Error de logueo";


            }elseif ($resultado2 == 1) { // Error: usuario o contraseña no existen
               echo "bibliotecario";
               


            }elseif ($resultado3 == 1) { // Error: usuario o contraseña no existen
               echo "usuario";
               

            }else {    // Login OK
            //crearLogin(); esta en seguridad , al entrar le creamos una 
            //sesion de control 
               //$this->load->view("mainMenu", $data); 
             //$data["listaUsuarios"] = $this->AdministradorModel->getAll();
             $data["nombreVista"] = "VistaAdministrador";
             $this->load->view("plantilla", $data);

     }
     
 
}

}

