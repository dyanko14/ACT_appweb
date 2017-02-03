<?php
class UserCheck extends CI_Model
{
    public function login()
    {
        //--Data from Post
        $user = $this->input->post('Usuario',TRUE);
        $pass = $this->input->post('Password',TRUE);
        //--Data Validation
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('user', $user);
        $this->db->where('pass', $pass);
        $this->db->limit(1);
        $query = $this->db->get();
        //--Session Data
        if ($query->num_rows() == 1)
        {
          foreach ($query->result() as $row)
          {
            $sess_array = array(
              'id'     => $row->id_user,
              'nombre' => $row->user,
              'access' => TRUE,
             );
             //--Private Pages
             if ($row->permiso == 1)
             {
                 //--Validate Real IP
                 function getRealIP() {
                   if (!empty($_SERVER['HTTP_CLIENT_IP']))
                      return $_SERVER['HTTP_CLIENT_IP'];
                   if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                      return $_SERVER['HTTP_X_FORWARDED_FOR'];
                   return $_SERVER['REMOTE_ADDR'];
                 }
                 //--Insert Data in Sesion Table
                 $data = array(
                     'fecha'     => date('Y:m:d'),
                     'hora'      => date('H:i:s'),
                     'user'      => $row->user,
                     'navegador' => $this->agent->browser(),
                     'so'        => $this->agent->platform(),
                     'ip'        => getRealIP(),
                 );
                 $this->db->insert('sesiones', $data);
                 //--Redirect
                 $time = 7200; //Seconds
                 $this->session->set_userdata('logged_in', $row->user);  //-Create Data Session
                 $this->session->mark_as_temp('logged_in', $time);      //-Adding time to Data Session
                 redirect('User/Inicio','refresh');
             }
             else if ($row->permiso == 2)
             {
                 //--Validate Real Ip
                 function getRealIP() {
                   if (!empty($_SERVER['HTTP_CLIENT_IP']))
                      return $_SERVER['HTTP_CLIENT_IP'];
                   if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                      return $_SERVER['HTTP_X_FORWARDED_FOR'];
                   return $_SERVER['REMOTE_ADDR'];
                 }
                 //--Insert Data in Sesion Table
                 $data = array(
                     'fecha'     => date('Y:m:d'),
                     'hora'      => date('H:i:s'),
                     'user'      => $row->user,
                     'navegador' => $this->agent->browser(),
                     'so'        => $this->agent->platform(),
                     'ip'        => getRealIP(),
                 );
                 $this->db->insert('sesiones', $data);
                 //--Redirect
                 $time = 7200; //Seconds
                 $this->session->set_userdata('logged_in2', $row->user); //-Create Data Session
                 $this->session->mark_as_temp('logged_in2', $time);      //-Adding time to Data Session
                 redirect('Admin/Inicio','refresh');
             }
          }
        }
        else
        {
            $data = array('title' => 'Datos equivocados');
            echo $x;
            $this->load->view('login',$data);
        }
    }
}
?>
