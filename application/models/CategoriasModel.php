<?php
    class CategoriasModel extends CI_Model {
        public function getAll() {
            $r = $this->db->query("SELECT * FROM categoria");
            $categorias=array();
            foreach($r->result()as $categoria){
                $categorias[]=$categoria;
            }
            return $categorias;     
        }

        public function InsertarCategoria($nombre) {
            $this->db->query("INSERT INTO categoria(nombre) VALUES ('$nombre')");
            return $this->db->affected_rows();
        }

        public function EliminarCategoria($id){
            $this->db->query("DELETE FROM categoria where id='$id'");
            return $this->db->affected_rows();
        }

        public function ModificarCategoria($id, $nombre){
            $this->db->query("UPDATE categoria Set nombre ='$nombre' Where id='$id'");
            return $this->db->affected_rows();
        }

    }
