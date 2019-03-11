<?php
class UsuariosModel extends CI_Model{

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

}