<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dislike extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Like_model');
        $this->load->library('user_agent');
    }
    protected function DislikeRefer()
    {
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
            $prev_like_blog = get_cookie('dislike_blog');
            if ($prev_like_blog!=null){
                $prev_blogLike_list_array = explode(',',$prev_like_blog);
                if (in_array(strip_tags($value_data),$prev_blogLike_list_array)){
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                    echo json_encode(false);
                }else{
                    $this->Like_model->doDislike('blog',strip_tags($value_data));
                    set_cookie('dislike_blog',$prev_like_blog.','.strip_tags($value_data),'2592000');
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
                    echo json_encode(true);
                }
            }else{
                $this->Like_model->doDislike('blog',strip_tags($value_data));
                set_cookie('dislike_blog',$prev_like_blog.','.strip_tags($value_data),'2592000');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
                echo json_encode(true);
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
            return $this->DislikeRefer();
        }
    }

    public function news()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != ''){
            $prev_like_blog = get_cookie('dislike_news');
            if ($prev_like_blog!=null){
                $prev_blogLike_list_array = explode(',',$prev_like_blog);
                if (in_array(strip_tags($value_data),$prev_blogLike_list_array)){
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This News Before </div>");
                    echo json_encode(false);
                }else{
                    $this->Like_model->doDislike('news',strip_tags($value_data));
                    set_cookie('dislike_news',$prev_like_blog.','.strip_tags($value_data),'2592000');
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
                    echo json_encode(true);
                }
            }else{
                $this->Like_model->doDislike('news',strip_tags($value_data));
                set_cookie('dislike_news',$prev_like_blog.','.strip_tags($value_data),'2592000');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
                echo json_encode(true);
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
            return $this->DislikeRefer();
        }
    }

    public function buying_online()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_dislike = get_cookie('dislike_buying_online');
            if ($prev_dislike != null and $prev_dislike = 'True') {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                echo json_encode(false);
            } else {
                echo json_encode(true);
                set_cookie('dislike_buying_online', 'True', '2592000');
                $this->Like_model->doDislikeContent('buying_online');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->DislikeRefer();
        }
    }

    public function after_sale()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_dislike = get_cookie('dislike_after_sale');
            if ($prev_dislike != null and $prev_dislike = 'True') {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                echo json_encode(false);
            } else {
                echo json_encode(true);
                set_cookie('dislike_after_sale', 'True', '2592000');
                $this->Like_model->doDislikeContent('after_sale');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->DislikeRefer();
        }
    }

    public function area_guide()
    {

        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_dislike = get_cookie('dislike_area_guide');
            if ($prev_dislike != null and $prev_dislike = 'True') {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                echo json_encode(false);
            } else {
                echo json_encode(true);
                set_cookie('dislike_area_guide', 'True', '2592000');
                $this->Like_model->doDislikeContent('area_guide');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->DislikeRefer();
        }

    }

    public function buyer_guide()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_dislike = get_cookie('dislike_buyer_guide');
            if ($prev_dislike != null and $prev_dislike = 'True') {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                echo json_encode(false);
            } else {
                echo json_encode(true);
                set_cookie('dislike_buyer_guide', 'True', '2592000');
                $this->Like_model->doDislikeContent('buyer_guide');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->DislikeRefer();
        }

    }

    public function citizenship()
    {

        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_dislike = get_cookie('dislike_citizenship');
            if ($prev_dislike != null and $prev_dislike = 'True') {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                echo json_encode(false);
            } else {
                echo json_encode(true);
                set_cookie('dislike_citizenship', 'True', '2592000');
                $this->Like_model->doDislikeContent('citizenship');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->DislikeRefer();
        }

    }

    public function permit()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_dislike = get_cookie('dislike_permit');
            if ($prev_dislike != null and $prev_dislike = 'True') {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                echo json_encode(false);
            } else {
                echo json_encode(true);
                set_cookie('dislike_permit', 'True', '2592000');
                $this->Like_model->doDislikeContent('permit');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->DislikeRefer();
        }
    }

    public function extension()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_dislike = get_cookie('dislike_extension');
            if ($prev_dislike != null and $prev_dislike = 'True') {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                echo json_encode(false);
            } else {
                echo json_encode(true);
                set_cookie('dislike_extension', 'True', '2592000');
                $this->Like_model->doDislikeContent('extension');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->DislikeRefer();
        }
    }

    public function faq()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_dislike = get_cookie('dislike_faq');
            if ($prev_dislike != null and $prev_dislike = 'True') {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                echo json_encode(false);
            } else {
                echo json_encode(true);
                set_cookie('dislike_faq', 'True', '2592000');
                $this->Like_model->doDislikeContent('faq');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->DislikeRefer();
        }
    }

    public function privacy()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $prev_dislike = get_cookie('dislike_privacy');
            if ($prev_dislike != null and $prev_dislike = 'True') {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                echo json_encode(false);
            } else {
                echo json_encode(true);
                set_cookie('dislike_privacy', 'True', '2592000');
                $this->Like_model->doDislikeContent('privacy');
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went Wrong </div>");
            return $this->DislikeRefer();
        }
    }
}