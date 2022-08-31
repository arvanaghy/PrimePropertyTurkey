<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reserve extends CI_Controller
{
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

    public function Submit_reserve()
    {
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($this->form_validation->run('reserve') != FALSE AND $captcha_response!='') {

            if ($this->reCaptcha_Curl($this->input->post('g-recaptcha-response'))){
                $property_refID = $this->input->post('property_refID');
                $property_title = $this->input->post('property_title');
                $full_name = $this->input->post('full-name');
                $mail = $this->input->post('user-mail');
                $phone_number = $this->input->post('phone_number')['full'];
                $property_url = $this->input->post('property_url');

                $config['upload_path'] = './uploads/';
                $config['allowed_types'] = 'gif|jpg|png|pdf|doc';
                $config['max_size'] = 2048;
                $config['encrypt_name'] = True;

                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path']);
                }
                $this->load->library('upload', $config);
                $this->load->library('email');
                $full_path = null;
                if (!$this->upload->do_upload('user_file')) {
                    $has_passport = false;
                } else {
                    $has_passport = true;
                    $file_name = $this->upload->data()['file_name'];
                    $full_path = './uploads/' . $file_name;
                }
                $this->email->from('contact@primepropertyturkey.com', 'Property Reservation');
                $this->email->to($mail);
                $this->email->bcc('arvanaghy@gmail.com');
                $this->email->subject(' Property Reservation ' . $property_refID);
                $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
                    "<br/>".
                    "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/base/logo-new.png'>
                </div>".
                    "<br/>".
                    date('l jS \of F Y h:i:s A').
                    "<br/><br/>".
                    " Dear <b> " . $full_name . "</b> <br /> <br/>" .
                    " Thank you for you for taking the time to complete your Reservation Form Request. In the coming 24 hours, you can expect an email/phone call regarding the live quote for this property <BR /> <br/>" .
                    "Property Title : <b> " . $property_title . " </b> <br /> " .
                    "Reference Id : <a href='https://www.primepropertyturkey.com/properties/".$property_url."' target='_blank'> " . $property_refID . " </a> <br/> <br/> <br/> " .

                    " Please have a look at our Online <b><a href='https://www.primepropertyturkey.com/buyer_guide' target='_blank'> Buyer's Guide </a> </b> to explain how you can move forward online should you desire. <br />" .
                    " Thank you again for your inquiry and the opportunity to show you how we are 'different than the rest.'  <br />" .
                    "</div>";
                $this->email->set_mailtype("html");
                $this->email->message($message);
                $this->email->send();
                $this->email->clear(TRUE);

                $this->email->from('contact@primepropertyturkey.com', 'Property Reservation');
                $this->email->bcc('arvanaghy@gmail.com');
                $this->email->to('primepropertiesturkey@gmail.com');
                $this->email->subject(' Property Reservation ' . $property_refID);
                $ReqIP = $this->fetchIP();
                $ReqCity = $this->getGEOByIP($ReqIP)['city'];
                $ReqCountry = $this->getGEOByIP($ReqIP)['country'];

                $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
                    "<br/>".
                    "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/base/logo-new.png'>
                </div>".
                    "<br/>".
                    date('l jS \of F Y h:i:s A').
                    "<br/><br/>".
                    "Name : <b> " . $full_name . "</b> <br /> <br/>" .
                    "Phone : ".$phone_number." <br/>" .
                    "Email : ".$mail." <br/>" .
                    "City : ".$ReqCity." <br/>" .
                    "Country : ".$ReqCountry." <br/>" .
                    "Property Title : <b> " . $property_title . " </b> <br /> " .
                    "Reference Id : <a href='https://www.primepropertyturkey.com/properties/".$property_url."' target='_blank'> " . $property_refID . " </a> <br/> <br/> <br/> ".
                    "</div>";
                $this->email->set_mailtype("html");
                $this->email->message($message);
                if ($has_passport){
                    $this->email->attach($full_path);
                }
                $this->email->send();


                $full_name = $this->input->post('full-name');
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
                    'phone'=>$phone_number,
                    'email'=>$mail,
                    'source'=>'Reserve',
                    'city'=>$ReqCity,
                    'country'=>$ReqCountry,
                    'reference'=>$property_refID,
                );

                $this->mobileNotification($post_data);
                $this->Curl_send_post($post_data);

                if ($has_passport and file_exists($full_path)) {
                    unlink($full_path);
                }
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> <b>" . $full_name . "</b> your Reservation success   </div>");
                $this->session->set_flashdata('googleSuccess', "OK");

                redirect($this->agent->referrer());
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Captcha is invalid </div>");
                redirect($this->agent->referrer());
            }

            } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        " . "
                                                        <br>
                                                        unfortunately Reserve Request <b> NOT </b> submit </div>");
            redirect($this->agent->referrer());
        }
    }

}