<?php
    class CategoriasModel extends CI_Model {
        public function getAll() {
            $r = $this->db->query("SELECT id, nombre FROM categoria");
            $categoria=array();
            foreach($r->result()as $cat){
                $categoria[]=$cat;
            }
            return $categoria;     
        }

            public function InsertCategoria($id, $nombre) {
                $this->db->query("Insert into categoria(nombre)
                Values('$nombre')");
                return $this->db->affected_rows();
            
            }

            public function EliminarCategoria($id){

                $this->db->query("DELETE FROM categoria where id='$id'");

                return $this->db->affected_rows();

            }

            public function ModificarCategoria($id, $nombre){
                
                $this->db->query("UPDATE categoria Set nombre ='$NOMBRE', Where id='$id'");
                
                return $this->db->affected_rows();

            }

    }
