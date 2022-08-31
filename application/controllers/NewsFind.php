<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewsFind extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    protected function findNews($data){
        $this->load->model('Find_Model');
        return $this->Find_Model->findNewsModel($data);
    }

    public function index()
    {
        $searchWord = strip_tags($this->input->post('searchWord'));
        if ($searchWord){
            $this->session->set_userdata('NewsSearchWord',$searchWord);
            $data['result']= $this->findNews($this->session->userdata('NewsSearchWord'));
        }elseif($this->session->has_userdata('NewsSearchWord')){
            $data['result']= $this->findNews($this->session->userdata('NewsSearchWord'));

        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Access IS Denied </div>");
            redirect(base_url());
        }

    }
}