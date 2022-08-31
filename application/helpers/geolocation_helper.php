<? defined('BASEPATH') or exit('No direct script access allowed');

if ( ! function_exists('fetch_geolocation'))
{
    function fetch_geolocation()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,"http://www.geoplugin.net/json.gp?ip=" . $ip);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_USERAGENT, 'Your application name');
        $query = curl_exec($curl_handle);
        curl_close($curl_handle);

        $ip_data = json_decode($query);

        if ($ip_data and $ip_data->geoplugin_status!=429 and $ip_data->geoplugin_countryName != null) {
            $result = $ip_data->geoplugin_countryCode;
        }else{
            $result = null;
        }
        return $result;
    }
}