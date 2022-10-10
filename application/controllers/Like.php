<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Like extends CI_Controller
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Like_model');
        $this->load->library('user_agent');
    }
    protected function likeRefer(){
        $url = $this->agent->referrer();
        $pattern = "|^https://www.primepropertyturkey.com.*|i";
        if (preg_match($pattern, $url)):
            redirect($url);
        else:
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
            endif;
    }

    public function blog()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != ''){
            $prev_like_blog = get_cookie('like_blog');
            if ($prev_like_blog!=null){
                $prev_blogLike_list_array = explode(',',$prev_like_blog);
                if (in_array(strip_tags($value_data),$prev_blogLike_list_array)){
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                    echo json_encode(false);
                }else{
                    $this->Like_model->doLike('blog',strip_tags($value_data));
                    set_cookie('like_blog',$prev_like_blog.','.strip_tags($value_data),'2592000');
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
                    echo json_encode(true);
                }
            }else{
                $this->Like_model->doLike('blog',strip_tags($value_data));
                set_cookie('like_blog',$prev_like_blog.','.strip_tags($value_data),'2592000');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
                echo json_encode(true);
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
            return $this->likeRefer();
        }
    }
    public function news()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != ''){
            $prev_like_blog = get_cookie('like_news');
            if ($prev_like_blog!=null){
                $prev_blogLike_list_array = explode(',',$prev_like_blog);
                if (in_array(strip_tags($value_data),$prev_blogLike_list_array)){
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This News Before </div>");
                    echo json_encode(false);
                }else{
                    $this->Like_model->doLike('news',strip_tags($value_data));
                    set_cookie('like_news',$prev_like_blog.','.strip_tags($value_data),'2592000');
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
                    echo json_encode(true);
                }
            }else{
                $this->Like_model->doLike('news',strip_tags($value_data));
                set_cookie('like_news',$prev_like_blog.','.strip_tags($value_data),'2592000');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
                echo json_encode(true);
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
            return $this->likeRefer();
        }
    }

    public function after_sale()
    {
        $prev_like = get_cookie('like_after_sale');
        if ($prev_like!=null and $prev_like=='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->likeRefer();
        }
        set_cookie('like_after_sale','True','2592000');
        $this->Like_model->doLikeContent('after_sale');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->likeRefer();
    }
    public function area_guide()
    {
        $prev_like = get_cookie('like_area_guide');
        if ($prev_like!=null and $prev_like=='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->likeRefer();
        }
        set_cookie('like_area_guide','True','2592000');
        $this->Like_model->doLikeContent('area_guide');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->likeRefer();
    }
    public function citizenship()
    {
        $prev_like = get_cookie('like_citizenship');
        if ($prev_like!=null and $prev_like=='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->likeRefer();
        }
        set_cookie('like_citizenship','True','2592000');
        $this->Like_model->doLikeContent('citizenship');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->likeRefer();
    }
    public function buyer_guide()
    {
        $prev_like = get_cookie('like_buyer_guide');
        if ($prev_like!=null and $prev_like=='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->likeRefer();
        }
        set_cookie('like_buyer_guide','True','2592000');
        $this->Like_model->doLikeContent('buyer_guide');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->likeRefer();
    }
    public function buying_online()
    {
        $prev_like = get_cookie('like_buying_online');
        if ($prev_like!=null and $prev_like=='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->likeRefer();
        }
        set_cookie('like_buying_online','True','2592000');
        $this->Like_model->doLikeContent('buying_online');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->likeRefer();
    }
    public function privacy()
    {
        $prev_like = get_cookie('like_privacy');
        if ($prev_like!=null and $prev_like=='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->likeRefer();
        }
        set_cookie('like_privacy','True','2592000');
        $this->Like_model->doLikeContent('privacy');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->likeRefer();
    }
    public function permit()
    {
        $prev_like = get_cookie('like_permit');
        if ($prev_like!=null and $prev_like=='True'){
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->likeRefer();
        }
        set_cookie('like_permit','True','2592000');
        $this->Like_model->doLikeContent('permit');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->likeRefer();
    }
    public function extension()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_like = get_cookie('like_extension');
            if ($prev_like!=null and $prev_like=='True'){
                echo json_encode(false);
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            }else{
                echo json_encode(true);
                set_cookie('like_extension','True','2592000');
                $this->Like_model->doLikeContent('extension');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->likeRefer();
        }

    }
    public function faq()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_like = get_cookie('like_faq');
            if ($prev_like!=null and $prev_like=='True'){
                echo json_encode(false);
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            }else{
                echo json_encode(true);
                set_cookie('like_faq','True','2592000');
                $this->Like_model->doLikeContent('faq');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->likeRefer();
        }
    }
}