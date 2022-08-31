<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buying_online extends CI_Controller
{
    public function index()
    {
        $this->load->helper('like');
        $this->load->helper('geolocation_helper');
        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/Buying_online',$data);
    }
}