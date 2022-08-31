<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Short_term_residency_permit extends CI_Controller
{
    public function index()
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
        $this->load->view('web-site/Short_term_residency_permit',$data);
    }
}