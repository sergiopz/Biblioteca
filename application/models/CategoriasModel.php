<?php
    class CategoriasModel extends CI_Model {
        // Devolver todos los valores de la tabla categorias
        public function getAll() {
            $r = $this->db->query("SELECT * FROM categoria");
            $categorias=array();
            foreach($r->result()as $categoria){
                $categorias[]=$categoria;
            }
            return $categorias;     
        }

        // Insertar una categoria en la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
        public function InsertarCategoria($nombre) {
            $this->db->query("INSERT INTO categoria(nombre) VALUES ('$nombre')");
            return $this->db->affected_rows();
        }

        // Elimina una categoria de la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
        public function EliminarCategoria($id){
            $this->db->query("DELETE FROM categoria where id='$id'");
            return $this->db->affected_rows();
        }

        // Modifica una categoria de la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
        public function ModificarCategoria($id, $nombre){
            $this->db->query("UPDATE categoria Set nombre ='$nombre' Where id='$id'");
            return $this->db->affected_rows();
        }

    }