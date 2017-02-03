<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Expired extends CI_Controller {
	public function index()
	{
	//--Destroy Sesion
	//--Session User
	if($this->session->userdata('logged_in'))
	{
		$this->session->unset_userdata('logged_in');
	}
	//--Session Admin
	else if ($this->session->userdata('logged_in2'))
	{
		$this->session->unset_userdata('logged_in2');
	}
    $this->session->sess_destroy();
    //--View		
    $this->load->view('expired');
	}
}
