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
   public function InsertarLibro($isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial) {
    $r = $this->db->query("select max(id) as id from libros");
    $row =$r->result()[0];
    $idM=$row->id+1;

    $r = $this->db->query("INSERT INTO libros(id,isbn,titulo,descripcion,fecha,paginas,idInstituto,idUsuario,idEditorial) 
                            VALUES ('$idM','$isbn','$titulo','$descripcion','$fecha','$paginas','$idInstituto','$idUsuario','$idEditorial')");
    
    return $r;
        }


    //Borrar un libro de la tabla. Devuelve 1 si lo consigue o 0 en caso de error
    public function EliminarLibro($id) {
            $this->db->query("DELETE FROM libros WHERE id= '$id' ");
            return $this->db->affected_rows();   
        }


    //Modificar un libro de la tabla. Devuelve 1 si lo consigue o 0 en caso de error
    public function ModificarLibro($id,$isbn,$titulo,$descripcion,$fecha,$paginas,$idInstituto,$idUsuario,$idEditorial) {
            $this->db->query("UPDATE libros SET isbn='$isbn',titulo='$titulo',descripcion='$descripcion',
                                                fecha='$fecha',paginas='$paginas',idInstituto='$idInstituto',
                                                idUsuario='$idUsuario',idEditorial='$idEditorial'   
                                                WHERE id='$id'");
            return $this->db->affected_rows();   
                }

}