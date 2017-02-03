<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('logged_in2'))
        {
    		$data = array (
                $on    = "blue-text",
                //--
                'title'          => 'Registro de Empleados',
                'modo_inicio'    => '', 
                'modo_empleados' => $on,
                'modo_sesiones'  => '',                
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
    		);
    		//Main structure
    		$this->load->helper('date');
    		$this->load->view('admin/header',$data);
    		$this->load->view('admin/empleados',$data);
    		$this->load->view('admin/footer',$data);
        }
        else
        {
			//--Error Controller
			redirect('/Unauthorized');
        }
	}
	public function Deactivate($id = '')
	{
		if($this->session->userdata('logged_in2'))
		{
			//--Update Status
			$this->db->query("UPDATE empleados SET e_activo = 'no' WHERE id_act = '$id' ");
			redirect("Admin/Empleados");
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Activate($id = '')
	{
		if($this->session->userdata('logged_in2'))
		{
			//--Update Status
			$this->db->query("UPDATE empleados SET e_activo = 'si' WHERE id_act = '$id' ");
			redirect("Admin/Empleados");
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Edit($id = '')
	{
		if($this->session->userdata('logged_in2'))
		{
			$data = array (
                $on    = "blue-text",
                //--
                'ID'             => $id,
                'title'          => 'Editar Empleado #'.$id,
                'modo_inicio'    => '', 
                'modo_empleados' => $on,
                'modo_sesiones'  => '',                
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
			);
			//Main structure
			$this->load->view('admin/header',$data);
			$this->load->view('admin/empleados_edit',$data);
			$this->load->view('admin/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Form_edit()
	{
		if($this->session->userdata('logged_in2'))
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			//--
			$this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required|min_length[3]|max_length[50]|alpha_numeric_spaces');
			$this->form_validation->set_rules('ApellidoM', 'ApellidoM', 'trim|required|min_length[3]|max_length[50]|alpha_numeric_spaces');
			$this->form_validation->set_rules('Cargo', 'Cargo', 'trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('Email', 'Email', 'trim|required|min_length[3]|max_length[100]|valid_email');
			$this->form_validation->set_rules('Genero', 'Genero', 'trim|required|min_length[1]|max_length[10]');
			$id2 = $this->input->post('ID',TRUE);
			if ($this->form_validation->run() == FALSE)
			{
				$data = array (
		            $on    = "blue-text",
		            //--
		            'ID'             => $id2,
		            'title'          => 'Editar Empleado #'.$id2,
		            'modo_inicio'    => '', 
		            'modo_empleados' => $on,
		            'modo_sesiones'  => '',                
		            'modo_buscar'    => '',
		            'modo_info'      => '',
		            'modo_salir'     => '',
				);
				//Main structure
				$this->load->view('admin/header',$data);
				$this->load->view('admin/empleados_edit',$data);
				$this->load->view('admin/footer',$data);
			}
			else
			{
				$this->load->model('admin/empleado');
				$this->empleado->editEmpleado();
			}
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Add()
	{
		if($this->session->userdata('logged_in2'))
		{
			$data = array (
                $on    = "blue-text",
                //--
                'title'          => 'Nuevo Empleado',
                'modo_inicio'    => '', 
                'modo_empleados' => $on,
                'modo_sesiones'  => '',                
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
			);
			//Main structure
			$this->load->view('admin/header',$data);
			$this->load->view('admin/empleados_add',$data);
			$this->load->view('admin/footer',$data);
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
	public function Form_add()
	{
		if($this->session->userdata('logged_in2'))
		{
			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			//--
			$this->form_validation->set_rules('Nombre', 'Nombre', 'trim|required|min_length[3]|max_length[50]|alpha_numeric_spaces');
			$this->form_validation->set_rules('ApellidoM', 'ApellidoM', 'trim|required|min_length[3]|max_length[50]|alpha_numeric_spaces');
			$this->form_validation->set_rules('Cargo', 'Cargo', 'trim|required|min_length[3]|max_length[50]');
			$this->form_validation->set_rules('Email', 'Email', 'trim|required|min_length[3]|max_length[100]|valid_email');
			$this->form_validation->set_rules('Genero', 'Genero', 'trim|required|min_length[1]|max_length[10]');
      		if ($this->form_validation->run() == FALSE)
      		{
        		$data = array (
		            $on    = "blue-text",
		            //--
		            'title'          => 'Nuevo Empleado',
		            'modo_inicio'    => '', 
		            'modo_empleados' => $on,
		            'modo_sesiones'  => '',                
		            'modo_buscar'    => '',
		            'modo_info'      => '',
		            'modo_salir'     => '',
        		);
				//Main structure
				$this->load->view('admin/header',$data);
				$this->load->view('admin/empleados_add',$data);
				$this->load->view('admin/footer',$data);
       		}
        	else
       		{
        		$this->load->model('admin/empleado');
            	$this->empleado->addEmpleado();
       		}
		}
		else
		{
			//--Error Controller
			redirect('/Unauthorized');
		}
	}
}
