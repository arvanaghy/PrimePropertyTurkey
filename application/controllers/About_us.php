<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About_us extends CI_Controller
{
    public function index()
    {
        $this->load->view('web-site/About_us');
    }
}