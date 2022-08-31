<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forget_password extends CI_Controller
{
    public function index()
    {
        $this->load->view('web-site/Forget_password');
    }
}