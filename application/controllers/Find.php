<?php
defined('BASEPATH') or exit('No direct script access allowed');
class  Find extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->model('Fetch_m');
        $this->load->helper('geolocation_helper');

    }
    public function index($passed_url ='')
    {
        $data = array();
        $cityNames = $this->Fetch_m->fetchCityNames();
        $data['cityNames']=array();
        foreach ($cityNames as $value){
            array_push($data['cityNames'],$value["Property_location"]);
        }
        $ProType = $this->Fetch_m->fetchPropertyTypes();
        $data['ProType']=array();
        foreach ($ProType as $value){
            array_push($data['ProType'],$value["Property_type"]);
        }
        $proBed = $this->Fetch_m->fetchPropertyBed();
        $data['proBed']=array();
        foreach ($proBed as $value){
            array_push($data['proBed'],$value["Property_Bedrooms"]);
        }
        $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();
        $this->load->helper('favorite');

        $data['cityValue'] = 'Find';
        $data['city_description_show'] = False;

        if ($this->input->post('referenceID') != '') {
            $result = $this->Fetch_m->getPropertiesRefer($this->input->post('referenceID'));
            if ($result) {
                $data['pages'] = 0;
                $data['all'] = 1;
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>  We find results to according your search data </div>");
                $data['property_result'] = $result;
                $data['geolocation']=fetch_geolocation();
                $this->load->view('web-site/properties/Details', $data);
            } else {
                $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
                redirect(base_url());
            }
        }elseif ($this->input->post()){
            $city = $this->input->post('City');
            if ($city=='All'){
                $city = 'All-cities';
            }
            $type_property = $this->input->post('Type');
            if ($type_property=='All'){
                $type_property = 'All-types';
            }
            $min_price = $this->input->post('min_price');
            if ($min_price=='min'){
                $min_price = '0';
            }
            redirect(base_url()."Turkey/".$city."/".$type_property."/".$this->input->post('bedroom')."-bedroom"."/".$min_price."-".$this->input->post('max_price'));
        }else{
            $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
            redirect(base_url());
        }

    }
}
