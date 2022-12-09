<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function news($limit = null, $offset = null)
    {
        $this->db->where('status', 0);
        $this->db->order_by('News_ID', 'DESC');

        $query = $this->db->get('news', $limit, $offset);
        return $query->result();
    }
    public function popular_blog($limit = 5)
    {
        $offset = rand(0,8);
        $this->db->order_by('(likeCount+dislikeCount)', 'DESC');
        $this->db->where('Blog_Title!=', null);
        $query = $this->db->get('blog', $limit, $offset);
        return $query->result();
    }
    public function popular_blog_ru($limit = 6)
    {
        $this->db->where('ru_title!=', null);
        $this->db->order_by('(likeCount+dislikeCount)', 'DESC');
        $query = $this->db->get('blog', $limit);
        return $query->result();
    }
    public function fetchCityNames()
    {
        $this->db->select('Property_location');
        $this->db->distinct();
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_location', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function fetchPropertyTypes()
    {
        $this->db->select('Property_type');
        $this->db->distinct();
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_type', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function fetchPropertyBed()
    {
        $this->db->select('Property_Bedrooms');
        $this->db->distinct();
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_Bedrooms', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function findProperty($find_array, $limit = null, $offset = null)
    {
        $this->db->like($find_array);
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function recommendedProperties()
    {

        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('status > ', 1);
        $this->db->where('recommended', 9);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property');
        if ($query->result()) {
            return $query->result();
        } else {
            return null;
        }
    }
    public function YoutubeVideos(){
        $this->db->where('status', 2);
        $this->db->order_by('sequence', 'ASC');
        $query = $this->db->get('youtubeVideos',3);
        if ($query->result()){
            return $query->result();
        }else{
            return false;
        }
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