<?php
    class EditorialesModel extends CI_Model {
    // Devolver todos los valores de una lista
    
    public function getAll() {
        $r = $this->db->query("SELECT * FROM editorial");
        $editoriales=array();
        foreach($r->result()as $editorial){
            $editoriales[]=$editorial;
        }
        return $editoriales;     
    }

   // Insertar un editorial de la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
   public function InsertarEditorial($nombre) {
    $r = $this->db->query("select max(id) as id from editorial");
    $row =$r->result()[0];
    $idM=$row->id+1;

    $r = $this->db->query("INSERT INTO editorial(id,nombre) VALUES ('$idM','$nombre')");
    

    return $r;
        }


    //Borrar un editorial de la tabla. Devuelve 1 si lo consigue o 0 en caso de error
    public function EliminarEditorial($id) {
            $this->db->query("DELETE FROM editorial WHERE id= '$id' ");
            return $this->db->affected_rows();   
        }


    //Modificar un editorial de la tabla. Devuelve 1 si lo consigue o 0 en caso de error
    public function ModificarEditorial($id,$nombre) {
             $this->db->query("UPDATE editorial SET nombre='$nombre' WHERE id='$id'");
            return $this->db->affected_rows();   
                }

}