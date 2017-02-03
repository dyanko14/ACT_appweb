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
?>
