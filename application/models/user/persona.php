<?php
class Persona extends CI_Model
{
	public function getVisitantes()
	{
		return $this->db->query("
		 SELECT
        	visitante.id_visitante,
            visitante.v_nombre,
            visitante.v_apellido,
            visitante.v_s_apellido,
            visitante.v_genero,
            visitante.id_empresa,
            visitante.v_identif,
            empresa.r_social
         FROM visitante
            INNER JOIN empresa
                ON visitante.id_empresa = empresa.id_empresa
                    ORDER BY id_visitante");
	}
    public function addVisitantes()
    {
        //--Data from user
        $name      = ucwords($this->input->post('Nombre'));
        $lastname1 = $this->input->post('ApellidoM');
        $lastname2 = $this->input->post('ApellidoP');
        $ife       = $this->input->post('IFE');
        $sex       = $this->input->post('Genero');
        $empresa   = $this->input->post('Empresa');
        //--Data Query
        $this->db->select('*');
        $this->db->from('visitante');
        $this->db->where('v_nombre', $name);
        $this->db->where('v_apellido', $lastname1);
        $this->db->where('v_s_apellido', $lastname2);
        $query = $this->db->get();
        //--Data Validation
        if ($query->num_rows() > 0)
        {
            $data = array (
                'msj'  => 'Registro duplicado en la Base de Datos',
                'link' => 'User/Personas/Add',
                $on    = "red-text",
                //--
                'title'          => 'Registro de Personas',
                'modo_inicio'    => '', 
                'modo_personas'  => $on,
                'modo_empresas'  => '',
                'modo_registros' => '',
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '',                
            );
            $this->load->view('user/header',$data);
            $this->load->view('user/duplicado',$data);
            $this->load->view('user/footer',$data);
        }
        else
        {
            //--Insert Data in DB
            $data = array(
                'v_nombre'     => $name,
                'v_apellido'   => $lastname1,
                'v_s_apellido' => $lastname2,
                'v_identif'    => $ife,
                'v_genero'     => $sex,
                'id_empresa'   => $empresa,
            );
            $this->db->insert('visitante', $data);
            redirect('User/Personas');
        }
    }
    public function editVisitantes()
    {
        //--Data from user
        $id        = $this->input->post('ID');
        $name      = $this->input->post('Nombre');
        $lastname1 = $this->input->post('ApellidoM');
        $lastname2 = $this->input->post('ApellidoP');
        $ife       = $this->input->post('IFE');
        $sex       = $this->input->post('Genero');
        $empresa   = $this->input->post('Empresa');
        //--Data Query
        $this->db->select('*');
        $this->db->from('visitante');
        $this->db->where('v_nombre', $name);
        $this->db->where('v_apellido', $lastname1);
        $this->db->where('v_s_apellido', $lastname2);
        $this->db->where('v_identif', $ife);
        $this->db->where('v_genero', $sex);
        $this->db->where('id_empresa', $empresa);
        $query = $this->db->get();
        //--Data Validation
        if ($query->num_rows() > 0)
        {
            $data = array (
                'msj'  => 'Registro duplicado en la Base de Datos',
                'link' => 'User/Personas',
                $on    = "red-text",
                //--
                'title'          => 'Registro de Personas',
                'modo_inicio'    => '', 
                'modo_personas'  => $on,
                'modo_empresas'  => '',
                'modo_registros' => '',
                'modo_buscar'    => '',
                'modo_info'      => '',
                'modo_salir'     => '', 
            );
            $this->load->view('user/header',$data);
            $this->load->view('user/duplicado',$data);
            $this->load->view('user/footer',$data);
        }
        else
        {
            //Update Data in DB
            $data = array(
                'id_visitante' => $id,
                'v_nombre'     => $name,
                'v_apellido'   => $lastname1,
                'v_s_apellido' => $lastname2,
                'v_identif'    => $ife,
                'v_genero'     => $sex,
                'id_empresa'   => $empresa,
            );
            $this->db->where('id_visitante',$id);
            $this->db->replace('visitante', $data);
            redirect('User/Personas');
        }
    }
}
?>
