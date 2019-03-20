<?php
    class BuscadorModel extends CI_Model {
        
        public function consulta($valor) {
           
           
          
            $r=$this->db->query("SELECT libros.id, libros.titulo FROM libros, instituto WHERE libros.idInstituto = instituto.id AND instituto.nombre = '$valor'

                                union

                                SELECT libros.id, libros.titulo FROM libros, editorial WHERE libros.idInstituto = editorial.id AND editorial.nombre = '$valor'

                                union

                                SELECT libros.id , libros.titulo FROM libros, librocategoria, categoria WHERE libros.id = libroCategoria.idLibro AND librocategoria.idCategoria = categoria.id AND categoria.nombre = '$valor'

                                union

                                SELECT id, titulo FROM libros where titulo= '$valor'"); 
                                            
            
       
           
            $busqueda=array();

            foreach($r->result()as $consulta){
            
                $busqueda[]=$consulta;

            } 


        return $busqueda;     
        }


// ultimos libros del homefRONT
        public function UltimosLibros() {
           
            
            $r = $this->db->query("SELECT id,titulo FROM libros ORDER BY id DESC limit 6"); 
            
            $libros = array();
           foreach ($r -> result()as $li) {
            $libros[]=$li;
          
           }
            
            
            return $libros;
        }


//MUESTRA LAS CATEGORIAS

            public function Categorias() {
           

            $r = $this->db->query("SELECT nombre ,id FROM categoria"); 
            
            $categoria = array();
           foreach ($r -> result()as $ca) {
            $categoria[]=$ca;
          
           }
            
            
            return $categoria;
        }


        //MUESTRA EL NOMBRE DE LA CATEGORIA

        public function Categorias2($id) {
           

            $r = $this->db->query("SELECT nombre FROM categoria where id='$id'"); 
            
            $categoria = array();
           foreach ($r -> result()as $ca) {
            $categoria[]=$ca;
          
           }
            
            
            return $categoria;
        }


//MUESTRA LOS LIBROS DE CADA CATEGORIA

            public function LibrosCategorias($LibrosCategorias) {
           
            
            $r = $this->db->query("SELECT libros.id , libros.titulo FROM libros, librocategoria, categoria WHERE libros.id = libroCategoria.idLibro AND librocategoria.idCategoria = categoria.id AND categoria.id = '$LibrosCategorias'"); 
            
            $listaBusqueda = array();
           foreach ($r -> result()as $ca) {
            $listaBusqueda[]=$ca;
          
           }
            
            
            return $listaBusqueda;
        }


        //DEVUELVE EL TITULO DEL VISOR

         public function TituloVisor($id) {
           
            
            $r = $this->db->query("SELECT titulo from libros where id='$id'"); 

             $titulo = array();
           foreach ($r -> result()as $ti) {
            $titulo[]=$ti;
          
           }
            
           
            
            
            return $titulo;
        }
            
    }