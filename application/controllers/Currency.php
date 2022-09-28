<?php
defined('BASEPATH') or exit('No direct script access allowed');
class  Currency extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->library('user_agent');
    }
    protected function CurrencyRefer(){
        $url = $this->agent->referrer();
        $pattern = "|^https://www.primepropertyturkey.com.*|i";
        if (preg_match($pattern, $url)):
            redirect($url);
        else:
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        endif;
    }

    public function set_session()
    {
        $this->load->library('user_agent');
        if($this->uri->segment('3')=="USD" or $this->uri->segment('3')=="TRY" or $this->uri->segment('3')=="EUR" or $this->uri->segment('3')=="GBP"){
            $this->session->set_userdata('currency', $this->uri->segment('3'));
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Currency changed successfully </div>");
            $this->CurrencyRefer();
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
            $this->CurrencyRefer();
        }
    }
}