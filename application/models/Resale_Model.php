<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resale_Model extends CI_Model
{
    public function ListResaleProperties($limit = null, $offset = null)
    {
        $this->db->where('status > ', 3);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('resale', $limit, $offset);
        return $query->result();
    }
    public function countResaleProperties()
    {
        $this->db->where('status', 5);
        $this->db->from('resale');
        return $this->db->count_all_results();
    }

    public function findResaleAudition($find)
    {
        $this->db->where($find);
        $this->db->where('status >= ', 3);
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('resale');
        return $query->result();
    }
    public function get_resale_gallery($data,$limit=null){
        $this->db->select('*');
        $this->db->from('resale_image');
        $this->db->where('property',$data);
        $this->db->order_by("sort_priority", "ASC");
        if ($limit){
            $this->db->limit(2);
        }
        $query = $this->db->get();
        return $query->result();
    }

}