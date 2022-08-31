<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Turkey_model extends CI_Model
{
    public function fetchCityNames()
    {
        $this->db->select('Property_location');
        $this->db->distinct();
        $this->db->where('status >', 1);
        $this->db->order_by('Property_location', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function fetchPropertyTypes()
    {
        $this->db->select('Property_type');
        $this->db->distinct();
        $this->db->where('status >', 1);
        $this->db->order_by('Property_type', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function fetchPropertyBed()
    {
        $this->db->select('Property_Bedrooms');
        $this->db->distinct();
        $this->db->where('status >', 1);
        $this->db->order_by('Property_Bedrooms', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function currencyExchange()
    {
        $query = $this->db->get('currencyExchange');
        $result = array();
        if ($query->result()) {
            foreach ($query->result() as $value) {
                $result = $value;
            }
        }
        return $result;
    }
    public function record_count_find($value)
    {
        if ($value['City'] != 'All') {
            $this->db->where('Property_location', $value['City']);
        }
        if ($value['Type'] != 'All') {
            $this->db->where('Property_type', $value['Type']);
        }
        if ($value['bedroom'] != 'All') {
            $this->db->where('Property_Bedrooms', $value['bedroom']);
        }
        if ($value['min_price'] != 'min') {
            $this->db->where('Property_price>=', (int)$value['min_price']);
        }
        if ($value['max_price']<5000000){
            $this->db->group_start();
            $this->db->where('Property_price<=', (int)$value['max_price']);
            $this->db->where('Property_price!=', 0);
            $this->db->group_end();
        }
        $this->db->group_start();
        $this->db->where('status >', 1);
        $this->db->group_end();
        $this->db->order_by('Property_id', 'DESC');
        $this->db->order_by('Property_price', 'ASC');
        $this->db->from('property');
        return $this->db->count_all_results();
    }
    public function searchPropertyAll($value,$limit = 20, $offset = 0)
    {
        if ($value['City'] != 'All') {
            $this->db->where('Property_location', $value['City']);
        }
        if ($value['Type'] != 'All') {
            $this->db->where('Property_type', $value['Type']);
        }
        if ($value['bedroom'] != 'All') {
            $this->db->where('Property_Bedrooms', $value['bedroom']);
        }
        $this->db->group_start();
        if ($value['min_price'] != 'min') {
            $this->db->where('Property_price>=', $value['min_price']);
        }else{
            $this->db->where('Property_price>', 0);
        }
        if ($value['max_price']<5000000){
            $this->db->where('Property_price<=', $value['max_price']);
        }
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('status >', 1);
        $this->db->group_end();
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function searchPropertyAllCommercial($value,$limit = 20, $offset = 0)
    {
        if ($value['City'] != 'All') {
            $this->db->where('Property_location', $value['City']);
        }
        $this->db->group_start();
        $this->db->where('Property_type', 'Commercial');
        $this->db->or_where('is_commercial', '1');
        $this->db->group_end();
        if ($value['bedroom'] != 'All') {
            $this->db->where('Property_Bedrooms', $value['bedroom']);
        }
        $this->db->group_start();
        if ($value['min_price'] != 'min') {
            $this->db->where('Property_price>=', $value['min_price']);
        }else{
            $this->db->where('Property_price>', 0);
        }
        if ($value['max_price']<5000000){
            $this->db->where('Property_price<=', $value['max_price']);
        }
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function record_count_find_Commercial($value)
    {
        if ($value['City'] != 'All') {
            $this->db->where('Property_location', $value['City']);
        }
        $this->db->group_start();

        $this->db->where('Property_type', 'Commercial');
        $this->db->or_where('is_commercial', '1');

        $this->db->group_end();


        if ($value['bedroom'] != 'All') {
            $this->db->where('Property_Bedrooms', $value['bedroom']);
        }
        if ($value['min_price'] != 'min') {
            $this->db->where('Property_price>=', (int)$value['min_price']);
        }
        if ($value['max_price']<5000000){
            $this->db->where('Property_price<=', (int)$value['max_price']);
        }
        $this->db->group_start();
        $this->db->where('status >', 1);
        $this->db->group_end();
        $this->db->order_by('Property_id', 'DESC');
        $this->db->from('property');
        return $this->db->count_all_results();
    }
}