<?php
class UsuariosModel extends CI_Model{

    public function __construct() {
        parent::__construct();
        $this->load->library("session");
    }

    // Devolver todos los valores de la tabla usuarios
    public function getAll() {        
        $r = $this->db->query("SELECT * FROM usuarios"); 
        $usuarios = array();
    foreach ($r -> result()as $usu) {
        $usuarios[]=$usu;
        }
    return $usuarios;
    }

    //array con el id el nombre y el tipo de la persona que se conecto
    public function ComprobarTipo($nick,$contrasena){
        $r = $this->db->query(" SELECT id,nombre,tipo FROM usuarios WHERE nick='$nick' OR correo='$nick' AND contrasena='$contrasena' ");
    return $r->result_array();  
    }

    //Funcion que para ver si un usuario existe en la tabla de datos
    public function ComprobarUsuario($nick,$contrasena){
        $query = $this->db->query("SELECT id FROM usuarios WHERE (nick='$nick' OR correo='$nick') AND contrasena='$contrasena' ");
    return $query->num_rows();
    }

    // Insertar un usuario en la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
    public function InsertarUsuarios($nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion) {          
            $r = $this->db->query("select max(id) as id from usuarios");
            $row =$r->result()[0];
            $idM=$row->id+1;
            $this->db->query("INSERT INTO usuarios(id,nombre,apellidos,nick,contrasena,correo,telefono,tipo,idInstituto ,codigoConfirmacion)
            VALUES ('$idM','$nombre','$apellidos','$nick','$contrasena','$correo','$telefono', '$tipo','$idInstituto','$codigoConfirmacion')");
        return $this->db->affected_rows();
    }

    // Borrar un usuario en la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
    public function BorrarUsuarios($id) {
            $this->db->query("DELETE FROM usuarios where id='$id'");
        return $this->db->affected_rows();
    }

    // Modificar un usuario en la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
    public function ModificarUsuarios($id,$nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion) {
            $this->db->query("UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', nick='$nick', contrasena='$contrasena',correo='$correo', telefono='$telefono', tipo='$tipo', idInstituto='$idInstituto' , codigoConfirmacion='$codigoConfirmacion'  WHERE id='$id' ");
        return $this->db->affected_rows();
    }

}