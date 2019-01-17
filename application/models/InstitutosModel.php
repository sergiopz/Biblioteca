<?php
    class CategoriasModel extends CI_Model {
        public function getAll() {
            $r = $this->db->query("SELECT * FROM instituto");
            $institutos=array();
            foreach($r->result()as $instituto){
                $institutos[]=$instituto;
            }
            return $institutos;     
        }

        public function InsertarInstituto($nombre, $localidad, $direccion, $cp, $provincia) {
            $this->db->query("INSERT INTO categoria(nombre, localidad, direccion, cp, provincia) VALUES ('$nombre','$localidad','$direccion','$cp','$provincia')");
            return $this->db->affected_rows();
        }

        public function EliminarInstituto($id){
            $this->db->query("DELETE FROM instituto where id='$id'");
            return $this->db->affected_rows();
        }

        public function ModificarInstituto($id, $nombre){
            $this->db->query("UPDATE instituto Set nombre ='$nombre', localidad ='$localidad', direccion='$direccion', cp='$cp', provincia='$provincia' Where id='$id'");
            return $this->db->affected_rows();
        }

    }
