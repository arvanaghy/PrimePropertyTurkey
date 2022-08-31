<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function Add_Property_Submit_Model($data)
    {
        $this->db->insert('resale', $data);
        return $this->db->insert_id();
    }

    public function submitGalleryImagesModel($id,$filename,$order)
    {
        $data=array(
            "property"=>$id,
            "image"=>$filename,
            "sort_priority"=>$order
        );
        $this->db->insert('resale_image', $data);
    }

    public function FetchResaleProperties($where)
    {
        $this->db->where($where);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('resale');
        if ($query->result()) {
            return $query->result();
        }else{
            return false;
        }
    }

    public function updateProfile($data)
    {
        $this->db->set('fullname',$data['fullname']);
        $this->db->set('phone',$data['phone']);
        $this->db->where('id',$this->session->userdata('userID'));
        $this->db->update('user');
    }

    public function FetchResaleUsers()
    {
        $this->db->where('id',$this->session->userdata('userID'));
        $query = $this->db->get('user');
        if ($query->result()) {
            return $query->row();
        }else{
            return false;
        }
    }

    public function deleteProperty($data)
    {
        $this->db->where('userID',$this->session->userdata('userID'));
        $this->db->where('id',$data);
        $this->db->delete('resale');
    }
    public function checkPropertyPermission($data)
    {
        $this->db->where('userID',$this->session->userdata('userID'));
        $this->db->where($data);
        $query = $this->db->get('resale');
        if ($query->result){
            return true;
        }
        return false;
    }

    public function getResalePropertyTitle($value)
    {
        $this->db->select('id');
        $this->db->where('title',$value);
        $query = $this->db->get('resale');
        if ($query->result()){
            return $query->result_array();
        }else{
            return $data['id'] = null;
        }
    }

}