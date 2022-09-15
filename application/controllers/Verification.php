<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verification extends CI_Controller
{
    public function userRegister($passedUrl='')
    {
        if ($passedUrl){
            $this->load->model('Post_m');
            $result = $this->Post_m->verification(strip_tags($passedUrl));
            if ($result){
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> User </b> your account verify successfully </div>");
                redirect(base_url()."User/UserLogin");
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'>Dear <b> User </b> your account verification casus some Error </div>");
                redirect(base_url()."User/UserRegister");
            }
        }
    }
    public function passwordReset($passedUrl='')
    {
        if ($passedUrl){
            $data = array(
                'title'=> 'Reset Password'
            );
            $this->load->helper('captcha');
            $cap = create_captcha();
            $data['captcha_image'] =  $cap['image'];
            $this->session->set_userdata('captcha_word',$cap['word']);
                $data['hashCode'] = $passedUrl;
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> User </b> please Change your password </div>");
                $this->load->view('web-site/reset_password',$data);
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'>Dear <b> User </b> your password change causes some Error </div>");
                redirect(base_url());
            }
        }

}