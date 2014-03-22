<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modelo_paises extends CI_Model
{
    public function get_paises() {
			   $this->load->database();
               $this->db->select('id_pais, pais');
               $this->db->from('paises');
               $query = $this->db->get();
               foreach($query->result_array() as $row){
                   $data[$row['id_pais']]=$row['pais'];
               }
			
               return $data;
    }

    public function get_estados($id_pais) {
				$this->load->database();				
				
                if ($id_pais == 1){
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
				
				/*sino encontramos ningun resultado es necesario llenar el array data con un valor default*/
				/*esto para el ejemplo del segund grupo de DropDowns*/
				if (!(isset($data))){				
				       $data["-1"]="";               
				}
                return $data;
   }

           public function get_ciudades($id_estado) {
                $this->load->database();
			
				if ($id_estado == 1){
                  $this->db->select('id_ciudad, ciudad');
                  $this->db->from('ciudades');
                   $this->db->where('id_estado', $id_estado);
                  $query = $this->db->get();
                  foreach($query->result_array() as $row){
                      $data[$row['id_ciudad']]=$row['ciudad'];               
                  }
            }
                else {
                   $this->db->select('id_ciudad, ciudad');
                   $this->db->from('ciudades');
                   $this->db->where('id_estado', $id_estado);
                   $query = $this->db->get();				   
                   foreach($query->result_array() as $row){
                       $data[$row['id_ciudad']]=$row['ciudad'];               
                   }
                }
				
				/*sino encontramos ningun resultado es necesario llenar el array data con un valor default*/
				/*esto para el ejemplo del segund grupo de DropDowns*/
				if (!(isset($data))){				
				       $data["-1"]="";               
				}
				
                return $data;
           }



}
?>