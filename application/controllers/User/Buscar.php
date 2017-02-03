<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar extends CI_Controller {
	public function index()
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
			$this->load->view('user/header',$data);	
			$this->load->view('user/registros_search',$data);		
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
