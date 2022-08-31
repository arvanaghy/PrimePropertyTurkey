<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_m extends CI_Model
{
    public function contact_us($data)
    {
        $table = 'contact_us';
        return $this->db->insert($table, $data);
    }

    public function login($data)
    {
        $password = sha1($data['password']);
        $this->db->select('id,fullname,email');
        $this->db->where('email',$data['email']);
        $this->db->where('password',$password);
        $this->db->where('status',2);
        $query = $this->db->get('user');
        if ($query->result()){
            return $query->row();
        }else{
            return False;
        }
    }

    public function register($data)
    {
        $table = 'user';
        return $this->db->insert($table, $data);
    }

    public function verification($hsCode)
    {
        $hsCode = "https://www.primepropertyturkey.com/Verification/userRegister/".$hsCode;
        $this->db->select('id');
        $this->db->where('hashCode',$hsCode);
        $this->db->where('status',0);
        $query = $this->db->get('user');
        if ($query->result()){
            $data = $query->row();
            $this->db->where('id',$data->id);
            $this->db->set('status',2);
            $this->db->update('user');
            return True;
        }else{
            return False;
        }
    }

    public function forget_password($value)
    {
        $this->db->select('id');
        $this->db->where('email',$value['email']);
        $query = $this->db->get('user');
        if ($query->result()){
            return true;
        }
        return false;

    }

    public function passwordReset($value)
    {
        $d = rand(date('His')*111,date('His')*999);
        $hsCode = sha1($value['email'].$d);
        $resetLink = "https://www.primepropertyturkey.com/Verification/passwordReset/".$hsCode;
        $this->db->set('resetPassword', $resetLink);
        $this->db->where('email', $value['email']);
        $this->db->update('user');
        return $resetLink;
    }
    public function resetPasswordSubmit($value)
    {
        $reset = "https://www.primepropertyturkey.com/Verification/passwordReset/".$value['hashCode'];
        $this->db->set('password', sha1($value['password']));
        $this->db->where('resetPassword', $reset);
        $this->db->update('user');
        return true;
    }

    public function enquire($data)
    {
        $table = 'enquiryRequest';
        return $this->db->insert($table, $data);
    }

    public function submitComment($data)
    {
        return $this->db->insert('comments', $data);
    }
    public function submitCareer($data)
    {
        return $this->db->insert('Career', $data);
    }

}