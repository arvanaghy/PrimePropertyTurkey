<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('favorite','geolocation_helper','like'));
        $this->load->model('News_model');
    }
    public function index()
    {
        $data['geolocation']=fetch_geolocation();
        $data['currency_exchange_data'] = $this->News_model->currencyExchange();
        $data['news'] = $this->News_model->news(5);
        $data['news_side'] = $this->News_model->news(2);
        $data['blog_side'] = $this->News_model->popular_blog(3);
        $recommended_properties = $this->News_model->recommendedProperties();
        $data['recommended_properties_all']= array(
            $recommended_properties['istanbul'][rand(0,count($recommended_properties['istanbul'])-1)],
            $recommended_properties['fethiye'][rand(0,count($recommended_properties['fethiye'])-1)],
            $recommended_properties['kas'][rand(0,count($recommended_properties['kas'])-1)],
            $recommended_properties['kalkan'][rand(0,count($recommended_properties['kalkan'])-1)],
            $recommended_properties['gocek'][rand(0,count($recommended_properties['gocek'])-1)],
        );
        $data['all'] = $all_count= $this->News_model->BN_record_count('news');
        $pages = (int)ceil($all_count/5);
        $data['pages']=$pages-1;
        $this->load->view('web-site/news/Index',$data);
    }
    public function details($passed_url=''){
        $data['geolocation']=fetch_geolocation();
        $data['currency_exchange_data'] = $this->News_model->currencyExchange();
        if (strtoupper($passed_url) == 'INDEX' OR $passed_url=='' OR $passed_url=='news'){
            redirect(base_url().'News');
        }
        $recommended_properties = $this->News_model->recommendedProperties();
        if (preg_match("/^\d+$/",$passed_url))
        {
            $data['recommended_properties_all']= array(
                $recommended_properties['istanbul'][rand(0,count($recommended_properties['istanbul'])-1)],
                $recommended_properties['fethiye'][rand(0,count($recommended_properties['fethiye'])-1)],
                $recommended_properties['kas'][rand(0,count($recommended_properties['kas'])-1)],
                $recommended_properties['kalkan'][rand(0,count($recommended_properties['kalkan'])-1)],
                $recommended_properties['gocek'][rand(0,count($recommended_properties['gocek'])-1)],
            );
            $data['news_side'] = $this->News_model->news(2);
            $data['blog_side'] = $this->News_model->popular_blog(3);
            $data['page_id']=(int)$passed_url;
            $data['all'] = $all_count= $this->News_model->BN_record_count('news');
            $pages = (int)ceil($all_count/5);
            $data['pages']=$pages-1;
            if ((int)$passed_url > $data['pages']){
                redirect(base_url().'Custom404');
            }else{
                $data['news'] = $this->News_model->news(5,$data['page_id']*5);
                $this->load->view('web-site/news/Index',$data);
            }
        }else{
            $data['result'] = $this->News_model->fetch_post_by_url_BN('news',$passed_url);
            if ($data['result']){
                $data['news_side'] = $this->News_model->news(2);
                $data['blog_side'] = $this->News_model->popular_blog(3);
                $search_array = array('istanbul','fethiye','kalkan','kas','gocek','antalya');
                $target_array = array();
                foreach ($search_array as $search_phrase){
                    if (strpos(strtolower(strip_tags($data['result']->News_Title)),$search_phrase) or strpos(strtolower(strip_tags($data['result']->News_Content)),$search_phrase)){
                        array_push($target_array,$search_phrase);
                    }
                }
                $data['recommended_properties_all']= array();
                if (count($target_array) == 1){
                    foreach ($target_array as $target){
                        for ($i=0;$i<count($recommended_properties[$target]);$i++){
                            array_push($data['recommended_properties_all'],$recommended_properties[$target][$i]);
                        }
                    }
                }elseif (count($target_array) == 0 or count($target_array) == count($search_array)){
                    $data['recommended_properties_all']= array(
                        $recommended_properties['istanbul'][rand(0,count($recommended_properties['istanbul'])-1)],
                        $recommended_properties['fethiye'][rand(0,count($recommended_properties['fethiye'])-1)],
                        $recommended_properties['kas'][rand(0,count($recommended_properties['kas'])-1)],
                        $recommended_properties['kalkan'][rand(0,count($recommended_properties['kalkan'])-1)],
                        $recommended_properties['gocek'][rand(0,count($recommended_properties['gocek'])-1)],
                        $recommended_properties['antalya'][rand(0,count($recommended_properties['antalya'])-1)],
                    );
                }else{
                    $percentage_array = array(
                        'istanbul'=> 8,
                        'fethiye'=> 4,
                        'antalya'=> 4,
                        'kalkan'=> 2,
                        'kas'=> 1,
                        'gocek'=> 1
                    );
                    $loop_size = 6 ;
                    $total = 0;
                    foreach ($target_array as $target){
                        $total += $percentage_array[$target];
                    }
                    foreach ($target_array as $target){
                        $loop_count = round(($percentage_array[$target] / $total)*$loop_size);
                        if (count($recommended_properties[$target]) >= $loop_count ) {
                            for ($i=1;$i<=$loop_count;$i++){
                                array_push($data['recommended_properties_all'],$recommended_properties[$target][$i-1]);
                            }
                        }else{
                            for ($i=1;$i<=count($recommended_properties[$target]);$i++){
                                array_push($data['recommended_properties_all'],$recommended_properties[$target][$i-1]);
                            }
                        }

                    }
                }
                $data['comments']=$this->News_model->fetchPostComments($data['result']->News_ID,'news');
                $this->load->view('web-site/news/Details',$data);
            }else{
                redirect(base_url().'Custom404');
            }
        }
    }
}