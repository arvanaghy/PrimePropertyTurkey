<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Csv extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Csv_Model');
    }

//    public function lets()
//    {
//        if(($handle = fopen("dubai-List.csv","r")) !== FALSE) {
//            $n=1;
//            while (($row = fgetcsv($handle)) !== FALSE) {
//                $name = $row[0];
//                $first_name = substr($name,0,strpos($name," "));
//                $second_name = substr($name,strpos($name," "));
//                $email = $row[1];
//                $mobile = $row[2];
//
//                date_default_timezone_set('Europe/Istanbul');
//                $lead_create_date = date('Y-m-d H:i:s');
//
//                $data = array(
//                    'first_name'=>$first_name,
//                    'second_name'=>$second_name,
//                    'email'=>$email,
//                    'mobile'=>$mobile,
//                    'dubai_pool'=>1,
//                    'source_of_enquiry'=>'dubai_pool',
//                    'Referance_id'=>'dubai_pool',
//                    'Lead_created_date'=>$lead_create_date
//                );
//                $this->Csv_Model->insertToCRM($data);
//                echo $n++."<br />";
//
//            }
//        }
//    }
    public function del()
    {
        $this->Csv_Model->delFromCRM();

    }
}