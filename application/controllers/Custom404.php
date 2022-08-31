<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Custom404 extends CI_Controller
{
    public function index()
    {
        $this->load->view('web-site/Custom404');
    }
}