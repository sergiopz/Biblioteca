<?php
    class BuscadorModel extends CI_Model {
        
        public function consulta($valor) {
           
           
            $this->db->query("DROP TABLE busqueda");
            $this->db->query("CREATE TABLE busqueda (id INT ,titulo VARCHAR(50))");
            $r = $this->db->query("SELECT id from libros where titulo ='$valor' or idInstituto=(select id from instituto WHERE nombre='$valor') or idEditorial=(select id from editorial WHERE nombre='$valor') union SELECT idLibro FROM librocategoria WHERE idCategoria =(select id from categoria where nombre='$valor') union SELECT idLibro FROM autoreslibros WHERE idAutor =(select id from autores where nombre= '$valor')"); 
            
            foreach($r->result()as $res){
                
                $this->db->query("INSERT INTO `busqueda`(SELECT id , titulo from libros where id ='$res->id')");

            }
       
            $r2 = $this->db->query("SELECT * from busqueda");
            $busqueda=array();

            foreach($r2->result()as $consulta){
            
                $busqueda[]=$consulta;

            } 


        return $busqueda;     
        }



        public function UltimosLibros() {
           
            
            $r = $this->db->query("SELECT id FROM libros ORDER BY id DESC limit 7"); 
            
            $libros = array();
           foreach ($r -> result()as $li) {
            $libros[]=$li;
          
           }
            
            
            return $libros;
        }
            
    }