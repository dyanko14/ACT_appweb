<?php
class Registro extends CI_Model
{
	public function searchRegistros()
	{
        //Datos enviados por Post
        $visitante = $this->input->post('visitante')."<br>";
        $empleado  = $this->input->post('empleado')."<br>";
        $empresa   = $this->input->post('empresa')."<br>";
        $razon     = $this->input->post('razon')."<br>";
        $genero1   = $this->input->post('genero_persona')."<br>";
        $genero2   = $this->input->post('genero_act')."<br>";
 	}
    public function editRegistro()
    {
        //--Data from User
        $id           = $this->input->post('ID');
        $fecha_in     = $this->input->post('Fecha_in');
        $hora_in      = $this->input->post('Hora_In');
        $id_visitante = $this->input->post('id_visitante');
        $id_act       = $this->input->post('id_act');
        $id_razon     = $this->input->post('id_razon');
        $hora_out     = $this->input->post('Hora_Out');
        $completo     = $this->input->post('completo');
        $duracion     = strtotime($hora_out) - strtotime($hora_in);
        //--Update Data in DB
        if ($hora_in > $hora_out)
        {
            $data = array (
                $on    = "red-text",
                //--
                'ID'             => $id,
                'title'          => 'Terminar Visita #'.$id,
                'modo_inicio'    => '', 
                'modo_personas'  => '',
                'modo_empresas'  => '',
                'modo_registros' => $on,
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
                'msj'            => 'Rango de horas no válido',
            );
            //Main structure
            $this->load->view('user/header',$data);
            $this->load->view('user/registros_edit',$data);
            $this->load->view('user/registros_error',$data);
            $this->load->view('user/footer',$data);
        }
        else if ($hora_out < $hora_in)
        {
            $data = array (
                $on    = "red-text",
                //--
                'ID'             => $id,
                'title'          => 'Terminar Visita #'.$id,
                'modo_inicio'    => '', 
                'modo_personas'  => '',
                'modo_empresas'  => '',
                'modo_registros' => $on,
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
                'msj'            => 'Rango de horas no válido',
            );
            //Main structure
            $this->load->view('user/header',$data);
            $this->load->view('user/registros_edit',$data);
            $this->load->view('user/registros_error',$data);
            $this->load->view('user/footer',$data);
        }
        else if ($hora_out == $hora_in)
        {
            $data = array (
                $on    = "red-text",
                //--
                'ID'             => $id,
                'title'          => 'Terminar Visita #'.$id,
                'modo_inicio'    => '', 
                'modo_personas'  => '',
                'modo_empresas'  => '',
                'modo_registros' => $on,
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',
                'msj'            => 'La visita no puede durar menos de 1 minuto',
            );
            //Main structure
            $this->load->view('user/header',$data);
            $this->load->view('user/registros_edit',$data);
            $this->load->view('user/registros_error',$data);
            $this->load->view('user/footer',$data);
        }
        else
        {
            $data = array(
                'id_reg'       => $id,
                'fecha_in'     => $fecha_in,
                'hora_in'      => $hora_in,
                'id_visitante' => $id_visitante,
                'id_act'       => $id_act,
                'id_razon'     => $id_razon,
              	'hora_out'     => $hora_out,
              	'completo'     => $completo,
              	'duracion'     => $duracion,
            );
            $this->db->where('id_reg',$id);
            $this->db->replace('registro', $data);
           	redirect('User/Registros');
        }
    }
}
?>
