<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    protected function checkUser(){
        if ($this->session->has_userdata('username') and $this->session->has_userdata('user_info') and $this->session->has_userdata('access_token')){
            return true;
        }
        return false;
    }
    protected function createWebp($source, $file_name){

        header('Content-Type: image/WebP');
        $name = pathinfo($file_name, PATHINFO_FILENAME);
        $source_image = imagecreatefromjpeg($source.$file_name);
        imagepalettetotruecolor($source_image);
        imagealphablending($source_image, true);
        imagesavealpha($source_image, true);

        $output = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/resales/webps/';

        imagewebp($source_image,$output.$name.".webp",80);
        imagedestroy($source_image);
    }
    protected function CreateWaterMarkImage($source,$filename){
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/resales/watermark/';
        if (!is_dir($target_path)) {
            mkdir($target_path, 0777, TRUE);
        }
        $this->load->library('image_lib');
        $config['source_image'] = $source.$filename;
        $config['new_image'] = $target_path;
        $config['wm_type'] = 'overlay';
        $config['wm_overlay_path'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/base/over.png';
        $config['wm_opacity'] = '100';
        $config['wm_vrt_alignment'] = 'bottom';
        $config['wm_hor_alignment'] = 'center';
        $config['wm_padding'] = '0';
        $this->image_lib->initialize($config);
        $this->image_lib->watermark();
        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
        $this->createWebp($target_path,$filename);

    }
    protected function CreateResizedImage($source, $file_name){
        $filename = $source.$file_name;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/resales/resized/';

        if (!is_dir($target_path)) {
            mkdir($target_path, 0777, TRUE);
        }

        $this->load->library('image_lib');

        $config_manIP = array(
            'image_library' => 'gd2',
            'source_image' => $filename,
            'new_image' => $target_path,
            'maintain_ratio' => False,
            'width' => 1200,
            'height' => 720
        );
        $this->image_lib->clear();
        $this->image_lib->initialize($config_manIP);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->CreateWaterMarkImage('./assets/web-site/images/resales/resized/',$file_name);
    }
    protected function uploadGalleryImages($files){

        $config['upload_path']          = './assets/web-site/images/resales/original/';
        $config['allowed_types']        = 'jpg';
        $config['max_size']             = 3000;
        $config['max_width']            = 1200;
        $config['max_height']           = 720;
        $config['remove_spaces']        = TRUE;

        $filenames = array();
        foreach ($files['name'] as $key => $image) {
            $_FILES['property_images[]']['name']= $files['name'][$key];
            $_FILES['property_images[]']['type']= $files['type'][$key];
            $_FILES['property_images[]']['tmp_name']= $files['tmp_name'][$key];
            $_FILES['property_images[]']['error']= $files['error'][$key];
            $_FILES['property_images[]']['size']= $files['size'][$key];

            $config['file_name'] = $image;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('property_images[]')) {
                $filename = $this->upload->data()['file_name'];
                array_push($filenames, $filename);
                $this->CreateResizedImage('./assets/web-site/images/resales/original/',$filename);
            } else {
                return false;
            }
        }
        return $filenames;
    }

    public function index()
    {
        if ($this->checkUser()){
           $this->load->view('web-site/user/Index');
        }else{
            redirect(base_url());
        }
    }

    public function UserLogin()
    {
        $this->load->Model('User_Model');
        require_once APPPATH . "libraries/vendor/autoload.php";
        $google_client = new Google_client();
        $google_client->setClientId('973559371491-161jnuetpcj7akgai3q98canv9of8jpk.apps.googleusercontent.com');
        $google_client->setClientSecret('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');
        $google_client->setRedirectUri('https://www.primepropertyturkey.com/User/UserLogin');
        $google_client->addScope('email');
        $google_client->addScope('profile');
        if (isset($_GET['code'])){
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
            if (!isset($token['error'])){
                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                $current_datetime = date('Y-m-d H:i:s');
                if($this->User_Model->Is_user_already_register($data['id']))
                {
                    $user_data = array(
                        'fullname' => $data['given_name'].' '.$data['family_name'],
                        'email' => $data['email'],
                        'profile_picture'=> $data['picture'],
                        'update_date' => $current_datetime
                    );

                    $this->User_Model->Update_user_login_data($user_data, $data['id']);
                }
                else
                {
                    $user_data = array(
                        'login_oauth_uid' => $data['id'],
                        'fullname' => $data['given_name'].' '.$data['family_name'],
                        'email'  => $data['email'],
                        'profile_picture' => $data['picture'],
                        'registerDate'  => $current_datetime
                    );

                    $this->User_Model->Insert_user_login_data($user_data);
                }
                $this->session->set_userdata('username', $data['email']);
                $this->session->set_userdata('user_info', $data['given_name'].' '.$data['family_name']);
            }
        }
        $login_button = '';
        if(!$this->session->has_userdata('access_token'))
        {
            $login_button = '<a href="'.$google_client->createAuthUrl().'" class="text-center btn btn-light btn-lg">
         <span class="mx-1 text-primary">
                   <i class="fab fa-google"></i>
        </span>
        <span>
            Sign in Google
        </span>
        </span>
        </a>';
            $data['login_button'] = $login_button;
            $this->load->view('web-site/login', $data);
        }
        else
        {
            redirect(base_url().'User');
        }
    }

    public function Add_Property()
    {
        if ($this->checkUser()) {
            $this->load->helper('form');
            $this->load->view('web-site/user/add-property');
        }else{
            redirect(base_url());
        }
    }
    public function Add_Property_Submit()
    {
        $this->load->helper('url');
        if ($this->checkUser()) {
            $this->load->library('form_validation');
            if ($this->form_validation->run('user_adding_property') != FALSE){
                $this->load->Model('User_Model');
                $data = $this->input->post();
                $data['referenceID'] = sha1($this->input->post('title'));
                $data['userID'] = $this->session->userdata('userID');
                $data['url_slug'] = url_title($this->input->post('title'),"-",True);
                if ($this->input->post('latit') and  $this->input->post('longit') ) {
                    $data['map']='@'.$this->input->post('latit').','.$this->input->post('longit');

                }
                unset($data['latit']);
                unset($data['longit']);
                $gallery_images = null;

                if ($_FILES['property_images']['name']) {
                    $gallery_images = $this->uploadGalleryImages($_FILES['property_images']);
                }
                $insert_id = $this->User_Model->Add_Property_Submit_Model($data);
                $i=1;
                foreach ($gallery_images as $image_name){
                    $this->User_Model->submitGalleryImagesModel($insert_id,$image_name,$i);
                    $i++;
                }
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Property Add To Resaler's List </div>");
                redirect(base_url().'User');

            }else{
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> unfortunately Property <b>not</b> Added </div>");
                redirect(base_url());

            }
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> unfortunately Property <b>not</b> Added </div>");
            redirect(base_url());
        }
    }
    public function Properties_In_Progress()
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            $where = array('status'=>3, 'userID'=> $this->session->userdata('userID'));
            $data['results'] = $this->User_Model->FetchResaleProperties($where);
            $data['type']='Pending';
            $this->load->view('web-site/user/Resale-Properties',$data);
        }else{
            redirect(base_url());
        }
    }
    public function Published_Properties()
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            $where = array('status'=>5, 'userID'=> $this->session->userdata('userID'));
            $data['results'] = $this->User_Model->FetchResaleProperties($where);
            $data['type']='Publish';
            $this->load->view('web-site/user/Resale-Properties',$data);
        }else{
            redirect(base_url());
        }
    }
    public function Delete_Property($passed_url)
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            if (strip_tags($passed_url)){
                $this->User_Model->deleteProperty(strip_tags($passed_url));
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Property Ads deleted Successfully  </div>");
            }
            redirect(base_url().'User');
        }else{
            redirect(base_url());
        }
    }
    public function Edit_Property($passed_url)
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            if (strip_tags($passed_url)){
                if ($this->User_Model->checkPropertyEditPermision($passed_url)){}
                $this->User_Model->checkPropertyEditPermision(strip_tags($passed_url));
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Property Ads deleted Successfully  </div>");
            }
            redirect(base_url().'User');
        }else{
            redirect(base_url());
        }
    }

    public function propertyTitleCheck()
    {
        $value_data = $this->input->post('value_data');
        $this->load->model('User_Model');
        echo json_encode($this->User_Model->getResalePropertyTitle($value_data));
    }

    public function Profile()
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            $data['results'] = $this->User_Model->FetchResaleUsers();
            $this->load->view('web-site/user/profile',$data);
        }else{
            redirect(base_url());
        }
    }
    public function SubmitProfileUpdate()
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            $fullname= $this->input->post('fullname');
            $phone= $this->input->post('phone');
            if ($fullname and $phone){
                $data['fullname']=$fullname;
                $data['phone']=$phone;
                $data['results'] = $this->User_Model->updateProfile($data);
                $this->load->view('web-site/user/profile',$data);
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Profile Changed Successfully </div>");
            }
            redirect(base_url().'User');
        }else{
            redirect(base_url());
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('access_token');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_info');
        $this->session->set_flashdata('message', "<div id='toast_message' class='success'>  logout Successfully  </div>");
        redirect(base_url());
    }
}
