<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Frequently_asked_questions_faq extends CI_Controller
{
    public function index()
    {
        $this->load->helper('like');
        $this->load->helper('geolocation_helper');
        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/Frequently_asked_questions_faq',$data);
    }
}