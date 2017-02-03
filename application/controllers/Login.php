<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
  //--
  public function __construct()
  {
    parent::__construct();
    $x = password_hash('test',PASSWORD_DEFAULT);
    $this->db->query("INSERT INTO login (user, pass) VALUES ('test','$x')");
  }
	public function index()
	{
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('logged_in2');
    $this->session->sess_destroy();

    //Formulario de Login
    $data = array('title' => ''); //Invalid Login Feedback
		$this->load->view('login',$data);
	}
	public function validation()
	{
    $this->form_validation->set_rules('Usuario', 'Usuario', 'htmlspecialchars|trim|required|min_length[4]|max_length[25]|alpha_numeric');
    $this->form_validation->set_rules('Password', 'Password', 'htmlspecialchars|trim|required');
    //--
    if ($this->form_validation->run() == FALSE)
    {
      $data = array('title' => '');
      $this->load->view('login',$data);
    }
    else
    {
    	$this->load->model('UserCheck');
      $this->UserCheck->login();
   	}
	}
}
