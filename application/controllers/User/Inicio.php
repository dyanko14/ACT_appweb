<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('logged_in'))
        {
			$data = array (
				$on    = "red-text",		
				//--
				'title' 		 => 'Registrar persona que llega a la empresa',
				'modo_inicio'    => $on,	
				'modo_personas'  => '',
				'modo_empresas'  => '',
				'modo_registros' => '',
				'modo_buscar'    => '',
				'modo_info'      => '',
				'modo_salir'     => '',
			);
    		//--Main structure
    		$this->load->view('user/header',$data);
			$this->load->view('user/inicio',$data);
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
			$this->form_validation->set_rules('fecha_in', 'fecha_in', 'trim|required');
			$this->form_validation->set_rules('hora_in', 'hora_in', 'trim|required');
			$this->form_validation->set_rules('visitante', 'visitante', 'trim|required|min_length[1]|max_length[4]|integer');
			$this->form_validation->set_rules('empleado', 'empleado', 'trim|required|min_length[1]|max_length[4]|integer');
			$this->form_validation->set_rules('razon', 'razon', 'trim|required');
			if ($this->form_validation->run() == FALSE)
			{
				$data = array (
					$on  = "red-text",
					//--
					'title' 		 => 'INICIO',
					'modo_inicio'    => $on,
					'modo_personas'  => '',
					'modo_empresas'  => '',
					'modo_registros' => '',
					'modo_buscar'    => '',
					'modo_info'      => '',
					'modo_salir'     => '',
				);
    			//--Main structure
    			$this->load->view('user/header',$data);
				$this->load->view('user/inicio',$data);
    			$this->load->view('user/footer',$data);
			}
			else
			{
				echo $this->input->post('fecha_in',TRUE)."<br>";
				echo $this->input->post('hora_in',TRUE)."<br>";
				echo $this->input->post('visitante',TRUE)."<br>";
				echo $this->input->post('empleado',TRUE)."<br>";
				echo $this->input->post('razon',TRUE)."<br>";
						$this->load->model('user/iniciio');
						$this->iniciio->addVisita();
			}
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
}
