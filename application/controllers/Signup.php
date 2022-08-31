<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signup extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Signup_model');
    }
    
    protected function mobileNotification($data_array){
        $message = '';
        foreach ($data_array as $key=>$value){
            $message .= "//".$key." : ".$value."//";
        }
        file_get_contents('https://wirepusher.com/send?id=YwoYmppjx&title=new Lead&message=' . $message);
        file_get_contents('https://wirepusher.com/send?id=TqhEmppye&title=new Lead&message=' . $message);
        file_get_contents('https://wirepusher.com/send?id=9rYSmpsHw&title=new Lead&message=' . $message);
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
        $this->load->helper('geolocation_helper');
        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/signup',$data);
    }
    public function submitSignup()
    {
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($this->form_validation->run('signup') != FALSE and $captcha_response!='') {
            if ($this->reCaptcha_Curl($this->input->post('g-recaptcha-response'))){
                $data['phone'] = strip_tags($this->input->post('phone')['full']);
                $data['email'] = strip_tags($this->input->post('email'));
                $data['full_name'] = $this->input->post('info');
                $data['hashCode'] = mt_rand(1111,9999);
                set_cookie('userSignupEmail',$data['email'],'2592000');
                set_cookie('userSignupPhone',$data['phone'],'2592000');
                set_cookie('userSignupName',$data['full_name'],'2592000');
                $result = $this->Signup_model->submitSignupRequest($data);
                if ($result){
                    $this->load->library('email');
                    $this->email->from('contact@primepropertyturkey.com', 'User Register Verification');
                    $this->email->to($data['email']);
                    $this->email->subject(' User Register Verification ' . $data['full_name']);
                    $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
                        "<br/>".
                        "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/base/logo-new.png'>
                    </div>".
                        "<br/>".
                        date('l jS \of F Y h:i:s A').
                        "<br/><br/>".
                        " Dear <b> " .$data['full_name'] . "</b> <br /> <br/>" .
                        " Thank you for Registration <BR /> <br/>" .
                        "Verification Code : <span style='color: blue;font-weight: bold'> " . $data['hashCode'] . " </a> <br/> <br/> <br/> " .
                        "Please Enter the verification code in the site <br />" .
                        "</div>";
                    $this->email->set_mailtype("html");
                    $this->email->message($message);
                    $this->email->send();
                    $this->email->clear(TRUE);


                    $ReqIP = $this->fetchIP();
                    $ReqCity = $this->getGEOByIP($ReqIP)['city'];
                    $ReqCountry = $this->getGEOByIP($ReqIP)['country'];

                    $this->email->from('contact@primepropertyturkey.com', 'User Register Verification');
                    $this->email->to('primepropertiesturkey@gmail.com');
                    $this->email->bcc('arvanaghy@gmail.com');
                    $this->email->subject(' Buyer Guide PDF ' . $data['full_name']);
                    $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
                        "<br/>".
                        "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/base/logo-new.png'>
                    </div>".
                        "<br/>".
                        date('l jS \of F Y h:i:s A').
                        "<br/><br/>".
                        " Name :  <b> " .$data['full_name'] . "</b> <br /> <br/>" .
                        " Email :  <b> " .$data['email'] . "</b> <br /> <br/>" .
                        " Phone :  <b> " .$data['phone'] . "</b> <br /> <br/>" .
                        " City :  <b> " .$ReqCity . "</b> <br /> <br/>" .
                        " Country :  <b> " .$ReqCountry . "</b> <br /> <br/>" .
                        "</div>";
                    $this->email->set_mailtype("html");
                    $this->email->message($message);
                    $this->email->send();
                    $this->email->clear(TRUE);

                    $full_name = $this->input->post('info');
                    $full_name_array = explode(' ',$full_name);
                    $first_name = $full_name_array[0];
                    $full_name_array[0]='';
                    $last_name = '';
                    foreach ($full_name_array as $part){
                        $last_name .= $part;
                        $last_name .= ' ';
                    }

                    $post_data = array(
                        'first_name'=> $first_name,
                        'second_name'=>$last_name,
                        'phone'=>$data['phone'],
                        'email'=>$data['email'],
                        'source'=>'Buyers Guide',
                        'city'=>$ReqCity,
                        'country'=>$ReqCountry,
                        'reference'=>'',
                    );

                    $this->Curl_send_post($post_data);
                    $this->mobileNotification($post_data);

                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'>
                                                           Dear  <b>" . $data['full_name'] . "</b> your Sign UP successfully
                                                            <br>
                                                            You can download your File 
                                                            </div>");
                    redirect(base_url() . 'Signup/Verification/'.$data['email']);
                }else{
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        
                                                        <br>
                                                        unfortunately Sign Up <b>failed</b>  </div>");
                    redirect(base_url() . 'Signup');
                }
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        
                                                        <br>
                                                        unfortunately Sign Up <b>failed</b>  </div>");
                redirect(base_url() . 'Signup');
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        
                                                        <br>
                                                        unfortunately Sign Up <b>failed</b>  </div>");
            redirect(base_url() . 'Signup');
        }
    }
    public function Verification($passed_url='')
    {
        if ($passed_url){
            $data = array(
                'title'=> 'Verification',
                'email'=>$passed_url
            );
            $this->load->view('web-site/verification',$data);
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        <br>
                                                        unfortunately Sign Up <b>failed</b>  </div>");
            redirect(base_url() . 'Signup');
        }

    }
    public function SignupVerification()
    {
        $this->load->library('form_validation');
        if ($this->form_validation->run('signup_verification') != FALSE){
            $data['user_email'] = strip_tags($this->input->post('user_email'));
            $data['vf_code'] = strip_tags($this->input->post('vf_code'));
            $result = $this->Signup_model->checkSignupVerification($data);
            if ($result){
                header("Content-type:application/pdf");
                header("Content-Disposition:attachment;filename=PrimePropertyTurkey_buyersGuide.pdf");
                readfile('https://www.primepropertyturkey.com/assets/web-site/pdfs/finalimsi4.pdf');
                flush();
                redirect(base_url());

            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                          <br>
                                                        unfortunately Sign Up <b>failed</b>  </div>");
                redirect(base_url() . 'Signup');
            }

        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        unfortunately Sign Up <b>failed</b>  </div>");
            redirect(base_url() . 'Signup');
        }
    }
}