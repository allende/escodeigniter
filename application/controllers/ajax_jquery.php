<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax_jquery extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
	  
      $this->load->model('modelo_paises');
	  $this->load->helper('form');
	  $this->load->helper('url');
      $data = array();
      $data['paises'] = $this->modelo_paises->get_paises(); //traemos todos los paises	  
        
		//traemos todos los estados cuyo id_pais=1 ques es el que se carga por default en el dropDown
		//si modificamos la query en get_paises tal vez deberiamos mandar otro id en lugar del 1 por default
		$id_pais_default=1;
		$data['estados'] = $this->modelo_paises->get_estados($id_pais_default);
		
		//lo mismo va para las ciudades
		$id_estado_default=1;
        $data['ciudades'] = $this->modelo_paises->get_ciudades($id_estado_default);        
		
		/*mandamos -1 para no traer ningun estado ni ciudad al inicio, puesto que la opcion de pais
		esta seleccionado en blanco*/
		$data['paises2'] = $this->modelo_paises->get_paises();	
		$data['estados2'] = $this->modelo_paises->get_estados(-1);	
        $data['ciudades2'] = $this->modelo_paises->get_ciudades(-1);  
		
        $this->load->view('ajax_jquery', $data);
      
	}
	
	
	public function get_ajax_estados(){
			$this->load->helper('form');
			$this->load->model('modelo_paises');
			$data['estados'] = $this->modelo_paises->get_estados($_POST['id_pais']);
			$this->load->helper('form');
			echo form_dropdown('estados', $data['estados'], '#', 'id="estados"');
	}
	
	public function get_ajax_ciudades(){
			$this->load->model('modelo_paises');
			$this->load->helper('form');
			$data['ciudades'] = $this->modelo_paises->get_ciudades($_POST['id_estado']);
			echo form_dropdown('ciudades', $data['ciudades'], '#', 'id="ciudades"');
	}
	
	
	/*Metdos ajax para generar los dropDowns 2*/
	public function get_ajax_estados2(){
			$this->load->helper('form');
			$this->load->model('modelo_paises');
			$data['estados2'] = $this->modelo_paises->get_estados($_POST['id_pais']);
			$this->load->helper('form');
			echo form_dropdown('estados2', $data['estados2'], '#', 'id="estados2"');
	}
	
	public function get_ajax_ciudades2(){
			$this->load->model('modelo_paises');
			$this->load->helper('form');
			$data['ciudades2'] = $this->modelo_paises->get_ciudades($_POST['id_estado2']);
			echo form_dropdown('ciudades2', $data['ciudades2'], '#', 'id="ciudades2"');
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php *