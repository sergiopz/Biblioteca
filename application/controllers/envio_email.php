<?php 
class Envio_email extends CI_Controller{

    function __construct(){

        parent::__construct();
        $this->load->model('EnvioEmailModel');

    }
    /*function index()
    {
        $data['title'] = 'Formulario de registro';
        $data['head'] = 'Regístrate desde aquí';
        $this->load->view('envio_email_view', $data);
    }*/
    function nuevo_usuario(){
       
        $nombre = $this->input->post('nombre');
        $apellidos = $this->input->post('apellidos');
        $nick = $this->input->post('nick');
        $contrasena = $this->input->post('contrasena');
        $correo = $this->input->post('correo');
        $instituto = $this->input->post('instituto');
        $telefono = $this->input->post('telefono');
        $tipo = 5;
        $codgio = 0;
                
        
                $insert = $this->envioEmailModel->new_user($nombre,$apellidos,$nick,$contrasena,$instituto,$correo,$telefono,$tipo,$codigo);
                //si el modelo nos responde afirmando que todo ha ido bien, envíamos un correo
                //al usuario y lo redirigimos al index para que pueda iniciar sesión

               /* $config = Array(

                    'protocol' => 'sendmail',
                    'mailpath' => '/usr/sbin/sendmail',

                    'smtp_host' => 'iescelia.org',
                    'smtp_port' => 25,
                    'smtp_user' => 'apps@celia.org',
                    'smtp_pass' => 'Emailserver19**',
                    'mailtype'  => 'html', 
                    'charset'   => 'utf-8'
                );
                $this->load->library('email', $config);    
                $this->email->from('apps@celia.org', 'Biblioteca Celia Viñas');
                $this->email->to($correo);
                //super importante, para poder envíar html en nuestros correos debemos ir a la carpeta
                //system/libraries/Email.php y en la línea 42 modificar el valor, en vez de text debemos poner html
                $this->email->subject('Bienvenido/a a biblioteca Celia Viñas');
                $this->email->message('<h2>' . $nombre . ' gracias por registrarte en Biblioteca Celia Viñas</h2><hr><br><br>
                Tu nombre de usuario es: ' . $nick . '.<br>Tu password es: ' . $contrasena.'pincha en el link para confirmar tu correoooooooooooooooo');
                $this->email->send();
      */
    }
}