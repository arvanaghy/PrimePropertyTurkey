<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fetch_m extends CI_Model
{
    public function fetchEnquiryFormField($table)
    {
        $this->db->select('id,value');
        $query = $this->db->get($table);
        return $query->result();
    }
    public function fetchEnquiryFormValue($table,$id)
    {
        $this->db->select('value');
        $this->db->where('id',$id);
        $query = $this->db->get($table);
        if ($query->result()){
            $result = array();
            foreach ($query->result() as $row){
                $result = $row;
            }
            return $result;
        }
        return False;
    }

    public function news($limit = null, $offset = null)
    {
        $this->db->where('status', 0);
        $this->db->order_by('News_ID', 'DESC');

        $query = $this->db->get('news', $limit, $offset);
        return $query->result();
    }
    public function blog($limit = null, $offset = null)
    {
        $this->db->where('status', 0);
        $this->db->order_by('Blog_ID', 'DESC');
        $query = $this->db->get('blog', $limit, $offset);
        return $query->result();
    }
    public function popular_blog($limit = 5)
    {
        $offset = rand(0,8);
        $this->db->order_by('(likeCount+dislikeCount)', 'DESC');
        $query = $this->db->get('blog', $limit, $offset);
        return $query->result();
    }
    public function BN_record_count($table, $where_array = null)
    {
        if ($where_array != null) {
            $this->db->where($where_array);
        }
        $this->db->where('status', 0);
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    public function record_count($table, $where_array = null)
    {
        if ($where_array != null) {
            $this->db->where($where_array);
        }
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    public function record_count_commercial($table)
    {
        $this->db->group_start();
        $this->db->where('Property_type', 'Commercial');
        $this->db->or_where('is_commercial', '1');
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    public function fetch_post_by_url($table, $url)
    {
        $this->db->where('url_slug', $url);
        $this->db->where('status > ', 1);
        $query = $this->db->get($table);
        return $query->result_array();
    }
    public function fetch_post_by_url_BN($table, $url)
    {
        $this->db->where('url_slug', $url);
        $this->db->where('status', 0);
        $query = $this->db->get($table);
        return $query->row();
    }
    public function fetchCityIntroduce($value)
    {
        $this->db->select('introduce,moreDescription');
        $this->db->where('value', $value);
        $query = $this->db->get('city');
        $data = array('introduce' => '', 'moreDescription' => '');
        if ($query->result()) {
            foreach ($query->result() as $value) {
                $data['introduce'] = $value->introduce;
                $data['moreDescription'] = $value->moreDescription;
            }
        }
        return $data;
    }
    public function findPropertyExact($find_array, $limit = null, $offset = null)
    {
        $this->db->where($find_array);
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function findProperty($find_array, $limit = null, $offset = null)
    {
        $this->db->like($find_array);
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function findInvestProperty()
    {
        $this->db->like('Property_title','investment');
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', 20, 0);
        return $query->result();
    }
    public function findPropertyCommercial($limit = null, $offset = null)
    {
        $this->db->group_start();
        $this->db->where('Property_type', 'Commercial');
        $this->db->or_where('is_commercial', '1');
        $this->db->group_end();
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function currencyExchange()
    {
        $query = $this->db->get('currencyExchange');
        $result = array();
        if ($query->result()) {
            foreach ($query->result() as $value) {
                $result = $value;
            }
        }
        return $result;
    }
    public function getFavorites($favorite_list, $limit = 20, $offset = 0)
    {

        $favorite_list = explode(',', $favorite_list);
        unset($favorite_list[array_search('', $favorite_list)]);
        $favorite_list_reverse = array_reverse($favorite_list);
        $favorite_list = array_slice($favorite_list_reverse, $offset, $limit);

        $favorite_properties = array();
        $result = null;
        foreach ($favorite_list as $arr) {
            $this->db->where('Property_id', $arr);
            $query = $this->db->get('property');
            if ($query->result()) {
                foreach ($query->result() as $value) {
                    $result = $value;
                }
            }
            $favorite_properties[$arr] = $result;
        }
        return $favorite_properties;
    }
    public function search($data, $limit = 20, $offset = 0)
    {
        $search_array = explode(" ", $data);
        $this->db->group_start();
        foreach ($search_array as $params) {
            $this->db->or_like('Property_title', $params);
            $this->db->or_like('Property_location', $params);
            $this->db->or_like('Property_why_buy_this_property', $params);
            $this->db->or_like('Property_location_city', $params);
            $this->db->or_like('Property_referenceID', $params);
        }
        $this->db->group_end();
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function record_count_search($data)
    {
        $search_array = explode(" ", $data);
        $this->db->group_start();
        foreach ($search_array as $params) {
            $this->db->or_like('Property_title', $params);
            $this->db->or_like('Property_location', $params);
            $this->db->or_like('Property_why_buy_this_property', $params);
            $this->db->or_like('Property_location_city', $params);
        }
        $this->db->group_end();
        $this->db->where('status > ', 1);
        $this->db->from('property');
        return $this->db->count_all_results();
    }
    public function getPropertiesRefer($referID)
    {
        $this->db->where('Property_referenceID', $referID);
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property');
        return $query->result();
    }
    public function searchProperty($value, $limit = 20, $offset = 0)
    {
        if ($value['City'] != 'All') {
            $this->db->where('Property_location', $value['City']);
        }
        if ($value['Type'] != 'All') {
            $this->db->where('Property_type', $value['Type']);
        }
        if ($value['bedroom'] != 'All') {
            $this->db->where('Property_Bedrooms', $value['bedroom']);
        }
        $this->db->group_start();
        if ($value['min_price'] != 'min') {
            $this->db->where('Property_price>=', $value['min_price']);
        }else{
            $this->db->where('Property_price>=', 0);
        }
        if ($value['max_price']<5000000){
            $this->db->where('Property_price<=', $value['max_price']);
        }
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function searchPropertyAll($value,$limit = 20, $offset = 0)
    {
        if ($value['City'] != 'All') {
            $this->db->where('Property_location', $value['City']);
        }
        if ($value['Type'] != 'All') {
            $this->db->where('Property_type', $value['Type']);
        }
        if ($value['bedroom'] != 'All') {
            $this->db->where('Property_Bedrooms', $value['bedroom']);
        }
        $this->db->group_start();
        if ($value['min_price'] != 'min') {
            $this->db->where('Property_price>=', $value['min_price']);
        }else{
            $this->db->where('Property_price>=', 0);
        }
        if ($value['max_price']<5000000){
            $this->db->where('Property_price<=', $value['max_price']);
        }
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function searchPropertyAllCommercial($value,$limit = 20, $offset = 0)
    {
        if ($value['City'] != 'All') {
            $this->db->where('Property_location', $value['City']);
        }
        $this->db->group_start();
        $this->db->where('Property_type', 'Commercial');
        $this->db->or_where('is_commercial', '1');
        $this->db->group_end();
        if ($value['bedroom'] != 'All') {
            $this->db->where('Property_Bedrooms', $value['bedroom']);
        }
        $this->db->group_start();
        if ($value['min_price'] != 'min') {
            $this->db->where('Property_price>=', $value['min_price']);
        }else{
            $this->db->where('Property_price>=', 0);
        }
        if ($value['max_price']<5000000){
            $this->db->where('Property_price<=', $value['max_price']);
        }
        $this->db->group_end();
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function record_count_find($value)
    {
        if ($value['City'] != 'All') {
            $this->db->where('Property_location', $value['City']);
        }
        if ($value['Type'] != 'All') {
            $this->db->where('Property_type', $value['Type']);
        }
        if ($value['bedroom'] != 'All') {
            $this->db->where('Property_Bedrooms', $value['bedroom']);
        }
        if ($value['min_price'] != 'min') {
            $this->db->where('Property_price>=', (int)$value['min_price']);
        }
        if ($value['max_price']<5000000){
            $this->db->where('Property_price<=', (int)$value['max_price']);
        }
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_id', 'DESC');
        $this->db->from('property');
        return $this->db->count_all_results();
    }
    public function record_count_find_Commercial($value)
    {
        if ($value['City'] != 'All') {
            $this->db->where('Property_location', $value['City']);
        }
        $this->db->group_start();

        $this->db->where('Property_type', 'Commercial');
        $this->db->or_where('is_commercial', '1');

        $this->db->group_end();


        if ($value['bedroom'] != 'All') {
            $this->db->where('Property_Bedrooms', $value['bedroom']);
        }
        if ($value['min_price'] != 'min') {
            $this->db->where('Property_price>=', (int)$value['min_price']);
        }
        if ($value['max_price']<5000000){
            $this->db->where('Property_price<=', (int)$value['max_price']);
        }
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_id', 'DESC');
        $this->db->from('property');
        return $this->db->count_all_results();
    }
    public function findFeaturedProperty($limit = 20, $offset = null)
    {
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail');
        $this->db->where('status', 3);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }
    public function countFeaturedProperty()
    {
        $this->db->where('status', 3);
        $this->db->order_by('Property_id', 'DESC');
        $this->db->from('property');
        return $this->db->count_all_results();
    }
    public function recommendedProperties()
    {
        $data = array();
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'istanbul');
        $this->db->where('status > ', 1);
        $this->db->where('recommended', 2);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 10);
        if ($query->result()) {
            $data['istanbul'] = $query->result();
        } else {
            $data['istanbul'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'gocek');
        $this->db->where('recommended', 2);
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 10);
        if ($query->result()) {
            $data['gocek'] = $query->result();
        } else {
            $data['gocek'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'kas');
        $this->db->where('recommended', 2);
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 10);
        if ($query->result()) {
            $data['kas'] = $query->result();
        } else {
            $data['kas'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'kalkan');
        $this->db->where('recommended', 2);
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 10);
        if ($query->result()) {
            $data['kalkan'] = $query->result();
        } else {
            $data['kalkan'] = null;
        }
        $this->db->select('Property_referenceID,Property_id,Property_type,Property_title,url_slug,Property_location,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,Property_price,Property_thumbnail,SoldOut');
        $this->db->where('Property_location', 'fethiye');
        $this->db->where('recommended', 2);
        $this->db->where('status > ', 1);
        $this->db->order_by('recommended_sort', 'ASC');
        $query = $this->db->get('property', 10);
        if ($query->result()) {
            $data['fethiye'] = $query->result();
        } else {
            $data['fethiye'] = null;
        }
        return $data;
    }
    public function get_gallery($data,$limit=null){
        $this->db->select('*');
        $this->db->from('gallery');
        $this->db->where('gallery_property_id',$data);
        $this->db->order_by("image_order", "ASC");
        if ($limit){
            $this->db->limit(2);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function YoutubeVideos(){
        $this->db->where('status', 2);
        $this->db->order_by('sequence', 'ASC');
        $query = $this->db->get('youtubeVideos');
        if ($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }
    public function get_Neighborhood_Properties($locationCity,$propertyID)
    {
        $this->db->select('url_slug,Property_thumbnail,ReferenceLink,Property_title,Property_type,Property_id,Property_location,Property_location_city,Property_Bedrooms,Property_Bathrooms,Property_living_space,Property_overview,SoldOut,Property_price,Property_referenceID');
        $this->db->where('Property_location_city',$locationCity);
        $this->db->where('Property_id != ',$propertyID);
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', 4, 0);
        if ($query->result()){
            return $query->result();
        }else{
            return false;
        }
    }

    public function record_count_ilce($table, $where_array = null)
    {
        if ($where_array != null) {
            foreach ($where_array as $value){
                $this->db->or_where('Property_location_city',$value);
            }
        }
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->from($table);
        return $this->db->count_all_results();
    }
    public function findProperty_ilce($find_array, $limit = null, $offset = null)
    {
        if ($find_array != null) {
            foreach ($find_array as $value){
                $this->db->or_like('Property_location_city',$value);
            }
        }
        $this->db->where('status > ', 1);
        $this->db->order_by('Property_id', 'DESC');
        $query = $this->db->get('property', $limit, $offset);
        return $query->result();
    }

    public function fetchCityNames()
    {
        $this->db->select('Property_location');
        $this->db->distinct();
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_location', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function fetchPropertyTypes()
    {
        $this->db->select('Property_type');
        $this->db->distinct();
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_type', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }
    public function fetchPropertyBed()
    {
        $this->db->select('Property_Bedrooms');
        $this->db->distinct();
        $this->db->group_start();
        $this->db->where('status', '5');
        $this->db->or_where('status', '3');
        $this->db->group_end();
        $this->db->order_by('Property_Bedrooms', 'ASC');
        $query = $this->db->get('property');
        return $query->result_array();
    }

    public function listLocations()
    {
        $this->db->distinct();
        $this->db->select('Property_location');
        $this->db->where('status > ',2);
        $query = $this->db->get('property');
        $result = array();
        foreach ($query->result() as $data){
            array_push($result,$data->Property_location);
        }
        return $result;
    }
}