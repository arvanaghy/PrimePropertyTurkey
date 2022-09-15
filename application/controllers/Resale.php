<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Resale extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Resale_Model');
    }
    protected function getResaleImageName($data){
        $results = $this->Resale_Model->getResaleImageName($data);
        if ($results){
            $IIG = array();
            foreach ($results as $result){
                array_push($IIG,array('id'=>$result->id,'image'=>$result->image,'sort'=>$result->sort_priority));
            }
            return $IIG;
        }else{
            return false;
        }
    }

    public function index()
    {
        $this->load->view('web-site/resale-page');
    }

    public function Preview($pass ='')
    {
        $data['result']= $this->Resale_Model->getResaleByRef(strip_tags($pass));
        $data['images'] = $this->getResaleImageName($data['result']->id);
        $this->load->view('web-site/resale/Audition',$data);
    }

    public function PreviewPublishedResale($pass='')
    {
        $data['result']= $this->Resale_Model->getResaleByRefPropertyTBL(strip_tags($pass));
        redirect(base_url().'properties/'.$data['result']->url_slug);
    }
}