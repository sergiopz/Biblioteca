<?php
class registroUsuarioModel extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }
    public function InsertarUsuarios($nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion) {          
        $r = $this->db->query("select max(id) as id from usuarios");
        $row =$r->result()[0];
        $idM=$row->id+1;
        $this->db->query("INSERT INTO usuarios(id,nombre,apellidos,nick,contrasena,correo,telefono,tipo,idInstituto ,codigoConfirmacion)
        VALUES ('$idM','$nombre','$apellidos','$nick','$contrasena','$correo','$telefono',5,'$idInstituto','$codigoConfirmacion')");
        return $this->db->affected_rows();
    }

    public function ComprobarNick($nick){
        $r = $this->db->query("select nick from usuarios where nick='$nick'");
        return $r->num_rows();
    }

    public function ComprobarCorreo($correo){
        $r = $this->db->query("select correo from usuarios where correo='$correo'");
        return $r->num_rows();
    }

    public function ComprobarTelefono($telefono){
        $r = $this->db->query("select telefono from usuarios where telefono='$telefono'");
        return $r->num_rows();
    }



}