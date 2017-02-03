<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registros extends CI_Controller {
	public function index()
	{
        if($this->session->userdata('logged_in'))
        {
            $data = array (
	            $on    = "red-text",
	            //--
	            'title'          => 'Registro de Visitas de Hoy',
	            'modo_inicio'    => '', 
	            'modo_personas'  => '',
	            'modo_empresas'  => '',
	            'modo_registros' => $on,
	            'modo_buscar'    => '',
	            'modo_info'      => '',
	            'modo_salir'     => '',
            );
            //Main structure
            $this->load->view('user/header',$data);
            $this->load->view('user/registros',$data);
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
	            'title'          => 'Terminar Visita #'.$id,
	            'modo_inicio'    => '', 
	            'modo_personas'  => '',
	            'modo_empresas'  => '',
	            'modo_registros' => $on,
	            'modo_buscar'    => '',
	            'modo_info'      => '',
	            'modo_salir'     => '',
			);
			//Main structure
			$this->load->view('user/header',$data);
			$this->load->view('user/registros_edit',$data);
			$this->load->view('user/footer',$data);
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
        	$this->form_validation->set_rules('Fecha_in', 'Fecha_in', 'trim|required');
        	$this->form_validation->set_rules('Hora_In', 'Hora_In', 'trim|required');
        	$this->form_validation->set_rules('Hora_Out', 'Hora_Out', 'trim|required');
        	$id2 = $this->input->post('ID',TRUE);
        
        if ($this->form_validation->run() == FALSE)
        {
            $data = array (
	            $on    = "red-text",
	            //--
	            'ID'             => $id2,
	            'title'          => 'Terminar Visita #'.$id2,
	            'modo_inicio'    => '', 
	            'modo_personas'  => '',
	            'modo_empresas'  => $on,
	            'modo_registros' => '',
	            'modo_buscar'    => '',
	            'modo_info'      => '',
	            'modo_salir'     => '',
            );
            //Main structure
            $this->load->view('user/header',$data);
            $this->load->view('user/registros_edit',$data);
        }
        else
        {
            $this->load->model('user/registro');
            $this->registro->editRegistro();
        }
			}
			else
			{
				//--Error Controller
				redirect('/Unauthorized');
			}
    }
	public function Search()
	{
		if($this->session->userdata('logged_in'))
		{
			$data = array (
	            $on    = "red-text",
	            //--
	            'title'          => 'Búsqueda de Registros',
	            'modo_inicio'    => '', 
	            'modo_personas'  => '',
	            'modo_empresas'  => '',
	            'modo_registros' => '',
	            'modo_buscar'    => $on,
	            'modo_info'      => '',
	            'modo_salir'     => '',
			);
			//--Main structure
			$this->load->view('user/header',$data);
			//--User Agent Load
			if ($this->agent->is_mobile())
			{
				$this->load->view('user/registros_search_m',$data);
			}
			else//--Desktop
			{
				$this->load->view('user/registros_search_d',$data);
			}
			//--Main structure			
			$this->load->view('user/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Search_filter()
	{
		if($this->session->userdata('logged_in'))
		{
			$data = array (
	            $on    = "red-text",
	            //--
	            'title'          => 'Resultado de Búsqueda por Filtros',
	            'modo_inicio'    => '', 
	            'modo_personas'  => '',
	            'modo_empresas'  => '',
	            'modo_registros' => '',
	            'modo_buscar'    => $on,
	            'modo_info'      => '',
	            'modo_salir'     => '',
			);
			//Main structure
			$this->load->view('user/header',$data);
			//DataBase Operations
			$this->load->model('user/registro');
			$this->registro->searchRegistros();
			//Main structure
			$this->load->view('user/registros_results_filter',$data);
			$this->load->view('user/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Search_filter2()
	{
		if($this->session->userdata('logged_in'))
		{
			$data = array (
	            $on    = "red-text",
	            //--
	            'title'          => 'Resultado de Búsqueda por Fechas',
	            'modo_inicio'    => '', 
	            'modo_personas'  => '',
	            'modo_empresas'  => '',
	            'modo_registros' => '',
	            'modo_buscar'    => $on,
	            'modo_info'      => '',
	            'modo_salir'     => '',
			);
			//Main structure
			$this->load->view('user/header',$data);

			//Main structure
			$this->load->view('user/registros_results_filter2',$data);
			$this->load->view('user/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Search_filter3()
	{
		if($this->session->userdata('logged_in'))
		{
			$data = array (
	            $on    = "red-text",
	            //--
	            'title'          => 'Resultado de Búsqueda por Duración',
	            'modo_inicio'    => '', 
	            'modo_personas'  => '',
	            'modo_empresas'  => '',
	            'modo_registros' => '',
	            'modo_buscar'    => $on,
	            'modo_info'      => '',
	            'modo_salir'     => '',
			);
			//Main structure
			$this->load->view('user/header',$data);

			//Main structure
			$this->load->view('user/registros_results_filter3',$data);
			$this->load->view('user/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
}
