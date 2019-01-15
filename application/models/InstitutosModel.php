<?php
    class InstitutosModel extends CI_Model {
        public function getAll() {
            $r = $this->db->query("SELECT id, nombre, localidad, direccion, cp, provincia FROM institutos");
            $institutos=array();
            foreach($r->result()as $inst){
                $institutos[]=$inst;
            }
            return $institutos;     
        }

            public function InsertInstitutos($id, $nombre) {
                $this->db->query("Insert into institutos(nombre, localidad, direccion, cp, provincia)
                Values('$nombre', '$localidad', '$direccion', '$cp', '$provincia')");
                return $this->db->affected_rows();
            
            }

            public function EliminarInstitutos($id){

                $this->db->query("DELETE FROM institutos where id='$id'");

                return $this->db->affected_rows();

            }

            public function ModificarInstitutos($id, $nombre , $localidad, $direccion, $cp, $provincia){
                
                $this->db->query("UPDATE institutos Set nombre ='$nombre', localidad = '$localidad', direccion
                = '$direccion', cp = '$cp', provincia = '$provincia' Where id='$id'");
                
                return $this->db->affected_rows();

            }

    }
