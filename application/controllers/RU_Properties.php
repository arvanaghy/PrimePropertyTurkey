<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RU_Properties extends CI_Controller
{
    public function index($passed_url= '')
    {
        $this->load->helper('geolocation_helper');
        $this->load->helper('favorite');
        $this->load->model('Fetch_m');
        $this->load->helper('form');
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
        $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();
        $data['geolocation'] = fetch_geolocation();

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $find_array = array('Property_location' => '');
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $data['all'] = $all_count = $this->Fetch_m->record_count('property');
            $pages = (int)ceil($all_count / 20);
            $data['pages'] = $pages - 1;
            $this->load->view('web-site/ru/properties/Index', $data);

        }elseif (preg_match("/^\d+$/", $passed_url)) {


            $data['page_id'] = (int)$passed_url;
            $data['all'] = $this->Fetch_m->record_count('property');
            $pages = (int)ceil($data['all'] / 20);
            $data['pages'] = $pages - 1;

            if ((int)$passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/ru/Custom404');
            } else {
                $find_array = array('Property_location' => '');
                $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
                $this->load->view('web-site/ru/properties/Index', $data);
            }
        } else {
            $find_array = array('url_slug' => urldecode(strip_tags($passed_url)));
            $data['property_result'] = $this->Fetch_m->findPropertyExact($find_array);
            if ($data['property_result']) {
                foreach ($data['property_result'] as $result) {
                    $data['property_image_gallery'] = $this->Fetch_m->get_gallery($result->Property_id);
                    $data['Recommended_Neighborhood_Properties'] = $this->Fetch_m->get_Neighborhood_Properties($result->Property_location_city, $result->Property_id);
                }
                if (!$data['Recommended_Neighborhood_Properties']) {
                    $find_array = array('Property_location' => '');
                    $data['recently_added'] = $this->Fetch_m->findProperty($find_array, 4);
                }
                $this->load->view('web-site/ru/properties/Audition', $data);
            } else {
                $this->output->set_status_header('404');
                $this->load->view('web-site/ru/Custom404');
            }
        }
    }
}