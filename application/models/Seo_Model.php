<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seo_Model extends CI_Model
{
    public function listNewsUrl()
    {
        $this->db->select('url_slug');
        $this->db->where('status',0);
        $query = $this->db->get('news');
        return $query->result();
    }
    public function listBlogUrl()
    {
        $this->db->select('url_slug');
        $this->db->where('status',0);
        $query = $this->db->get('blog');
        return $query->result();
    }
    public function listVideoUrl()
    {
        $this->db->select('url_slug');
        $this->db->where('status',2);
        $query = $this->db->get('youtubeVideos');
        return $query->result();
    }
    public function listPropertiesUrl()
    {
        $this->db->select('url_slug');
        $this->db->where('status >',2);
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyPagesUrl()
    {
        $this->db->select('Property_location');
        $this->db->distinct();
        $this->db->where('status >',2);
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyTypesUrl()
    {
        $this->db->select('Property_type');
        $this->db->distinct();
        $this->db->where('status >',2);
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyBedroomsUrl()
    {
        $this->db->select('Property_Bedrooms');
        $this->db->distinct();
        $this->db->where('status >',2);
        $this->db->order_by('Property_Bedrooms','ASC');
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyCityTypeFiltersUrl()
    {
        $this->db->select('Property_location,Property_type');
        $this->db->distinct();
        $this->db->where('status >',2);
        $this->db->order_by('Property_location','ASC');
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyCityBedroomFiltersUrl()
    {
        $this->db->select('Property_location,Property_Bedrooms');
        $this->db->distinct();
        $this->db->where('status >',2);
        $this->db->order_by('Property_location','ASC');
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyCityPriceFiltersUrl($value)
    {
        $this->db->select('Property_location');
        $this->db->distinct();
        $this->db->where('status >',2);
        $this->db->group_start();
        $this->db->where('Property_price < ',$value);
        $this->db->where('Property_price != ',0);
        $this->db->group_end();
        $this->db->order_by('Property_location','ASC');
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyTypeBedroomFiltersUrl()
    {
        $this->db->select('Property_type,Property_Bedrooms');
        $this->db->distinct();
        $this->db->where('status >',2);
        $this->db->order_by('Property_type','ASC');
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyTypeBedroomPriceFiltersUrl($value)
    {
        $this->db->select('Property_type,Property_Bedrooms');
        $this->db->distinct();
        $this->db->where('status >',2);
        $this->db->group_start();
        $this->db->where('Property_price < ',$value);
        $this->db->where('Property_price != ',0);
        $this->db->group_end();
        $this->db->order_by('Property_type','ASC');
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyCityTypeBedroomFiltersUrl()
    {
        $this->db->select('Property_location,Property_type,Property_Bedrooms');
        $this->db->distinct();
        $this->db->where('status >',2);
        $this->db->order_by('Property_location','ASC');
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyCityTypeBedroomPriceFiltersUrl($value)
    {
        $this->db->select('Property_location,Property_type,Property_Bedrooms');
        $this->db->distinct();
        $this->db->where('status >',2);
        $this->db->group_start();
        $this->db->where('Property_price < ',$value);
        $this->db->where('Property_price != ',0);
        $this->db->group_end();
        $this->db->order_by('Property_location','ASC');
        $query = $this->db->get('property');
        return $query->result();
    }
    public function listPropertyBedroomPriceFiltersUrl($value)
    {
        $this->db->select('Property_Bedrooms');
        $this->db->distinct();
        $this->db->where('status >',2);
        $this->db->group_start();
        $this->db->where('Property_price < ',$value);
        $this->db->where('Property_price != ',0);
        $this->db->group_end();
        $this->db->order_by('Property_Bedrooms','ASC');
        $query = $this->db->get('property');
        return $query->result();
    }
}