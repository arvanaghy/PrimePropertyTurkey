<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Import extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Import_model', 'import');
    }

    // upload xlsx|xls file
    public function index() {
        $data['page'] = 'import';
        $data['title'] = '';
        $this->load->view('import/index', $data);
    }
    public function display() {
        $data['page'] = 'import';
        $data['title'] = '';
        $data['employeeInfo'] = $this->import->employeeList();
        $this->load->view('import/display', $data);
    }    
    // import excel data
    public function save() {
        error_reporting(0);
        $this->load->library('excel');
        
        if ($this->input->post('importfile')) {
            $path = ROOT_UPLOAD_IMPORT_PATH;

            $config['upload_path'] = $path;
            $config['allowed_types'] = 'xlsx|xls';
            $config['remove_spaces'] = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('userfile')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
               $data = array('upload_data' => $this->upload->data());
            //   print_r($data);
            }
            
            if (!empty($data['upload_data']['file_name'])) {
                $import_xls_file = $data['upload_data']['file_name'];
            } else {
                $import_xls_file = 0;
            }
            $inputFileName = $path . $import_xls_file;
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME)
                        . '": ' . $e->getMessage());
            }
            $allDataInSheet = $objPHPExcel->getActiveSheet()->toArray(null, true, true, true);
            // echo"<pre>";
            // print_r($allDataInSheet);
            // echo"</pre>";
            $arrayCount = count($allDataInSheet);
            $flag = 0;
            $createArray = array('email', 'full_name', 'country', 'city', 'phone_number', 'created_time', 's', 'when_are_you_planning_to_visit_turkey_?');
            $makeArray = array('name' => 'full_name', 'origin_country' => 'country', 'email' => 'email', 'city' => 'city', 'phone' => 'phone_number','Lead_created_date'=>'created_time', 'source_of_enquiry'=>'s', 'visiting_date'=>'when_are_you_planning_to_visit_turkey_?');
            $SheetDataKey = array();
            foreach ($allDataInSheet as $dataInSheet) {
                foreach ($dataInSheet as $key => $value) {
                    if (in_array(trim($value), $createArray)) {
                        $value = preg_replace('/\s+/', '', $value);
                        //echo"<br>";
                        $SheetDataKey[trim($value)] = $key;
                    } else {
                        
                    }
                }
                //print_r($dataInSheet['O']);
            }

                for ($i = 2; $i <= $arrayCount; $i++) {
                    $addresses = array();
                    $full_name = $SheetDataKey['full_name'];
                    $country = $SheetDataKey['country'];
                    $email = $SheetDataKey['email'];
                    $city = $SheetDataKey['city'];
                    $phone = $SheetDataKey['phone_number'];
                    $created_time = $SheetDataKey['created_time'];
                    $platform = $SheetDataKey['s'];
                    $visit = $SheetDataKey['when_are_you_planning_to_visit_turkey_?'];
                    $full_name = filter_var(trim($allDataInSheet[$i][$full_name]), FILTER_SANITIZE_STRING);
                    $country = filter_var(trim($allDataInSheet[$i][$country]), FILTER_SANITIZE_STRING);
                    $email = filter_var(trim($allDataInSheet[$i][$email]), FILTER_SANITIZE_EMAIL);
                    $city = filter_var(trim($allDataInSheet[$i][$city]), FILTER_SANITIZE_STRING);
                    $phone = filter_var(trim($allDataInSheet[$i][$phone]), FILTER_SANITIZE_STRING);
                    $created_time = filter_var(trim($allDataInSheet[$i][$created_time]), FILTER_SANITIZE_STRING);
                    $platform = filter_var(trim($allDataInSheet[$i][$platform]), FILTER_SANITIZE_STRING);
                    $visit = filter_var(trim($allDataInSheet[$i][$visit]), FILTER_SANITIZE_STRING);
                    $old_date_timestamp = strtotime($created_time);
    				$new_date = date('Y-m-d h:i:s', $old_date_timestamp); 
    				// print_r($new_date);
                    $fetchData[] = array('first_name' => $full_name, 'origin_country' => $country, 'email' => $email, 'city' => $city, 'mobile' => $phone, 'Lead_created_date'=>$new_date, 'source_of_enquiry'=>$platform, 'visiting_date'=>$visit);
                }              
                $data['employeeInfo'] = $fetchData;
                // print_r($data);
                $this->import->setBatchImport($fetchData);
                $this->import->importData();
        }
        $this->load->view('import/display', $data);
        
    }

}
