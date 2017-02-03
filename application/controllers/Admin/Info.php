<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('logged_in2'))
        {
    		$data = array (
                $on    = "blue-text",
                //--
                'title'          => 'Información',
                'modo_inicio'    => '', 
                'modo_empleados' => '',
                'modo_sesiones'  => '',                
                'modo_buscar'    => '',
                'modo_info'      => $on,
                'modo_salir'     => '',
            );
    		//Main structure
    		$this->load->view('admin/header',$data);
    		$this->load->view('admin/info',$data);
    		$this->load->view('admin/footer',$data);
        }
        else
        {
			//--Error Controller
			redirect('/Unauthorized');
        }
	}
}
