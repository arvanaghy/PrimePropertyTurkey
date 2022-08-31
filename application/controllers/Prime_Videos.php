<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Prime_Videos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function details($passed_url)
    {
        $value = strip_tags($passed_url);
        $this->load->model('Video_model');
        $data['talks']= $this->Video_model->fetchSideVideos(1);
        $data['walks']= $this->Video_model->fetchSideVideos(2);
        $data['result']= $this->Video_model->fetchVideoByURL($value);
        $this->load->view('web-site/videos/detail',$data);
    }
}