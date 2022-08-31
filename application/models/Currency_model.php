<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Currency_model extends CI_Model
{
    public function updateCurrency($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('currencyExchange', $data);
    }
}