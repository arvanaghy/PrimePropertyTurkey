<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reset_Password extends CI_Controller
{
    public function index()
    {
        $data = array(
            'title'=> 'Reset Password'
        );
        $this->load->helper('captcha');
        $cap = create_captcha();
        $data['captcha_image'] =  $cap['image'];
        $this->session->set_userdata('captcha_word',$cap['word']);
        $this->load->view('web-site/reset_password',$data);
    }
}