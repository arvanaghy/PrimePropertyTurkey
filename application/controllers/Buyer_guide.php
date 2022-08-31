<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Buyer_guide extends CI_Controller
{
    public function index()
    {
        $this->load->helper('like');
        $this->load->view('web-site/Buyer_guide');
    }
}