<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News_model extends CI_Model
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
        $query = $this->db->get('blog', $limit, $offset);
        return $query->result();
    }
    public function BN_record_count($table, $where_array = null)
    {
        if ($where_array != null) {
            $this->db->where($where_array);
        }
        $this->db->where('status', 0);
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    public function recommendedProperties()
    {
        $data = array();
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'istanbul');
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['istanbul'] = $query->result();
        } else {
            $data['istanbul'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'gocek');
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['gocek'] = $query->result();
        } else {
            $data['gocek'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'kas');
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['kas'] = $query->result();
        } else {
            $data['kas'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'kalkan');
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['kalkan'] = $query->result();
        } else {
            $data['kalkan'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'fethiye');
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['fethiye'] = $query->result();
        } else {
            $data['fethiye'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'antalya');
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 5);
        if ($query->result()) {
            $data['antalya'] = $query->result();
        } else {
            $data['antalya'] = null;
        }
        return $data;
    }
    public function fetch_post_by_url_BN($table, $url)
    {
        $this->db->where('url_slug', $url);
        $this->db->group_start();
        $this->db->where('status', 0);
        $this->db->or_where('status', 3);
        $this->db->group_end();
        $query = $this->db->get($table);
        return $query->row();
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
    public function fetchPostComments($id,$type)
    {
        $this->db->where('reference_id', $id);
        $this->db->where('kind', $type);
        $this->db->where('status', 'published');
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('comments');
        if ($query->result()){
            return $query->result();
        }
        return null;
    }
}