<?php
class UsuariosModel extends CI_Model{

// ------- COMPRUEBO EL LOGIN CON LOS PARAMETROS DEL CONTROLADOR -------------------- //
  
    

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

     public function __construct() {
            parent::__construct();
            $this->load->library("session");
        }
         public function getAll() {
           
            
            $r = $this->db->query("SELECT * FROM usuarios"); 
            
            $usuarios = array();
           foreach ($r -> result()as $usu) {
            $usuarios[]=$usu;
          
           }
            
            
            return $usuarios;
        }




             function InsertarUsuarios($nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion) {
                
                $this->db->query("INSERT INTO usuarios(nombre,apellidos,nick,contrasena,correo,telefono,tipo,idInstituto ,codigoConfirmacion)
                VALUES ('$nombre','$apellidos','$nick','$contrasena','$correo','$telefono', '$tipo','$idInstituto','$codigoConfirmacion')");
                return $this->db->affected_rows();
            
        }
              function BorrarUsuarios($id) {
                $this->db->query("DELETE FROM usuarios where id='$id'");
                return $this->db->affected_rows();
            }

             function ModificarUsuarios($id,$nombre,$apellidos,$nick,$contrasena,$correo,$telefono, $tipo,$idInstituto,$codigoConfirmacion) {
                $this->db->query("UPDATE usuarios SET nombre='$nombre', apellidos='$apellidos', nick='$nick', contrasena='$contrasena',correo='$correo', telefono='$telefono', tipo='$tipo', idInstituto='$idInstituto' , codigoConfirmacion='$codigoConfirmacion'  WHERE id='$id' ");
                return $this->db->affected_rows();
            }

            

                   

    



}
