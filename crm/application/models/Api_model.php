<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_model extends CI_Model
{
    public function insertToCRM($data)
    {
        $this->db->insert('crm_leads',$data);
        return $this->db->insert_id();
    }

    public function insertToHistory($data)
    {
        $this->db->insert('crm_history',$data);
    }
}