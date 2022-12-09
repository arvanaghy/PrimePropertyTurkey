<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Find_Model extends CI_Model
{

    public function findBlogsModel($data, $limit = 5, $offset = 0)
    {
        $search_array = explode(" ", $data);
        $this->db->like('Blog_Title', $data);
        $this->db->group_start();
        foreach ($search_array as $params) {
            $this->db->or_like('Blog_Title', $params);
        }
        $this->db->group_end();
        $this->db->where('status ', 0);
        $this->db->order_by('Blog_ID', 'DESC');
        $query = $this->db->get('blog',$limit, $offset);
        if ($query->result()){
            return $query->result();
        }else{
            return false;
        }

    }

    public function countFindBlogsModel($data)
    {
        $search_array = explode(" ", $data);
        $this->db->like('Blog_Title', $data);
        $this->db->group_start();
        foreach ($search_array as $params) {
            $this->db->or_like('Blog_Title', $params);
        }
        $this->db->group_end();
        $this->db->where('status ', 0);
        $this->db->order_by('Blog_ID', 'DESC');
        return $this->db->count_all_results('blog');
    }

    public function findNewsModel($data, $limit = 5, $offset = 0)
    {
        $search_array = explode(" ", $data);
        $this->db->like('News_Title', $data);
        $this->db->group_start();
        foreach ($search_array as $params) {
            $this->db->or_like('News_Title', $params);
        }
        $this->db->group_end();
        $this->db->where('status ', 0);
        $this->db->order_by('News_ID', 'DESC');
        $query = $this->db->get('news',$limit, $offset);
        if ($query->result()){
            return $query->result();
        }else{
            return false;
        }

    }

    public function countFindNewsModel($data)
    {
        $search_array = explode(" ", $data);
        $this->db->like('News_Title', $data);
        $this->db->group_start();
        foreach ($search_array as $params) {
            $this->db->or_like('News_Title', $params);
        }
        $this->db->group_end();
        $this->db->where('status ', 0);
        $this->db->order_by('News_ID', 'DESC');
        return $this->db->count_all_results('news');
    }
}