<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
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

    public function contact_us()
    {
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($this->form_validation->run('contact_us') != FALSE AND $captcha_response!='') {
            if ($this->reCaptcha_Curl($this->input->post('g-recaptcha-response'))){
                $data['name'] = strip_tags($this->input->post('info'));
                $data['email'] = strip_tags($this->input->post('email'));
                $data['phone'] = strip_tags($this->input->post('phone')['full']);
                if ($this->input->post('message')){
                    $data['message'] = strip_tags($this->input->post('message'));
                }else{
                    $data['message'] = 'undefined';
                }
                $this->load->model('Post_m');
                $result = $this->Post_m->contact_us($data);
                if ($result) {
                    $ReqIP = $this->fetchIP();
                    $ReqCity = $this->getGEOByIP($ReqIP)['city'];
                    $ReqCountry = $this->getGEOByIP($ReqIP)['country'];

                    $this->load->library('email');
                    $this->email->from('contact@primepropertyturkey.com', 'contact_us');
                    $this->email->to('primepropertiesturkey@gmail.com');
                    $this->email->bcc('arvanaghy@gmail.com');

                    $this->email->subject('New Enquire');
                    $message = "\r\n".
                        "FROM : " . $data['email'] ."\r\n".
                        "NAME : " . $data['name'] ."\r\n".
                        "PHONE : " . $data['phone'] ."\r\n".
                        "City : " . $ReqCity ."\r\n".
                        "Country : " . $ReqCountry ."\r\n".
                        "message : " . $data['message'] ."\r\n";

                    $this->email->message($message);
                    $this->email->send();

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
                        'source'=>'Contactus',
                        'city'=>$ReqCity,
                        'country'=>$ReqCountry,
                        'message'=>$data['message']
                    );

                    $this->Curl_send_post($post_data);
                    $this->mobileNotification($post_data);


                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b>" . $data['name'] . "</b> your message sent successfully </div>");
                    $this->session->set_flashdata('googleSuccess', "OK");
                    redirect($this->agent->referrer());

                } else {
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> unfortunately message <b>not</b> sent </div>");
                    redirect($this->agent->referrer());
                }
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Captcha is invalid </div>");
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        <br>
                                                        unfortunately message <b>not</b> sent </div>");
            redirect($this->agent->referrer());
        }
    }

    public function login()
    {
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($this->form_validation->run('login') != FALSE AND $captcha_response!='') {
            if ($this->reCaptcha_Curl($this->input->post('g-recaptcha-response'))){
                $data['password'] = strip_tags($this->input->post('password'));
                $data['email'] = strip_tags($this->input->post('email'));
                $this->load->model('Post_m');
                if ($this->Post_m->getUserType($data['email']) and $this->Post_m->getUserType($data['email'])->user_type == 1){
                    $result = $this->Post_m->login($data);
                    if($result){
                        $user_data_session = array('username'=>$result->email,'user_info'=>$result->fullname,'access_token'=>md5($result->id));
                        $this->session->set_userdata($user_data_session);
                        $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Dear ".$user_data_session['user_info']." Welcome.  </div>");
                        redirect(base_url() . 'User');
                    }else{
                        $this->session->unset_userdata('username','user_info','access_token');
                        $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Username Or Password Is Incorrect  </div>");
                        redirect(base_url() . 'User/UserLogin');
                    }
                }else{
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Your Account Validate With Google Please Try Google Sign in Button </div>");
                    redirect(base_url() . 'User/UserLogin');
                }
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Invalid Captcha  </div>");
                redirect(base_url() . 'User/UserLogin');
            }

            } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something Goes Wrong  </div>");
            redirect(base_url() . 'User/UserLogin');
        }
    }

    public function register()
    {

        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($this->form_validation->run('register') != FALSE and $captcha_response!='') {
            if ($this->reCaptcha_Curl($this->input->post('g-recaptcha-response'))){

                $data['phone'] = strip_tags($this->input->post('phone')['full']);
                $data['email'] = strip_tags($this->input->post('email'));
                $data['fullname'] = $this->input->post('info');
                $data['hashCode'] = "https://www.primepropertyturkey.com/Verification/userRegister/".sha1($this->input->post('email'));
                $data['password'] = sha1($this->input->post('password'));
                $data['status'] = 1;

                $this->load->model('Post_m');
                $result = $this->Post_m->register($data);
                if ($result){
                    $this->load->library('email');
                    $this->email->from('contact@primepropertyturkey.com', 'User Register Verification');
                    $this->email->to($data['email']);
                    $this->email->subject(' User Register Verification ' . $data['fullname']);
                    $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
                        "<br/>".
                        "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/base/logo-new.png'>
                    </div>".
                        "<br/>".
                        date('l jS \of F Y h:i:s A').
                        "<br/><br/>".
                        " Dear <b> " .$data['fullname'] . "</b> <br /> <br/>" .
                        " Thank you for Registration <BR /> <br/>" .
                        "Verification Link : <a href='".$data['hashCode']."' target='_blank'> " . $data['hashCode'] . " </a> <br/> <br/> <br/> " .
                        "Please click link to verify your account <br />" .
                        "This link expire after 24 hour , if in that period account not activated , you should register again  <br />" .
                        "</div>";
                    $this->email->set_mailtype("html");
                    $this->email->message($message);
                    $this->email->send();
                    $this->email->clear(TRUE);

                    $user_data_session = array('username'=>$data['email'],'user_info'=>$data['fullname'],'access_token'=>md5($result));
                    $this->session->set_userdata($user_data_session);
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'>
                                                            Dear <b>" . $data['fullname'] . "</b> your Sign UP successfully
                                                            <br>
                                                            Activation email was went to your email address 
                                                            </div>");
                    redirect(base_url() . 'User');
                }else{
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Your Registration Request Was Failed, Maybe This Email Used Before  </div>");
                    redirect(base_url() . 'User/UserRegister');
                }
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Wrong Captcha ! </div>");
                redirect(base_url() . 'User/UserRegister');
            }

            } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Something Went Wrong Please Try Again  </div>");
            redirect(base_url() . 'User/UserRegister');
        }
    }

    public function forget_password()
    {
        $this->load->library('form_validation');
        $captcha_response = trim($this->input->post('g-recaptcha-response'));

        if ($this->form_validation->run('forget_password') != FALSE and $captcha_response!='') {
            if ($this->reCaptcha_Curl($this->input->post('g-recaptcha-response'))){
                $data['email'] = $this->input->post('email');
                $this->load->model('Post_m');
                $result = $this->Post_m->forget_password($data);
                if ($result){
                    $resetLink = $this->Post_m->passwordReset($data);
                    $this->load->library('email');
                    $this->email->from('contact@primepropertyturkey.com', 'password Reset');
                    $this->email->to($data['email']);
                    $this->email->subject(' Password Reset ');
                    $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
                        "<br/>".
                        "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/base/logo-new.png'>
                    </div>".
                        "<br/>".
                        date('l jS \of F Y h:i:s A').
                        "<br/><br/>".
                        " Dear <b> " .$data['email'] . "</b> <br /> <br/>" .
                        "Your passWord Reset Link : <a href='".$resetLink."' target='_blank'> " . $resetLink . " </a> <br/> <br/> <br/> " .
                        "Please click link to reset your account password <br />" .
                        "This link expire after 24 hour  <br />" .
                        "</div>";
                    $this->email->set_mailtype("html");
                    $this->email->message($message);
                    $this->email->send();
                    $this->email->clear(TRUE);

                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> your password change link sent to your email </div>");
                    redirect(base_url());
                }else{

                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        
                                                        <br>
                                                        unfortunately Forget Password <b>failed</b>  </div>");
                }
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        
                                                        <br>
                                                        unfortunately Forget Password <b>failed</b>  </div>");
                redirect(base_url() . 'Forget_password');
            }

        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        
                                                        <br>
                                                        unfortunately Forget Password <b>failed</b>  </div>");
            redirect(base_url() . 'Forget_password');
        }
    }

    public function reset_password_submit()
    {
        $this->load->library('form_validation');
        $captcha = $this->input->post('captcha');
        $captcha_error_message = '';
        if ($this->session->userdata('captcha_word') != $captcha) {
            $captcha_error_message = 'Wrong Captcha';
        }
        if ($this->form_validation->run('reset_password') != FALSE and $this->session->userdata('captcha_word') == $captcha) {
            $data['password'] = strip_tags($this->input->post('password'));
            $data['hashCode'] = strip_tags($this->input->post('hashCode'));
            $this->load->model('Post_m');
            $this->Post_m->resetPasswordSubmit($data);
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'> your password changed succesfuly </div>");
            redirect(base_url() . 'Login');
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        " . $captcha_error_message . "
                                                        <br>
                                                        unfortunately <b>failed</b>  </div>");
            redirect(base_url() . 'Login');
        }
    }

    public function enquire()
    {
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($this->form_validation->run('enquire') != FALSE AND $captcha_response!='') {
            if ($this->reCaptcha_Curl($this->input->post('g-recaptcha-response'))){
                if ($this->input->post('reference_id')){
                    $reference_id = strip_tags($this->input->post('reference_id'));
                }else{
                    $reference_id = 'undefined';
                }
                $data['email'] = strip_tags($this->input->post('email'));
                $data['name'] = strip_tags($this->input->post('info'));
                $data['phone'] = strip_tags($this->input->post('phone')['full']);
                if ($this->input->post('budget')){
                    $data['budget_id'] = strip_tags($this->input->post('budget'));
                }else{
                    $data['budget_id'] = 'undefined';
                }
                if ($this->input->post('note')){
                    $data['note'] = strip_tags($this->input->post('note'));
                }else{
                    $data['note'] = 'undefined';
                }
                $data['reference_id'] = $reference_id;
                $data['ReqIP'] = $this->fetchIP();
                $data['ReqCity'] = $this->getGEOByIP($data['ReqIP'])['city'];
                $data['ReqCountry'] = $this->getGEOByIP($data['ReqIP'])['country'];

                if ( $data['budget_id'] != 'undefined'){
                    $this->load->model('Fetch_m');
                    $budget_data = $this->Fetch_m->fetchEnquiryFormValue('budget',$data['budget_id']);
                    $budget_value = $budget_data->value;
                }else{
                    $budget_value = 'undefined';
                }

                $this->load->model('Post_m');

                $result = $this->Post_m->enquire($data);
                if ($result){
                    $this->load->library('email');
                    $this->email->from('contact@primepropertyturkey.com', 'Enquire');
                    $this->email->to('primepropertiesturkey@gmail.com');
                    $this->email->bcc('arvanaghy@gmail.com');

                    $this->email->subject('New Enquire');
                    $message = "\r\n".
                        "FROM : " . $data['email'] ."\r\n".
                        "NAME : " . $data['name'] ."\r\n".
                        "PHONE : " . $data['phone'] ."\r\n".
                        "reference_id : " . $data['reference_id'] ."\r\n".
                        "BUDGET : " . $budget_value ."\r\n".
                        "NOTE : " . $data['note'] ."\r\n".
                        "city : " . $data['ReqCity'] ."\r\n".
                        "country : " . $data['ReqCountry'] ."\r\n";

                    $this->email->message($message);
                    $this->email->send();

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
                        'source'=>'Enquire',
                        'city'=>$data['ReqCity'],
                        'country'=>$data['ReqCountry'],
                        'reference'=>$data['reference_id'],
                        'budget'=>$budget_value,
                        'message'=>$data['note']
                    );

                    $this->Curl_send_post($post_data);
                    $this->mobileNotification($post_data);

                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Thank you for filling out our form. We have received your inquiry and our representative will get in touch with you within 24 hours  </div>");
                    $this->session->set_flashdata('googleSuccess', "OK");
                    redirect($this->agent->referrer());
                }else{
                    $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        <br>
                                                        unfortunately Enquire Request <b> NOT </b> submit </div>");
                    redirect($this->agent->referrer());
                }
            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> Captcha is Invalid </div>");
                redirect($this->agent->referrer());
            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        <br>
                                                        unfortunately Enquire Request <b> NOT </b> submit </div>");
            redirect($this->agent->referrer());
        }
    }

    public function Submit_Comment()
    {
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $captcha_response = trim($this->input->post('g-recaptcha-response'));
        if ($this->form_validation->run('comment') != FALSE AND $captcha_response!='') {
            if ($this->reCaptcha_Curl($this->input->post('g-recaptcha-response'))){
                $data = $this->input->post();
                $this->load->model('Post_m');
                unset($data['g-recaptcha-response']);
                $lets_post = array();
                foreach ($data as $key=>$value){
                    $lets_post[$key]=strip_tags($value);
                }
                $lets_post['status']='waiting';
                $this->Post_m->submitComment($lets_post);
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Dear <strong>". $data['info'] ."</strong> Thanks to Submit Your Comment. Your Comment Will Share After Admins Validation .  </div>");
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
                                                        <br>
                                                        unfortunately message <b>not</b> sent </div>");
            redirect($this->agent->referrer());
        }
    }

}