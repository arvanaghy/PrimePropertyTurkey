<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ru_PV extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Video_model');
    }

    public function index()
    {
        $data['results']= $this->Video_model->fetchSideVideosRu(0);
        if ($data['results']){
            $this->load->view('web-site/ru/videos/index',$data);
        }else{
            $this->output->set_status_header('404');
            $this->load->view('web-site/ru/Custom404');
        }
    }

    public function details($passed_url ='')
    {
        $value = strip_tags(urldecode($passed_url));
        $data['talks']= $this->Video_model->fetchSideVideosRU(4);
        $data['result']= $this->Video_model->fetchVideoByURLRU($value);
        if ($data['result']){
            $this->load->view('web-site/ru/videos/detail',$data);
        }else{
            $this->output->set_status_header('404');
            $this->load->view('web-site/ru/Custom404');
        }
    }
}