<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewsLetterCronModel extends CI_Model
{
    public function FetchMailContext()
    {
        $query = $this->db->get('newsletterContent');
        if ($query->result()){
            return $query->result_array()[0];
        }else{
            return false;
        }
    }

    public function FetchRestMail()
    {
        $this->db->select('first_name,second_name,Lead_id,email');
        $this->db->where('newsletterCheck',1);
        $query = $this->db->get('crm_leads');
        if ($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }

    public function resetAllToZero()
    {
        $this->db->set('newsletterCheck',0);
        $this->db->update('crm_leads');
    }
    public function UpdateLeadsNewsLetterStatus($lead,$value)
    {
        $this->db->set('newsletterCheck',$value);
        $this->db->where('Lead_id', $lead);
        $this->db->update('crm_leads');
    }
}