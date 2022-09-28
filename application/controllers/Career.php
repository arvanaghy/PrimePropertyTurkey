<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Career extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('geolocation_helper','form'));
    }
    protected function mobileNotification($data_array){
        $message = '';
        foreach ($data_array as $key=>$value){
            $message .= "//".$key." : ".$value."//";
        }
        file_get_contents('https://wirepusher.com/send?id=YwoYmppjx&title=Job REQUEST&message=' . $message);
        file_get_contents('https://wirepusher.com/send?id=TqhEmppye&title=Job REQUEST&message=' . $message);
        file_get_contents('https://wirepusher.com/send?id=9rYSmpsHw&title=Job REQUEST&message=' . $message);
    }
    protected function reCaptcha_Curl($response): bool
    {
        $key_secret = "6Leb_6MgAAAAAGyJYtDI_NHJ15lt3qel0s44K_kP";
        $check = array(
            'secret'=> $key_secret,
            'response'=> $response
        );
        $start_process = curl_init();
        curl_setopt($start_process,CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($start_process,CURLOPT_POST,true);
        curl_setopt($start_process,CURLOPT_POSTFIELDS,http_build_query($check));
        curl_setopt($start_process,CURLOPT_SSL_VERIFYPEER,true);
        curl_setopt($start_process,CURLOPT_RETURNTRANSFER,true);
        $receive_data = curl_exec($start_process);
        $final_result = json_decode($receive_data,true);
        if ($final_result['success']){
            return true;
        }
        return false;
    }

    public function index()
    {
        $data['geolocation']= fetch_geolocation();
        $this->load->view('web-site/Career',$data);
    }

    public function SubmitForm()
    {
        $this->load->library(array('form_validation','user_agent'));
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($this->form_validation->run('Career') != FALSE AND $captcha_response!='') {
            if ($this->reCaptcha_Curl($this->input->post('g-recaptcha-response'))){
                $data = $this->input->post();
                $this->load->model('Post_m');
                unset($data['g-recaptcha-response']);
                unset($data['phone_number']);
                $lets_post = array();
                foreach ($data as $key=>$value){
                    $lets_post[$key]=strip_tags($value);
                }
                if ($this->input->post('phone_number')['full']){
                    $lets_post['phone_number'] = strip_tags($this->input->post('phone_number')['full']);
                }
                $this->mobileNotification($lets_post);
                $config['upload_path']          = './uploads/Career-Cvs/';
                $config['allowed_types']        = 'jpg|png|pdf|doc';
                $config['max_size']             = 5000;
                $config['remove_spaces']        = TRUE;
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('user_file'))
                {
                    $lets_post['CV']= null;
                }else{
                    $lets_post['CV'] = $this->upload->data()['file_name'];
                }
                $lets_post['status'] = 'waiting';
                $this->Post_m->submitCareer($lets_post);
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thanks to fill the form , WE will Contact With You as soon as Possible</div>");
                redirect($this->agent->referrer());
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Some Thing Went Wrong</div>");
            if ($this->agent->is_referral()){
                redirect($this->agent->referrer());
            }else{
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
        }
    }
}