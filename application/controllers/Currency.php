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
        $value_data = $this->input->post('send_value');
        if ($value_data != ''){
            if($value_data=="USD" or $value_data=="TRY" or $value_data=="EUR" or $value_data=="GBP") {
                echo json_encode(true);
                $this->session->set_userdata('currency', $value_data);
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Currency changed successfully </div>");
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
                echo json_encode(false);
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
            $this->CurrencyRefer();
        }
    }
}