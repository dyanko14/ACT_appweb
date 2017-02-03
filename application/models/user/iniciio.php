<?php
class iniciio extends CI_Model
{
    public function addVisita()
    {
        //Datos enviados por Post
        $fecha    = $this->input->post('fecha_in');
        $hora     = $this->input->post('hora_in');
        $persona  = $this->input->post('visitante');
        $empleado = $this->input->post('empleado');
        $razon    = $this->input->post('razon');
        //Insert Data in DB
        $data = array(
            'fecha_in'     => $fecha,
            'hora_in'      => $hora,
            'id_visitante' => $persona,
            'id_act'       => $empleado,
            'id_razon'     => $razon,
            'completo'     => 'no',
        );
        $this->db->insert('registro', $data);
        redirect('User/Registros');
    }
}
?>
