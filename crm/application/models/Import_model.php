<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Import_model extends CI_Model {

    private $_batchImport;

    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    }

    // save data
    public function importData() {
        $data = $this->_batchImport;
        $this->db->insert_batch('crm_leads', $data);
    }
    // get employee list
    public function employeeList() {
        $this->db->select(array('e.Lead_id', 'e.first_name', 'e.mobile', 'e.email', 'e.country', 'e.city'));
        $this->db->from('crm_leads as e');
        $query = $this->db->get();
        return $query->result_array();
    }

}
