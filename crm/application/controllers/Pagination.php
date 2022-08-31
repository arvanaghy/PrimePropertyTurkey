<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pagination extends CI_Controller {
	public function __construct(){
		parent :: __construct();
		$this->load->model('Pagination_model',"pgn");
	}
	public function property()
	{
		if($this->input->post('title') !="")
		{
	        $title = trim($this->input->post('title'));
		}
		else{
			$title = str_replace("%20",' ',($this->uri->segment(3))?$this->uri->segment(3):0);
		} 

        $data['search_title']=$title;		
		 
	    $allrecord = $this->pgn->allrecord($title);
		$baseurl =  base_url().$this->router->class.'/'.$this->router->method."/".$title;
		
	    $paging=array();
		$paging['base_url'] =$baseurl;
		$paging['total_rows'] = $allrecord;
		$paging['per_page'] = 8;
		$paging['uri_segment']= 4;
		$paging['num_links'] = 5;
		$paging['first_link'] = 'First';
		$paging['first_tag_open'] = '<li>>';
		$paging['first_tag_close'] = '</li>';
		$paging['num_tag_open'] = '<li>';
		$paging['num_tag_close'] = '</li>';
		$paging['prev_link'] = 'Prev';
		$paging['prev_tag_open'] = '<li>';
		$paging['prev_tag_close'] = '</li>';
		$paging['next_link'] = 'Next';
		$paging['next_tag_open'] = '<li>';
		$paging['next_tag_close'] = '</li>';
		$paging['last_link'] = 'Last';
		$paging['last_tag_open'] = '<li>';
		$paging['last_tag_close'] = '</li>';
		$paging['cur_tag_open'] = '<li class="active"><a href="javascript:void(0);">';
		$paging['cur_tag_close'] = '</a></li>';
		
		$this->pagination->initialize($paging);	
		
		$data['limit'] = $paging['per_page'];
		$data['number_page'] = $paging['per_page']; 
        $data['offset'] = ($this->uri->segment(4)) ? $this->uri->segment(4):'0';	
        $data['nav'] = $this->pagination->create_links();
		$data['datas'] = $this->pgn->data_list($data['limit'],$data['offset'],$title);
		$this->load->view('web/property',$data);
	}
}
?>