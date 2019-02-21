<?php 
class envioEmailModel extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }
    //realizamos la inserción de los datos y devolvemos el 
    //resultado al controlador para envíar el correo si todo ha ido bien
    function new_user($nombre,$apellidos,$nick,$correo,$telefono,$contrasena){
        $data = array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'nick' => $nick,
            'correo' => $correo,
            'telefono' => $telefono,
            'contrasena' => $contrasena
        );
        return $this->db->insert('usuarios', $data);
    }
}