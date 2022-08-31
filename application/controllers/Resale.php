<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resale extends CI_Controller
{

    public function index()
    {
        $this->load->view('web-site/resale-page');
    }
//    public function __construct()
//    {
//        parent::__construct();
//        $this->load->model('Resale_Model');
//        $this->load->model('Fetch_m');
//    }
//
//    public function index()
//    {
//        $this->load->helper('favorite');
//
//        $data['property_result'] = $this->Resale_Model->ListResaleProperties(5);
//        $data['all'] = $all_count = $this->Resale_Model->countResaleProperties();
//        $pages = (int)ceil($all_count / 5);
//        $data['pages'] = $pages - 1;
//        $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();
//
//        $cityNames = $this->Fetch_m->fetchCityNames();
//        $data['cityNames']=array();
//        foreach ($cityNames as $value){
//            array_push($data['cityNames'],$value["Property_location"]);
//        }
//        $ProType = $this->Fetch_m->fetchPropertyTypes();
//        $data['ProType']=array();
//        foreach ($ProType as $value){
//            array_push($data['ProType'],$value["Property_type"]);
//        }
//        $proBed = $this->Fetch_m->fetchPropertyBed();
//        $data['proBed']=array();
//        foreach ($proBed as $value){
//            array_push($data['proBed'],$value["Property_Bedrooms"]);
//        }
//        $this->load->view('web-site/resale/Index', $data);
//    }
//
//    public function details($passed_url = '')
//    {
//        $this->load->helper('form');
//        $cityNames = $this->Fetch_m->fetchCityNames();
//        $data['cityNames']=array();
//        foreach ($cityNames as $value){
//            array_push($data['cityNames'],$value["Property_location"]);
//        }
//        $ProType = $this->Fetch_m->fetchPropertyTypes();
//        $data['ProType']=array();
//        foreach ($ProType as $value){
//            array_push($data['ProType'],$value["Property_type"]);
//        }
//        $proBed = $this->Fetch_m->fetchPropertyBed();
//        $data['proBed']=array();
//        foreach ($proBed as $value){
//            array_push($data['proBed'],$value["Property_Bedrooms"]);
//        }
//        if (strtoupper($passed_url) == 'INDEX' OR $passed_url=='') {
//            redirect(base_url() . 'Resale');
//        }
//        if (preg_match("/^\d+$/", $passed_url)) {
//
//
//            $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();
//            $this->load->helper('favorite');
//            $data['page_id'] = (int)$passed_url;
//            $data['all'] = $this->Resale_Model->countResaleProperties();
//            $pages = (int)ceil($data['all'] / 5);
//            $data['pages'] = $pages - 1;
//
//            if ((int)$passed_url > $data['pages']) {
//                redirect(base_url() . 'Custom404');
//            } else {
//
//                $data['property_result'] = $this->Resale_Model->ListResaleProperties( 5, $data['page_id'] * 5);
//                $this->load->view('web-site/properties/resale', $data);
//            }
//        } else {
//            $find_array = array('Property_location' => '');
//            $data['recently_added'] = $this->Fetch_m->findProperty($find_array, 8);
//            $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();
//            $this->load->helper('favorite');
//
//            $find_array = array('url_slug' => urldecode(strip_tags($passed_url)));
//            $data['property_result'] = $this->Resale_Model->findResaleAudition($find_array);
//            if ($data['property_result']) {
//                foreach ($data['property_result'] as $result){
//                    $data['property_image_gallery'] = $this->Resale_Model->get_resale_gallery($result->id);
//                    $data['Recommended_Neighborhood_Properties'] = null;
//                }
//                $this->load->view('web-site/resale/Audition', $data);
//            } else {
//                redirect(base_url() . 'Custom404');
//            }
//        }
//    }
}