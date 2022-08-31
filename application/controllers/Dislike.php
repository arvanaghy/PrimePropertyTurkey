<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dislike extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Like_model');
        $this->load->library('user_agent');
    }

    public function blog($passed_url)
    {
        if ($passed_url) {
            $prev_dislike_blog = get_cookie('dislike_blog');
            if ($prev_dislike_blog!=null){
                $prev_blogDislike_list_array = explode(',',$prev_dislike_blog);
                if (in_array(strip_tags($passed_url),$prev_blogDislike_list_array)){
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                    return redirect($this->agent->referrer());
                }else{
                    $prev_dislike_blog = implode(',',$prev_blogDislike_list_array);
                }
            }
            $this->Like_model->doDislike('blog',strip_tags($passed_url));
            set_cookie('dislike_blog',$prev_dislike_blog.','.strip_tags($passed_url),'2592000');
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
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
    public function news($passed_url)
    {
        if ($passed_url) {
            $prev_dislike_news = get_cookie('dislike_news');
            if ($prev_dislike_news!=null){
                $prev_newsDislike_list_array = explode(',',$prev_dislike_news);
                if (in_array(strip_tags($passed_url),$prev_newsDislike_list_array)){
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                    if($this->agent->is_referral()){
                        return redirect($this->agent->referrer());
                    }else{
                        return redirect(base_url());
                    }
                }else{
                    $prev_dislike_news = implode(',',$prev_newsDislike_list_array);
                }
            }
            set_cookie('dislike_news',$prev_dislike_news.','.strip_tags($passed_url),'2592000');
            $this->Like_model->doDislike('news',strip_tags($passed_url));
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
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

    public function after_sale()
    {
        $prev_dislike = get_cookie('dislike_after_sale');
        if ($prev_dislike!=null and $prev_dislike='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }
        set_cookie('dislike_after_sale','True','2592000');
        $this->Like_model->doDislikeContent('after_sale');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        if($this->agent->is_referral()){
            return redirect($this->agent->referrer());
        }else{
            return redirect(base_url());
        }
    }
    public function area_guide()
    {
        $prev_dislike = get_cookie('dislike_area_guide');
        if ($prev_dislike!=null and $prev_dislike='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }
        set_cookie('dislike_area_guide','True','2592000');
        $this->Like_model->doDislikeContent('area_guide');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        if($this->agent->is_referral()){
            return redirect($this->agent->referrer());
        }else{
            return redirect(base_url());
        }
    }
    public function citizenship()
    {
        $prev_dislike = get_cookie('dislike_citizenship');
        if ($prev_dislike!=null and $prev_dislike='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }
        set_cookie('dislike_citizenship','True','2592000');
        $this->Like_model->doDislikeContent('citizenship');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        if($this->agent->is_referral()){
            return redirect($this->agent->referrer());
        }else{
            return redirect(base_url());
        }
    }
    public function buyer_guide()
    {
        $prev_dislike = get_cookie('dislike_buyer_guide');
        if ($prev_dislike!=null and $prev_dislike='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }
        set_cookie('dislike_buyer_guide','True','2592000');
        $this->Like_model->doDislikeContent('buyer_guide');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        if($this->agent->is_referral()){
            return redirect($this->agent->referrer());
        }else{
            return redirect(base_url());
        }
    }
    public function buying_online()
    {
        $prev_dislike = get_cookie('dislike_buying_online');
        if ($prev_dislike!=null and $prev_dislike='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }
        set_cookie('dislike_buying_online','True','2592000');
        $this->Like_model->doDislikeContent('buying_online');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        if($this->agent->is_referral()){
            return redirect($this->agent->referrer());
        }else{
            return redirect(base_url());
        }
    }
    public function privacy()
    {
        $prev_dislike = get_cookie('dislike_privacy');
        if ($prev_dislike!=null and $prev_dislike='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return redirect($this->agent->referrer());
        }
        set_cookie('dislike_privacy','True','2592000');
        $this->Like_model->doDislikeContent('privacy');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        if($this->agent->is_referral()){
            return redirect($this->agent->referrer());
        }else{
            return redirect(base_url());
        }
    }
    public function permit()
    {
        $prev_dislike = get_cookie('dislike_permit');
        if ($prev_dislike!=null and $prev_dislike='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }
        set_cookie('dislike_permit','True','2592000');
        $this->Like_model->doDislikeContent('permit');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        if($this->agent->is_referral()){
            return redirect($this->agent->referrer());
        }else{
            return redirect(base_url());
        }
    }
    public function extension()
    {
        $prev_dislike = get_cookie('dislike_extension');
        if ($prev_dislike!=null and $prev_dislike='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }
        set_cookie('dislike_extension','True','2592000');
        $this->Like_model->doDislikeContent('extension');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        if($this->agent->is_referral()){
            return redirect($this->agent->referrer());
        }else{
            return redirect(base_url());
        }
    }
    public function faq()
    {
        $prev_dislike = get_cookie('dislike_faq');
        if ($prev_dislike!=null and $prev_dislike='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            if($this->agent->is_referral()){
                return redirect($this->agent->referrer());
            }else{
                return redirect(base_url());
            }
        }
        set_cookie('dislike_faq','True','2592000');
        $this->Like_model->doDislikeContent('faq');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        if($this->agent->is_referral()){
            return redirect($this->agent->referrer());
        }else{
            return redirect(base_url());
        }
    }
}