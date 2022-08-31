<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Csv_Model extends CI_Model
{
    public function insertToCRM($data)
    {
        $this->db->insert('crm_leads',$data);
    }

    public function delFromCRM()
    {
        $this->db->delete('crm_leads', array('dubai_pool' => 1));
    }
}