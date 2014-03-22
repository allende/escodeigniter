<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelo_paises extends CI_Model
{
    public function get_paises() {
			   $this->load->database();
               $this->db->select('id, pais');
               $this->db->from('paises');
               $query = $this->db->get();
               foreach($query->result_array() as $row){
                   $data[$row['id']]=$row['pais'];
               }
               return $data;
    }

    public function get_estados($id_pais) {
				$this->load->database();				
                if ($pais == 1){
                  $this->db->select('id_estado, estado');
                  $this->db->from('estados');
                   $this->db->where('id_pais', $id_pais);
                  $query = $this->db->get();
                  foreach($query->result_array() as $row){
                      $data[$row['id_estado']]=$row['estado'];               
					}
				}
                else {
                   $this->db->select('id_estado, estado');
                   $this->db->from('estados');
                   $this->db->where('id_pais', $id_pais);
                   $query = $this->db->get();
                   foreach($query->result_array() as $row){
                       $data[$row['id_estado']]=$row['estado'];               
                   }
                }
                return $data;
   }

           public function get_ciudades($id_estado) {
                $this->load->database();				
				if ($estado == 1){
                  $this->db->select('id_municipio, nombre_municipio');
                  $this->db->from('ciudades');
                   $this->db->where('id_estado', $id_estado);
                  $query = $this->db->get();
                  foreach($query->result_array() as $row){
                      $data[$row['id_municipio']]=$row['nombre_municipio'];               
                  }
            }
                else {
                   $this->db->select('id, nombre_ciudad');
                   $this->db->from('ciudades');
                   $this->db->where('id_estado', $id_estado);
                   $query = $this->db->get();
                   foreach($query->result_array() as $row){
                       $data[$row['id']]=$row['nombre_ciudad'];               
                   }
                }
                return $data;
           }



}
?>