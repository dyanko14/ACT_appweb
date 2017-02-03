<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salir extends CI_Controller {
	public function index()
	{
        if($this->session->userdata('logged_in'))
        {
			$data = array (
		        $on    = "red-text",
		       	//--
		        'title'          => 'Salir del sistema',
		        'modo_inicio'    => '', 
		        'modo_personas'  => '',
		        'modo_empresas'  => '',
		        'modo_registros' => '',
		        'modo_buscar'    => '',
		        'modo_info'      => '',
		        'modo_salir'     => $on,
			);
			//Main structure
			$this->load->view('user/header',$data);
			$this->load->view('user/salir',$data);
			$this->load->view('user/footer',$data);
        }
        else
        {
			//--Error Controller
			redirect('/Unauthorized');
        }
	}

	public function ok()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
	   	redirect('Login', 'refresh');
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Feedback()
	{
		if($this->session->userdata('logged_in'))
		{
		//--Animation
		$this->load->view('User/salir_animacion');
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
}