<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesiones extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('logged_in2'))
        {
    		$data = array (
                $on    = "blue-text",
                //--
                'title'          => 'Últimas sesiones',
                'modo_inicio'    => '', 
                'modo_empleados' => '',
                'modo_sesiones'  => $on,                
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',   
    		);
    		//Main structure
    		$this->load->helper('date');
    		$this->load->view('admin/header',$data);
    		$this->load->view('admin/sesiones',$data);
    		$this->load->view('admin/footer',$data);
        }
        else
        {
			//--Error Controller
			redirect('/Unauthorized');
        }
	}
	public function Search()
	{
		if($this->session->userdata('logged_in2'))
        {
    		$data = array (
                $on    = "blue-text",
                //--
                'title'          => 'Buscar en el Log de sesiones',
                'modo_inicio'    => '', 
                'modo_empleados' => '',
                'modo_sesiones'  => '',                
                'modo_buscar'    => $on,
                'modo_info'      => '',
                'modo_salir'     => '',  
    		);
    		//Main structure
    		$this->load->helper('date');
    		$this->load->view('admin/header',$data);
    		$this->load->view('admin/sesiones_form',$data);
    		$this->load->view('admin/footer',$data);
        }
        else
        {
					//--Error Controller
					redirect('/Unauthorized');
        }
	}
	public function Search_filter()
	{
		if($this->session->userdata('logged_in2'))
		{
			$data = array (
                $on    = "blue-text",
                //--
                'title'          => 'Resultado de Búsqueda',
                'modo_inicio'    => '', 
                'modo_empleados' => '',
                'modo_sesiones'  => '',                
                'modo_buscar'    => $on,
                'modo_info'      => '',
                'modo_salir'     => '', 
			);
			//Main structure
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sessions_filter',$data);
			$this->load->view('admin/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
}
