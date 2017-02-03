<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('logged_in2'))
        {
    		$data = array (
                $on    = "blue-text",
                //--
                'title'          => 'Inicio',
                'modo_inicio'    => $on, 
                'modo_empleados' => '',
                'modo_sesiones'  => '',                
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
    		);
    		//Main structure
    		$this->load->view('admin/header',$data);
    		$this->load->view('admin/inicio',$data);
    		$this->load->view('admin/footer',$data);
        }
        else
        {
	       //--Error Controller
	       redirect('/Unauthorized');
        }
	}
    public function Backup()
    {
        if($this->session->userdata('logged_in2'))
        {
                      $this->load->dbutil();
            $backup = $this->dbutil->backup();
                      $this->load->helper('file');
                      //--
            write_file('/DB_Backup.gz', $backup);
                      $this->load->helper('download');
                      //--
            force_download('DB_Backup.gz', $backup);
            redirect('/Admin/Inicio/Index','refresh');
            redirect('/Admin/Inicio/Index','refresh');
        }
        else
        {
           //--Error Controller
           redirect('/Unauthorized');
        }   
    }
}
