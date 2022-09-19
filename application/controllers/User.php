<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function index()
    {
        if ($this->checkUser()) {
            $data['userLevel'] = $this->checkUserLevel();
            $this->load->view('web-site/user/Index', $data);
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Something Went Wrong</div>");
            redirect(base_url());
        }
    }

    protected function checkUser()
    {
        if ($this->session->has_userdata('username') and
            $this->session->has_userdata('user_info') and
            $this->session->has_userdata('access_token')) {
            return true;
        }
        return false;
    }

    public function checkUserLevel()
    {
        $username = $this->session->userdata('username');
        $this->load->Model('User_Model');
        $result = $this->User_Model->userLevel($username);
        if ($result){
            return $this->User_Model->userLevel($username)->status;
        }else{
            return null;
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
        if (isset($_GET['code'])) {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
            if (!isset($token['error'])) {
                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                $is_user_email_exist = $this->User_Model->Is_user_email_exist($data['email']);
                $current_datetime = date('Y-m-d H:i:s');
                $is_google_user = $this->User_Model->Is_user_already_register($data['id']);
                if ($is_user_email_exist and $is_user_email_exist->user_type = 2 and $is_google_user) {
                    $user_data = array(
                        'fullname' => $data['given_name'] . ' ' . $data['family_name'],
                        'profile_picture' => $data['picture'],
                        'update_date' => $current_datetime
                    );
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Dear  <b>" . $user_data['fullname'] . "</b> Your Sign in successfully </div>");
                    $this->User_Model->Update_user_login_data_by_uid($user_data, $data['id']);
                } elseif ($is_user_email_exist and $is_user_email_exist->user_type = 1) {
                    $user_data = array(
                        'profile_picture' => $data['picture'],
                        'update_date' => $current_datetime
                    );
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Dear User Your Sign in successfully </div>");
                    $this->User_Model->Update_user_login_data_by_email($user_data, $data['email']);
                } else {
                    $user_data = array(
                        'login_oauth_uid' => $data['id'],
                        'fullname' => $data['given_name'] . ' ' . $data['family_name'],
                        'email' => $data['email'],
                        'profile_picture' => $data['picture'],
                        'user_type' => 2,
                        'status' => 9
                    );
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Dear User Your Account Created successfully </div>");
                    $this->User_Model->Insert_user_login_data($user_data);
                }
                $this->session->set_userdata('username', $data['email']);
                $this->session->set_userdata('user_info', $data['given_name'] . ' ' . $data['family_name']);
            }
        }
        $login_button = '';
        if (!$this->session->has_userdata('access_token')) {
            $login_button = '<a href="' . $google_client->createAuthUrl() . '" class="text-center btn btn-light btn-lg">
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
        } else {
            redirect(base_url() . 'User');
        }
    }

    public function UserRegister()
    {
        $this->load->Model('User_Model');
        require_once APPPATH . "libraries/vendor/autoload.php";
        $google_client = new Google_client();
        $google_client->setClientId('973559371491-161jnuetpcj7akgai3q98canv9of8jpk.apps.googleusercontent.com');
        $google_client->setClientSecret('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');
        $google_client->setRedirectUri('https://www.primepropertyturkey.com/User/UserRegister');
        $google_client->addScope('email');
        $google_client->addScope('profile');
        if (isset($_GET['code'])) {
            $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
            if (!isset($token['error'])) {
                $google_client->setAccessToken($token['access_token']);
                $this->session->set_userdata('access_token', $token['access_token']);
                $google_service = new Google_Service_Oauth2($google_client);
                $data = $google_service->userinfo->get();
                $is_user_email_exist = $this->User_Model->Is_user_email_exist($data['email']);
                $current_datetime = date('Y-m-d H:i:s');
                $is_google_user = $this->User_Model->Is_user_already_register($data['id']);
                if ($is_user_email_exist and $is_user_email_exist->user_type = 2 and $is_google_user) {
                    $user_data = array(
                        'fullname' => $data['given_name'] . ' ' . $data['family_name'],
                        'profile_picture' => $data['picture'],
                        'update_date' => $current_datetime
                    );
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Dear User, You Registered Before, So We Redirect To Your User Panel</div>");
                    $this->User_Model->Update_user_login_data_by_uid($user_data, $data['id']);
                } elseif ($is_user_email_exist and $is_user_email_exist->user_type = 1) {
                    $user_data = array(
                        'profile_picture' => $data['picture'],
                        'update_date' => $current_datetime
                    );
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Dear User, You Registered Before, So We Redirect To Your User Panel</div>");
                    $this->User_Model->Update_user_login_data_by_email($user_data, $data['email']);
                } else {
                    $user_data = array(
                        'login_oauth_uid' => $data['id'],
                        'fullname' => $data['given_name'] . ' ' . $data['family_name'],
                        'email' => $data['email'],
                        'profile_picture' => $data['picture'],
                        'user_type' => 2,
                        'status' => 9
                    );
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'> Dear Your Account Registered successfully </div>");
                    $this->User_Model->Insert_user_login_data($user_data);
                }
                $this->session->set_userdata('username', $data['email']);
                $this->session->set_userdata('user_info', $data['given_name'] . ' ' . $data['family_name']);
            }
        }
        $Register_button = '';
        if (!$this->session->has_userdata('access_token')) {
            $Register_button = '<a href="' . $google_client->createAuthUrl() . '" class="text-center btn btn-light btn-lg">
         <span class="mx-1 text-primary">
                   <i class="fab fa-google"></i>
        </span>
        <span>
            Register With Google
        </span>
        </span>
        </a>';
            $data['Register_button'] = $Register_button;
            $this->load->view('web-site/User_register', $data);
        } else {
            redirect(base_url() . 'User');
        }
    }

    public function Add_Property()
    {
        if ($this->checkUser()) {
            $this->load->helper('form');
            $data['userLevel'] = $this->checkUserLevel();
            $this->load->view('web-site/user/add-property', $data);
        } else {
            redirect(base_url());
        }
    }

    public function Add_Property_Submit()
    {
        $this->load->helper('url');
        if ($this->checkUser() and $this->checkUserLevel() == 9) {
            $this->load->library('form_validation');
            if ($this->form_validation->run('user_adding_property') != FALSE) {
                $this->load->Model('User_Model');
                $givenData = $this->input->post();
                $data = array();
                foreach ($givenData as $key => $value) {
                    $data[$key] = strip_tags($value);
                }
                $data['referenceID'] = sha1(strip_tags($this->input->post('title')));
                $data['UserName'] = $this->session->userdata('username');
                $data['url_slug'] = url_title(strip_tags($this->input->post('title')), "-", True);
                if ($this->input->post('latit') and $this->input->post('longit')) {
                    $data['map'] = '@' . $this->input->post('latit') . ',' . $this->input->post('longit');
                }
                unset($data['latit']);
                unset($data['longit']);
                $gallery_images = null;
                if ($_FILES['property_images']['name']) {
                    $gallery_images = $this->uploadGalleryImages($_FILES['property_images']);
                }
                $insert_id = $this->User_Model->Add_Property_Submit_Model($data);
                $i = 1;
                foreach ($gallery_images as $image_name) {
                    $this->User_Model->submitGalleryImagesModel($insert_id, $image_name, $i);
                    $i++;
                }
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Property Add To Resaler's List </div>");
                redirect(base_url() . 'User/Properties_In_Progress');
            } else {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> unfortunately Property <b>NOT</b> Added </div>");
                redirect(base_url() . 'User');
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> unfortunately Property <b>NOT</b> Added </div>");
            redirect(base_url() . 'User');
        }
    }

    protected function uploadGalleryImages($files)
    {

        $config_main['upload_path'] = './assets/web-site/images/resales/original/';
        $config_main['allowed_types'] = 'jpg';
        $config_main['max_size'] = 2048;
        $config_main['max_width'] = 4800;
        $config_main['max_height'] = 2880;
        $config_main['remove_spaces'] = TRUE;

        $filenames = array();
        foreach ($files['name'] as $key => $image) {

            $_FILES['property_images[]']['name'] = $files['name'][$key];
            $_FILES['property_images[]']['type'] = $files['type'][$key];
            $_FILES['property_images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['property_images[]']['error'] = $files['error'][$key];
            $_FILES['property_images[]']['size'] = $files['size'][$key];

            $config_main['file_name'] = $image;
            $this->load->library('upload', $config_main);
            $this->upload->initialize($config_main);

            if ($this->upload->do_upload('property_images[]')) {
                $filename = $this->upload->data()['file_name'];
                array_push($filenames, $filename);
                $this->CreateResizedImage('./assets/web-site/images/resales/original/', $filename);
            } else {
                return false;
            }
        }
        return $filenames;
    }

    protected function CreateResizedImage($source, $file_name)
    {
        $filename = $source . $file_name;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/resales/resized/';
        if (!is_dir($target_path)) {
            mkdir($target_path, 0777, TRUE);
        }
        $this->load->library('image_lib');
        $config_Resize = array(
            'image_library' => 'gd2',
            'source_image' => $filename,
            'new_image' => $target_path,
            'maintain_ratio' => False,
            'width' => 1200,
            'height' => 720
        );
        $this->image_lib->clear();
        $this->image_lib->initialize($config_Resize);
        $this->image_lib->resize();
        $this->CreateWaterMarkImage('./assets/web-site/images/resales/resized/', $file_name);
    }

    protected function CreateWaterMarkImage($source, $filename)
    {
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/resales/watermark/';
        if (!is_dir($target_path)) {
            mkdir($target_path, 0777, TRUE);
        }
        $this->load->library('image_lib');
        $config_waterMark['source_image'] = $source . $filename;
        $config_waterMark['new_image'] = $target_path;
        $config_waterMark['wm_type'] = 'overlay';
        $config_waterMark['wm_overlay_path'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/base/over.png';
        $config_waterMark['wm_opacity'] = '100';
        $config_waterMark['wm_vrt_alignment'] = 'bottom';
        $config_waterMark['wm_hor_alignment'] = 'center';
        $config_waterMark['wm_padding'] = '0';
        $this->image_lib->initialize($config_waterMark);
        $this->image_lib->watermark();
        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
        $this->createWebp($target_path, $filename);

    }

    protected function createWebp($source, $file_name)
    {
//        header('Content-Type: image/WebP');
        $name = pathinfo($file_name, PATHINFO_FILENAME);
        $source_image = imagecreatefromjpeg($source . $file_name);
        imagepalettetotruecolor($source_image);
        imagealphablending($source_image, true);
        imagesavealpha($source_image, true);
        $output = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/resales/webps/';
        imagewebp($source_image, $output . $name . ".webp", 80);
        imagedestroy($source_image);
    }

    public function Edit_Resale_Submit()
    {
        $this->load->helper('url');
        if ($this->checkUser() and $this->checkUserLevel() == 9) {
            $this->load->Model('User_Model');
            $givenData = $this->input->post();
            $data = array();
            foreach ($givenData as $key => $value) {
                $data[$key] = strip_tags($value);
            }
            $data['referenceID'] = sha1(strip_tags($this->input->post('title')));
            $data['UserName'] = $this->session->userdata('username');
            $data['url_slug'] = url_title(strip_tags($this->input->post('title')), "-", True);
            if ($this->input->post('latit') and $this->input->post('longit')) {
                $data['map'] = '@' . $this->input->post('latit') . ',' . $this->input->post('longit');
            }
            $id = $data['id'];
            unset($data['latit']);
            unset($data['longit']);
            unset($data['id']);
            $this->User_Model->update_Property_Submit_Model($id, $data);
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Property Add To Resaler's List </div>");
            redirect(base_url() . 'User/Properties_In_Progress');
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> unfortunately Property <b>NOT</b> Added </div>");
            redirect(base_url() . 'User');
        }
    }

    public function Resale_Images_Update_Submit()
    {
        $this->load->helper('url');
        if ($this->checkUser() and $this->checkUserLevel() == 9) {
            $gallery_images = null;
            if ($_FILES['New_images']['name']) {
                $gallery_images = $this->uploadGalleryImages($_FILES['New_images']);
            }
            $this->load->Model('User_Model');
            $property = $this->input->post('property');
            $i = 1;
            foreach ($gallery_images as $image_name) {
                $this->User_Model->submitGalleryImagesModel($property, $image_name, $i);
                $i++;
            }
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Images Add To Resaler's List </div>");
            redirect(base_url() . 'User/Edit_Property/' . $property);
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> unfortunately <b>NOT</b> Added </div>");
            redirect(base_url() . 'User');
        }
    }

    public function Properties_In_Progress()
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            $data['userLevel'] = $this->checkUserLevel();
            $where = array('status' => 3, 'UserName' => $this->session->userdata('username'));
            $data['results'] = $this->User_Model->FetchResaleProperties($where);
            $data['type'] = 'Pending';
            $this->load->view('web-site/user/Resale-Properties', $data);
        } else {
            redirect(base_url());
        }
    }

    public function Published_Properties()
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            $where = array('status' => 5, 'UserName' => $this->session->userdata('username'));
            $data['results'] = $this->User_Model->FetchResaleProperties($where);
            $data['type'] = 'Publish';
            $data['userLevel'] = $this->checkUserLevel();
            $this->load->view('web-site/user/Resale-Properties', $data);
        } else {
            redirect(base_url());
        }
    }

    protected function getResaleImageName($data){

        $results = $this->User_Model->getResaleImageNameModel($data);
        if ($results){
            $IIG = array();
            foreach ($results as $result){
                array_push($IIG,array('id'=>$result->id,'image'=>$result->image,'sort'=>$result->sort_priority));
            }
            return $IIG;
        }else{
            return false;
        }
    }

    public function Delete_Property($passed_url)
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            if (strip_tags($passed_url) and $this->User_Model->checkPropertyEditPermission(strip_tags($passed_url))) {
                $images = $this->getResaleImageName($passed_url);
                foreach ($images as $image){
                    $this->User_Model->delete_Audition_image($image['id']);
                }
                $this->User_Model->deleteProperty(strip_tags($passed_url));
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Property Ads deleted Successfully  </div>");
                redirect(base_url() . 'User/Properties_In_Progress');
            }
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'>Dear <b> USER </b> You Are NOt Allowed To Do This  </div>");
            redirect(base_url() . 'User');
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'>Something Went Wrong</div>");
            redirect(base_url());
        }
    }
    public function Delete_Published_Property($passed_url)
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            if (strip_tags($passed_url) and $this->User_Model->checkPropertyEditPermission(strip_tags($passed_url))) {
                $result = $this->User_Model->getResaleData(strip_tags($passed_url));
                $images = $this->getResaleImageName($passed_url);
                foreach ($images as $image){
                    $this->User_Model->delete_Audition_image($image['id']);
                }
                $this->User_Model->deleteProperty(strip_tags($passed_url));
                $this->User_Model->unPublishMainPropertyTbl($result->referenceID);
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Property Ads deleted Successfully  </div>");
                redirect(base_url() . 'User/Published_Properties');
            }
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'>Dear <b> USER </b> You Are NOt Allowed To Do This  </div>");
            redirect(base_url() . 'User');
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'>Something Went Wrong</div>");
            redirect(base_url());
        }
    }

    public function Delete_Resale_Image($passed_url)
    {
        $this->load->library('user_agent');
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            if (strip_tags($passed_url) and $this->User_Model->checkImagesDeletePermission(strip_tags($passed_url))) {
                $this->User_Model->deleteImage(strip_tags($passed_url));
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Property Image deleted Successfully  </div>");
            } else {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'>Dear <b> USER </b> Your NOT allowed To do This task  </div>");
            }
            redirect($this->agent->referrer());
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'>Please log in  </div>");
            redirect(base_url());
        }
    }

    public function Edit_Property($passed_url)
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            if (strip_tags($passed_url) and $this->User_Model->checkPropertyEditPermission(strip_tags($passed_url))) {
                $data['results'] = $this->User_Model->GetResalesPropertiesInfo((int)strip_tags($passed_url));
                if ($data['results']) {
                    $data['images'] = $this->User_Model->GetResalesPropertiesImages($data['results']->id);
                }
                $this->load->helper('form');
                $this->load->view('web-site/user/edit-property', $data);
            } else {
                $this->session->set_flashdata('message', "<div id='toast_message' class='danger'>Dear <b> USER </b> Your not allowed to edit this property </div>");
                redirect(base_url() . 'User');
            }
        } else {
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
            $this->load->view('web-site/user/profile', $data);
        } else {
            redirect(base_url());
        }
    }

    public function SubmitProfileUpdate()
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            $fullname = $this->input->post('fullname');
            $phone = $this->input->post('phone');
            if ($fullname and $phone) {
                $data['fullname'] = $fullname;
                $data['phone'] = $phone;
                $data['results'] = $this->User_Model->updateProfile($data);
                $this->load->view('web-site/user/profile', $data);
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Profile Changed Successfully </div>");
            }
            redirect(base_url() . 'User');
        } else {
            redirect(base_url());
        }
    }

    public function ResendActivateEmail()
    {
        if ($this->checkUser()) {
            $this->load->Model('User_Model');
            $username = $this->session->userdata('username');
            $result = $this->User_Model->getUserInfo($username);
            if ($result){
                $this->load->library('email');
                $this->email->from('contact@primepropertyturkey.com', 'User Register Verification');
                $this->email->to($username);
                $this->email->subject(' User Register Verification ');
                $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
                    "<br/>".
                    "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/base/logo-new.png'>
                    </div>".
                    "<br/>".
                    date('l jS \of F Y h:i:s A').
                    "<br/><br/>".
                    " Dear <b> " .$username . "</b> User <br /> <br/>" .
                    " Thank you for Registration <BR /> <br/>" .
                    "Verification Link : <a href='".$result->hashCode."' target='_blank'> " . $result->hashCode . " </a> <br/> <br/> <br/> " .
                    "Please click link to verify your account <br />" .
                    "This link expire after 24 hour , if in that period account not activated , you should register again  <br />" .
                    "</div>";
                $this->email->set_mailtype("html");
                $this->email->message($message);
                $this->email->send();
                $this->email->clear(TRUE);
            }
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'>Dear <b> USER </b> Your Activate Email Resend Successfully </div>");
            redirect(base_url() . 'User');
        } else {
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