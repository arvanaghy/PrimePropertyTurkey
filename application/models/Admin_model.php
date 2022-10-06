<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function login($data)
    {
        $password = sha1($data['password']);
        $this->db->where('password',$password);
        $this->db->where('username',$data['username']);
        $this->db->where('status',1);
        $query = $this->db->get('admin');
        $result =array();
        if ($query->result()){
            foreach ($query->result() as $row){
                 $result['id']=$row->id;
            }
            return $result;
        }else{
            return False;
        }
    }
    public function changePassword($data)
    {
        $current = sha1($data['OldPassword']);
        $this->db->where('password',$current);
        $this->db->where('id',$data['id']);
        $this->db->where('status',1);
        $query = $this->db->get('admin');
        if ($query->result()){
            $new = sha1($data['NewPassword']);
            $this->db->where('id',$data['id']);
            $this->db->set('password',$new);
            $this->db->update('admin');
            return True;
        }
        return False;
    }
    public function fetchContactUs()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('contactUsMessages');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }

    public function fetchProperties()
    {
        $this->db->order_by('Property_id', 'DESC');
        $this->db->where('status > ', 1);
        $query = $this->db->get('property');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function trashProperties()
    {
        $this->db->order_by('Property_id', 'DESC');
        $this->db->group_start();
        $this->db->where('status',1);
        $this->db->group_end();
        $query = $this->db->get('property');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function delete_property($id)
    {
        $data=array('status'=>1);
        $this->db->where('Property_id',$id);
        $this->db->update('property',$data);
    }
    public function publish_property($id)
    {
        $data=array('status'=>5);
        $this->db->where('Property_id',$id);
        $this->db->update('property',$data);
    }
    public function insertProperty($data)
    {
        $this->db->insert('property', $data);
        return $this->db->insert_id();
    }
    public function insert_gallery_images_record($data)
    {
        $this->db->insert('gallery', $data);
    }
    public function GetProperty($id)
    {
        $this->db->order_by('Property_id', 'DESC');
        $this->db->where('Property_id',$id);
        $this->db->where('status > ', 1);
        $query = $this->db->get('property');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }
    public function GetPropertyGalleryImages($id)
    {
        $this->db->order_by('gallery_id', 'DESC');
        $this->db->where('gallery_property_id',$id);
        $query = $this->db->get('gallery');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function UpdateProperty($id,$data)
    {
        $this->db->where('Property_id', $id);
        $this->db->update('property', $data);
    }
    public function Delete_Property_Gallery_Record($id)
    {
        $this->db->where('gallery_id', $id);
        $this->db->delete('gallery');
    }
    public function UpdateGalleryImageOrder($id,$data)
    {
        $this->db->where('gallery_id', $id);
        $this->db->update('gallery', $data);
    }
    public function DeletePropertyForEver($id)
    {
        $this->db->delete('property', array('Property_id' => $id));
    }

    public function fetchBlogs()
    {
        $this->db->order_by('Blog_ID', 'DESC');
        $this->db->group_start();
        $this->db->where('status',0);
        $this->db->or_where('status',3);
        $this->db->group_end();
        $query = $this->db->get('blog');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function trashBlog()
    {
        $this->db->order_by('Blog_ID', 'DESC');
        $this->db->group_start();
        $this->db->where('status',1);
        $this->db->group_end();
        $query = $this->db->get('blog');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function delete_Blog($id)
    {
        $data=array('status'=>1);
        $this->db->where('Blog_ID',$id);
        $this->db->update('blog',$data);
    }
    public function publish_Blog($id)
    {
        $data=array('status'=>0);
        $this->db->where('Blog_ID',$id);
        $this->db->update('blog',$data);
    }
    public function insertBlog($data)
    {
        $this->db->insert('blog', $data);
    }
    public function GetBlog($id)
    {
        $this->db->order_by('Blog_ID', 'DESC');
        $this->db->where('Blog_ID',$id);
        $query = $this->db->get('blog');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }
    public function Blog_Update($id,$data)
    {
        $this->db->where('Blog_ID', $id);
        $this->db->update('blog', $data);
    }
    public function DeleteBlogForEver($id)
    {
        $this->db->delete('blog', array('Blog_ID' => $id));
    }
    public function getBlogTitleAjax($value)
    {
        $this->db->select('Blog_ID');
        $this->db->where('url_slug',$value);
        $query = $this->db->get('blog');
        if ($query->result()){
            return $query->result_array();
        }else{
            return $data['Blog_ID'] = null;
        }
    }
    public function publishBlogPostOnDate($date)
    {
        $this->db->set('status',0);
        $this->db->group_start();
        $this->db->where('publish_date',$date);
        $this->db->where('status',3);
        $this->db->group_end();
        $this->db->update('blog');
    }

    public function fetchnews()
    {
        $this->db->order_by('News_ID', 'DESC');
        $this->db->group_start();
        $this->db->where('status',0);
        $this->db->group_end();
        $query = $this->db->get('news');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function trashNews()
    {
        $this->db->order_by('News_ID', 'DESC');
        $this->db->group_start();
        $this->db->where('status',1);
        $this->db->group_end();
        $query = $this->db->get('news');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function delete_News($id)
    {
        $data=array('status'=>1);
        $this->db->where('News_ID',$id);
        $this->db->update('news',$data);
    }
    public function publish_News($id)
    {
        $data=array('status'=>0);
        $this->db->where('News_ID',$id);
        $this->db->update('news',$data);
    }
    public function insertNews($data)
    {
        $this->db->insert('news', $data);
    }
    public function GetNews($id)
    {
        $this->db->order_by('News_ID', 'DESC');
        $this->db->where('News_ID',$id);
        $query = $this->db->get('news');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }
    public function News_Update($id,$data)
    {
        $this->db->where('News_ID', $id);
        $this->db->update('news', $data);
    }
    public function DeleteNewsForEver($id)
    {
        $this->db->delete('news', array('News_ID' => $id));
    }
    public function getNewsTitleAjax($value)
    {
        $this->db->select('News_ID');
        $this->db->where('url_slug',$value);
        $query = $this->db->get('news');
        if ($query->result()){
            return $query->result_array();
        }else{
            return $data['News_ID'] = null;
        }
    }

    public function fetchVideos()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->group_start();
        $this->db->where('status',2);
        $this->db->group_end();
        $query = $this->db->get('youtubeVideos');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function insertVideos($data)
    {
        $this->db->insert('youtubeVideos', $data);
    }
    public function delete_Videos($id)
    {
        $data=array('status'=>1);
        $this->db->where('id',$id);
        $this->db->update('youtubeVideos',$data);
    }
    public function trashVideos()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->group_start();
        $this->db->where('status',1);
        $this->db->group_end();
        $query = $this->db->get('youtubeVideos');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function publish_videos($id)
    {
        $data=array('status'=>2);
        $this->db->where('id',$id);
        $this->db->update('youtubeVideos',$data);
    }
    public function GetVideo($id)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('id',$id);
        $query = $this->db->get('youtubeVideos');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }
    public function Videos_Update($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('youtubeVideos', $data);
    }
    public function DeleteVideosForEver($id)
    {
        $this->db->delete('youtubeVideos', array('id' => $id));
    }

    public function fetchUsers()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('user');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }

    public function fetchResales()
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('status >',1);
        $query = $this->db->get('resale');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function AuditionPublish($id,$set)
    {
        $this->db->set($set);
        $this->db->where('id', $id);
        $this->db->update('resale');
    }
    public function Delete_Audition($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('resale');
    }
    public function delete_Audition_image($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('resale_image');
    }

    public function fetchResalesByReference($data)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('referenceID ',$data);
        $query = $this->db->get('resale');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }
    public function fetchResalesByID($data)
    {
        $this->db->order_by('id', 'DESC');
        $this->db->where('id ',$data);
        $query = $this->db->get('resale');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }
    public function getLastResaleReferenceIDModel()
    {
        $this->db->select('Property_referenceID');
        $this->db->order_by('Property_id', 'DESC');
        $this->db->where('ReferenceLink !=','0');
        $query = $this->db->get('property');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }
    public function getResaleImageName($data)
    {
        $this->db->select('id,image,sort_priority');
        $this->db->order_by('sort_priority', 'DESC');
        $this->db->where('property',$data);
        $query = $this->db->get('resale_image');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function deleteResaleProperty($id)
    {
        $this->db->where('referenceID', $id);
        $this->db->delete('resale');
    }
    public function getResalePropertyTitle($value)
    {
        $this->db->select('Property_id');
        $this->db->where('url_slug',$value);
        $query = $this->db->get('property');
        if ($query->result()){
            return $query->result_array();
        }else{
            return $data['Property_id'] = null;
        }
    }

    public function statistics()
    {
        $query = $this->db->get('contentLikes');
        if ($query->result()){
            return $query->row();
        }
        return false;
    }

    public function countNewComments($id,$type)
    {
        $this->db->where('kind', $type);
        $this->db->where('status!=', 'published');
        $this->db->where('reference_id', $id);
        $query = $this->db->get('comments');
        return $query->num_rows();
    }
    public function countAllComments($id,$type)
    {
        $this->db->where('kind', $type);
        $this->db->where('reference_id', $id);
        $query = $this->db->get('comments');
        return $query->num_rows();
    }
    public function ListComments($id,$type)
    {
        $this->db->where('kind', $type);
        $this->db->where('reference_id', $id);
        $query = $this->db->get('comments');
        if ($query->result()){
            return $query->result();
        }else{
            return null;
        }
    }
    public function getPostBYID($id,$type)
    {
        if ($type == 'blog'){
            $this->db->where('Blog_ID', $id);
        }else{
            $this->db->where('News_ID', $id);
        }
        $query = $this->db->get($type);
        if ($query->result()){
            return $query->row();
        }else{
            return null;
        }
    }
    public function Delete_Comment($id,$type)
    {
        $this->db->where('reference_id', $id);
        $this->db->where('kind', $type);
        $this->db->delete('comments');
    }

    public function fetchJobs()
    {
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get('Career');
        if ($query->result()){
            return $query->result();
        }
        return false;
    }
    public function UpdateJobStatus($id)
    {
        $data=array('status'=>'checked');
        $this->db->where('id',$id);
        $this->db->update('Career',$data);
    }

    public function Publish_Comment($id,$type)
    {
        $this->db->set('status', 'published');
        $this->db->where('kind', $type);
        $this->db->where('reference_id', $id);
        $this->db->update('comments');
    }
}
