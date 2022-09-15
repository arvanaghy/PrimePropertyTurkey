<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Seo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Seo_Model');
    }

    public function sitemap()
    {
        $data = array();
        $data['price_array'] = array(100000,200000,300000,400000,500000,1000000);
        $data['Properties'] = $this->Seo_Model->listPropertiesUrl();
        $data['Property_ILCE'] = array(
            'Zeytinburnu',
            'Uskudar',
            'Silivri',
            'Umraniye',
            'Tuzla',
            'Sultangazi',
            'Sultanbeyli',
            'Sisli',
            'Sile',
            'Silivri',
            'Sariyer',
            'Sancaktepe',
            'Pendik',
            'Maltepe',
            'Kucukcekmece',
            'Kartal',
            'Kagithane',
            'Kadikoy',
            'Gungoren',
            'Gaziosmanpasa',
            'Fatih',
            'Eyup',
            'Esenyurt',
            'Esenler',
            'Cekmekoy',
            'Catalca',
            'Buyukcekmece',
            'Beyoglu',
            'Beylikduzu',
            'Beykoz',
            'Besiktas',
            'Bayrampasa',
            'Basaksehir',
            'Bakirkoy',
            'Bahcelievler',
            'Bagcilar',
            'Avcilar',
            'Atasehir',
            'Arnavutkoy',
            'Adalar'
        );
        $data['Blog'] = $this->Seo_Model->listBlogUrl();
        $data['News'] = $this->Seo_Model->listNewsUrl();
        $data['Videos'] = $this->Seo_Model->listVideoUrl();
        $data['Property_pages'] = $this->Seo_Model->listPropertyPagesUrl();
        $data['Property_Types'] = $this->Seo_Model->listPropertyTypesUrl();
        $data['Property_Bedrooms'] = $this->Seo_Model->listPropertyBedroomsUrl();
        $data['Property_City_Type_Filters'] = $this->Seo_Model->listPropertyCityTypeFiltersUrl();
        $data['Property_City_Bedroom_Filters'] = $this->Seo_Model->listPropertyCityBedroomFiltersUrl();
        foreach ($data['price_array'] as $price){
            $data['Property_City_Price_'.$price.'_Filters'] = $this->Seo_Model->listPropertyCityPriceFiltersUrl($price);
        }
        $data['Property_Type_Bedroom_Filters'] = $this->Seo_Model->listPropertyTypeBedroomFiltersUrl();
        foreach ($data['price_array'] as $price){
            $data['Property_Type_Bedroom_Price_'.$price.'_Filters'] = $this->Seo_Model->listPropertyTypeBedroomPriceFiltersUrl($price);
        }
        $data['Property_City_Type_Bedroom_Filters'] = $this->Seo_Model->listPropertyCityTypeBedroomFiltersUrl();
        foreach ($data['price_array'] as $price){
            $data['Property_City_Type_Bedroom_price_'.$price.'_Filters'] = $this->Seo_Model->listPropertyCityTypeBedroomPriceFiltersUrl($price);
        }
        foreach ($data['price_array'] as $price){
            $data['Property_Bedroom_price_'.$price.'_Filters'] = $this->Seo_Model->listPropertyBedroomPriceFiltersUrl($price);
        }
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("web-site/sitemap",$data);
    }
}