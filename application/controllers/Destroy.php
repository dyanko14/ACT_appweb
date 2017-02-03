<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Destroy extends CI_Controller {
	public function index()
	{
	//Session User
	if($this->session->userdata('logged_in'))
	{
		$this->session->unset_userdata('logged_in');
	}
	//Session Admin
	else if ($this->session->userdata('logged_in2'))
	{
		$this->session->unset_userdata('logged_in2');
	}
    $this->session->sess_destroy();
    redirect('Login', 'refresh');
	}
}
