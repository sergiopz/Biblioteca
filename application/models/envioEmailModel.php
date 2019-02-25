<?php 
class EnvioEmailModel extends CI_Model
{
    public function construct()
    {
        parent::__construct();
    }
    //realizamos la inserción de los datos y devolvemos el 
    //resultado al controlador para envíar el correo si todo ha ido bien
    function new_user($nombre,$apellidos,$nick,$contrasena,$instituto,$correo,$telefono){
        $data = array(
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'nick' => $nick,
            'contrasena' => $contrasena,
            'instituto' => $instituto,
            'correo' => $correo,
            'telefono' => $telefono,
            'tipo' => 3
        );
        return $this->db->insert('usuarios', $data);
    }
}