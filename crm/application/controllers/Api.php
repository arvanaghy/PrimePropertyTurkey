<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function index(){
        if ($this->input->post('budget')){
            $budget = strip_tags($this->input->post('budget'));
        }else{
            $budget='';
        }
        if ($this->input->post('reference')){
            $reference = strip_tags($this->input->post('reference'));
        }else{
            $reference='';
        }
        if ($this->input->post('message')){
            $message = strip_tags($this->input->post('message'));
        }else{
            $message='';
        }
        date_default_timezone_set('Europe/Istanbul');
        $lead_create_date = date('Y-m-d H:i:s');
        if ($this->input->post('name')==null){
            $post_data = array(
                'first_name'=>strip_tags($this->input->post('first_name')),
                'second_name'=>strip_tags($this->input->post('last_name')),
                'email'=>strip_tags($this->input->post('email')),
                'mobile'=>strip_tags($this->input->post('phone')),
                'city'=>strip_tags($this->input->post('city')),
                'origin_country'=>strip_tags($this->input->post('country')),
                'country'=>strip_tags($this->input->post('country')),
                'source_of_enquiry'=>strip_tags($this->input->post('source')),
                'maximum_budget'=>$budget,
                'Referance_id'=>$reference,
                'message'=>$message,
                'Lead_created_date'=>$lead_create_date,
                'web_come'=>1
            );
        }else{
            $post_data = array(
                'first_name'=>strip_tags($this->input->post('name')),
                'email'=>strip_tags($this->input->post('email')),
                'mobile'=>strip_tags($this->input->post('phone')),
                'city'=>strip_tags($this->input->post('city')),
                'origin_country'=>strip_tags($this->input->post('country')),
                'country'=>strip_tags($this->input->post('country')),
                'source_of_enquiry'=>strip_tags($this->input->post('source')),
                'maximum_budget'=>$budget,
                'Referance_id'=>$reference,
                'message'=>$message,
                'Lead_created_date'=>$lead_create_date,
                'web_come'=>1
            );
        }

        $this->load->model('Api_model');
        $lead_id = $this->Api_model->insertToCRM($post_data);

        if ( $message !='' and $lead_id ){
            $history_data = array(
                "History_Referance"=> strip_tags($this->input->post('source')),
                "History_User_id"=>1,
                "History_Lead_id"=>$lead_id,
                "History_Status"=>"Followup",
                "History_Description"=>"<p> ".$this->input->post('message')." </p>",
                "History_Notes"=>"",
                "History_Date"=>$lead_create_date
            );
            $this->Api_model->insertToHistory($history_data);
        }
    }
}