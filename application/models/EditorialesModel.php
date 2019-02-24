<?php
    class EditorialesModel extends CI_Model {
        
    // Devolver todos los valores de la tabla editorial   
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


 public function consulta($valor) {
           
            
            //$id = $this->db->query("SELECT * from libros where idInstituto=(select id from instituto WHERE nombre='$valor') or idEditorial=(select id from editorial WHERE nombre='$valor')"); 
            $this->db->query("DROP TABLE busqueda");
            $this->db->query("CREATE TABLE busqueda (id INT ,titulo VARCHAR(50))");
         $r = $this->db->query("SELECT id from libros where titulo ='$valor' or idInstituto=(select id from instituto WHERE nombre='$valor') or idEditorial=(select id from editorial WHERE nombre='$valor') union SELECT idLibro FROM librocategoria WHERE idCategoria =(select id from categoria where nombre='$valor') union SELECT idLibro FROM autoreslibros WHERE idAutor =(select id from autores where nombre= '$valor')"); 
            
               //$busqueda=array();
        foreach($r->result()as $res){
            //echo $editorial->id;
            $this->db->query("INSERT INTO `busqueda`(SELECT id , titulo from libros where id ='$res->id')");
            //$busqueda[]=$editorial;
            }

            
           
                                
                                
            $r2 = $this->db->query("SELECT * from busqueda");

            $busqueda=array();
            foreach($r2->result()as $editorial){
            
            $busqueda[]=$editorial;
            } 


        return $busqueda;     
        }
            
        


}