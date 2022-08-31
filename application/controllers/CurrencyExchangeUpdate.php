<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CurrencyExchangeUpdate extends CI_Controller{

    public function cronJob(){

        $url = 'http://api.exchangeratesapi.io/v1/latest?'.'access_key=204cda4eb4ac6f2a1c59de64d26ee556'.'&symbols=GBP,TRY,USD';
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $exchangeRates = json_decode($json, true);

        $tryq = $exchangeRates['rates']['TRY'];
        $usd = $exchangeRates['rates']['USD'];
        $gpt =  $exchangeRates['rates']['GBP'];
        $euro = 1/$usd;
        $lira = $tryq/$usd;
        $bir = $gpt/$usd;

        $id= 1;
        $data=array(
            "euro"=>$euro,
            "try"=>$lira,
            "gpt"=>$bir
        );
        $this->load->model('Currency_model');
        $this->Currency_model->updateCurrency($id,$data);
    }
}