<?php

function crawl_page($url, $depth = 5){

    if (!isset($seen)){
        $seen = array();
    }
    if(($depth == 0) or (in_array($url, $seen))){
//        echo "URL : " . $url . " : Is Seen. <Br />";
        return;
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    $result = curl_exec ($ch);
    curl_close ($ch);

    if( $result ){
        $stripped_file = strip_tags($result, "<a>");
        $dom = new DOMDocument();
        @$dom->loadHTML($stripped_file);

        $xPath = new DOMXPath($dom);
        $elements = $xPath->query("//a/@href");
        $pattern = "|^https://www.primepropertyturkey.com.*|";
        $fav_pattern = "|^https://www.primepropertyturkey.com/Favorite/.*|";
        $currency_pattern = "|^https://www.primepropertyturkey.com/Currency/.*|";
        $user_pattern = "|^https://www.primepropertyturkey.com/User/.*|";
        $print_pattern = "|^https://www.primepropertyturkey.com/PrintPreview/.*|";
        $like_pattern = "|^https://www.primepropertyturkey.com/Like/.*|";
        $dislike_pattern = "|^https://www.primepropertyturkey.com/Dislike/.*|";

        foreach ($elements as $e) {
            if (preg_match($pattern, $e->nodeValue) and
                !preg_match($fav_pattern, $e->nodeValue) and
                !preg_match($currency_pattern, $e->nodeValue) and
                !preg_match($user_pattern, $e->nodeValue) and
                !preg_match($print_pattern, $e->nodeValue) and
                !preg_match($like_pattern, $e->nodeValue) and
                !preg_match($dislike_pattern, $e->nodeValue)
            ){
                if (!in_array($e->nodeValue, $seen)){
                    array_push($seen,$e->nodeValue);
                    echo $e->nodeValue."<Br />";
                }
                crawl_page($e->nodeValue, $depth - 1);
            }
        }
    }
}
crawl_page("https://www.primepropertyturkey.com/",4);