<?php
    class InstitutosModel extends CI_Model {

        // Devolver todos los valores de la tabla institutos
        public function getAll() {
            $r = $this->db->query("SELECT * FROM instituto");
            $institutos=array();
            foreach($r->result()as $instituto){
                $institutos[]=$instituto;
            }
            return $institutos;     
        }

        // Insertar un institutos en la tabla. Devuelve 1 si lo consigue o 0 en caso de error 
        public function InsertarInstituto($nombre, $localidad, $direccion, $cp, $provincia) {
            $this->db->query("INSERT INTO instituto(nombre, localidad, direccion, cp, provincia) VALUES ('$nombre','$localidad','$direccion','$cp','$provincia')");
            return $this->db->affected_rows();
        }

        //Borrar un institutos en la tabla. Devuelve 1 si lo consigue o 0 en caso de error
        public function EliminarInstituto($id){
            $this->db->query("DELETE FROM instituto where id='$id'");
            return $this->db->affected_rows();
        }

        //Modificar un institutos en la tabla. Devuelve 1 si lo consigue o 0 en caso de error
        public function ModificarInstituto($id, $nombre, $localidad, $direccion, $cp, $provincia){
            $this->db->query("UPDATE instituto Set nombre ='$nombre', localidad ='$localidad', direccion='$direccion', cp='$cp', provincia='$provincia' Where id='$id'");
            return $this->db->affected_rows();
        }

    }