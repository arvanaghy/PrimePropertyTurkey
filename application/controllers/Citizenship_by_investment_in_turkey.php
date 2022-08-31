<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Citizenship_by_investment_in_turkey extends CI_Controller
{
    public function index()
    {
        $this->load->helper(array('favorite','text','geolocation_helper','like'));
        $this->load->model('CitizenShip_model');
        $search_array = array('istanbul','fethiye','kalkan','kas','gocek','antalya');
        $recommended_properties = $this->CitizenShip_model->citizenShipSuitable();
        $data['currency_exchange_data'] = $this->CitizenShip_model->currencyExchange();
        $data['recommended_properties_all']= array();
        foreach ($search_array as $phrase){
            if ($recommended_properties[$phrase]){
                array_push($data['recommended_properties_all'],$recommended_properties[$phrase][rand(0,count($recommended_properties[$phrase])-1)]);
            }
        }
        $data['geolocation'] = fetch_geolocation();
        $this->load->view('web-site/Citizenship_by_investment',$data);
    }
}