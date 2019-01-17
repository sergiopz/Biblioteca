<?php
    class LibrosModel extends CI_Model {
    // Devolver todos los valores de una lista

    public function getAll() {
        $r = $this->db->query("SELECT * FROM libros");
        $libros=array();
        foreach($r->result()as $libro){
            $libros[]=$libro;
        }
        return $libros;     
    }

   // Insertar un libro de la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
   public function InsertarLibro($id,$isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial) {
    $r = $this->db->query("select max(id) as id from libros");
    $row =$r->result()[0];
    $idM=$row->id+1;

    $r = $this->db->query("INSERT INTO libros(id,isbn,titulo,descripcion,fecha,paginas,idInstituto,idUsuario,idEditorial) VALUES ('$idM','$nombre')");
    

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