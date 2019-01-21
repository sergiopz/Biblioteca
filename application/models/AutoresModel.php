<?php
    class AutoresModel extends CI_Model {

    // Devolver todos los valores de la tabla autores
    public function getAll() {
        $r = $this->db->query("SELECT * FROM autores");
        $autores=array();
        foreach($r->result()as $autor){
            $autores[]=$autor;
            }
        return $autores;     
        }

   // Insertar un autor de la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
   public function InsertarAutor($nombre) {
        $r = $this->db->query("select max(id) as id from autores");
        $row =$r->result()[0];
        $idM=$row->id+1;

        $r = $this->db->query("INSERT INTO autores(id,nombre) VALUES ('$idM','$nombre')");
    return $r;
        }


    //Borrar un autor de la tabla. Devuelve 1 si lo consigue o 0 en caso de error
    public function EliminarAutor($id) {
            $this->db->query("DELETE FROM autores WHERE id= '$id' ");
            return $this->db->affected_rows();   
        }


    //Modificar un autor de la tabla. Devuelve 1 si lo consigue o 0 en caso de error
    public function ModificarAutor($id,$nombre) {
        $this->db->query("UPDATE autores SET nombre='$nombre' WHERE id='$id'");
        return $this->db->affected_rows();   
        }

}