<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Istanbul_Penthouses extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fetch_m');
        $this->load->helper('geolocation_helper');
        $this->load->helper('favorite');
    }
    public function index()
    {
        $find_array = array('Istanbul_Penthouse' => 1);
        $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
        $data['all'] = $all_count = $this->Fetch_m->record_count('property');
        $pages = (int)ceil($all_count / 20);
        $data['pages'] = $pages - 1;
        $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();

        $cityNames = $this->Fetch_m->fetchCityNames();
        $data['cityNames'] = array();
        foreach ($cityNames as $value) {
            array_push($data['cityNames'], $value["Property_location"]);
        }
        $ProType = $this->Fetch_m->fetchPropertyTypes();
        $data['ProType'] = array();
        foreach ($ProType as $value) {
            array_push($data['ProType'], $value["Property_type"]);
        }
        $proBed = $this->Fetch_m->fetchPropertyBed();
        $data['proBed'] = array();
        foreach ($proBed as $value) {
            array_push($data['proBed'], $value["Property_Bedrooms"]);
        }
        $data['geolocation'] = fetch_geolocation();
        $this->load->view('web-site/properties/Istanbul-Penthouse', $data);
    }


}