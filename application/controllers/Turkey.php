<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Turkey extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('Turkey_model');
        $this->load->helper('geolocation_helper');
    }

    public function index($passed_url ='')
    {

        $given_array = explode("_",$passed_url);

        $city = str_replace('-cities','',$given_array[0]);
        $type = str_replace('-types','',$given_array[1]);
        $bedroom = str_replace('-bedroom','',$given_array[2]);
        $price = $given_array[3];
        $price_array = explode("-",$price);
        $min_price = $price_array[0];
        if ($min_price=='0'){
            $min_price = 'min';
        }
        $max_price = $price_array[1];
        $find_string = array(
            'City'=>$city,
            'Type'=>$type,
            'bedroom'=>$bedroom,
            'min_price'=>$min_price,
            'max_price'=>$max_price

        );
        $data = array();
        $cityNames = $this->Turkey_model->fetchCityNames();
        $data['cityNames']=array();
        foreach ($cityNames as $value){
            array_push($data['cityNames'],$value["Property_location"]);
        }
        $ProType = $this->Turkey_model->fetchPropertyTypes();
        $data['ProType']=array();
        foreach ($ProType as $value){
            array_push($data['ProType'],$value["Property_type"]);
        }
        $proBed = $this->Turkey_model->fetchPropertyBed();
        $data['proBed']=array();
        foreach ($proBed as $value){
            array_push($data['proBed'],$value["Property_Bedrooms"]);
        }
        $data['currency_exchange_data'] = $this->Turkey_model->currencyExchange();
        $this->load->helper('favorite');

        $data['cityValue'] = 'Find';
        $data['city_description_show'] = False;
        if ($find_string){
            if ($type!='Commercial'){
                $data['all'] = $this->Turkey_model->record_count_find($find_string);
                $pages = (int)ceil($data['all'] / 20);
                $data['pages'] = $pages - 1;
                $data['property_result'] = $this->Turkey_model->searchPropertyAll($find_string);

                $data['SEO_BAR']=$find_string;
                if ($data['all']) {
                    $data['page_url']= base_url()."Turkey/".$given_array[0]."/".$given_array[1]."/".$given_array[2]."/".$given_array[3];
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'>  We find " . $data['all'] . " results to according your search data </div>");
                    $data['geolocation']=fetch_geolocation();
                    $this->load->view('web-site/properties/find-result', $data);
                }else{
                    $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
                    redirect(base_url());
                }
            }else{
                $data['all'] = $this->Turkey_model->record_count_find_Commercial($find_string);
                $pages = (int)ceil($data['all'] / 20);
                $data['pages'] = $pages - 1;
                $data['property_result'] = $this->Turkey_model->searchPropertyAllCommercial($find_string);
                $data['SEO_BAR']=$find_string;
                if ($data['all']) {
                    $data['page_url']= base_url()."Turkey/".$given_array[0]."/".$given_array[1]."/".$given_array[2]."/".$given_array[3];
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'>  We find " . $data['all'] . " results to according your search data </div>");
                    $data['geolocation']=fetch_geolocation();
                    $this->load->view('web-site/properties/find-result', $data);
                }else{
                    $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
                    redirect(base_url());
                }
            }

            } else {
                $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
                redirect(base_url());
            }
        }

    public function pagination($passed_url='')
    {
        $given_array = explode("_",$passed_url);
        $city = str_replace('-cities','',$given_array[0]);
        $type = str_replace('-types','',$given_array[1]);
        $bedroom = str_replace('-bedroom','',$given_array[2]);
        $price = $given_array[3];
        $page_id=$given_array[4];
        $price_array = explode("-",$price);
        $min_price = $price_array[0];
        if ($min_price=='0'){
            $min_price = 'min';
        }
        $max_price = $price_array[1];
        $find_string = array(
            'City'=>$city,
            'Type'=>$type,
            'bedroom'=>$bedroom,
            'min_price'=>$min_price,
            'max_price'=>$max_price

        );

        $data = array();
        $cityNames = $this->Turkey_model->fetchCityNames();
        $data['cityNames']=array();
        foreach ($cityNames as $value){
            array_push($data['cityNames'],$value["Property_location"]);
        }
        $ProType = $this->Turkey_model->fetchPropertyTypes();
        $data['ProType']=array();
        foreach ($ProType as $value){
            array_push($data['ProType'],$value["Property_type"]);
        }
        $proBed = $this->Turkey_model->fetchPropertyBed();
        $data['proBed']=array();
        foreach ($proBed as $value){
            array_push($data['proBed'],$value["Property_Bedrooms"]);
        }
        $data['currency_exchange_data'] = $this->Turkey_model->currencyExchange();
        $this->load->helper('favorite');

        $data['cityValue'] = 'Find';
        $data['city_description_show'] = False;
        if ($type!='Commercial') {
            $data['all'] = $this->Turkey_model->record_count_find($find_string);
        }else{
            $data['all'] = $this->Turkey_model->record_count_find_Commercial($find_string);
        }
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;
        $data['SEO_BAR']=$find_string;
        $data['page_url']= base_url()."Turkey/".$given_array[0]."/".$given_array[1]."/".$given_array[2]."/".$given_array[3];

        if (preg_match("/^\d+$/", $page_id)){
            $data['page_id'] = (int)$page_id;
            if ($type!='Commercial'){
                $data['property_result'] = $this->Turkey_model->searchPropertyAll($find_string, 20, $data['page_id'] * 20);
            }else{
                $data['property_result'] = $this->Turkey_model->searchPropertyAllCommercial($find_string ,20, $data['page_id'] * 20);
            }
            $data['geolocation']=fetch_geolocation();
            $this->load->view('web-site/properties/find-result', $data);
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
            redirect(base_url());
        }
    }

}