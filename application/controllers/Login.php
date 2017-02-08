<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
  //--
  public function __construct()
  {
    parent::__construct();
    //--Insert new Users
    $this->load->library('encrypt');
    /*
    $pass1 = 'admin';
    $pass2 = 'user';
    $encrypted_pass1 = $this->encrypt->encode($pass1);
    $encrypted_pass2 = $this->encrypt->encode($pass2);
    $this->db->query("INSERT INTO login (user, pass, permiso) VALUES ('admin','$encrypted_pass1',1)");
    $this->db->query("INSERT INTO login (user, pass, permiso) VALUES ('user','$encrypted_pass2',2)");
    */
  }

	public function index()
	{
    //--Formulario de Login
    $data = array('title' => ''); //Invalid Login Feedback
		$this->load->view('login',$data);
	}

	public function validation()
	{
    $this->load->library('encrypt');
    $this->form_validation->set_rules('Usuario', 'Usuario', 'htmlspecialchars|trim|required|alpha_dash');
    $this->form_validation->set_rules('Password', 'Password', 'htmlspecialchars|trim|required');
    //--
    if ($this->form_validation->run() == FALSE)
    {
      $data = array('title' => '');
      $this->load->view('login',$data);
      //redirect('Login', 'auto');
    }
    else
    {
    	$this->load->model('UserCheck');
      $this->UserCheck->login();
   	}
	}
}
