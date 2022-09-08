<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Video_model extends CI_Model
{
    public function fetchVideoByURL($data)
    {
        $this->db->where('url_slug',$data);
        $this->db->where('status',2);
        $query = $this->db->get('youtubeVideos');
        return $query->row();
    }

    public function fetchSideVideos($limit = '')
    {
        $this->db->where('status',2);
        $this->db->order_by('insertDate','DESC');
        $query = $this->db->get('youtubeVideos',$limit);
        return $query->result();
    }
}