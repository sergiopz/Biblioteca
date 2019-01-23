<?php
    class LibrosModel extends CI_Model {
    
    /*Funciones de tabla libros
     Devolver todos los valores de la tabla libros*/
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

    /*Funciones de tabla autores-libros 
     Devuelve todos los valores de la tabla autoreslibros*/
    public function getAutoresLibros() {
        $r = $this->db->query("SELECT * FROM autoreslibros");
        $autoreslibros=array();
        foreach($r->result()as $autorlibro){
            $autoreslibros[]=$autorlibro;
        }
        return $autoreslibros;     
    }

    //Funcion de insertar en la tabla autoreslibros
    public function InsertarAutorLibro($idAutor,$idLibro) {
      
        $r = $this->db->query("INSERT INTO autoreslibros(idAutor,idLibro) 
                            VALUES ('$idAutor','$idLibro')");
        return $r;
        }

    //Funcion de eliminar en la tabla autoreslibros
    public function EliminarAutorLibro($idLibro) {
        $this->db->query("DELETE FROM autoreslibros WHERE idLibro= '$idLibro' ");
        return $this->db->affected_rows();   
        }
    
    /*Funciones de la tabla libros-categorias 
    Devolver todos los valores de la tabla libroscategoria*/
    public function getLibrosCategorias() {
        $r = $this->db->query("SELECT * FROM librocategoria");
        $libroscategorias=array();
        foreach($r->result()as $librocategoria){
            $libroscategorias[]=$librocategoria;
        }
        return $libroscategorias;     
    }

    //Funcion de insertar en la tabla librocategoria
    public function InsertarLibroCategoria($idLibro,$idCategoria) {
      
        $r = $this->db->query("INSERT INTO librocategoria(idLibro,idCategoria) 
                            VALUES ('$idLibro','$idCategoria')");
        return $r;
        }
        
    //Funcion de eliminar en la tabla librocategoria
    public function EliminarLibroCategoria($idLibro) {
        $this->db->query("DELETE FROM librocategoria WHERE idLibro= '$idLibro' ");
        return $this->db->affected_rows();   
        }


    /*PRUEBAS */
    public function consultar($id){
        $r = $this->db->query("SELECT idLibro FROM autoreslibros WHERE idAutor='$id' ");
        $autores=array();
        foreach($r->result()as $autores){
            $autor[]=$autores;
        }
        return $autor;   
    }
    
    public function numeroLibros(){
        $query=$this->db->get("libros");
        $numero_filas=$query->num_rows();
        return $numero_filas;
    }

    public function cuentaAutores($id){
        $autores=array();
        $r = $this->db->query("SELECT idLibro FROM autoreslibros WHERE idAutor='$id' ");

    }

}
