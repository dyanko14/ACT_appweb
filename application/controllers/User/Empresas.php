<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas extends CI_Controller {
	public function index()
	{
        if($this->session->userdata('logged_in'))
        {
        $data = array (
            $on    = "red-text",
            //--
            'title'          => 'Registro de Empresas',
            'modo_inicio'    => '', 
            'modo_personas'  => '',
            'modo_empresas'  => $on,
            'modo_registros' => '',
            'modo_buscar'    => '',
            'modo_info'      => '',
            'modo_salir'     => '',
        );
        //Main structure
        $this->load->view('user/header',$data);
        $this->load->view('user/empresas',$data);
        $this->load->view('user/footer',$data);
        }
        else
        {
			//--Error Controller
			redirect('/Unauthorized');
        }
	}
	public function Add()
	{
		if($this->session->userdata('logged_in'))
		{
			$data = array (
                $on    = "red-text",
                //--
                'title'          => 'Nueva Empresa',
                'modo_inicio'    => '', 
                'modo_personas'  => '',
                'modo_empresas'  => $on,
                'modo_registros' => '',
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
			);
			//Main structure
			$this->load->view('user/header',$data);
			$this->load->view('user/empresas_add',$data);
			$this->load->view('user/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
    public function Edit($id = '')
    {
		if($this->session->userdata('logged_in'))
		{
			$data = array (
            $on    = "red-text",
            //--
            'ID'             => $id,
            'title'          => 'Editar Empresa #'.$id,
            'modo_inicio'    => '', 
            'modo_personas'  => '',
            'modo_empresas'  => $on,
            'modo_registros' => '',
            'modo_buscar'    => '',
            'modo_info'      => '',
            'modo_salir'     => '',
        );
        //Main structure
        $this->load->view('user/header',$data);
        $this->load->view('user/empresas_edit',$data);
        $this->load->view('user/footer',$data);
			}
			else
			{
				//--Error Controller
				redirect('/Unauthorized');
			}
    }
	public function Form_add()
	{
		if($this->session->userdata('logged_in'))
		{
				$this->load->helper(array('form', 'url'));
				$this->load->library('form_validation');
				//--
        $this->form_validation->set_rules('R_Social', 'R_Social', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('Acronimo', 'Acronimo', 'trim|required|min_length[3]|max_length[100]');
        if ($this->form_validation->run() == FALSE)
        {
        	$data = array (
                $on    = "red-text",
                //--
                'title'          => 'Nueva Empresa',
                'modo_inicio'    => '', 
                'modo_personas'  => '',
                'modo_empresas'  => $on,
                'modo_registros' => '',
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
            );
            //Main structure
            $this->load->view('user/header',$data);
            $this->load->view('user/empresas_add',$data);
            $this->load->view('user/footer',$data);
       	}
        else
       	{
        	$this->load->model('user/empresa');
            $this->empresa->addEmpresas();
       	}
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
    public function Form_edit()
    {
			if($this->session->userdata('logged_in'))
			{
				$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        //--
        $this->form_validation->set_rules('ID', 'ID', 'required|numeric');
        $this->form_validation->set_rules('R_Social', 'R_Social', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('Acronimo', 'Acronimo', 'trim|required|min_length[3]|max_length[100]');

        $id2 = $this->input->post('ID',TRUE);

        if ($this->form_validation->run() == FALSE)
        {
            $data = array (
                $on    = "red-text",
                //--
                'ID'             => $id2,
                'title'          => 'Editar Persona #'.$id2,
                'modo_inicio'    => '', 
                'modo_personas'  => '',
                'modo_empresas'  => $on,
                'modo_registros' => '',
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
            );
            $data2 = array(
                'msj'  => 'Llenar todos los datos',
                'link' => 'Empresas',
            );
            //Main structure
            $this->load->view('user/header',$data);
            $this->load->view('user/empresas_edit',$data);
            $this->load->view('user/footer',$data);
        }
        else
        {
            $this->load->model('user/empresa');
            $this->empresa->editEmpresa();
        }
			}
			else
			{
				//--Error Controller
				redirect('/Unauthorized');
			}
    }
}
