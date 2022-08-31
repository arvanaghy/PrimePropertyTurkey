<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AjaxRequest extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Fetch_ajax');
    }
    public function propertyType()
    {
        $City = $this->input->post('City');
        $available_types =$this->Fetch_ajax->fetchPropertyTypeByCity($City);
        echo json_encode($available_types);
    }
    public function propertyBed()
    {
        $City = $this->input->post('City');
        $available_types =$this->Fetch_ajax->fetchPropertyBedByCity($City);
        echo json_encode($available_types);
    }
    public function propertyTypeBedroom()
    {
        $City = $this->input->post('City');
        $pro_type = $this->input->post('pro_type');
        $available_types =$this->Fetch_ajax->fetchPropertyBedByCityANDType($City,$pro_type);
        echo json_encode($available_types);
    }
}