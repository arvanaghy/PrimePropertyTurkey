<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_register extends CI_Controller
{
    public function index()
    {
        $this->load->helper('geolocation_helper');
        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/User_register',$data);
    }
}