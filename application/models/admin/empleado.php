<?php
class Empleado extends CI_Model
{
  public function addEmpleado()
  {
      //--Data from user
      $this->load->helper('inflector');
      $name      = humanize($this->input->post('Nombre'));
      $lastname1 = humanize($this->input->post('ApellidoM'));
      $posicion  = humanize($this->input->post('Cargo'));
      $email     = $this->input->post('Email');
      $sex       = $this->input->post('Genero');    
      //--Data Query
      $this->db->select('*');
      $this->db->from('empleados');
      $this->db->where('e_nombre', $name);
      $this->db->where('e_apellido', $lastname1);
      $query = $this->db->get();
      //--Data Validation
      if ($query->num_rows() > 0)
      {
          $data = array (
              'msj'  => 'Registro duplicado en la Base de Datos',
              'link' => 'Admin/Empleados/Add',
          );
          $this->load->view('admin/header3',$data);
      }
      else
      {
          //--Insert Data in DB
          $data = array(
              'e_nombre'   => $name,
              'e_apellido' => $lastname1,
              'e_posicion' => $posicion,
              'email'      => $email,
              'e_genero'   => $sex,
              'e_activo'   => 'si',
          );
          $this->db->insert('empleados', $data);
          redirect('Admin/Empleados');
      }
  }
    public function editEmpleado()
    {
        //--Data from user
        $this->load->helper('inflector');
        $id        = $this->input->post('ID');
        $name      = humanize($this->input->post('Nombre'));
        $lastname1 = humanize($this->input->post('ApellidoM'));
        $posicion  = humanize($this->input->post('Cargo'));
        $email     = $this->input->post('Email');
        $sex       = $this->input->post('Genero');
        $activo    = $this->input->post('Activo');        
        //--Data Query
        $this->db->select('*');
        $this->db->from('empleados');
        $this->db->where('e_nombre', $name);
        $this->db->where('e_apellido', $lastname1);
        $this->db->where('email', $email);        
        $this->db->where('id_act', $id);
        $query = $this->db->get();
        //--Data Validation
        if ($query->num_rows() > 0)
        {
            $data = array (
                'msj'  => 'No has modificiado ningún dato',
                'link' => 'Admin/Empleados',
            );
            $this->load->view('admin/header3',$data);
        }
        else
        {
            //Update Data in DB
            $data = array(
                'id_act'     => $id,
                'e_nombre'   => $name,
                'e_apellido' => $lastname1,
                'e_posicion' => $posicion,
                'email'      => $email,
                'e_genero'   => $sex,
                'e_activo'   => $activo,
            );
            $this->db->where('id_act',$id);
            $this->db->replace('empleados', $data);
            redirect('Admin/Empleados');
        }
    }
}
?>
