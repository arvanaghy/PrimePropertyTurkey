<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CitizenShip_model extends CI_Model
{
    public function citizenShipSuitable()
    {
        $data = array();
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'istanbul');
        $this->db->where('status > ', 1);
        $this->db->group_start();
        $this->db->where('Property_price >', 400000);
        $this->db->where('Property_price <', 500000);
        $this->db->group_end();
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['istanbul'] = $query->result();
        } else {
            $data['istanbul'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'gocek');
        $this->db->group_start();
        $this->db->where('Property_price >', 400000);
        $this->db->where('Property_price <', 500000);
        $this->db->group_end();        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['gocek'] = $query->result();
        } else {
            $data['gocek'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'kas');
        $this->db->group_start();
        $this->db->where('Property_price >', 400000);
        $this->db->where('Property_price <', 500000);
        $this->db->group_end();        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'RANDOM');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['kas'] = $query->result();
        } else {
            $data['kas'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'kalkan');
        $this->db->group_start();
        $this->db->where('Property_price >', 400000);
        $this->db->where('Property_price <', 500000);
        $this->db->group_end();        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['kalkan'] = $query->result();
        } else {
            $data['kalkan'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'fethiye');
        $this->db->group_start();
        $this->db->where('Property_price >', 400000);
        $this->db->where('Property_price <', 500000);
        $this->db->group_end();        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['fethiye'] = $query->result();
        } else {
            $data['fethiye'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'antalya');
        $this->db->group_start();
        $this->db->where('Property_price >', 400000);
        $this->db->where('Property_price <', 500000);
        $this->db->group_end();        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['antalya'] = $query->result();
        } else {
            $data['antalya'] = null;
        }
        return $data;
    }
    public function shortTermPermitSuitable()
    {
        $data = array();
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'istanbul');
        $this->db->where('status > ', 1);
        $this->db->group_start();
        $this->db->where('Property_price >=', 75000);
        $this->db->where('Property_price <=', 120000);
        $this->db->group_end();
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 6);
        if ($query->result()) {
            $data['istanbul'] = $query->result();
        } else {
            $data['istanbul'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'gocek');
        $this->db->group_start();
        $this->db->where('Property_price >=', 75000);
        $this->db->where('Property_price <=', 120000);
        $this->db->group_end();
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 6);
        if ($query->result()) {
            $data['gocek'] = $query->result();
        } else {
            $data['gocek'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'kas');
        $this->db->group_start();
        $this->db->where('Property_price >=', 75000);
        $this->db->where('Property_price <=', 120000);
        $this->db->group_end();
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'RANDOM');
        $query = $this->db->get('property', 6);
        if ($query->result()) {
            $data['kas'] = $query->result();
        } else {
            $data['kas'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'kalkan');
        $this->db->group_start();
        $this->db->where('Property_price >=', 75000);
        $this->db->where('Property_price <=', 120000);
        $this->db->group_end();
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 6);
        if ($query->result()) {
            $data['kalkan'] = $query->result();
        } else {
            $data['kalkan'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'fethiye');
        $this->db->group_start();
        $this->db->where('Property_price >=', 75000);
        $this->db->where('Property_price <=', 120000);
        $this->db->group_end();
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 6);
        if ($query->result()) {
            $data['fethiye'] = $query->result();
        } else {
            $data['fethiye'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'antalya');
        $this->db->group_start();
        $this->db->where('Property_price >=', 75000);
        $this->db->where('Property_price <=', 120000);
        $this->db->group_end();
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'RANDOM');
        $query = $this->db->get('property', 6);
        if ($query->result()) {
            $data['antalya'] = $query->result();
        } else {
            $data['antalya'] = null;
        }
        return $data;
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
}