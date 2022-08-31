<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy_policy extends CI_Controller {

    public function index()
    {
        $this->load->helper('like');
        $this->load->helper('geolocation_helper');
        $data['geolocation'] = fetch_geolocation();
        $this->load->view('web-site/Privacy_policy',$data);
    }
}
