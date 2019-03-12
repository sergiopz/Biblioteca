<?php
    class LibrosModel extends CI_Model {

    //Devolver todos los valores de la tabla libros
    public function getAll() {
        $r = $this->db->query("SELECT * FROM libros");
        $libros=array();

        foreach($r->result()as $libro){
            $libros[]=$libro;
        }
        return $libros;     
    }

    

    //Devolver todos los valores de la tabla libros que coincidan con ese usuario
    public function getLibros($idUsuario) {
        $r = $this->db->query("SELECT * FROM libros WHERE idUsuario='$idUsuario'");
        $libros=array();

        foreach($r->result()as $libro){
            $libros[]=$libro;
        }
        return $libros;     
    }

    //Funcion que selecciona el maximo id y le suma 1 
    public function getMax(){
        $r = $this->db->query("SELECT MAX(id+1)as id  FROM libros ");
        $a= $r->result_array();
        return $a[0]['id'];
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
                         fecha='$fecha',paginas='$paginas',idInstituto='$idInstituto',idUsuario='$idUsuario',
                         idEditorial='$idEditorial'WHERE id='$id'");
        return $this->db->affected_rows();   
    }

    //Devuelve todos los valores de la tabla autoreslibros
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
        $r = $this->db->query("INSERT INTO autoreslibros(idAutor,idLibro) VALUES ('$idAutor','$idLibro')");
        return $r;
    }

    //Funcion de eliminar en la tabla autoreslibros
    public function EliminarAutorLibro($idLibro) {
        $this->db->query("DELETE FROM autoreslibros WHERE idLibro= '$idLibro' ");
        return $this->db->affected_rows();   
    }
    
    //Devolver todos los valores de la tabla libroscategoria
    public function getLibrosCategorias() {
        $r = $this->db->query("SELECT * FROM librocategoria");
        $libroscategorias=array();

        foreach($r->result()as $librocategoria){
            $libroscategorias[]=$librocategoria;
        }
        return $libroscategorias;     
    }

    //Funcion de insertar en la tabla librocategoria
    public function InsertarLibroCategoria($idCategoria,$idLibro) {
        $r = $this->db->query("INSERT INTO librocategoria(idLibro,idCategoria) VALUES ('$idLibro','$idCategoria')");                  
        return $r;
    }
        
    //Funcion de eliminar en la tabla librocategoria
    public function EliminarLibroCategoria($idLibro) {
        $this->db->query("DELETE FROM librocategoria WHERE idLibro= '$idLibro' ");
        return $this->db->affected_rows();   
    }

    //Funcion que se encarga de renombrar el archivo
    public function renomdir($id,$pag_ant,$num_pag){
        for($i=$num_pag-1;$i>$pag_ant;$i--){
                $oldDir="assets/libros/$id/".$i.".jpg";
                $newDir="assets/libros/$id/".($i+1).".jpg";
                $confirm=rename($oldDir,$newDir);
        }

        return $confirm;
    }

    //Funcion que se encarga de subir una imagen en la carpeta
    public function subirImagenPagina($id) {
        $config['upload_path'] = './assets/libros/'.$id;
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 100000;
        $config['max_width']            = 10240;
        $config['max_height']           = 7680;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('files')){  

            // La subida ha fallado: devolvemos el mensaje de error
            $resultado["codigo"] = 0; //Código de error
            $resultado["mensaje"] = $this->upload->display_errors();
        } else {

            // La subida ha sido un éxito. Devolvemos el nombre del fichero subido
            $resultado["codigo"] = 1; //Código de éxito
            $resultado["mensaje"] = $this->upload->data("file_name");
        }
        return $resultado;               
    }

    
}