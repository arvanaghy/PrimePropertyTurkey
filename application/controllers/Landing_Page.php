<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_Page extends CI_Controller
{
    protected function mobileNotification($data_array){
        $message = '';
        foreach ($data_array as $key=>$value){
            $message .= "//".$key." : ".$value."//";
        }
        file_get_contents('https://wirepusher.com/send?id=YwoYmppjx&title=landing page&message=' . $message);
        file_get_contents('https://wirepusher.com/send?id=TqhEmppye&title=landing page&message=' . $message);
        file_get_contents('https://wirepusher.com/send?id=9rYSmpsHw&title=landing page&message=' . $message);
    }
    protected function Curl_send_post($post_data){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,"https://www.primepropertyturkey.com/crm/Api");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_exec($ch);
        curl_close ($ch);
    }
    protected function fetchIP(){
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    protected function getGEOByIP($ip){
        $ip_data = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        $result= array();
        if ($ip_data && $ip_data->geoplugin_countryName != null) {
            $result['country'] = $ip_data->geoplugin_countryName;
            $result['city'] = $ip_data->geoplugin_city;
        }
        return $result;
    }
    public function index()
    {
        $this->load->view('landing-page/landing-page');
    }
    public function submitContactUSForm()
    {
        $data = array();
        $full_name = $this->input->post('contactus_info');
        $data['contactus_email'] = $this->input->post('contactus_email');
        $data['contactus_phone'] = $this->input->post('contactus_phone');
        $data['contactus_budget'] = $this->input->post('contactus_budget');
        $full_name_array = explode(' ',$full_name);
        $data['first_name'] = $full_name_array[0];
        $full_name_array[0]='';
        $last_name = '';
        foreach ($full_name_array as $part){
            $last_name .= $part;
            $last_name .= ' ';
        }
        $data['last_name']=$last_name;
        $data['ReqIP'] = $this->fetchIP();
        $data['ReqCity'] = $this->getGEOByIP($data['ReqIP'])['city'];
        $data['ReqCountry'] = $this->getGEOByIP($data['ReqIP'])['country'];
        $post_data = array(
            'name'=>null,
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'phone'=>$data['contactus_phone'],
            'email'=>$data['contactus_email'],
            'budget'=>$data['contactus_budget'],
            'source'=>'landing_page',
            'city'=>$data['ReqCity'],
            'country'=>$data['ReqCountry'],
            'message'=>''
        );
        $this->Curl_send_post($post_data);
        $this->mobileNotification($post_data);
        $this->load->library('email');
        $this->email->from('contact@primepropertyturkey.com', 'landing_page');
        $this->email->to('primepropertiesturkey@gmail.com');
        $this->email->bcc('arvanaghy@gmail.com');
        $this->email->subject('New Enquire');
        $message = "\r\n".
            "FROM : " . $data['contactus_email'] ."\r\n".
            "NAME : " . $full_name ."\r\n".
            "PHONE : " . $data['contactus_phone'] ."\r\n".
            "City : " . $data['ReqCity'] ."\r\n".
            "Country : " . $data['ReqCountry'] ."\r\n".
            "message : " . '' ."\r\n";

        $this->email->message($message);
        $this->email->send();
        $this->email->clear(TRUE);
        $this->load->view('landing-page/success');
    }
    public function B_submitContactUSForm()
    {
        $full_name = $this->input->post('contact_name');
        $data['contactus_email'] = $this->input->post('contact_mail');
        $data['contactus_phone'] = $this->input->post('contact_phone');
        $data['contact_message'] = $this->input->post('contact_message');
        $data['contact_budget'] = $this->input->post('contact_budget');
        $full_name_array = explode(' ',$full_name);
        $data['first_name'] = $full_name_array[0];
        $full_name_array[0]='';
        $last_name = '';
        foreach ($full_name_array as $part){
            $last_name .= $part;
            $last_name .= ' ';
        }
        $data['last_name']=$last_name;
        $data['ReqIP'] = $this->fetchIP();
        $data['ReqCity'] = $this->getGEOByIP($data['ReqIP'])['city'];
        $data['ReqCountry'] = $this->getGEOByIP($data['ReqIP'])['country'];
        $post_data = array(
            'name'=>null,
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'phone'=>$data['contactus_phone'],
            'email'=>$data['contactus_email'],
            'budget'=>$data['contact_budget'],
            'source'=>'landing_page_c',
            'city'=>$data['ReqCity'],
            'country'=>$data['ReqCountry'],
            'message'=>$data['contact_message']
        );
        $this->Curl_send_post($post_data);
        $this->mobileNotification($post_data);
        $this->load->library('email');
        $this->email->from('contact@primepropertyturkey.com', 'landing_page');
        $this->email->to('primepropertiesturkey@gmail.com');
        $this->email->bcc('arvanaghy@gmail.com');
        $this->email->subject('New Enquire landing page');
        $message = "\r\n".
            "FROM : " . $data['contactus_email'] ."\r\n".
            "NAME : " . $full_name ."\r\n".
            "PHONE : " . $data['contactus_phone'] ."\r\n".
            "City : " . $data['ReqCity'] ."\r\n".
            "Country : " . $data['ReqCountry'] ."\r\n".
            "message : " . $data['contact_message'] ."\r\n";
        $this->email->message($message);
        $this->email->send();
        $this->email->clear(TRUE);
        $this->load->view('landing-page/success');
    }
}