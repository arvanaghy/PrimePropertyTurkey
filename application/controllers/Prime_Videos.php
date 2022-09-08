<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prime_Videos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Video_model');
    }

    public function index()
    {
        $data['results']= $this->Video_model->fetchSideVideos(0);
        $this->load->view('web-site/videos/index',$data);
    }

    public function details($passed_url ='')
    {
        $value = strip_tags($passed_url);
        $data['talks']= $this->Video_model->fetchSideVideos(4);
        $data['result']= $this->Video_model->fetchVideoByURL($value);
        $this->load->view('web-site/videos/detail',$data);
    }
}