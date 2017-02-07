<?php
class Persona extends CI_Model
{
    public function addVisitantes()
    {
        //--Data from user
        $this->load->helper('inflector');
        $name      = humanize($this->input->post('Nombre'));
        $lastname1 = humanize($this->input->post('ApellidoM'));
        $lastname2 = humanize($this->input->post('ApellidoP'));
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
        $this->load->helper('inflector');
        $id        = $this->input->post('ID');
        $name      = humanize($this->input->post('Nombre'));
        $lastname1 = humanize($this->input->post('ApellidoM'));
        $lastname2 = humanize($this->input->post('ApellidoP'));
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
                'msj'  => 'No se ha modificado ningún dato',
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
