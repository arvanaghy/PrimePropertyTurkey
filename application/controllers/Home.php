<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('Home_model');
        $this->load->helper(array('favorite','geolocation_helper'));
        $data['geolocation'] = fetch_geolocation();
        $data['news_recent'] = $this->Home_model->news(2);
        $data['blog_recent'] = $this->Home_model->popular_blog(4);
        $cityNames = $this->Home_model->fetchCityNames();
        $data['cityNames']=array();
        foreach ($cityNames as $value){
            array_push($data['cityNames'],$value["Property_location"]);
        }
        $ProType = $this->Home_model->fetchPropertyTypes();
        $data['ProType']=array();
        foreach ($ProType as $value){
            array_push($data['ProType'],$value["Property_type"]);
        }
        $proBed = $this->Home_model->fetchPropertyBed();
        $data['proBed']=array();
        foreach ($proBed as $value){
            array_push($data['proBed'],$value["Property_Bedrooms"]);
        }
        $data['recommended_properties_all'] = $this->Home_model->recommendedProperties();
        $data['currency_exchange_data'] = $this->Home_model->currencyExchange();
        $data['YoutubeVideos'] = $this->Home_model->YoutubeVideos();
        $this->load->view('web-site/index',$data);
    }
}