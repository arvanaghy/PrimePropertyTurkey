<?php 
defined("BASEPATH") or exit("no direct script allowed");
class Pagination_model extends CI_Model{
	function __construct(){
	parent::__construct();	
		$this->load->library(array('session','pagination'));
		$this->load->helper('url');
		$this->load->database();	
    }
	
	
	public function allrecord(){
		$this->db->select('*');
		$this->db->from('property_details');
		$rs = $this->db->get();
		return $rs->num_rows();
	}
	
	public function data_list($limit,$offset,$title){
		$this->db->select('*');
		$this->db->from('property_details');
		$this->db->order_by('PropertyID','desc');
		$this->db->limit($limit,$offset);
		$rs = $this->db->get();
		return $rs->result_array();
	}
	

}
?>