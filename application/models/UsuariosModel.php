<?php
class UsuariosModel extends CI_Model{

// ------- COMPRUEBO EL LOGIN CON LOS PARAMETROS DEL CONTROLADOR -------------------- //
  
public function getAll() {
    $r = $this->db->query("SELECT * FROM usuarios");
    $usuarios=array();
    foreach($r->result()as usuario){
        $usuarios[]=usuario;
    }
    return $usuarios;     
}

    public function ComprobarTipo0($nombre, $pass){
        $query = $this->db->query("SELECT id FROM usuarios WHERE nombre='$nombre' AND contrasena='$pass' and tipo='0'");

            
           
        return $query->num_rows();
    }
    public function ComprobarTipo1($nombre, $pass){
        $query = $this->db->query("SELECT id FROM usuarios WHERE nombre='$nombre' AND contrasena='$pass' and tipo='1'");

            
           
        return $query->num_rows();
    }

      public function ComprobarTipo2($nombre, $pass){
        $query = $this->db->query("SELECT id FROM usuarios WHERE nombre='$nombre' AND contrasena='$pass' and tipo='2'");

            
           
        return $query->num_rows();
    }

    



}
