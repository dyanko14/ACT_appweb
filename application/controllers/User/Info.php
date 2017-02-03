<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Info extends CI_Controller {
	public function index()
	{
    if($this->session->userdata('logged_in'))
    {
		$data = array (
	        $on    = "red-text",
	       	//--
	        'title'          => 'Información y Estadísticas',
	        'modo_inicio'    => '', 
	        'modo_personas'  => '',
	        'modo_empresas'  => '',
	        'modo_registros' => '',
	        'modo_buscar'    => '',
	        'modo_info'      => $on,
	        'modo_salir'     => '',
		);
		//Main structure
		$this->load->view('user/header',$data);
		$this->load->view('user/info',$data);
		$this->load->view('user/footer',$data);
    }
    else
    {
		//--Error Controller
		redirect('/Unauthorized');
    }
	}
}
