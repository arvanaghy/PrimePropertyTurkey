<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function Is_user_already_register($data)
    {
        $this->db->where('login_oauth_uid', $data);
        $query = $this->db->get('user');
        if($query->num_rows() > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function Is_user_email_exist($data)
    {
        $this->db->where('email', $data);
        $query = $this->db->get('user');
        if($query->num_rows() > 0)
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    public function Update_user_login_data_by_uid($data,$id)
    {
        $this->db->where('login_oauth_uid', $id);
        $this->db->update('user', $data);
    }
    public function Update_user_login_data_by_email($data,$id)
    {
        $this->db->where('email', $id);
        $this->db->update('user', $data);
    }
    public function Insert_user_login_data($data)
    {
        $this->db->insert('user', $data);
    }

    public function userLevel($data)
    {
        $this->db->select('status');
        $this->db->where('email', $data);
        $query = $this->db->get('user');
        if($query->result())
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    public function getUserInfo($data)
    {
        $this->db->select('hashCode');
        $this->db->where('email', $data);
        $query = $this->db->get('user');
        if($query->result())
        {
            return $query->row();
        }
        else
        {
            return false;
        }
    }

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
        $this->db->where('email',$this->session->userdata('username'));
        $this->db->update('user');
    }
    public function unPublishMainPropertyTbl($data)
    {
        $this->db->set('status',1);
        $this->db->where('ReferenceLink',$data);
        $this->db->update('property');
    }
    public function update_Property_Submit_Model($id,$data)
    {
        $this->db->set($data);
        $this->db->where('id',$id);
        $this->db->update('resale');
    }
    public function FetchResaleUsers()
    {
        $this->db->where('email',$this->session->userdata('username'));
        $query = $this->db->get('user');
        if ($query->result()) {
            return $query->row();
        }else{
            return false;
        }
    }
    public function deleteProperty($data)
    {
        $this->db->where('UserName',$this->session->userdata('username'));
        $this->db->where('id',$data);
        $this->db->delete('resale');
    }
    public function getResaleImageNameModel($data)
    {
        $this->db->select('id,image,sort_priority');
        $this->db->order_by('sort_priority', 'DESC');
        $this->db->where('property',$data);
        $query = $this->db->get('resale_image');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function getResaleData($data)
    {
        $this->db->select('referenceID');
        $this->db->where('id',$data);
        $query = $this->db->get('resale');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }
    public function delete_Audition_image($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('resale_image');
    }

    public function deleteImage($data)
    {
        $this->db->where('id',$data);
        $this->db->delete('resale_image');
    }

    public function GetResalesPropertiesInfo($data)
    {
        $this->db->where('id',$data);
        $query = $this->db->get('resale');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }
    public function GetResalesPropertiesImages($data)
    {
        $this->db->where('property',$data);
        $query = $this->db->get('resale_image');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function checkPropertyEditPermission($data)
    {
        $this->db->group_start();
        $this->db->where('UserName',$this->session->userdata('username'));
        $this->db->where('id',(int)$data);
        $this->db->group_end();
        $query = $this->db->get('resale');
        if ($query->result()){
            return true;
        }else{
            return false;
        }
    }
    public function checkImagesDeletePermission($data)
    {
        $this->db->select('*');
        $this->db->from('resale');
        $this->db->group_start();
        $this->db->where('resale.UserName',$this->session->userdata('username'));
        $this->db->where('resale_image.id',(int)$data);
        $this->db->group_end();
        $this->db->join('resale_image', 'resale_image.property = resale.id');
        $query = $this->db->get();
        if ($query->result()){
            return true;
        }else{
            return false;
        }
    }
    public function getResalePropertyTitle($value)
    {
        $this->db->select('Property_id');
        $this->db->where('Property_title',$value);
        $query = $this->db->get('property');
        if ($query->result()){
            return $query->result_array();
        }else{
            return $data['Property_id'] = null;
        }
    }
}