<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model 
{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		$this->load->database();
		$this->load->library('session');
		
    }
    
   	// Fetch records
    public function getData($rowNO,$rowPerPage,$search_Lead_id="",$search_name_phrase="",$search_phone="",$search_email="",$search_date="",$pool_type,$priority,$admin_user_type='') {
        $this->db->select('*');
        $this->db->from('crm_leads');
        if ($admin_user_type !=''){
            $this->db->where('Lead_Assign_User_id',$admin_user_type);
        }elseif($this->session->userdata('type')=="2"){
			$this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
		}
        if($search_Lead_id != ''){
            $this->db->where('Lead_id',$search_Lead_id);
        }       
        if($search_name_phrase != ''){
            $search_array_name = explode(" ", $search_name_phrase);
            $this->db->group_start();
            foreach ($search_array_name as $params) {
                $this->db->or_like('first_name', $params);
                $this->db->or_like('second_name', $params);
            }
            $this->db->group_end();
        }       
        if($search_phone != ''){
            $this->db->group_start();
            $this->db->or_like('mobile', $search_phone);
            $this->db->group_end();
        }        
        if($search_email != ''){
            $this->db->group_start();
            $this->db->or_like('email', $search_email);
            $this->db->group_end();
        }
        if($search_date != ''){
            $this->db->where('next_call_date',$search_date); 
        }
        if ($pool_type == 'dubai_pool'){
            $this->db->where('dubai_pool!=','0');
        }else{
            $this->db->where('dubai_pool','0');
        }
        if ($priority=='low'){
            $this->db->order_by('priority','ASC');
        }else{
            $this->db->order_by('priority','DESC');
        }

        $this->db->limit($rowPerPage, $rowNO);
        $query = $this->db->get();     
        return $query->result_array();
      }
    public function getDataUninterested($rowNO,$rowPerPage,$search_Lead_id="",$search_name_phrase="",$search_phone="",$search_email="",$search_date="",$admin_user_type='') {
        $this->db->select('*');
        $this->db->from('crm_leads');
        if ($admin_user_type !=''){
            $this->db->where('Lead_Assign_User_id',$admin_user_type);
        }elseif($this->session->userdata('type')=="2"){
			$this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
		}
        if($search_Lead_id != ''){
            $this->db->where('Lead_id',$search_Lead_id);
        }
        if($search_name_phrase != ''){
            $search_array_name = explode(" ", $search_name_phrase);
            $this->db->group_start();
            foreach ($search_array_name as $params) {
                $this->db->or_like('first_name', $params);
                $this->db->or_like('second_name', $params);
            }
            $this->db->group_end();
        }
        if($search_phone != ''){
            $this->db->group_start();
            $this->db->or_like('mobile', $search_phone);
            $this->db->group_end();
        }
        if($search_email != ''){
            $this->db->group_start();
            $this->db->or_like('email', $search_email);
            $this->db->group_end();
        }
        if($search_date != ''){
            $this->db->where('next_call_date',$search_date);
        }
        $this->db->order_by('Lead_id','DESC');

        $this->db->limit($rowPerPage, $rowNO);
        $query = $this->db->get();
        return $query->result_array();
      }

      // Select total records
    public function getRecordCount($search_Lead_id="",$search_name_phrase="",$search_phone="",$search_email="",$search_date="",$pool_type,$admin_user_type=""){
        $this->db->select('count(*) as all_count');
        $this->db->from('crm_leads');
        if ($admin_user_type !=''){
            $this->db->where('Lead_Assign_User_id',$admin_user_type);
        }elseif($this->session->userdata('type')=="2"){
            $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        }
        if($search_Lead_id != ''){
            $this->db->where('Lead_id',$search_Lead_id);
        }       
        if($search_name_phrase != ''){
            $search_array_name = explode(" ", $search_name_phrase);
            $this->db->group_start();
            foreach ($search_array_name as $params) {
                $this->db->or_like('first_name', $params);
                $this->db->or_like('second_name', $params);
            }
            $this->db->group_end();
        }
        if($search_phone != ''){
            $this->db->group_start();
            $this->db->or_like('mobile', $search_phone);
            $this->db->group_end();
        }
        if($search_email != ''){
            $this->db->group_start();
            $this->db->or_like('email', $search_email);
            $this->db->group_end();
        }        
        if($search_date != ''){
            $this->db->where('next_call_date',$search_date); 
        }
        if ($pool_type == 'dubai_pool'){
            $this->db->where('dubai_pool!=','0');
        }else{
            $this->db->where('dubai_pool','0');
        }
        $query = $this->db->get();
        $result = $query->result_array();     
        return $result[0]['all_count'];
    }
    public function getRecordCountUninterested($search_Lead_id="",$search_name_phrase="",$search_phone="",$search_email="",$search_date="",$admin_user_type=""){
        $this->db->select('count(*) as all_count');
        $this->db->from('crm_leads');
        if ($admin_user_type !=''){
            $this->db->where('Lead_Assign_User_id',$admin_user_type);
        }elseif($this->session->userdata('type')=="2"){
            $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        }
        if($search_Lead_id != ''){
            $this->db->where('Lead_id',$search_Lead_id);
        }
        if($search_name_phrase != ''){
            $search_array_name = explode(" ", $search_name_phrase);
            $this->db->group_start();
            foreach ($search_array_name as $params) {
                $this->db->or_like('first_name', $params);
                $this->db->or_like('second_name', $params);
            }
            $this->db->group_end();
        }
        if($search_phone != ''){
            $this->db->group_start();
            $this->db->or_like('mobile', $search_phone);
            $this->db->group_end();
        }
        if($search_email != ''){
            $this->db->group_start();
            $this->db->or_like('email', $search_email);
            $this->db->group_end();
        }
        if($search_date != ''){
            $this->db->where('next_call_date',$search_date);
        }

        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['all_count'];
    }

 
 /* start admin Manage Lead   */
    public function get_mail_sent_count($id) {
       $this->db->select('count(*) as total'); 
	   $this->db->from('news_letter');
       $this->db->where('news_letter_lead_id',$id);

       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }

    public function filter_duplicate_email($email) {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
       $this->db->where('email',$email);
	   //$this->db->or_where('Lead_Assign_User_id','1');
	   //$this->db->where('source_of_enquiry!=','');
	   //$this->db->order_by('Lead_id','DESC');
       // return $this->db->count_all('crm_leads');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
 
    public function get_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
       $this->db->group_start();
       $this->db->where('Lead_Assign_User_id','0');
	   $this->db->or_where('Lead_Assign_User_id','1');
       $this->db->group_end();
       $this->db->where('source_of_enquiry!=','');
       $this->db->where('dubai_pool','0');
       $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    public function get_count_dubai() {
       $this->db->select('count(*) as total');
	   $this->db->from('crm_leads');
       $this->db->group_start();
       $this->db->where('Lead_Assign_User_id','0');
	   $this->db->or_where('Lead_Assign_User_id','1');
       $this->db->group_end();
       $this->db->where('source_of_enquiry!=','');
       $this->db->where('dubai_pool!=','0');
       $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }

	public function get_fresh_lead($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->group_start();
        $this->db->where('Lead_Assign_User_id','0');
	    $this->db->or_where('Lead_Assign_User_id','1');
        $this->db->group_end();
        $this->db->where('source_of_enquiry!=','');
        $this->db->where('dubai_pool','0');
	    $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
		return $query->result();
    }
	public function get_fresh_lead_dubai($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->group_start();
        $this->db->where('Lead_Assign_User_id','0');
	    $this->db->or_where('Lead_Assign_User_id','1');
        $this->db->group_end();
        $this->db->where('source_of_enquiry!=','');
        $this->db->where('dubai_pool!=','0');
	    $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
		return $query->result();
    }

/* End Admin Manage Lead   */     


/* Start Admin All Lead   */ 

    public function get_all_lead_count() {
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
       $this->db->from('crm_leads');
       return $this->db->count_all_results();
    }
    
	public function get_all_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
       $this->db->where('dubai_pool','0');
       $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
    public function get_all_lead_high($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool','0');
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
	public function get_all_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
       $this->db->where('dubai_pool','0');
       $this->db->order_by('priority','ASC');
       $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }


/* End Admin All Lead   */ 

/* End Admin Future Lead   */ 
     
    public function get_future_next_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    
	public function get_future_next_lead($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_future_next_lead_high($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_future_next_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_future_next_lead_count_dubai() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('next_call_date >',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_future_next_lead_dubai($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('next_call_date >',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
    public function get_future_next_lead_dubai_low($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('next_call_date >',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }

/* End Admin Future Lead   */ 


 /* End Admin Previous Lead   */ 
 
    public function get_previous_next_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
       $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    
	public function get_previous_next_lead($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_previous_next_lead_high($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
	   $this->db->order_by('priority','DESC');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_previous_next_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
	   $this->db->order_by('priority','ASC');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_previous_next_lead_count_dubai() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('next_call_date<',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_previous_next_lead_dubai($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('next_call_date<',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
    public function get_previous_next_lead_dubai_low($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('next_call_date<',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }

 /* End Admin Previous Lead   */
 
 
 /* Start Admin low_to_high */
 
    public function get_low_to_high_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
       $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','DESC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    
	public function get_low_to_high_lead($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_low_to_high_lead_count_dubai() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->order_by('priority','DESC');
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_low_to_high_lead_dubai($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->order_by('priority','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
 
 /* End Admin low_to_high */
 
 
 /* Start Admin high_to_low */
 
    public function get_high_to_low_lead_count() {
      $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
      $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','ASC');
      $query = $this->db->get();
      $row = $query->row();
	   return $row->total;
    }
    
	public function get_high_to_low_lead($limit, $start) {
	   $this->db->limit($limit, $start);
      $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','ASC');
      $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_high_to_low_lead_count_dubai() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->order_by('priority','ASC');
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_high_to_low_lead_dubai($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->order_by('priority','ASC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
 
 /* End Admin high_to_low */
 
 
  /* Start Admin get_today_call_lead_count */
 
    public function get_today_call_lead_count() {
      $this->db->select('count(*) as total'); 
	  $this->db->from('crm_leads');
      $this->db->where('next_call_date',date('Y-m-d'));
	  $this->db->where('uninterested_pool','0');
	  $this->db->where('sold_pool','0');
	  $this->db->where('dubai_pool','0');
	  $this->db->where('lead_type!=',0);
      $query = $this->db->get();
      $row = $query->row();
	   return $row->total;
    }

    
	public function get_today_call_lead($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_today_call_lead_high($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_today_call_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_today_call_lead_count_dubai() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('next_call_date',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_today_call_lead_dubai($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('next_call_date',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
    public function get_today_call_lead_dubai_low($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('next_call_date',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }

 /* End Admin get_today_call_lead_count */
 
 
 /* Start Admin get_new_lead_count */
 
    public function get_new_lead_count() {
      $this->db->select('count(*) as total'); 
	  $this->db->from('crm_leads');
	  $this->db->where('uninterested_pool','0');
	  $this->db->where('sold_pool','0');
	  $this->db->where('dubai_pool','0');
	  $this->db->where('lead_type',0);
      $query = $this->db->get();
      $row = $query->row();
	   return $row->total;
    }
    
	public function get_new_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type',0);
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_new_lead_high($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type',0);
	   $this->db->order_by('priority','DESC');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_new_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type',0);
	   $this->db->order_by('priority','ASC');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_new_lead_count_dubai() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type',0);
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_new_lead_dubai($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
    public function get_new_lead_dubai_low($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }

 /* End Admin get_new_lead_count */
 
 /* End Admin get_uninterested_pool_lead */
 
    public function get_all_uninterested_pool_lead_count()
	{
	   $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool!=','0');
	   $query = $this->db->get();
	   return $query->result();
    }
    
    public function get_all_uninterested_pool_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool!=','0');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
    
/* End Admin get_new_lead_count */ 

    public function get_uninterested_pool_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool!=','0');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    
	public function get_all_uninterested_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool!=','0');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
    
    public function get_user_uninterested_pool_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool!=','0');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
	
	public function get_user_all_uninterested_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool!=','0');
       $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
       $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_sold_pool_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('sold_pool!=','0');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
	
	public function get_all_sold_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('sold_pool!=','0');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
    
    public function get_user_sold_pool_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('sold_pool!=','0');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
	
	public function get_user_all_sold_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('sold_pool!=','0');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }


// dubai pool user model

    public function get_dubai_pool_lead_count() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('sold_pool','0');
        $this->db->where('uninterested_pool','0');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_all_dubai_lead($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('dubai_pool!=','0');
        $this->db->where('sold_pool','0');
        $this->db->where('uninterested_pool','0');
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
    public function get_all_dubai_lead_low($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('dubai_pool!=','0');
        $this->db->where('sold_pool','0');
        $this->db->where('uninterested_pool','0');
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }

    public function get_user_dubai_pool_lead_count() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('sold_pool','0');
        $this->db->where('uninterested_pool','0');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_user_all_dubai_lead($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('dubai_pool!=','0');
        $this->db->where('sold_pool','0');
        $this->db->where('uninterested_pool','0');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
    public function get_user_all_dubai_lead_low($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('dubai_pool!=','0');
        $this->db->where('sold_pool','0');
        $this->db->where('uninterested_pool','0');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }

    function get_user_dubai_pool_lead()
    {
        $this->db->select("*");
        $this->db->from('crm_leads');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('sold_pool','0');
        $this->db->where('uninterested_pool','0');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function get_dubai_pool_lead()
    {
        $this->db->select("*");
        $this->db->from('crm_leads');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('sold_pool','0');
        $this->db->where('uninterested_pool','0');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function get_dubai_lead_list()
    {
        $this->db->select("*");
        $this->db->from('crm_leads');
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
    function user_get_dubai_lead_list()
    {
        $this->db->select("*");
        $this->db->from('crm_leads');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

 
    function get_filter_lead($name,$last_nm="")
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->or_where('first_name',$name);
	   $this->db->or_where('Lead_id',$name);
	   $find_sign=substr($name, 0, 1);
	   if($find_sign=="+"){$this->db->or_where('mobile',$name);}else{$this->db->or_where('mobile',"+".$name);}
	   $this->db->or_where('email',$name);
	   $this->db->or_where('next_call_date',$name);
	   $query = $this->db->get();
	   return $query->result();
    }
    
    function get_user_filter_lead($name,$last_nm="")
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->or_where('first_name',$name);
	   $this->db->or_where('Lead_id',$name);
	   $find_sign=substr($name, 0, 1);
	   if($find_sign=="+"){$this->db->or_where('mobile',$name);}else{$this->db->or_where('mobile',"+".$name);}
	   $this->db->or_where('email',$name);
	   $this->db->or_where('next_call_date',$name);
	   $query = $this->db->get();
	   return $query->result();
    }
    
    function get_user_filter_leads($name)
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('Lead_id',$name);
	   $query = $this->db->get();
	   return $query->result();
    }
    
    function get_sold_pool_lead()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('sold_pool!=','0');
	   $query = $this->db->get();
	   return $query->result();
    }

    function get_uninterested_pool_lead()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool!=','0');
	   $query = $this->db->get();
	   return $query->result();
    }
    
    function get_lastest_comment($lead_id)
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_history');
	   $this->db->where('History_Lead_id',$lead_id);
	   $this->db->order_by('History_id','DESC');
	   $query = $this->db->get();
	   return $query->row();
    }
	
	function get_low_to_high_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
	function get_low_to_high_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->order_by('priority','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }

	function get_high_to_low_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','ASC');
	   $query = $this->db->get();
	   return $query->result();
    }
	function get_high_to_low_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->order_by('priority','ASC');
	   $query = $this->db->get();
	   return $query->result();
    }

    function get_single_lead($lead_id)
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_id',$lead_id);
	   $query = $this->db->get();
	   return $query->row();
    }
	
	function get_new_lead_list()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type',0);
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
	function get_new_lead_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->where('lead_type',0);
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }

	function get_today_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
    function get_today_lead_list_dubai()
    {
        $this->db->select("*");
        $this->db->from('crm_leads');
        $this->db->where('next_call_date',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function get_previus_next_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }

    function get_previus_next_lead_list_dubai()
    {
        $this->db->select("*");
        $this->db->from('crm_leads');
        $this->db->where('next_call_date<',date('Y-m-d'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type!=',0);
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        return $query->result();
    }
	
	function get_future_next_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type!=',0);
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
	function get_future_next_lead_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->where('lead_type!=',0);
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }

	public function insert_contact_details($data)
	{
		$this->db->insert('contact_us', $data); 
		return TRUE;
	}
	
	function get_login_deatils($username,$password)
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_user');
	   $this->db->where('email',$username);
	   $this->db->where('password',$password);
	   $this->db->where('status',1);
	   $query = $this->db->get();
	   return $query->row();
    }
	
	function get_user_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_user');
	   $this->db->order_by('user_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
	
	function get_crm_user_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_user');
	   $this->db->where('type!=',1);
	   $this->db->order_by('user_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
    
    function get_history_list($id)
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_history');
	   $this->db->order_by('History_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
	
	function get_crm_history_list($user_id,$lead_id)
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_history');
	   //$this->db->where('History_User_id',$user_id);
	   $this->db->where('History_Lead_id',$lead_id);
	   $this->db->order_by('History_Date','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
	
	function get_all_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   //$this->db->where('uninterested_pool','0');
	   //$this->db->where('sold_pool','0');
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
    
    public function get_all_lead_countt() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   //$this->db->where('uninterested_pool','0');
	   //$this->db->where('sold_pool','0');
	   $this->db->order_by('Lead_id','DESC');
       // return $this->db->count_all('crm_leads');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    
    public function get_all_lead_counttt() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   //$this->db->where('sold_pool','0');
	   $this->db->order_by('Lead_id','DESC');
       // return $this->db->count_all('crm_leads');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    
    public function get_all_leadd($limit, $start) {
	   $this->db->limit($limit, $start);
	   //$this->db->where('uninterested_pool','0');
	   //$this->db->where('sold_pool','0');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	
	function get_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
    
    function get_fresh_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
       $this->db->group_start();
       $this->db->where('Lead_Assign_User_id','0');
	   $this->db->or_where('Lead_Assign_User_id','1');
       $this->db->group_end();
       $this->db->where('source_of_enquiry!=','');
       $this->db->where('dubai_pool','0');
       $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
    function get_fresh_lead_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
       $this->db->group_start();
	   $this->db->where('Lead_Assign_User_id','0');
	   $this->db->or_where('Lead_Assign_User_id','1');
       $this->db->group_end();
       $this->db->where('source_of_enquiry!=','');
       $this->db->where('dubai_pool!=','0');
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }

    function get_total_lead_list()
	{
	   $this->db->select("count('*') as total"); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->row();
    }
    
    
/* User Query */ 

    public function get_user_all_lead_count() {
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool','0');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->from('crm_leads');
        return $this->db->count_all_results();
    }
    
	public function get_user_all_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
    public function get_user_all_lead_high($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool','0');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
	public function get_user_all_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->order_by('priority','ASC');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_user_future_next_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    public function get_user_future_next_lead_count_dubai() {
       $this->db->select('count(*) as total');
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }

	public function get_user_future_next_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_future_next_lead_high($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_future_next_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

	public function get_user_future_next_lead_dubai($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
       $this->db->order_by('priority','DESC');
       $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_future_next_lead_dubai_low($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
       $this->db->order_by('priority','ASC');
       $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_user_previous_next_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    
	public function get_user_previous_next_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_previous_next_lead_high($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_previous_next_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_user_previous_next_lead_count_dubai() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('next_call_date<',date('Y-m-d'));
        $this->db->where('lead_type!=',0);
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_user_previous_next_lead_dubai($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('next_call_date<',date('Y-m-d'));
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
    public function get_user_previous_next_lead_dubai_low($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('next_call_date<',date('Y-m-d'));
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }

    public function get_user_low_to_high_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','DESC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    public function get_user_low_to_high_lead_count_dubai() {
       $this->db->select('count(*) as total');
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->order_by('priority','DESC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }

	public function get_user_low_to_high_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_low_to_high_lead_dubai($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->order_by('priority','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_user_high_to_low_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','ASC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    public function get_user_high_to_low_lead_count_dubai() {
       $this->db->select('count(*) as total');
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->order_by('priority','ASC');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }

	public function get_user_high_to_low_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','ASC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_high_to_low_lead_dubai($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->order_by('priority','ASC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_user_today_call_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    
	public function get_user_today_call_lead($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
       $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_today_call_lead_high($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
       $this->db->order_by('priority','DESC');
       $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_today_call_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function getWebComeNewLeadCount() {

        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool','0');
        $this->db->where('lead_type','0');
        $this->db->where('user_lead_type','0');
        $this->db->where('web_come!=','0');
        $this->db->from('crm_leads');
        return $this->db->count_all_results();
    }


    public function userBadgeNewLead($type) {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool','0');
        if ($type==1){
            $this->db->where('circled',0);
        }else{
            $this->db->where('circled','1');
        }
        $this->db->where('lead_type','0');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_user_new_lead_count() {
       $this->db->select('count(*) as total'); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('lead_type','0');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }

    public function get_user_new_lead_count_dubai() {
       $this->db->select('count(*) as total');
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type','0');
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }
    public function userBadgeNewLeadDubai($type) {
       $this->db->select('count(*) as total');
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type','0');
        if ($type==1){
            $this->db->where('circled',0);
        }else{
            $this->db->where('circled','1');
        }
       $query = $this->db->get();
       $row = $query->row();
	   return $row->total;
    }

	public function get_user_new_lead($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
        $this->db->where('lead_type','0');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_new_lead_high($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
        $this->db->where('lead_type','0');
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_new_lead_low($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
        $this->db->where('lead_type','0');
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

	public function get_user_new_lead_dubai($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type','0');
       $this->db->order_by('priority','DESC');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }
	public function get_user_new_lead_dubai_low($limit, $start) {
	   $this->db->limit($limit, $start);
       $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
        $this->db->where('lead_type','0');
       $this->db->order_by('priority','ASC');
	   $this->db->order_by('Lead_id','DESC');
       $query = $this->db->get('crm_leads');
	   return $query->result();
    }

    public function get_user_today_call_lead_count_dubai() {
        $this->db->select('count(*) as total');
        $this->db->from('crm_leads');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('next_call_date',date('Y-m-d'));
        $this->db->where('lead_type!=',0);
        $query = $this->db->get();
        $row = $query->row();
        return $row->total;
    }

    public function get_user_today_call_lead_dubai($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('next_call_date',date('Y-m-d'));
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','DESC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }
    public function get_user_today_call_lead_dubai_low($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('next_call_date',date('Y-m-d'));
        $this->db->where('lead_type!=',0);
        $this->db->order_by('priority','ASC');
        $this->db->order_by('Lead_id','DESC');
        $query = $this->db->get('crm_leads');
        return $query->result();
    }

    function get_user_total_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   //$this->db->where('Lead_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
    
    function get_user_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   //$this->db->or_where('Lead_User_id',$this->session->userdata('id'));
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
    
    function get_user_new_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
    function get_user_new_lead_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->order_by('Lead_id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }

    function get_user_low_to_high_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
    function get_user_low_to_high_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->order_by('priority','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }

	function get_user_high_to_low_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->order_by('priority','ASC');
	   $query = $this->db->get();
	   return $query->result();
    }
	function get_user_high_to_low_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->order_by('priority','ASC');
	   $query = $this->db->get();
	   return $query->result();
    }

    function get_user_today_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
	   $query = $this->db->get();
	   return $query->result();
    }
    function get_user_today_lead_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->where('next_call_date',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
	   $query = $this->db->get();
	   return $query->result();
    }

	function get_user_previus_next_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date<',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
	   $query = $this->db->get();
	   return $query->result();
    }

    function get_user_previus_next_lead_list_dubai()
    {
        $this->db->select("*");
        $this->db->from('crm_leads');
        $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
        $this->db->where('uninterested_pool','0');
        $this->db->where('sold_pool','0');
        $this->db->where('dubai_pool!=','0');
        $this->db->where('next_call_date<',date('Y-m-d'));
        $this->db->where('lead_type!=',0);
        $query = $this->db->get();
        return $query->result();
    }
	
	function get_user_future_next_lead_list()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool','0');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
	   $query = $this->db->get();
	   return $query->result();
    }
	function get_user_future_next_lead_list_dubai()
	{
	   $this->db->select("*");
	   $this->db->from('crm_leads');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $this->db->where('uninterested_pool','0');
	   $this->db->where('sold_pool','0');
	   $this->db->where('dubai_pool!=','0');
	   $this->db->where('next_call_date >',date('Y-m-d'));
	   $this->db->where('lead_type!=',0);
	   $query = $this->db->get();
	   return $query->result();
    }

	function get_user_today_lead_activity()
	{
	    $id=$this->session->userdata('id');
	    $sql = "SELECT name,COUNT(spoken) as spoken,COUNT(called) as called FROM crm_call_history,crm_user WHERE crm_user.user_id=crm_call_history.history_user_id and history_date=CURRENT_DATE and crm_user.user_id=$id GROUP BY history_user_id";
		$query = $this->db->query($sql);
		return $query->result();
    }
    
    function get_user_month_lead_activity()
	{
	    $id=$this->session->userdata('id');
	    $sql = "SELECT name,COUNT(spoken) as spoken,COUNT(called) as called FROM crm_call_history,crm_user WHERE crm_user.user_id=crm_call_history.history_user_id and month(history_date)=MONTH(CURRENT_DATE) and crm_user.user_id=$id GROUP BY history_user_id";
		$query = $this->db->query($sql);
		return $query->result();
    }
    
    function get_user_year_lead_activity()
	{
	    $id=$this->session->userdata('id');
	    $sql = "SELECT name,COUNT(spoken) as spoken,COUNT(called) as called FROM crm_call_history,crm_user WHERE crm_user.user_id=crm_call_history.history_user_id and year(history_date)=YEAR(CURRENT_DATE) and crm_user.user_id=$id GROUP BY history_user_id";
		$query = $this->db->query($sql);
		return $query->result();
    }
    
    function get_user_sold_pool_lead()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('sold_pool!=','0');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $query = $this->db->get();
	   return $query->result();
    }

    function get_user_uninterested_pool_lead()
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_leads');
	   $this->db->where('uninterested_pool!=','0');
	   $this->db->where('Lead_Assign_User_id',$this->session->userdata('id'));
	   $query = $this->db->get();
	   return $query->result();
    }
    
/* User Query */     
    
    function get_sale_list($id)
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_sale_details');
	   $this->db->where('Sale_Lead_Id',$id);
	   $this->db->order_by('Sale_Id','DESC');
	   $query = $this->db->get();
	   return $query->result();
    }
	
	function get_user_single_record($id)
	{
	   $this->db->select("*"); 
	   $this->db->from('crm_user');
	   $this->db->or_where('user_id',$id);
	   $query = $this->db->get();
	   return $query->row();
    }

	function get_today_lead_activity()
	{
	    $sql = "SELECT name,COUNT(spoken) as spoken,COUNT(called) as called FROM crm_call_history,crm_user WHERE crm_user.user_id=crm_call_history.history_user_id and history_date=CURRENT_DATE GROUP BY history_user_id";
		$query = $this->db->query($sql);
		return $query->result();
    }
    
    function get_month_lead_activity()
	{
	    $sql = "SELECT name,COUNT(spoken) as spoken,COUNT(called) as called FROM crm_call_history,crm_user WHERE crm_user.user_id=crm_call_history.history_user_id and month(history_date)=MONTH(CURRENT_DATE()) GROUP BY history_user_id";
		$query = $this->db->query($sql);
		return $query->result();
    }
    
	function get_year_lead_activity()
	{
	    $sql = "SELECT name,COUNT(spoken) as spoken,COUNT(called) as called FROM crm_call_history,crm_user WHERE crm_user.user_id=crm_call_history.history_user_id and year(history_date)=YEAR(CURRENT_DATE()) GROUP BY history_user_id";
		$query = $this->db->query($sql);
		return $query->result();
    }

	function get_single_customer_details($id)
	{
	   $this->db->select("*"); 
	   $this->db->from('customer');
	   $this->db->where('Customer_Id',$id);
	   $query = $this->db->get();
	   return $query->row();
    }
	
	function get_sub_category($id)
	{
	   $this->db->select("*"); 
	   $this->db->from('subcategory');
	   $this->db->where('Subcategory_Category_Id',$id);
	   $query = $this->db->get();
	   return $query->result();
    }
	
	function delete_category($cat_id)
	{
	  $this->db->where('Category_id', $cat_id);	
	  $this->db->delete('category'); 
	  return TRUE;
	}
	
	function delete_sub_category($sub_cat_id)
	{
	  $this->db->where('Subcategory_id', $sub_cat_id);	
	  $this->db->delete('subcategory'); 
	  return TRUE;
	}

	function get_features_details()
	{
	   $this->db->select("*"); 
	   $this->db->from('features');
	   $this->db->join('category','category.Category_id = features.Features_id');
	   $this->db->join('subcategory','subcategory.Subcategory_id = features.Features_subcategory_id');
	   $query = $this->db->get();
	   return $query->result();
    }
	
	function get_randam_property_details()
	{
    $this->db->order_by('rand()');
    $this->db->limit(5);
    $query = $this->db->get('property_details');
    return $query->result();
    }

	public function get_password($ID,$loginPassword)
	{
		$this->db->select('password'); 
		$this->db->from('crm_user');			
		$this->db->where('user_id',$ID);
		$this->db->where('password',$loginPassword);
		$query = $this->db->get();
		return $query->row();
	}
		
	public function update_password($ID,$NewPassword)
	{
			$data=array('password'=>$NewPassword);
 			$this->db->where('user_id',$ID);
			$this->db->update('crm_user',$data);
			return TRUE;
	}
	
	public function update_user($data)
	{
 			$this->db->where('user_id',$this->session->userdata('id'));
			$this->db->update('crm_user',$data);
			return TRUE;
	}
	
	public function update_user_activity($id,$data)
	{
 			$this->db->where('Customer_Id',$id);
			$this->db->update('customer',$data);
			return TRUE;
	}
	
	public function get_config($primaryKey)
	{
		$this->db->select('*'); 
		$this->db->from('crm_tbl_config');			
		$this->db->where('primaryKey',$primaryKey);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function update_website_contact($primaryKey,$data)
	{			
 			$this->db->where('primaryKey',$primaryKey);
			$this->db->update('crm_tbl_config',$data);
			return TRUE;
	}

	public function getConfigKey($primaryKey)
	{
		$this->db->select('*'); 
		$this->db->from('crm_tbl_config');			
		$this->db->where('primaryKey',$primaryKey);
		$query = $this->db->get();
		$result=$query->row();
		return $result->configValue;
	}
	
	public function get_primary_phone($phone)
	{
		$this->db->select('mobile'); 
		$this->db->from('crm_user');
        $this->db->where('mobile',$phone);		
		$query = $this->db->get();
		$result=$query->row();
		return $result;
	}
	
	public function get_lead_phone($phone)
	{
		$this->db->select('telephone'); 
		$this->db->from('crm_leads');
        $this->db->where('telephone',$phone);		
		$query = $this->db->get();
		$result=$query->row();
		return $result;
	}

    public function countNormalLeads()
    {
        $this->db->distinct();
        $this->db->select('DISTINCT(email)');
        $this->db->where('source_of_enquiry!=','dubai_pool');
        $query = $this->db->get('crm_leads');
        return $query->num_rows();
    }
    public function countDubaiLeads()
    {
        $this->db->distinct();
        $this->db->select('DISTINCT(email)');
        $this->db->where('source_of_enquiry','dubai_pool');
        $query = $this->db->get('crm_leads');
        return $query->num_rows();
    }

    public function GetNewsLettersInfo($type)
    {
        $this->db->select('DISTINCT(email),first_name,second_name,mobile');
        if ($type=='Dubai'){
            $this->db->where('source_of_enquiry','dubai_pool');
        }elseif ($type=='Normal'){
            $this->db->where('source_of_enquiry!=','dubai_pool');
        }
        $this->db->order_by('email','DESC');
        $query = $this->db->get('crm_leads');

        return $query->result();

    }

}