<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properties extends CI_Controller
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
        $find_array = array('Property_location' => '');
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
        $this->load->view('web-site/properties/Index', $data);
    }

    public function details($passed_url = '')
    {
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
        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            redirect(base_url() . 'properties');
        }
        if (preg_match("/^\d+$/", $passed_url)) {

            $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();

            $data['page_id'] = (int)$passed_url;
            $data['all'] = $this->Fetch_m->record_count('property');
            $pages = (int)ceil($data['all'] / 20);
            $data['pages'] = $pages - 1;

            if ((int)$passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            } else {
                $find_array = array('Property_location' => '');
                $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
                $data['geolocation'] = fetch_geolocation();
                $this->load->view('web-site/properties/Index', $data);
            }
        } else {
            $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();
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
                $data['geolocation'] = fetch_geolocation();
                $this->load->view('web-site/properties/Audition', $data);
            } else {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
        }
    }

    public function favorite()
    {

        $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();

        if (get_cookie('favorite') != null) {
            $favorite_list = get_cookie('favorite');
            $favorite_array = explode(',', $favorite_list);
            $favorite_count = count($favorite_array);
            $pages = (int)ceil($favorite_count / 20);
            $data['pages'] = $pages - 1;
            $data['page_id'] = $this->uri->segment(3, null);
        } else {
            redirect(base_url() . 'Properties');
        }
        if (preg_match("/^\d+$/", $this->uri->segment(3, null)) and get_cookie('favorite') != null) {
            $favorite_list = get_cookie('favorite');
            $favorite_array = explode(',', $favorite_list);

            $favorite_count = count($favorite_array);
            $pages = (int)ceil($favorite_count / 20);
            if ($this->uri->segment(3, null) > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['pages'] = $pages - 1;
            $data['page_id'] = $this->uri->segment(3, null);
            $data['property_result'] = $this->Fetch_m->getFavorites(get_cookie('favorite'), 20, $data['page_id'] * 20);
            $data['geolocation'] = fetch_geolocation();
            $this->load->view('web-site/properties/Favorite', $data);
        } elseif ($this->uri->segment(3, null) == null) {
            $data['property_result'] = $this->Fetch_m->getFavorites(get_cookie('favorite'));
            $data['geolocation'] = fetch_geolocation();
            $this->load->view('web-site/properties/Favorite', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Istanbul($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Istanbul');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (strtoupper($passed_url) == 'APARTMENT') {
            $find_array = array('Property_location' => $data['cityValue'], 'Property_type' => 'Apartment');
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Fethiye($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;


        $where_array = array('Property_location' => 'Fethiye');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Fethiye';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Fethiye');


        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Bursa($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Bursa');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Bursa';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Bursa');


        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Kalkan($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Kalkan');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Kalkan';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Kalkan');


        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Kas($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Kas');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Kas';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Kas');


        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Bodrum($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Bodrum');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Bodrum';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Bodrum');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Gocek($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Gocek');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Gocek';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Gocek');


        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Izmir($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Izmir');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Izmir';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Izmir');


        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Antalya($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Antalya');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Antalya';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Antalya');


        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Yalova($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Yalova');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Yalova';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Yalova');


        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Trabzon($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location' => 'Trabzon');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Trabzon';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Trabzon');


        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Apartment($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $where_array = array('Property_type' => 'Apartment');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Apartment';
        $data['city_description_show'] = False;
        $find_array = array('Property_type' => $data['cityValue']);

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Bungalow($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $where_array = array('Property_type' => 'Bungalow');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Bungalow';
        $data['city_description_show'] = False;
        $find_array = array('Property_type' => $data['cityValue']);

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Hotel($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $where_array = array('Property_type' => 'Hotel');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Hotel';
        $data['city_description_show'] = False;
        $find_array = array('Property_type' => $data['cityValue']);

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Land_for_sale($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $where_array = array('Property_type' => 'Land_for_sale');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Land_for_sale';
        $data['city_description_show'] = False;
        $find_array = array('Property_type' => $data['cityValue']);

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Penthouse($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $where_array = array('Property_type' => 'Penthouse');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Penthouse';
        $data['city_description_show'] = False;
        $find_array = array('Property_type' => $data['cityValue']);

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Villa($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $where_array = array('Property_type' => 'Villa');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Villa';
        $data['city_description_show'] = False;
        $find_array = array('Property_type' => $data['cityValue']);

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Duplex($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $where_array = array('Property_type' => 'Duplex');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Duplex';
        $data['city_description_show'] = False;
        $find_array = array('Property_type' => $data['cityValue']);

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Mansion($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $where_array = array('Property_type' => 'Mansion');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Mansion';
        $data['city_description_show'] = False;
        $find_array = array('Property_type' => $data['cityValue']);

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Commercial($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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


        $data['all'] = $this->Fetch_m->record_count_commercial('property');
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Commercial';
        $data['city_description_show'] = False;

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findPropertyCommercial(20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findPropertyCommercial(20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Search($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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
        if (!$this->input->post('search') and !$this->session->has_userdata('search_phrase')) {
            redirect(base_url());
        }

        $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();


        if ($this->input->post('search')) {
            $this->session->set_userdata('search_phrase', $this->input->post('search'));
        }

        $data['cityValue'] = 'Search';
        $data['city_description_show'] = False;

        $this->load->library('user_agent');

        $this->load->library('form_validation');
        if ($this->form_validation->run('search') != FALSE or $this->session->has_userdata('search_phrase')) {
            $data['search'] = $this->session->userdata('search_phrase');
            $data['all'] = $this->Fetch_m->record_count_search($data['search']);
            $pages = (int)ceil($data['all'] / 20);
            $data['pages'] = $pages - 1;

            $search_result = $this->Fetch_m->search($data['search']);
            if ($search_result) {
                if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
                    $data['property_result'] = $this->Fetch_m->search($data['search']);
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'>  We find " . $data['all'] . " results to according your search data </div>");
                    $this->load->view('web-site/properties/Details', $data);
                } elseif (preg_match("/^\d+$/", $passed_url)) {
                    if ($passed_url > $data['pages']) {
                        $this->output->set_status_header('404');
                        $this->load->view('web-site/Custom404');
                    }
                    $data['page_id'] = (int)$passed_url;
                    $data['property_result'] = $this->Fetch_m->search($data['search'], 20, $data['page_id'] * 20);
                    $this->load->view('web-site/properties/Details', $data);
                } else {
                    $this->output->set_status_header('404');
                    $this->load->view('web-site/Custom404');
                }
            } else {
                $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        search engine <b>NOT</b> work  </div>");
            redirect($this->agent->referrer());
        }
    }

    public function Find($passed_url = '')
    {
        $data = array();
        $data['geolocation'] = fetch_geolocation();

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


        $data['cityValue'] = 'Find';
        $data['city_description_show'] = False;
        $this->load->library('user_agent');
        if ($this->input->post() != null) {
            $this->session->set_userdata('find_phrase', $this->input->post());
        }
        if ($this->input->post('referenceID') != '') {
            $result = $this->Fetch_m->getPropertiesRefer($this->input->post('referenceID'));
            if ($result) {
                $data['pages'] = 0;
                $data['all'] = 1;
                $this->session->set_flashdata('message', "<div id='toast_message' class='success'>  We find results to according your search data </div>");
                $data['property_result'] = $result;
                $this->load->view('web-site/properties/Details', $data);
            } else {
                $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
                redirect(base_url());
            }
        } elseif (($this->input->post('City') and $this->input->post('Type') and $this->input->post('min_price') and $this->input->post('max_price') and $this->input->post('bedroom')) or $this->session->has_userdata('find_phrase')) {
            $data['all'] = $this->Fetch_m->record_count_find($this->session->userdata('find_phrase'));
            $pages = (int)ceil($data['all'] / 20);
            $data['pages'] = $pages - 1;
            $data['SEO_BAR'] = $this->session->userdata('find_phrase');
            if ($data['all']) {
                if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
                    $data['property_result'] = $this->Fetch_m->searchProperty($this->session->userdata('find_phrase'));
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'>  We find " . $data['all'] . " results to according your search data </div>");
                    $this->load->view('web-site/properties/Details', $data);
                } elseif (preg_match("/^\d+$/", $passed_url)) {
                    if ($passed_url > $data['pages']) {
                        $this->output->set_status_header('404');
                        $this->load->view('web-site/Custom404');
                    }
                    $data['page_id'] = (int)$passed_url;
                    $data['property_result'] = $this->Fetch_m->searchProperty($this->session->userdata('find_phrase'), 20, $data['page_id'] * 20);

                    $this->load->view('web-site/properties/Details', $data);
                } else {
                    $this->output->set_status_header('404');
                    $this->load->view('web-site/Custom404');
                }
            } else {
                $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
                redirect(base_url());
            }
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Featured($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = False;

        $data['all'] = $this->Fetch_m->countFeaturedProperty();
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Featured';

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findFeaturedProperty();
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findFeaturedProperty(20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Adalar($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Adalar');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Adalar');
        $find_array = array('Property_location_city' => 'Adalar');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Arnavutkoy($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Arnavutkoy', 'hamidkoy');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Arnavutkoy');
        $find_array = array('Arnavutkoy', 'hamidkoy');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Atasehir($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Atasehir');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Atasehir');
        $find_array = array('Property_location_city' => 'Atasehir');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Avcilar($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Avcilar');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Avcilar');
        $find_array = array('Property_location_city' => 'Avcilar');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Bagcilar($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Bagcilar');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Bagcilar');
        $find_array = array('Property_location_city' => 'Bagcilar');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Bahcelievler($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Bahcelievler');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Bahcelievler');
        $find_array = array('Property_location_city' => 'Bahcelievler');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Bakirkoy($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Bakirkoy', 'atakoy');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Bakirkoy');
        $find_array = array('Bakirkoy', 'atakoy');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Basaksehir($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Basaksehir', 'bahcesehir', 'ispartakule');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Basaksehir');
        $find_array = array('Basaksehir', 'bahcesehir', 'ispartakule');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Bayrampasa($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Bayrampasa');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Bayrampasa');
        $find_array = array('Property_location_city' => 'Bayrampasa');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Besiktas($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Besiktas', 'levent');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Besiktas');
        $find_array = array('Besiktas', 'levent');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Beykoz($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Beykoz');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Beykoz');
        $find_array = array('Property_location_city' => 'Beykoz');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Beylikduzu($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Beylikduzu');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Beylikduzu');
        $find_array = array('Property_location_city' => 'Beylikduzu');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Beyoglu($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Beyoglu', 'taksim');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Beyoglu');
        $find_array = array('Beyoglu', 'taksim');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Buyukcekmece($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Buyukcekmece');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Buyukcekmece');
        $find_array = array('Property_location_city' => 'Buyukcekmece');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Catalca($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Catalca');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Catalca');
        $find_array = array('Property_location_city' => 'Catalca');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Cekmekoy($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Cekmekoy');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Cekmekoy');
        $find_array = array('Property_location_city' => 'Cekmekoy');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Esenler($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Esenler');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Esenler');
        $find_array = array('Property_location_city' => 'Esenler');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Esenyurt($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Esenyurt');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Esenyurt');
        $find_array = array('Property_location_city' => 'Esenyurt');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Eyup($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Eyup', 'Kemerburgaz');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Eyup');
        $find_array = array('Eyup', 'Kemerburgaz');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Fatih($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Fatih', 'topkapi');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Fatih');
        $find_array = array('Fatih', 'topkapi');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Gaziosmanpasa($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Gaziosmanpasa');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Gaziosmanpasa');
        $find_array = array('Property_location_city' => 'Gaziosmanpasa');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Gungoren($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Gungoren');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Gungoren');
        $find_array = array('Property_location_city' => 'Gungoren');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Kadikoy($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Kadikoy', 'Fikirtepe', 'kozyatagi', 'kosuyolu');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Kadikoy');
        $find_array = array('Kadikoy', 'Fikirtepe', 'kozyatagi', 'kosuyolu');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Kagithane($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Kagithane');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Kagithane');
        $find_array = array('Property_location_city' => 'Kagithane');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Kartal($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Kartal');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Kartal');
        $find_array = array('Property_location_city' => 'Kartal');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Kucukcekmece($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Kucukcekmece');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Kucukcekmece');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Maltepe($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Maltepe');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Maltepe');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Pendik($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Pendik');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Pendik');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Sancaktepe($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Sancaktepe');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Sancaktepe');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Sariyer($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Sariyer', 'maslak', 'emirgan', 'zekeriyakoy');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Sariyer', 'maslak', 'emirgan', 'zekeriyakoy');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Sile($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Sile');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Sile');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Sisli($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Sisli', 'Mecidiyekoy', 'Bomonti', 'Nisantasi');
        $data['all'] = $this->Fetch_m->record_count_ilce('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Sisli');
        $find_array = array('Sisli', 'Mecidiyekoy', 'Bomonti', 'Nisantasi');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty_ilce($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Sultanbeyli($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Sultanbeyli');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Sultanbeyli');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Sultangazi($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Sultangazi');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Sultangazi');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Tuzla($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Tuzla');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Tuzla');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Umraniye($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Umraniye');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Umraniye');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Silivri($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Silivri');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Silivri');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Uskudar($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Uskudar');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Uskudar');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }

    public function Zeytinburnu($passed_url = '')
    {
        $data['geolocation'] = fetch_geolocation();

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

        $data['city_description_show'] = True;

        $where_array = array('Property_location_city' => 'Zeytinburnu');
        $data['all'] = $this->Fetch_m->record_count('property', $where_array);
        $pages = (int)ceil($data['all'] / 20);
        $data['pages'] = $pages - 1;

        $data['cityValue'] = 'Istanbul';
        $find_array = array('Property_location' => $data['cityValue']);
        $data['CityIntroduce'] = $this->Fetch_m->fetchCityIntroduce('Istanbul');
        $find_array = array('Property_location_city' => 'Zeytinburnu');

        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20);
            $this->load->view('web-site/properties/Details', $data);
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            if ($passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['page_id'] = (int)$passed_url;
            $data['property_result'] = $this->Fetch_m->findProperty($find_array, 20, $data['page_id'] * 20);
            $this->load->view('web-site/properties/Details', $data);
        } else {
            $this->output->set_status_header('404');
            $this->load->view('web-site/Custom404');
        }
    }
}