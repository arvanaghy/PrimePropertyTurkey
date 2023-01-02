<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function index()
    {
        $this->checkUser();
        $this->load->view('admin/dashboard');
    }
    protected function checkUser()
    {
        if ($this->session->has_userdata('AdminUserID')) {
            return true;
        } else {
            redirect(base_url() . "Admin/Login");
            die();
        }
    }

    public function Login()
    {
        $this->load->helper('captcha');
        $cap = create_captcha();
        $data['captcha_image'] = $cap['image'];
        $this->session->set_userdata('captcha_word', $cap['word']);
        $this->load->view('admin/Login', $data);
    }
    public function Submit_Login()
    {
        $this->load->library('user_agent');
        $this->load->library('form_validation');
        $captcha = $this->input->post('captcha');
        $captcha_error_message = '';
        if ($this->session->userdata('captcha_word') != $captcha) {
            $captcha_error_message = 'Wrong Captcha';
        }
        if ($this->form_validation->run('admin_login') != FALSE and $this->session->userdata('captcha_word') == $captcha) {
            $data['password'] = $this->input->post('password');
            $data['username'] = $this->input->post('username');
            $this->load->model('Admin_model');
            $result = $this->Admin_model->login($data);
            if ($result) {
                $this->session->set_userdata('AdminUser', $data['username']);
                $this->session->set_userdata('AdminUserID', $result['id']);
                redirect(base_url() . 'Admin/index');
            } else {
                $this->session->unset_userdata('AdminUser', 'AdminUserID');
                redirect(base_url() . 'Admin/Login');
            }
        } else {
            redirect(base_url() . 'Admin/Login');
        }

    }
    public function Sign_Out()
    {
        $this->session->unset_userdata('AdminUser', 'AdminUserID');
        redirect(base_url() . 'Admin/Login');
    }
    public function Password_Change()
    {
        $this->checkUser();
        $this->load->view('admin/change-password');
    }
    public function password_change_submit()
    {
        $this->checkUser();
        $this->load->library('form_validation');
        if ($this->form_validation->run('admin_change_password') != FALSE) {

            $data['OldPassword'] = $this->input->post('OldPassword');
            $data['NewPassword'] = $this->input->post('NewPassword');
            $data['id'] = $this->session->userdata('AdminUserID');
            $this->load->model('Admin_model');
            $result = $this->Admin_model->changePassword($data);
            if ($result) {
                $this->session->unset_userdata('AdminUser', 'AdminUserID');
                redirect(base_url() . 'Admin/Login');
            }
        }
        redirect(base_url() . 'Admin/index');
    }

    public function Manage_Property()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->fetchProperties();
        $this->load->view('admin/property/manage-property', $data);
    }
    public function Delete_Property($passed_url = '')
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $result = $this->Admin_model->GetProperty($passed_url);
        if ($result->UserID!='admins'){
            $this->Admin_model->deleteResaleProperty($result->ReferenceLink);
        }
        $this->Admin_model->delete_property($passed_url);
        redirect(base_url() . 'Admin/Manage_Property');
    }
    public function Add_Property()
    {
        $this->checkUser();
        $this->load->helper('form');
        $this->load->view('admin/property/add-property');
    }
    public function Add_Property_Submit()
    {
        $this->checkUser();
        if (strip_tags($this->input->post('status'))) {
            $status = 3;
        } else {
            $status = 5;
        }
        if (strip_tags($this->input->post('recommended'))) {
            $recommended = 2;
        } else {
            $recommended = 1;
        }
        if (strip_tags($this->input->post('Commercial'))) {
            $Commercial = 1;
        } else {
            $Commercial = 0;
        }
        $upload_data['path'] = './assets/web-site/images/properties/old/original/';
        $upload_data['input'] = 'thumbnail_image';
        $picture_filename = $this->uploadPictures($upload_data, 'Property');
        $url_slug = url_title(strip_tags(str_replace('-', '', $this->input->post('URL_SLUG'))), "-", True);
        $postData = array(
            "Property_Meta_Title" => strip_tags($this->input->post('meta_title')),
            "Property_Meta_Keyword" => strip_tags($this->input->post('meta_keyword')),
            "Property_Meta_Description" => strip_tags($this->input->post('meta_description')),
            "Property_price" => strip_tags($this->input->post('USD')),
            "Property_type" => strip_tags($this->input->post('type')),
            "Property_referenceID" => strip_tags($this->input->post('reference_id')),
            "Property_location" => strip_tags($this->input->post('city')),
            "Property_location_city" => strip_tags($this->input->post('Property_location_city')),
            "Property_Bedrooms" => strip_tags($this->input->post('bedrooms')),
            "Property_Bathrooms" => strip_tags($this->input->post('bathrooms')),
            "Property_living_space" => strip_tags($this->input->post('living_space')),
            "Property_pool" => strip_tags($this->input->post('pool')),
            "status" => $status,
            "recommended" => $recommended,
            "Property_thumbnail" => "assets/thumbnail/" . $picture_filename,
            "Property_overview" => $this->input->post('overview'),
            "Property_why_buy_this_property" => $this->input->post('why_this_property'),
            "Property_description" => $this->input->post('description'),
            "Property_title" => strip_tags($this->input->post('title')),
            "url_slug" => $url_slug,
            "mapLocationURL" => $this->input->post('mapLocationURL'),
            "is_commercial" => $Commercial
        );
        $this->load->model('Admin_model');
        $insert_id = $this->Admin_model->insertProperty($postData);
        $gallery_images = null;
        if (!empty($_FILES['property_images']['name'][0])) {
            $gallery_images = $this->uploadGalleryImages($_FILES['property_images']);
        }
        $i = 1;
        foreach ($gallery_images as $image_name) {
            $this->insert_gallery_images($insert_id, $image_name, $i);
            $i++;
        }
        redirect("Admin/Manage_Property");
    }
    protected function uploadPictures($data, $type = '')
    {
        $this->checkUser();
        $config2['upload_path'] = $data['path'];
        $config2['allowed_types'] = 'jpg';
        $config2['max_size'] = 2000;
        $config2['max_width'] = 1200;
        $config2['max_height'] = 720;
        $config2['remove_spaces'] = TRUE;
        $this->load->library('upload', $config2);
        if (!is_dir($data['path'])) {
            mkdir($data['path'], 0777, TRUE);
        }
        if (!$this->upload->do_upload($data['input'])) {
            return false;
        } else {
            $filename = $this->upload->data()['file_name'];
            if ($type == "Property") {
                $this->thumbnailPost($data['path'], $filename, $type);
            } else {
                $this->createWebp($data['path'], $filename, $type, 'original');
                $this->whatsapp($data['path'], $filename, $type);
                $this->thumbnailPost($data['path'], $filename, $type);
            }
            return $filename;
        }
    }
    protected function thumbnailPost($source, $filename, $type = '')
    {
        switch ($type) {
            case "Blog":
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/blog/old/thumb/';
                break;
            case "News":
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/news/old/thumb/';
                break;
            case "Property":
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/properties/old/P_Thumb/';
                break;
            case 'GalleryWA':
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/properties/old/whatsapp/';
                break;
        }
        if (!is_dir($target_path)) {
            mkdir($target_path, 0777, TRUE);
        }
        header('Content-Type: image/jpeg');
        $source_image2 = imagecreatefromjpeg($source . $filename);
        list($width, $height) = getimagesize($source . $filename);
        $thumb = imagecreatetruecolor(450, 350);
        imagecopyresampled($thumb, $source_image2, 0, 0, 0, 0, 450, 350, $width, $height);
        imagejpeg($thumb, $target_path . $filename);
        imagedestroy($thumb);
        switch ($type) {
            case "Blog":
            case "News":
                $this->createWebp($target_path, $filename, $type, 'thumb');
                break;
            case "Property":
                $this->createWebp($target_path, $filename, $type, 'P_Thumb');
                break;
            case "GalleryWA":
                $this->createWebp($target_path, $filename, $type, 'whatsapp');
                break;

        }
    }
    protected function whatsapp($source, $file_name, $type = '')
    {
        $filename = $source . $file_name;
        switch ($type) {
            case 'News':
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/news/old/whatsapp/';
                break;
            case 'Blog':
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/blog/old/whatsapp/';
                break;
            case 'Property':
                $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/properties/whatsapp/';
                break;
        }
        if (!is_dir($target_path)) {
            mkdir($target_path, 0777, TRUE);
        }
        $config_manIP = array(
            'image_library' => 'gd2',
            'source_image' => $filename,
            'new_image' => $target_path,
            'maintain_ratio' => False,
            'width' => 300,
            'height' => 300
        );
        $this->load->library('image_lib', $config_manIP);
        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
        $this->createWebp($target_path, $file_name, $type, 'whatsapp');

    }
    protected function CreateWhatsapp($source, $file_name)
    {
        $filename = $source . $file_name;
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/properties/whatsapp/';

        if (!is_dir($target_path)) {
            mkdir($target_path, 0777, TRUE);
        }
        $config_whats = array(
            'image_library' => 'gd2',
            'source_image' => $filename,
            'new_image' => $target_path,
            'maintain_ratio' => False,
            'width' => 300,
            'height' => 300
        );
        $this->load->library('image_lib', $config_whats);
        $this->image_lib->initialize($config_whats);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
        $this->createWebp($target_path, $file_name, 'Property', 'whatsapp');

    }
    protected function uploadGalleryImages($files)
    {

        $config1['upload_path'] = './assets/web-site/images/properties/old/original/';
        $config1['allowed_types'] = 'jpg';
        $config1['max_size'] = 2000;
        $config1['max_width'] = 1200;
        $config1['max_height'] = 720;
        $config1['remove_spaces'] = TRUE;

        $this->load->library('upload', $config1);
        $images = array();
        foreach ($files['name'] as $key => $image) {
            $_FILES['property_images[]']['name'] = $files['name'][$key];
            $_FILES['property_images[]']['type'] = $files['type'][$key];
            $_FILES['property_images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['property_images[]']['error'] = $files['error'][$key];
            $_FILES['property_images[]']['size'] = $files['size'][$key];

            $images[] = $image;
            $config['file_name'] = $image;

            $this->upload->initialize($config1);

            if ($this->upload->do_upload('property_images[]')) {
                $filename = $this->upload->data()['file_name'];
                $this->waterMark('./assets/web-site/images/properties/old/original/', $filename);
                $this->thumbnailPost('./assets/web-site/images/properties/old/original/', $filename, 'GalleryWA');
            } else {
                return false;
            }
        }
        return $images;
    }
    protected function waterMark($source, $filename)
    {
        $target_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/properties/old/watermark/';
        if (!is_dir($target_path)) {
            mkdir($target_path, 0777, TRUE);
        }
        $this->load->library('image_lib');
        $config3['source_image'] = $source . $filename;
        $config3['new_image'] = $target_path;
        $config3['wm_type'] = 'overlay';
        $config3['wm_overlay_path'] = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/base/over.png';
        $config3['wm_opacity'] = '100';
        $config3['wm_vrt_alignment'] = 'bottom';
        $config3['wm_hor_alignment'] = 'center';
        $config3['wm_padding'] = '0';
        $this->image_lib->initialize($config3);
        $this->image_lib->watermark();
        if (!$this->image_lib->watermark()) {
            echo $this->image_lib->display_errors();
        }
        $this->image_lib->clear();
        $this->createWebp($target_path, $filename, 'GalleryWM', 'watermark');

    }
    protected function createWebp($source, $file_name, $type, $sector)
    {

        header('Content-Type: image/WebP');
        $name1 = pathinfo($file_name, PATHINFO_FILENAME);
        $source_image1 = imagecreatefromjpeg($source . $file_name);
        imagepalettetotruecolor($source_image1);
        imagealphablending($source_image1, true);
        imagesavealpha($source_image1, true);

        switch ($type) {
            case "Blog":
                $output = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/blog/' . $sector . '/';
                break;
            case "News":
                $output = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/news/' . $sector . '/';
                break;
            case "Property":
            case "GalleryWA":
            case "GalleryWM":
                $output = $_SERVER['DOCUMENT_ROOT'] . '/assets/web-site/images/properties/' . $sector . '/';
                break;
            default:
                $output = "./uploads/";
                break;
        }
        imagewebp($source_image1, $output . $name1 . ".webp", 60);
        imagedestroy($source_image1);
    }
    protected function insert_gallery_images($id, $filename, $order)
    {
        $this->checkUser();
        $data = array(
            "gallery_property_id" => $id,
            "gallery_image" => "assets/uploads/" . $filename,
            "image_order" => $order
        );
        $this->load->model('Admin_model');
        $this->Admin_model->insert_gallery_images_record($data);
    }
    public function propertyTitleCheck()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $posted_data = url_title(strip_tags(str_replace('-', '', $value_data)), "-", True);
            $this->load->model('Admin_model');
            echo json_encode($this->Admin_model->getResalePropertyTitle($posted_data));
        }
    }
    public function Trash_Property()
    {
        $this->checkUser();

        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->trashProperties();
        $this->load->view('admin/property/trash-property', $data);
    }
    public function Publish_Property($passed_url = '')
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->publish_property($passed_url);
        redirect(base_url() . 'Admin/Trash_Property');
    }
    public function Edit_Property($passed_url = '')
    {
        $this->checkUser();
        $this->load->helper('form');
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->GetProperty($passed_url);
        if ($data['results']) {
            $data['gallery'] = $this->Admin_model->GetPropertyGalleryImages($passed_url);
            $this->load->view('admin/property/edit-property', $data);
        } else {
            redirect(base_url() . 'Admin/index');
        }
    }
    public function Property_Content_Update_Submit()
    {
        $this->checkUser();
        if (strip_tags($this->input->post('status'))) {
            $status = 3;
        } else {
            $status = $this->input->post('past_status');
        }
        if (strip_tags($this->input->post('recommended'))) {
            $recommended = 9;
        } else {
            $recommended = 1;
        }
        if (strip_tags($this->input->post('SoldOut'))) {
            $SoldOut = 1;
        } else {
            $SoldOut = 0;
        }
        if (strip_tags($this->input->post('Commercial'))) {
            $Commercial = 1;
        } else {
            $Commercial = 0;
        }
        if (strip_tags($this->input->post('formattingDone'))) {
            $formattingDone = 1;
        } else {
            $formattingDone = 0;
        }
        if (strip_tags($this->input->post('Istanbul_Penthouse'))) {
            $Istanbul_Penthouse = 1;
        } else {
            $Istanbul_Penthouse = 0;
        }
        $id = strip_tags($this->input->post('property_id'));
        $postData = array(
            "Property_Meta_Title" => strip_tags($this->input->post('meta_title')),
            "Property_Meta_Keyword" => strip_tags($this->input->post('meta_keyword')),
            "Property_Meta_Description" => strip_tags($this->input->post('meta_description')),
            "Property_price" => strip_tags($this->input->post('USD')),
            "Property_type" => strip_tags($this->input->post('type')),
            "Property_referenceID" => strip_tags($this->input->post('reference_id')),
            "Property_location" => strip_tags($this->input->post('city')),
            "Property_location_city" => strip_tags($this->input->post('Property_location_city')),
            "Property_Bedrooms" => strip_tags($this->input->post('bedrooms')),
            "Property_Bathrooms" => strip_tags($this->input->post('bathrooms')),
            "Property_living_space" => strip_tags($this->input->post('living_space')),
            "Property_pool" => strip_tags($this->input->post('pool')),
            "status" => $status,
            "recommended" => $recommended,
            "SoldOut" => $SoldOut,
            "Property_overview" => $this->input->post('overview'),
            "Property_why_buy_this_property" => $this->input->post('why_this_property'),
            "Property_description" => $this->input->post('description'),
            "Property_title" => strip_tags($this->input->post('title')),
            "updated_time" => date('Y-m-d H:i:s'),
            "mapLocationURL" => $this->input->post('mapLocationURL'),
            "formattingDone" => $formattingDone,
            "is_commercial" => $Commercial,
            "Istanbul_Penthouse" => $Istanbul_Penthouse,
        );

        $this->load->model('Admin_model');
        $this->Admin_model->UpdateProperty($id, $postData);
        $this->load->library('user_agent');
        redirect($this->agent->referrer());

    }
    public function Property_Thumbnail_Update_Submit()
    {
        $this->checkUser();
        $upload_data['path'] = './assets/web-site/images/properties/old/original/';
        $upload_data['input'] = 'thumbnail_image';
        $picture_filename = $this->uploadPictures($upload_data, 'Property');
        $id = strip_tags($this->input->post('property_id'));
        $postData = array(
            "Property_thumbnail" => "assets/thumbnail/" . $picture_filename
        );
        $this->load->model('Admin_model');
        $this->Admin_model->UpdateProperty($id, $postData);
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function Delete_Property_Gallery($passed_url = '')
    {
        $this->load->library('user_agent');
        $this->load->model('Admin_model');
        $this->Admin_model->Delete_Property_Gallery_Record(strip_tags($passed_url));
        redirect($this->agent->referrer());
    }
    public function Property_Images_Update_Submit()
    {
        $insert_id = strip_tags($this->input->post('property_id'));

        $gallery_images = null;
        if (!empty($_FILES['property_images']['name'][0])) {
            $gallery_images = $this->uploadGalleryImages($_FILES['property_images']);
        }
        $i = 1;
        foreach ($gallery_images as $image_name) {
            $this->insert_gallery_images($insert_id, $image_name, $i);
            $i++;
        }
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function ChangeGalleryOrder()
    {
        $id = strip_tags($this->input->post('image_id'));
        $Order = strip_tags($this->input->post('image_order'));
        $data = array(
            "image_order" => $Order
        );
        $this->load->model('Admin_model');
        $this->Admin_model->UpdateGalleryImageOrder($id, $data);

        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function DeleteForEver_Property($passed_url = '')
    {
        if ($passed_url != '') {
            $this->load->library('user_agent');
            $this->load->model('Admin_model');
            $this->Admin_model->Delete_Property_Gallery_Record(strip_tags($passed_url));
            $this->Admin_model->DeletePropertyForEver(strip_tags($passed_url));
            redirect($this->agent->referrer());
        }
    }

    public function Manage_Blog()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->fetchBlogs();
        $this->load->view('admin/blog/manage-blog', $data);
    }
    public function Add_Blog()
    {
        $this->checkUser();
        $this->load->helper('form');
        $this->load->view('admin/blog/add-blog');

    }
    public function Add_Blog_Submit()
    {
        $this->checkUser();
        if ($this->input->post('publish_date') == date('Y-m-d')){
            $status = 0;
        }else{
            $status = 3;
        }
        $upload_data['path'] = './assets/web-site/images/blog/old/original/';
        $upload_data['input'] = 'user_file';
        $picture_filename = $this->uploadPictures($upload_data, 'Blog');
        if ($this->input->post('language') == 'ru'){
            $postData = array(
                'ru_title' => strip_tags($this->input->post('blog_title')),
                'ru_content' => $this->input->post('blog_description'),
                'Blog_Image' => "assets/blog/" . $picture_filename,
                'ru_image_alt' => strip_tags($this->input->post('image_alt')),
                'ru_meta_title' => strip_tags($this->input->post('meta_title')),
                'ru_meta_keyword' => strip_tags($this->input->post('meta_keyword')),
                'ru_meta_description' => strip_tags($this->input->post('meta_description')),
                'publish_date' => strip_tags($this->input->post('publish_date')),
                'status' => $status
            );
        }elseif ($this->input->post('language') == 'en'){
            $postData = array(
                'Blog_Title' => strip_tags($this->input->post('blog_title')),
                'Blog_Content' => $this->input->post('blog_description'),
                'Blog_Image' => "assets/blog/" . $picture_filename,
                'Blog_Image_Alt' => strip_tags($this->input->post('image_alt')),
                'Blog_Meta_Title' => strip_tags($this->input->post('meta_title')),
                'Blog_Meta_Keyword' => strip_tags($this->input->post('meta_keyword')),
                'Blog_Meta_Description' => strip_tags($this->input->post('meta_description')),
                'publish_date' => strip_tags($this->input->post('publish_date')),
                'status' => $status
            );
        }
        $postData['url_slug'] = url_title(strip_tags($this->input->post('URL')), "-", True);
        $this->load->model('Admin_model');
        $this->Admin_model->insertBlog($postData);
        redirect("Admin/Manage_Blog");
    }
    public function Delete_Blog($passed_url = '')
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->delete_Blog($passed_url);
        redirect(base_url() . 'Admin/Manage_Blog');
    }
    public function Trash_Blog()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->trashBlog();
        $this->load->view('admin/blog/trash-blog', $data);
    }
    public function Publish_Blog($passed_url = '')
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->publish_blog($passed_url);
        redirect(base_url() . 'Admin/Trash_blog');
    }
    public function Edit_Blog($passed_url = '')
    {
        $this->checkUser();
        $this->load->helper('form');
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->GetBlog($passed_url);
        if ($data['results']) {
            $this->load->view('admin/blog/edit-blog', $data);
        } else {
            redirect(base_url() . 'Admin/index');
        }
    }
    public function Blog_Content_Update_Submit()
    {
        $this->checkUser();
        $id = strip_tags($this->input->post('blog_id'));
        $meta_title = strip_tags($this->input->post('meta_title'));
        $meta_keyword = strip_tags($this->input->post('meta_keyword'));
        $meta_description = strip_tags($this->input->post('meta_description'));
        $image_alt = strip_tags($this->input->post('image_alt'));
        $blog_title = strip_tags($this->input->post('blog_title'));
//        $blog_content = strip_tags($_POST['blog_description'],["p","a","b","u","h2","h3","h4","h5","img","ul","ol","li","iframe"]);
        $blog_content = $_POST['blog_description'];
        $data = array(
            'Blog_Title' => $blog_title,
            'Blog_Content' => $blog_content,
            'Blog_Image_Alt' => $image_alt,
            'Blog_Meta_Title' => $meta_title,
            'Blog_Meta_Keyword' => $meta_keyword,
            'Blog_Meta_Description' => $meta_description,
            "Blog_Update_Date" => date('Y-m-d H:i:s')
        );
        $this->load->model('Admin_model');
        $this->Admin_model->Blog_Update($id, $data);
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function Blog_Content_Update_Submit_ru()
    {
        $this->checkUser();
        $id = strip_tags($this->input->post('blog_id_ru'));
        $meta_title = strip_tags($this->input->post('meta_title_ru'));
        $meta_keyword = strip_tags($this->input->post('meta_keyword_ru'));
        $meta_description = strip_tags($this->input->post('meta_description_ru'));
        $image_alt = strip_tags($this->input->post('image_alt_ru'));
        $blog_title = strip_tags($this->input->post('blog_title_ru'));
        $blog_content = strip_tags($_POST['blog_description_ru'],["p","a","b","u","h2","h3","h4","h5","img","ul","ol","li","iframe"]);
        $data = array(
            'ru_title' => $blog_title,
            'ru_content' => $blog_content,
            'ru_image_alt' => $image_alt,
            'ru_meta_title' => $meta_title,
            'ru_meta_keyword' => $meta_keyword,
            'ru_meta_description' => $meta_description,
            "Blog_Update_Date" => date('Y-m-d H:i:s')
        );
        $this->load->model('Admin_model');
        $this->Admin_model->Blog_Update($id, $data);
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function Blog_Image_Update_Submit()
    {
        $this->checkUser();
        $id = strip_tags($this->input->post('blog_id'));
        $upload_data['path'] = './assets/web-site/images/blog/old/original/';
        $upload_data['input'] = 'user_file';
        $picture_filename = $this->uploadPictures($upload_data, 'Blog');
        $data = array(
            'Blog_Image' => "assets/blog/" . $picture_filename,
            "Blog_Update_Date" => date('Y-m-d H:i:s')
        );
        $this->load->model('Admin_model');
        $this->Admin_model->Blog_Update($id, $data);
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function DeleteForEver_Blog($passed_url = '')
    {
        if ($passed_url != '') {
            $this->load->library('user_agent');
            $this->load->model('Admin_model');
            $this->Admin_model->DeleteBlogForEver(strip_tags($passed_url));
            redirect($this->agent->referrer());
        }
    }
    public function Show_Blog_Comments($passed_url)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->ListComments($passed_url, 'blog');
        $data['blog'] = $this->Admin_model->getPostBYID($passed_url, 'blog');
        $this->load->view('admin/blog/show-blog-comment', $data);
    }
    public function Publish_Blog_Comment($passed_url)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->Publish_Comment($passed_url, 'blog');
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function Delete_Blog_Comment($passed_url)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->Delete_Comment($passed_url, 'blog');
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function blogUrlCheck()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $posted_data = url_title(strip_tags(str_replace('-', '', $value_data)), "-", True);
            $this->load->model('Admin_model');
            echo json_encode($this->Admin_model->getBlogTitleAjax($posted_data));
        }
    }
    public function PublishBlogByDate()
    {
        $this->load->model('Admin_model');
        $date = date('Y-m-d');
        $this->Admin_model->publishBlogPostOnDate($date);
    }

    public function Manage_News()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->fetchNews();
        $this->load->view('admin/news/manage-news', $data);
    }
    public function Add_News()
    {
        $this->checkUser();
        $this->load->helper('form');
        $this->load->view('admin/news/add-news');
    }
    public function Add_News_Submit()
    {
        $this->checkUser();
        if ($this->input->post('publish_date') == date('Y-m-d')){
            $status = 0;
        }else{
            $status = 3;
        }
        $upload_data['path'] = './assets/web-site/images/news/old/original/';
        $upload_data['input'] = 'user_file';
        $picture_filename = $this->uploadPictures($upload_data, 'News');
        $postData = array(
            'News_Title' => strip_tags($this->input->post('news_title')),
            'News_Content' => $this->input->post('news_description'),
            'News_Image' => "assets/news/" . $picture_filename,
            'News_Image_Alt' => strip_tags($this->input->post('image_alt')),
            'News_Meta_Title' => strip_tags($this->input->post('meta_title')),
            'News_Meta_Keyword' => strip_tags($this->input->post('meta_keyword')),
            'News_Meta_Description' => strip_tags($this->input->post('meta_description')),
            'publish_date' => strip_tags($this->input->post('publish_date')),
            'url_slug' => url_title(strip_tags($this->input->post('URL')),"-",True),
            'status' => $status
        );
        $this->load->model('Admin_model');
        $this->Admin_model->insertNews($postData);
        redirect("Admin/Manage_News");
    }
    public function Delete_News($passed_url = '')
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data = $this->Admin_model->delete_News($passed_url);
        redirect(base_url() . 'Admin/Manage_News');
    }
    public function Trash_News()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->trashNews();
        $this->load->view('admin/news/trash-news', $data);
    }
    public function Publish_News($passed_url = '')
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->publish_news($passed_url);
        redirect(base_url() . 'Admin/Trash_news');
    }
    public function Edit_News($passed_url = '')
    {
        $this->checkUser();
        $this->load->helper('form');
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->GetNews($passed_url);
        if ($data['results']) {
            $this->load->view('admin/news/edit-news', $data);
        } else {
            redirect(base_url() . 'Admin/index');
        }
    }
    public function News_Content_Update_Submit()
    {
        $this->checkUser();
        $id = strip_tags($this->input->post('news_id'));
        $meta_title = strip_tags($this->input->post('meta_title'));
        $meta_keyword = strip_tags($this->input->post('meta_keyword'));
        $meta_description = strip_tags($this->input->post('meta_description'));
        $image_alt = strip_tags($this->input->post('image_alt'));
        $news_title = strip_tags($this->input->post('news_title'));
        $news_content = $this->input->post('news_description');
        $data = array(
            'News_Title' => $news_title,
            'News_Content' => $news_content,
            'News_Image_Alt' => $image_alt,
            'News_Meta_Title' => $meta_title,
            'News_Meta_Keyword' => $meta_keyword,
            'News_Meta_Description' => $meta_description,
            "News_Update_Date" => date('Y-m-d H:i:s')
        );
        $this->load->model('Admin_model');
        $this->Admin_model->News_Update($id, $data);
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function News_Image_Update_Submit()
    {
        $this->checkUser();
        $id = strip_tags($this->input->post('news_id'));
        $upload_data['path'] = './assets/web-site/images/news/old/original/';
        $upload_data['input'] = 'user_file';
        $picture_filename = $this->uploadPictures($upload_data, 'News');
        $data = array(
            'News_Image' => "assets/news/" . $picture_filename,
            "News_Update_Date" => date('Y-m-d H:i:s')
        );
        $this->load->model('Admin_model');
        $this->Admin_model->News_Update($id, $data);
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function DeleteForEver_News($passed_url = '')
    {
        if ($passed_url != '') {
            $this->load->library('user_agent');
            $this->load->model('Admin_model');
            $this->Admin_model->DeleteNewsForEver(strip_tags($passed_url));
            redirect($this->agent->referrer());
        }
    }
    public function Show_News_Comments($passed_url)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->ListComments($passed_url, 'news');
        $data['news'] = $this->Admin_model->getPostBYID($passed_url, 'news');
        $this->load->view('admin/news/show-news-comment', $data);
    }
    public function Publish_News_Comment($passed_url)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->Publish_Comment($passed_url, 'news');
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function Delete_News_Comment($passed_url)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->Delete_Comment($passed_url, 'blog');
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function newsUrlCheck()
    {
        $value_data = $this->input->post('value_data_posted');
        if ($value_data != '') {
            $posted_data = url_title(strip_tags(str_replace('-', '', $value_data)), "-", True);
            $this->load->model('Admin_model');
            echo json_encode($this->Admin_model->getNewsTitleAjax($posted_data));
        }
    }
    public function PublishNewsByDate()
    {
        $this->load->model('Admin_model');
        $date = date('Y-m-d');
        $this->Admin_model->publishNewsPostOnDate($date);
    }


    public function Manage_Videos()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->fetchVideos();
        $this->load->view('admin/videos/manage-videos', $data);
    }
    public function Add_Videos()
    {
        $this->checkUser();
        $this->load->helper('form');
        $this->load->view('admin/videos/add-videos');
    }
    public function Add_Videos_Submit()
    {
        $this->checkUser();
        $postData = array(
            'url' => strip_tags($this->input->post('url')),
            'url_slug' => url_title($this->input->post('title'), "-", True),
            'description' => $this->input->post('video_description'),
            'title' => strip_tags($this->input->post('title')),
            'status' => 2,
            'primeType' => $this->input->post('type'),
            'sequence' => $this->input->post('Sequence'),
            'language' => $this->input->post('language'),
            'meta_description' => $this->input->post('meta_description')
        );

        $config['upload_path'] = './assets/web-site/images/youtube-cover/Original/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 2048;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('Cover-image')) {
            $file_name = null;
        } else {
            $file_name = $this->upload->data()['file_name'];

            header('Content-Type: image/WebP');
            $name = pathinfo($file_name, PATHINFO_FILENAME);
            $source_image = imagecreatefromjpeg($config['upload_path'] . $file_name);
            imagepalettetotruecolor($source_image);
            imagealphablending($source_image, true);
            imagesavealpha($source_image, true);

            imagewebp($source_image, './assets/web-site/images/youtube-cover/' . $name . ".webp", 60);
            imagedestroy($source_image);
            $file_name = $name . ".webp";
        }
        $postData['cover_image'] = $file_name;

        $this->load->model('Admin_model');
        $this->Admin_model->insertVideos($postData);
        redirect("Admin/Manage_Videos");
    }
    public function Delete_Videos($passed_url = '')
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->delete_Videos($passed_url);
        redirect(base_url() . 'Admin/Manage_Videos');
    }
    public function Trash_Videos()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->trashVideos();
        $this->load->view('admin/videos/trash-videos', $data);
    }
    public function Publish_Videos($passed_url = '')
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->publish_videos($passed_url);
        redirect(base_url() . 'Admin/Trash_Videos');
    }
    public function Edit_Videos($passed_url = '')
    {
        $this->checkUser();
        $this->load->helper('form');
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->GetVideo($passed_url);
        if ($data['results']) {
            $this->load->view('admin/videos/edit-video', $data);
        } else {
            redirect(base_url() . 'Admin/index');
        }
    }
    public function Video_Content_Update_Submit()
    {
        $this->checkUser();
        $id = strip_tags($this->input->post('id'));
        $title = strip_tags($this->input->post('title'));
        $url = strip_tags($this->input->post('url'));
        $type = strip_tags($this->input->post('type'));
        $sequence = strip_tags($this->input->post('sequence'));
        $video_description = $this->input->post('video_description');
        $meta_description = $this->input->post('meta_description');
        $data = array(
            'title' => $title,
            'url' => $url,
            'description' => $video_description,
            'sequence' => $sequence,
            'primeType' => $type,
            'meta_description' => $meta_description
        );
        $this->load->model('Admin_model');
        $this->Admin_model->Videos_Update($id, $data);
        $this->load->library('user_agent');
        redirect($this->agent->referrer());
    }
    public function Video_Cover_Update_Submit()
    {
        $this->checkUser();
        $id = strip_tags($this->input->post('id'));
        $config['upload_path'] = './assets/web-site/images/youtube-cover/Original/';
        $config['allowed_types'] = 'jpg';
        $config['max_size'] = 2048;
        $config['max_width'] = 2000;
        $config['max_height'] = 2000;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('Cover-image')) {
            $file_name = null;
        } else {
            $file_name = $this->upload->data()['file_name'];

            header('Content-Type: image/WebP');
            $name = pathinfo($file_name, PATHINFO_FILENAME);
            $source_image = imagecreatefromjpeg($config['upload_path'] . $file_name);
            imagepalettetotruecolor($source_image);
            imagealphablending($source_image, true);
            imagesavealpha($source_image, true);

            imagewebp($source_image, './assets/web-site/images/youtube-cover/' . $name . ".webp", 60);
            imagedestroy($source_image);
            $file_name = $name . ".webp";
        }

        $data = array(
            'cover_image' => $file_name
        );
        $this->load->model('Admin_model');
        $this->Admin_model->Videos_Update($id, $data);
        $this->load->library('user_agent');
        redirect($this->agent->referrer());

    }
    public function DeleteForEver_Videos($passed_url = '')
    {
        if ($passed_url != '') {
            $this->load->library('user_agent');
            $this->load->model('Admin_model');
            $this->Admin_model->DeleteVideosForEver(strip_tags($passed_url));
            redirect($this->agent->referrer());
        }
    }

    public function Manage_Users()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->fetchUsers();
        $this->load->view('admin/resale/manage-user', $data);
    }
    public function Manage_Resales()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->fetchResales();
        $this->load->view('admin/resale/manage-resale', $data);
    }
    public function Delete_Audition($passed_url = '')
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data = $this->Admin_model->fetchResalesByID($passed_url);

        $this->load->library('email');
        $this->email->from('contact@primepropertyturkey.com', 'Delete Resale Ads');
        $this->email->to($data->UserName);
        $this->email->to($data->UserName);
        $this->email->subject(' Delete Resale Ads ' . $data->UserName);
        $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
            "<br/>".
            "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/base/logo-new.png'>
                    </div>".
            "<br/>".
            date('l jS \of F Y h:i:s A').
            "<br/><br/>".
            " Dear <b> " .$data->UserName . " User </b> <br /> <br/>" .
            " Unfortunately Your ". $data->title. " Resale Ads Deleted By Prime Property Turkey Admin <BR /> <br/>" .
            "Thanks Regards <br />" .
            "</div>";
        $this->email->set_mailtype("html");
        $this->email->message($message);
        $this->email->send();
        $this->email->clear(TRUE);

        $images = $this->getResaleImageName($passed_url);
        foreach ($images as $image) {
            $this->Admin_model->delete_Audition_image($image['id']);
        }
        $this->Admin_model->delete_Audition($passed_url);

        redirect(base_url() . 'Admin/Manage_Resales');
    }
    protected function getResaleImageName($data)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $results = $this->Admin_model->getResaleImageName($data);

        if ($results) {
            $IIG = array();
            foreach ($results as $result) {
                array_push($IIG, array('id' => $result->id, 'image' => $result->image, 'sort' => $result->sort_priority));
            }
            return $IIG;
        } else {
            return false;
        }
    }
    public function PublishResale($passed_url)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data = $this->Admin_model->fetchResalesByReference($passed_url);
        $referenceID = $this->MakeNewReferenceID($this->getLastResaleReferenceID());
        $images = $this->getResaleImageName($data->id);
        if (file_exists('./assets/web-site/images/properties/original/' . str_replace('.jpg', '.webp', $images[0]['image']))) {
            $main_image = str_replace('.jpg', '', $images[0]['image']) . '-' . time() . '.jpg';
        } else {
            $main_image = $images[0]['image'];
        }
        copy('./assets/web-site/images/resales/original/'.$images[0]['image'],'./assets/web-site/images/properties/old/original/'.$main_image);
        $this->thumbnailPost('./assets/web-site/images/properties/old/original/',$main_image,'Property');
        $roll = array(
            'Property_title' => $data->title,
            'Property_price' => $data->price,
            'Property_referenceID' => $referenceID,
            'Property_type' => $data->kind,
            'Property_location' => $data->location,
            'Property_location_city' => $data->location,
            'Property_Bedrooms' => $data->bedroom,
            'Property_Bathrooms' => $data->bathroom,
            'Property_living_space' => $data->living_space,
            'Property_pool' => $data->pool,
            'Property_why_buy_this_property' => '',
            'Property_overview' => $data->description,
            'Property_thumbnail' => 'assets/thumbnail/' . $main_image,
            'url_slug' => 'resale-' . url_title($data->url_slug, "-", True),
            'Property_Meta_Title' => $data->title,
            'Property_Meta_Keyword' => $data->title,
            'Property_Meta_Description' => $data->description,
            'status' => 5,
            'mapLocationURL' => 'https://maps.google.com/maps?hl=en&q=' . $data->map . '&z=13&output=embed',
            'UserID' => $data->UserName,
            'ReferenceLink' => $data->referenceID,
            'recommended' => 1,
            'is_commercial' => 0
        );
        $insert_id = $this->Admin_model->insertProperty($roll);
        foreach ($images as $imageRow) {
            if (file_exists('./assets/web-site/images/properties/original/' . str_replace('.jpg', '.webp', $imageRow['image']))) {
                $image_name = str_replace('.jpg', '', $imageRow['image']) . '-' . time() . '.jpg';
            }else{
                $image_name = $imageRow['image'];
            }
            copy('./assets/web-site/images/resales/resized/'.$imageRow['image'],'./assets/web-site/images/properties/old/original/'.$image_name);
            $this->CreateWhatsapp('./assets/web-site/images/properties/old/original/',$image_name);
            $this->waterMark('./assets/web-site/images/properties/old/original/',$image_name);
            $this->insert_gallery_images($insert_id,$image_name,$imageRow['sort']);
        }
        $set_array = array('status' => 5);
        $this->Admin_model->AuditionPublish($data->id, $set_array);

        $this->load->library('email');
        $this->email->from('contact@primepropertyturkey.com', 'Publish Resale Ads');
        $this->email->to($data->UserName);
        $this->email->subject(' Publish Resale Ads ' . $data->UserName);
        $message = "<div style='background-color: beige ; padding: 40px;text-align: justify'>" .
            "<br/>".
            "<div style='background-color: #012169; padding: 10px;'>
                        <img src='https://www.primepropertyturkey.com/assets/web-site/images/base/logo-new.png'>
                    </div>".
            "<br/>".
            date('l jS \of F Y h:i:s A').
            "<br/><br/>".
            " Dear <b> " .$data->UserName . " User </b> <br /> <br/>" .
            " Your Resale Ads Published By Prime Property Turkey Admin <BR /> <br/>" .
            " You can see your property ads in  : <a href='https://www.primepropertyturkey.com/properties/".$roll['url_slug']."' target='_blank'> " . $data->title . " </a> <br/> <br/> <br/> " .
            "Thanks Regards <br />" .
            "</div>";
        $this->email->set_mailtype("html");
        $this->email->message($message);
        $this->email->send();
        $this->email->clear(TRUE);

        redirect(base_url() . 'Admin/Manage_Resales');
    }
    protected function MakeNewReferenceID($data)
    {
        if ($data == false) {
            return 'RPTV1';
        } else {
            $replacement = 'RPTV';
            $word = (int)str_replace($replacement, '', $data);
            $word++;
            return $replacement . $word;
        }

    }
    protected function getLastResaleReferenceID()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->getLastResaleReferenceIDModel();
        if ($data['results']) {
            return $data['results']->Property_referenceID;
        } else {
            return false;
        }
    }
    public function UnPublishResale($passed_url)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $set_array = array('status' => 3);
        $this->Admin_model->AuditionPublish($passed_url, $set_array);
        redirect(base_url() . 'Admin/Manage_Resales');
    }

    public function Manage_Job()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->fetchJobs();
        $this->load->view('admin/job/manage-job', $data);
    }
    public function Change_Job($passed)
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $this->Admin_model->UpdateJobStatus($passed);
        redirect(base_url() . 'Admin/Manage_Job');
    }
    public function Statistics()
    {
        $this->checkUser();
        $this->load->model('Admin_model');
        $data['results'] = $this->Admin_model->statistics();
        $this->load->view('admin/statistics', $data);
    }
}