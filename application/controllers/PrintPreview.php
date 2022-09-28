<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PrintPreview extends CI_Controller
{
    public function setPrintView($passed_url=''){
        $data= array();
        $data['passed_url']=$passed_url;
        $this->load->model('Fetch_m');
        $find_array = array('Property_id' => strip_tags($passed_url));
        $data['property_result'] = $this->Fetch_m->findProperty($find_array);
        if ($data['property_result']) {
            foreach ($data['property_result'] as $result){
                $data['property_image_gallery'] = $this->Fetch_m->get_gallery($result->Property_id,2);
            }
            $this->load->view('web-site/properties/PrintPreview',$data);

        }else{
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }
    public function setResalePrintView($passed_url=''){
        $data= array();
        $data['passed_url']=$passed_url;
        $this->load->model('Resale_Model');
        $find_array = array('id' => strip_tags($passed_url));
        $data['property_result'] = $this->Resale_Model->findResaleAudition($find_array);
        if ($data['property_result']) {
            foreach ($data['property_result'] as $result){
                $data['property_image_gallery'] = $this->Resale_Model->get_resale_gallery($result->id,2);
            }
            $this->load->view('web-site/resale/PrintResalePreview',$data);

        }else{
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }
}