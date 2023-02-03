<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Replacement extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Replacement_Model');
    }

    public function index()
    {
        $data['blog_content']= $this->Replacement_Model->getBlogContent();
        foreach ($data['blog_content'] as $value){
            echo $value->Blog_ID."<Br />";
            $new_data = str_replace('Arial', 'Open Sans', $value->Blog_Content);
            $this->Replacement_Model->UpdateBlogContent($value->Blog_ID,$new_data);
        }
    }

}