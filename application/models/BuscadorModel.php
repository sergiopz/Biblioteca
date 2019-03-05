<?php
    class BuscadorModel extends CI_Model {
        
        public function consulta($valor) {
           
           
          
            $r=$this->db->query("SELECT libros.id, libros.titulo FROM libros, instituto WHERE libros.idInstituto = instituto.id AND instituto.nombre = '$valor'

                                union

                                SELECT libros.id, libros.titulo FROM libros, editorial WHERE libros.idInstituto = editorial.id AND editorial.nombre = '$valor'

                                union

                                SELECT libros.id , libros.titulo FROM libros, librocategoria, categoria WHERE libros.id = libroCategoria.idLibro AND librocategoria.idCategoria = categoria.id AND categoria.nombre = '$valor'

                                union

                                SELECT libros.id, libros.titulo FROM libros, autoresLibros, autores WHERE libros.id = autoresLibros.idLibro AND autoresLibros.idAutor = autores.id AND autores.nombre = '$valor'"); 
                                            
            
       
           
            $busqueda=array();

            foreach($r->result()as $consulta){
            
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


              public function Categorias() {
           
            
            $r = $this->db->query("SELECT nombre FROM categoria"); 
            
            $categoria = array();
           foreach ($r -> result()as $ca) {
            $categoria[]=$ca;
          
           }
            
            
            return $categoria;
        }


            public function LibrosCategorias($LibrosCategorias) {
           
            
            $r = $this->db->query("SELECT libros.id , libros.titulo FROM libros, librocategoria, categoria WHERE libros.id = libroCategoria.idLibro AND librocategoria.idCategoria = categoria.id AND categoria.nombre = '$LibrosCategorias'"); 
            
            $listaBusqueda = array();
           foreach ($r -> result()as $ca) {
            $listaBusqueda[]=$ca;
          
           }
            
            
            return $listaBusqueda;
        }
            
    }