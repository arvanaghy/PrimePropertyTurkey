<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Repair_model extends CI_Model
{
    public function blog_urls()
    {
        $this->db->select('Blog_ID,url_slug');
        $query = $this->db->get('blog');
        if ($query->result()) {
            return $query->result();
        } else {
            return False;
        }
    }

    public function update_blog_url($id,$url)
    {
        $this->db->where('Blog_ID',$id);
        $this->db->set('url_slug',$url);
        $this->db->update('blog');
    }
}