<?php
defined('BASEPATH') or exit('No direct script access allowed');
class  Currency extends CI_Controller{
    public function set_session()
    {
        $this->load->library('user_agent');
        if($this->uri->segment('3')=="USD" or $this->uri->segment('3')=="TRY" or $this->uri->segment('3')=="EUR" or $this->uri->segment('3')=="GBP"){
            $this->session->set_userdata('currency', $this->uri->segment('3'));
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Currency changed successfully </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }
    }
}