<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fetch_ajax extends CI_Model
{
    public function fetchPropertyTypeByCity($city)
    {
        $this->db->distinct();
        $this->db->select('Property_type');
        $this->db->where('Property_location',$city);
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_type', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function fetchPropertyBedByCity($city)
    {
        $this->db->distinct();
        $this->db->select('Property_Bedrooms');
        $this->db->where('Property_location',$city);
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_Bedrooms', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function fetchPropertyBedByCityANDType($city,$pro_type)
    {
        $this->db->distinct();
        $this->db->select('Property_Bedrooms');
        if ($city!='All'){
            $this->db->where('Property_location',$city);
        }
        $this->db->where('Property_type',$pro_type);
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_Bedrooms', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
}