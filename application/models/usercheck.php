<?php
class UserCheck extends CI_Model
{
    public function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
            return $_SERVER['REMOTE_ADDR'];
    }
    public function insertSession($user)
    {
        $data = array(
            'fecha'     => date('Y:m:d'),
            'hora'      => date('H:i:s'),
            'user'      => $user,
            'navegador' => $this->agent->browser(),
            'so'        => $this->agent->platform(),
            'ip'        => self::getRealIP(),
        );
        $this->db->insert('sesiones', $data);
    }
    public function login()
    {
        //--Data from Post
        $this->load->library('encrypt');
        $user = $this->input->post('Usuario',TRUE);
        $pass = $this->input->post('Password',TRUE);
        
        //--Data Validation
        $this->db->select('*');
        $this->db->from('login');
        $this->db->where('user', $user);
        $this->db->limit(1);
        $query = $this->db->get();
        //--SQL
        if ($query->num_rows() == 1)
        {
            foreach ($query->result() as $row)
            {
                if ($this->encrypt->decode($row->pass) == $pass)
                {
                    //--Private Pages
                    switch ($row->permiso)
                    {
                        case 1:
                            self::insertSession($row->user);
                            //--Redirect
                            $time = 7200; //Seconds = 2Hrs
                            $this->session->set_userdata('logged_in', $row->user); //-Create Data Session
                            $this->session->mark_as_temp('logged_in', $time);      //-Adding time to Data Session
                            redirect('User/Inicio','refresh');
                        break;
                        case 2:                        
                            self::insertSession($row->user);
                            //--Redirect
                            $time = 7200; //Seconds = 2Hrs
                            $this->session->set_userdata('logged_in2', $row->user); //-Create Data Session
                            $this->session->mark_as_temp('logged_in2', $time);      //-Adding time to Data Session
                            redirect('Admin/Inicio','refresh');
                        break;
                    } //--End Switch
                } //--End If Decode
                else
                {
                    $data = array('title' => 'Datos equivocados');
                    $this->load->view('login',$data);
                }
            } //--End Foreach
        } //--End If Query numRows
        else
        {
            $data = array('title' => 'Datos equivocados');            
            $this->load->view('login',$data);
        }
    }
}
?>