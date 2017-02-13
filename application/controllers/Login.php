<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
  //--
  public function __construct()
  {
    parent::__construct();
    $this->load->library('encrypt');
    //--Verify existents users in the login table
    $this->db->select('*');
    $this->db->from('login');
    $this->db->where('user', 'mcazares');
    $this->db->where('user', 'dcisneros');
    $query = $this->db->get();
    //--SQL
    if ($query->num_rows() > 1)
    {
      //--If both users exists (Do Nothing)
    }
    else
    {
      //--Clean Login table
      $query = $this->db->query("TRUNCATE login");
      //--Create both users
      $encrypted_pass1 = $this->encrypt->encode('sarah0808');
      $encrypted_pass2 = $this->encrypt->encode('dics2017');
      $this->db->query("INSERT INTO login (user, pass, permiso) VALUES ('mcazares','$encrypted_pass1',1)");
      $this->db->query("INSERT INTO login (user, pass, permiso) VALUES ('dcisneros','$encrypted_pass2',2)");
    }
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
