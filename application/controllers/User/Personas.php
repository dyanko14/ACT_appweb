<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Personas extends CI_Controller {
	public function index()
	{
        if($this->session->userdata('logged_in'))
        {
            $data = array (
				$on    = "red-text",
				//--
				'title' 		 => 'Registro de Personas',
				'modo_inicio'    => '',	
				'modo_personas'  => $on,
				'modo_empresas'  => '',
				'modo_registros' => '',
				'modo_buscar'    => '',
				'modo_info'      => '',
				'modo_salir'     => '',
            );
            //Main structure
            $this->load->view('user/header',$data);
            $this->load->view('user/personas',$data);
            $this->load->view('user/footer',$data);
        }
        else
        {
			//--Error Controller
			redirect('/Unauthorized');
        }
	}
	public function Add()
	{
		if($this->session->userdata('logged_in'))
		{
			$data = array (
				$on    = "red-text",
				//--
				'title' 		 => 'Nueva Persona',
				'modo_inicio'    => '',	
				'modo_personas'  => $on,
				'modo_empresas'  => '',
				'modo_registros' => '',
				'modo_buscar'    => '',
				'modo_info'      => '',
				'modo_salir'     => '',
			);
			//Main structure
			$this->load->view('user/header',$data);
			$this->load->view('user/personas_add',$data);
			$this->load->view('user/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Edit($id = '')
	{
		if($this->session->userdata('logged_in'))
		{
			$data = array (
				$on    = "red-text",
				//--
				'ID'             => $id,
				'title' 		 => 'Editar Persona #'.$id,
				'modo_inicio'    => '',	
				'modo_personas'  => $on,
				'modo_empresas'  => '',
				'modo_registros' => '',
				'modo_buscar'    => '',
				'modo_info'      => '',
				'modo_salir'     => '',
			);
			//Main structure
			$this->load->view('user/header',$data);
			$this->load->view('user/personas_edit',$data);
			$this->load->view('user/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Form_add()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			//--
		    $this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required|min_length[3]|max_length[50]|alpha');
		    $this->form_validation->set_rules('ApellidoM', 'ApellidoM', 'trim|required|min_length[3]|max_length[50]|alpha');
		    $this->form_validation->set_rules('ApellidoP', 'ApellidoP', 'trim|required|min_length[3]|max_length[50]|alpha');
		    $this->form_validation->set_rules('IFE', 'IFE', 'trim|required|min_length[4]|max_length[25]');
     		$this->form_validation->set_rules('Genero', 'Genero', 'trim|required');
     		$this->form_validation->set_rules('Empresa', 'Empresa', 'trim|required');
      		if ($this->form_validation->run() == FALSE)
      		{
        		$data = array (
					$on    = "red-text",
					//--
					'title' 		 => 'Nueva Persona',
					'modo_inicio'    => '',	
					'modo_personas'  => $on,
					'modo_empresas'  => '',
					'modo_registros' => '',
					'modo_buscar'    => '',
					'modo_info'      => '',
					'modo_salir'     => '',
        		);
          		//Main structure
          		$this->load->view('user/header',$data);
          		$this->load->view('user/personas_add',$data);
          		$this->load->view('user/footer',$data);
       		}
        	else
       		{
        		$this->load->model('user/persona');
            	$this->persona->addVisitantes();
       		}
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Form_edit()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			//--
			$this->form_validation->set_rules('ID', 'ID', 'required|numeric');
		    $this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required|min_length[3]|max_length[50]|alpha_numeric_spaces');
		    $this->form_validation->set_rules('ApellidoM', 'ApellidoM', 'trim|required|min_length[3]|max_length[50]|alpha_numeric_spaces');
		    $this->form_validation->set_rules('ApellidoP', 'ApellidoP', 'trim|required|min_length[3]|max_length[50]|alpha_numeric_spaces');
		    $this->form_validation->set_rules('IFE', 'IFE', 'trim|required|min_length[4]|max_length[25]');
     		$this->form_validation->set_rules('Genero', 'Genero', 'trim|required');
     		$this->form_validation->set_rules('Empresa', 'Empresa', 'trim|required');
			$id2       = $this->input->post('ID',TRUE);
			if ($this->form_validation->run() == FALSE)
			{
				$data = array (
					$on    = "red-text",
					//--
					'ID'             => $id2,
					'title' 		 => 'Editar Persona #'.$id2,
					'modo_inicio'    => '',	
					'modo_personas'  => $on,
					'modo_empresas'  => '',
					'modo_registros' => '',
					'modo_buscar'    => '',
					'modo_info'      => '',
					'modo_salir'     => '',
				);
				//Main structure
				$this->load->view('user/header',$data);
				$this->load->view('user/personas_edit',$data);
				$this->load->view('user/footer',$data);
			}
			else
			{
				$this->load->model('user/persona');
				$this->persona->editVisitantes();
			}
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
}
