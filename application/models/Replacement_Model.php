<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Replacement_Model extends CI_Model
{
    public function getBlogContent(){
        $this->db->select('Blog_Content,Blog_ID');
        $this->db->from('blog');
        $this->db->order_by("Blog_ID", "DESC");
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    public function UpdateBlogContent($id,$content)
    {
        $this->db->set('Blog_Content', $content);
        $this->db->where('Blog_ID', $id);
        $this->db->update('blog');
    }

}