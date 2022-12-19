<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('favorite', 'geolocation_helper', 'like'));
        $this->load->model('Blog_model');
    }

    public function index()
    {
        $this->load->model('Home_model');
        $this->load->helper(array('favorite','geolocation_helper'));
        $data['geolocation'] = fetch_geolocation();
//        $data['news_recent'] = $this->Home_model->news(2);
        $data['blog_recent'] = $this->Home_model->popular_blog_ru(6);
        $cityNames = $this->Home_model->fetchCityNames();
        $data['cityNames']=array();
        foreach ($cityNames as $value){
            array_push($data['cityNames'],$value["Property_location"]);
        }
        $ProType = $this->Home_model->fetchPropertyTypes();
        $data['ProType']=array();
        foreach ($ProType as $value){
            array_push($data['ProType'],$value["Property_type"]);
        }
        $proBed = $this->Home_model->fetchPropertyBed();
        $data['proBed']=array();
        foreach ($proBed as $value){
            array_push($data['proBed'],$value["Property_Bedrooms"]);
        }
        $data['recommended_properties_all'] = $this->Home_model->recommendedProperties();
        $data['currency_exchange_data'] = $this->Home_model->currencyExchange();
        $data['YoutubeVideos'] = $this->Home_model->YoutubeVideos();
        $this->load->view('web-site/ru/main-page', $data);
    }

    public function CitizenshipByInvestment()
    {
        $this->load->helper(array('favorite','text','geolocation_helper','like'));
        $this->load->model('CitizenShip_model');
        $search_array = array('istanbul','fethiye','kalkan','kas','gocek','antalya');
        $recommended_properties = $this->CitizenShip_model->citizenShipSuitable();
        $data['currency_exchange_data'] = $this->CitizenShip_model->currencyExchange();
        $data['recommended_properties_all']= array();
        foreach ($search_array as $phrase){
            if ($recommended_properties[$phrase]){
                array_push($data['recommended_properties_all'],$recommended_properties[$phrase][rand(0,count($recommended_properties[$phrase])-1)]);
            }
        }
        $data['geolocation'] = fetch_geolocation();
        $this->load->view('web-site/ru/citizenship',$data);
    }
    public function ShortTermResidency()
    {
        $this->load->helper(array('favorite','text','geolocation_helper','like'));
        $this->load->model('CitizenShip_model');
        $recommended_properties = $this->CitizenShip_model->shortTermPermitSuitable();
        $data['currency_exchange_data'] = $this->CitizenShip_model->currencyExchange();

        $search_array = array('istanbul','fethiye','kalkan','kas','gocek','antalya');
        $target_array = array();
        foreach ($search_array as $phrase){
            if ($recommended_properties[$phrase]){
                array_push($target_array,$phrase);
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

        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/ru/short-term-residency',$data);
    }
    public function ShortTermExtension()
    {
        $this->load->helper(array('favorite','text','geolocation_helper','like'));
        $this->load->model('CitizenShip_model');
        $recommended_properties = $this->CitizenShip_model->shortTermPermitSuitable();
        $data['currency_exchange_data'] = $this->CitizenShip_model->currencyExchange();

        $search_array = array('istanbul','fethiye','kalkan','kas','gocek','antalya');
        $target_array = array();
        foreach ($search_array as $phrase){
            if ($recommended_properties[$phrase]){
                array_push($target_array,$phrase);
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

        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/ru/short-term-extension',$data);
    }

    public function FAQ()
    {
        $this->load->helper('like');
        $this->load->helper('geolocation_helper');
        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/ru/FAQ',$data);
    }

    public function blogIndex()
    {
        $this->load->helper(array('favorite', 'geolocation_helper', 'like'));
        $this->load->model('Blog_model');
        $data['geolocation'] = fetch_geolocation();
        $data['currency_exchange_data'] = $this->Blog_model->currencyExchange();
//        $data['news_side'] = $this->Blog_model->news(3);
        $data['blog_side'] = $this->Blog_model->popular_blog_ru(3);
        $recommended_properties = $this->Blog_model->recommendedProperties();
        $data['recommended_properties_all'] = array(
            $recommended_properties['istanbul'][rand(0, count($recommended_properties['istanbul']) - 1)],
            $recommended_properties['fethiye'][rand(0, count($recommended_properties['fethiye']) - 1)],
            $recommended_properties['kas'][rand(0, count($recommended_properties['kas']) - 1)],
            $recommended_properties['kalkan'][rand(0, count($recommended_properties['kalkan']) - 1)],
            $recommended_properties['gocek'][rand(0, count($recommended_properties['gocek']) - 1)]
        );
        $data['blog'] = $this->Blog_model->blog_ru(5);
        $data['all'] = $this->Blog_model->BN_record_count_ru('blog');
        $pages = (int)ceil($data['all'] / 5);
        $data['pages'] = $pages - 1;
        $this->load->view('web-site/ru/blog/index', $data);
    }
    public function blog($passed_url='')
    {
        if (preg_match("/^\d+$/", $passed_url)) {
            $recommended_properties = $this->Blog_model->recommendedProperties();
            $data['recommended_properties_all'] = array(
                $recommended_properties['istanbul'][rand(0, count($recommended_properties['istanbul']) - 1)],
                $recommended_properties['fethiye'][rand(0, count($recommended_properties['fethiye']) - 1)],
                $recommended_properties['kas'][rand(0, count($recommended_properties['kas']) - 1)],
                $recommended_properties['kalkan'][rand(0, count($recommended_properties['kalkan']) - 1)],
                $recommended_properties['gocek'][rand(0, count($recommended_properties['gocek']) - 1)]
            );
//            $data['news_side'] = $this->Blog_model->news(3);
            $data['blog_side'] = $this->Blog_model->popular_blog_ru(3);
            $data['page_id'] = (int)$passed_url;
            $data['all'] = $this->Blog_model->BN_record_count_ru('blog');
            $pages = (int)ceil($data['all'] / 5);
            $data['pages'] = $pages - 1;
            if ((int)$passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/ru/Custom404');
            } else {
                $data['blog'] = $this->Blog_model->blog_ru(5, $data['page_id'] * 5);
                $this->load->view('web-site/ru/blog/index', $data);
            }
        }else {
            $data['geolocation'] = fetch_geolocation();
            $data['currency_exchange_data'] = $this->Blog_model->currencyExchange();
            if ($passed_url) {
                $data['result'] = $this->Blog_model->fetch_post_by_url_BN_RU('blog', urldecode($passed_url));
                if ($data['result']) {
                    $recommended_properties = $this->Blog_model->recommendedProperties();
                    $data['recommended_properties_all'] = array(
                        $recommended_properties['istanbul'][rand(0, count($recommended_properties['istanbul']) - 1)],
                        $recommended_properties['fethiye'][rand(0, count($recommended_properties['fethiye']) - 1)],
                        $recommended_properties['kas'][rand(0, count($recommended_properties['kas']) - 1)],
                        $recommended_properties['kalkan'][rand(0, count($recommended_properties['kalkan']) - 1)],
                        $recommended_properties['gocek'][rand(0, count($recommended_properties['gocek']) - 1)]
                    );
                    $data['blog_side'] = $this->Blog_model->popular_blog_ru(6);
                    $data['comments'] = $this->Blog_model->fetchPostComments($data['result']->Blog_ID, 'blog');
                    $this->load->view('web-site/ru/blog/Details', $data);
                } else {
                    $this->output->set_status_header('404');
                    $this->load->view('web-site/Custom404');
                }
            }
        }
    }

    public function AboutUS()
    {
        $this->load->view('web-site/ru/about-us');
    }
    public function ContactUs()
    {
        $this->load->helper('geolocation_helper');
        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/ru/contact-us',$data);
    }
    public function BuyerGuide()
    {
        $this->load->helper('like');
        $this->load->view('web-site/ru/buyer-guide');
    }

    public function AreaGuide()
    {
        $this->load->helper('like');
        $this->load->helper('geolocation_helper');
        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/ru/area-guide',$data);
    }

    public function AfterSales()
    {
        $this->load->helper('like');
        $this->load->helper('geolocation_helper');
        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/ru/after-sales',$data);
    }

    public function BuyingOnline()
    {
        $this->load->helper('like');
        $this->load->helper('geolocation_helper');
        $data['geolocation']=fetch_geolocation();
        $this->load->view('web-site/ru/buying-online',$data);
    }

    public function Search($passed_url = '')
    {
        $this->load->model('Fetch_m');

        $data['geolocation'] = fetch_geolocation();

        $cityNames = $this->Fetch_m->fetchCityNames();
        $data['cityNames'] = array();
        foreach ($cityNames as $value) {
            array_push($data['cityNames'], $value["Property_location"]);
        }
        $ProType = $this->Fetch_m->fetchPropertyTypes();
        $data['ProType'] = array();
        foreach ($ProType as $value) {
            array_push($data['ProType'], $value["Property_type"]);
        }
        $proBed = $this->Fetch_m->fetchPropertyBed();
        $data['proBed'] = array();
        foreach ($proBed as $value) {
            array_push($data['proBed'], $value["Property_Bedrooms"]);
        }
        if (!$this->input->post('search') and !$this->session->has_userdata('search_phrase')) {
            redirect(base_url());
        }

        $data['currency_exchange_data'] = $this->Fetch_m->currencyExchange();

        if ($this->input->post('search')) {
            $this->session->set_userdata('search_phrase', $this->input->post('search'));
        }

        $data['cityValue'] = 'Search';
        $data['city_description_show'] = False;

        $this->load->library('user_agent');
        $this->load->library('form_validation');

        if ($this->form_validation->run('search') != FALSE or $this->session->has_userdata('search_phrase')) {
            $data['search'] = $this->session->userdata('search_phrase');
            $data['all'] = $this->Fetch_m->record_count_search($data['search']);
            $pages = (int)ceil($data['all'] / 20);
            $data['pages'] = $pages - 1;

            $search_result = $this->Fetch_m->search($data['search']);
            if ($search_result) {
                if (strtoupper($passed_url) == 'INDEX' or $passed_url == '') {
                    $data['property_result'] = $this->Fetch_m->search($data['search']);
                    $this->session->set_flashdata('message', "<div id='toast_message' class='success'>  We find " . $data['all'] . " results to according your search data </div>");
                    $this->load->view('web-site/ru/properties/Index', $data);
                } elseif (preg_match("/^\d+$/", $passed_url)) {
                    if ($passed_url > $data['pages']) {
                        $this->output->set_status_header('404');
                        $this->load->view('web-site/ru/Custom404');
                    }
                    $data['page_id'] = (int)$passed_url;
                    $data['property_result'] = $this->Fetch_m->search($data['search'], 20, $data['page_id'] * 20);
                    $this->load->view('web-site/ru/properties/Index', $data);
                } else {
                    $this->output->set_status_header('404');
                    $this->load->view('web-site/ru/Custom404');
                }
            } else {
                $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Your Search Has No Result </div>");
                redirect($this->agent->referrer());
            }
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='danger'> According to the following Errors
                                                        <br>
                                                        " . validation_errors() . "
                                                        <br>
                                                        search engine <b>NOT</b> work  </div>");
            redirect($this->agent->referrer());
        }
    }

}