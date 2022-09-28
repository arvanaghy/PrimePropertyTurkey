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

    public function blog($passed_url)
    {
        if ($passed_url) {
            $prev_dislike_blog = get_cookie('dislike_blog');
            if ($prev_dislike_blog != null) {
                $prev_blogDislike_list_array = explode(',', $prev_dislike_blog);
                if (in_array(strip_tags($passed_url), $prev_blogDislike_list_array)) {
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                    return $this->DislikeRefer();
                } else {
                    $prev_dislike_blog = implode(',', $prev_blogDislike_list_array);
                }
            }
            $this->Like_model->doDislike('blog', strip_tags($passed_url));
            set_cookie('dislike_blog', $prev_dislike_blog . ',' . strip_tags($passed_url), '2592000');
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            return $this->DislikeRefer();
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
            return $this->DislikeRefer();
        }
    }

    public function news($passed_url)
    {
        if ($passed_url) {
            $prev_dislike_news = get_cookie('dislike_news');
            if ($prev_dislike_news != null) {
                $prev_newsDislike_list_array = explode(',', $prev_dislike_news);
                if (in_array(strip_tags($passed_url), $prev_newsDislike_list_array)) {
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
                    return $this->DislikeRefer();
                } else {
                    $prev_dislike_news = implode(',', $prev_newsDislike_list_array);
                }
            }
            set_cookie('dislike_news', $prev_dislike_news . ',' . strip_tags($passed_url), '2592000');
            $this->Like_model->doDislike('news', strip_tags($passed_url));
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
            return $this->DislikeRefer();
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something went wrong </div>");
            return $this->DislikeRefer();
        }
    }

    public function after_sale()
    {
        $prev_dislike = get_cookie('dislike_after_sale');
        if ($prev_dislike != null and $prev_dislike = 'True') {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->DislikeRefer();
        }
        set_cookie('dislike_after_sale', 'True', '2592000');
        $this->Like_model->doDislikeContent('after_sale');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->DislikeRefer();
    }

    public function area_guide()
    {
        $prev_dislike = get_cookie('dislike_area_guide');
        if ($prev_dislike != null and $prev_dislike = 'True') {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->DislikeRefer();
        }
        set_cookie('dislike_area_guide', 'True', '2592000');
        $this->Like_model->doDislikeContent('area_guide');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->DislikeRefer();
    }

    public function citizenship()
    {
        $prev_dislike = get_cookie('dislike_citizenship');
        if ($prev_dislike != null and $prev_dislike = 'True') {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->DislikeRefer();
        }
        set_cookie('dislike_citizenship', 'True', '2592000');
        $this->Like_model->doDislikeContent('citizenship');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->DislikeRefer();
    }

    public function buyer_guide()
    {
        $prev_dislike = get_cookie('dislike_buyer_guide');
        if ($prev_dislike != null and $prev_dislike = 'True') {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->DislikeRefer();
        }
        set_cookie('dislike_buyer_guide', 'True', '2592000');
        $this->Like_model->doDislikeContent('buyer_guide');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->DislikeRefer();
    }

    public function buying_online()
    {
        $prev_dislike = get_cookie('dislike_buying_online');
        if ($prev_dislike != null and $prev_dislike = 'True') {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->DislikeRefer();
        }
        set_cookie('dislike_buying_online', 'True', '2592000');
        $this->Like_model->doDislikeContent('buying_online');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->DislikeRefer();
    }

    public function privacy()
    {
        $prev_dislike = get_cookie('dislike_privacy');
        if ($prev_dislike != null and $prev_dislike = 'True') {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->DislikeRefer();
        }
        set_cookie('dislike_privacy', 'True', '2592000');
        $this->Like_model->doDislikeContent('privacy');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->DislikeRefer();
    }

    public function permit()
    {
        $prev_dislike = get_cookie('dislike_permit');
        if ($prev_dislike != null and $prev_dislike = 'True') {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->DislikeRefer();
        }
        set_cookie('dislike_permit', 'True', '2592000');
        $this->Like_model->doDislikeContent('permit');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->DislikeRefer();
    }

    public function extension()
    {
        $prev_dislike = get_cookie('dislike_extension');
        if ($prev_dislike != null and $prev_dislike = 'True') {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->DislikeRefer();
        }
        set_cookie('dislike_extension', 'True', '2592000');
        $this->Like_model->doDislikeContent('extension');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->DislikeRefer();
    }

    public function faq()
    {
        $prev_dislike = get_cookie('dislike_faq');
        if ($prev_dislike != null and $prev_dislike = 'True') {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> You Voted This Blog Before </div>");
            return $this->DislikeRefer();
        }
        set_cookie('dislike_faq', 'True', '2592000');
        $this->Like_model->doDislikeContent('faq');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks To Share Your Point With US </div>");
        return $this->DislikeRefer();
    }
}