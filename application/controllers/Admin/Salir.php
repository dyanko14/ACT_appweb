<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salir extends CI_Controller {
	public function index()
	{
        if($this->session->userdata('logged_in2'))
        {
		  $data = array (
                $on    = "blue-text",
                //--
                'title'          => 'Salir del sistema',
                'modo_inicio'    => '',
                'modo_empleados' => '',
                'modo_sesiones'  => '',
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => $on,
			);
			//Main structure
			$this->load->view('admin/header',$data);
			$this->load->view('admin/salir',$data);
			$this->load->view('admin/footer',$data);
        }
        else
        {
			//--Error Controller
			redirect('/Unauthorized');
        }
	}
	public function ok()
	{
		if($this->session->userdata('logged_in2'))
		{
			$this->session->unset_userdata('logged_in2');
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
		if($this->session->userdata('logged_in2'))
		{		
			//--Animation
			$this->load->view('Admin/salir_animacion');
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
}
