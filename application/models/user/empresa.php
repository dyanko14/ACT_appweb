<?php
class Empresa extends CI_Model
{
	public function getEmpresas()
	{
		return $this->db->query("SELECT * FROM empresa");
	}
    public function addEmpresas()
    {
        //--Data from user
        $this->load->helper('inflector');
        $r_social = humanize($this->input->post('R_Social'));
        $acronimo = $this->input->post('Acronimo');

        //--Data Query
        $this->db->select('*');
        $this->db->from('empresa');
        $this->db->where('r_social', $r_social);
        $this->db->where('acronimo', $acronimo);
        $query = $this->db->get();
        
        //--Data Validation
        if ($query->num_rows() > 0)
        {
            $data = array (
                'msj'  => 'Registro duplicado en la Base de Datos',
                'link' => 'User/Empresas/Add',
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
            $this->load->view('user/header',$data);
            $this->load->view('user/duplicado',$data);
            $this->load->view('user/footer',$data);
        }
        else
        {
            //Insert Data in DB
            $data = array(
                'r_social' => $r_social,
                'acronimo' => $acronimo,
            );
            $this->db->insert('empresa', $data);
            redirect('User/Empresas');
        }
    }
    public function editEmpresa()
    {
        //--Data from user
        $this->load->helper('inflector');
        $id        = $this->input->post('ID');
        $r_social = humanize($this->input->post('R_Social'));
        $acronimo = $this->input->post('Acronimo');
        
        //--Data Query
        $this->db->select('*');
        $this->db->from('empresa');
        $this->db->where('r_social', $r_social);
        $this->db->where('acronimo', $acronimo);
        $query = $this->db->get();
        
        //--Update Data in DB
        $data = array(
            'id_empresa' => $id,
            'r_social'   => $r_social,
            'acronimo'   => $acronimo,
        );
        $this->db->where('id_empresa',$id);
        $this->db->replace('empresa', $data);
        redirect('User/Empresas');
    }
}
?>
