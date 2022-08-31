<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup_model extends CI_Model
{
    public function submitSignupRequest($data)
    {
        $table = 'signup';
        return $this->db->insert($table, $data);
    }

    public function checkSignupVerification($data)
    {

        $this->db->where('email',$data['user_email']);
        $this->db->where('hashCode',$data['vf_code']);
        $this->db->where('status',0);
        $query = $this->db->get('signup');
        if ($query->result()){
            $this->db->set('status', 2);
            $this->db->where('email', $data['user_email']);
            $this->db->where('hashCode',$data['vf_code']);
            $this->db->update('signup');
            return True;
        }else{
            return False;
        }
    }
}