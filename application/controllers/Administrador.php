<?php
//Incluimos la vista de seguridad
    include_once('Seguridad.php');
    //extendemos todas las funciones de seguridad
    class Administrador extends Seguridad {
        public function __construct() {
            parent::__construct();
  
            $this->load->model("UsuariosModel");
                 $this->load->model("EditorialesModel");
        }

        //cargamos vista

        public function Index() {
          $data["nombreVista"] = "homeFront";
          $this->load->view("plantillaFront", $data);
        }
        //Esta es la que estamos haciendo
        public function ComprobarUsuario2(){
         $nick = $this->input->get_post("nombre");
         $contrasena = $this->input->get_post("password");

         $usuario = $this->UsuariosModel->ComprobarUsuario($nick,$contrasena);
         
         //Esos datos hay que pasarselo acrear login y en el array de logue in meterle todo
        
         
         //$tipo = $this->UsuariosModel->tipo($nick,$contrasena);
         if($usuario!=0) {
            $datosUser = $this->UsuariosModel->ComprobarTipo($nick,$contrasena);
            $idUser = $datosUser[0]['id'];

            $this->crearLogin($datosUser[0]['id'],$datosUser[0]['nombre'], $datosUser[0]['tipo']);
            $this->main();
            //echo "valores = " . $this->session->userdata('loguedIn');
         }else{
            $this->Index();
           
         }
        }


        public function ComprobarUsuario() {
            
            $nombre = $this->input->get_post("nombre");
            $pass = $this->input->get_post("password");
            
            $resultado1 = $this->UsuariosModel->ComprobarTipo0($nombre,$pass);
            $resultado2 = $this->UsuariosModel->ComprobarTipo1($nombre,$pass);
            $resultado3 = $this->UsuariosModel->ComprobarTipo2($nombre,$pass);
            
           

              if ($resultado1 == 0) { // Error: usuario o contraseña no existen
            
             //$data["listaUsuarios"] = $this->UsuariosModel->getAll();
            // $data["nombreVista"] = "VistaAdministrador";
             //$this->load->view("plantilla", $data);
                 
     
                  $this->crearLogin();
                //echo "Usario identificado";
                //llamamos funcion de abajo
                $this->main();


            }elseif ($resultado2 == 1) { // Error: usuario o contraseña no existen
               echo "bibliotecario";
               


            }elseif ($resultado3 == 1) { // Error: usuario o contraseña no existen
               echo "usuario";
               

            }else {    // Login OK
            //crearLogin(); esta en seguridad , al entrar le creamos una 
            //sesion de control 
               //$this->load->view("mainMenu", $data); 
             //$data["listaUsuarios"] = $this->AdministradorModel->getAll();
            //$data["listaEditoriales"] = $this->EditorialesModel->getAll();
            //$this->load->view("EditorialAjax.php", $data);
                // $data["nombreVista"] = "VistaAdministrador";
             //$this->load->view("plantilla", $data);
                // $this->load->view("EntradaLogin");




     }
     
 
}

     public function main() {

        //Comprobamos que entre , y le pasamos la vista main menu
        if($this->security_check()){
              //$nombre = $this->input->get_post("nombre");
            //$pass = $this->input->get_post("password");
            //vamos a usuarios model para mirar que este el id
            //$resultado = $this->usuariosModel->prueba($nombre,$pass);

              
                 //$this->cerrar_sesion();
                
                
             
             //$data["nombreUser"] = $datosUser[1];
             //$data["tipoUser"] = $datosUser[2];

             $data["nombreVista"] = "VistaAdministrador";
             $this->load->view("plantilla", $data);

       

            }


     }

}

