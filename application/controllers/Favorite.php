<?php
defined('BASEPATH') or exit('No direct script access allowed');
class  Favorite extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
    }
    public function set_favorite()
    {
        if (!empty($this->uri->segment('3'))){
            $prev_favorite_list = get_cookie('favorite');
            if ($prev_favorite_list!=null){
                $prev_favorite_list_array = explode(',',$prev_favorite_list);
                if (in_array($this->uri->segment('3'),$prev_favorite_list_array)){
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Property already in list </div>");
                    return redirect($this->agent->referrer());
                }else{
                    $prev_favorite_list = implode(',',$prev_favorite_list_array);
                }
            }
            set_cookie('favorite',$prev_favorite_list.','.$this->uri->segment('3'),'2592000');
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Property added to favorite list successfully </div>");
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
    public function del_favorite()
    {
        if (!empty($this->uri->segment('3'))){
            $prev_favorite_list = get_cookie('favorite');
            if ($prev_favorite_list!=null){
                $prev_favorite_list_array = explode(',',$prev_favorite_list);
                if (($key = array_search($this->uri->segment('3'), $prev_favorite_list_array)) !== false) {
                    unset($prev_favorite_list_array[$key]);
                }
                $prev_favorite_list = implode(',',$prev_favorite_list_array);
            }
            set_cookie('favorite',$prev_favorite_list,'2592000');
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Property remove from favorite list successfully </div>");
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