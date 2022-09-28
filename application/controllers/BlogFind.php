<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogFind extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Find_Model');
        $this->load->model('Fetch_m');
    }

    public function index()
    {
        $data['news_side'] = $this->Fetch_m->news(2);
        $data['blog_side'] = $this->Fetch_m->popular_blog(3);
        $searchWord = strip_tags(trim($this->input->post('searchWord')));
        if ($searchWord != '') {
            $this->session->set_userdata('FindSearchWord', $searchWord);
            $data['all'] = $this->CountFindBlog($searchWord);
            $pages = (int)ceil($data['all'] / 5);
            $data['pages'] = $pages - 1;
            $data['result'] = $this->findBlogs($this->session->userdata('FindSearchWord'), 5, 0);
            $this->session->set_flashdata('message', "<div id='toast_message' class='success'>  We find " . $data['all'] . " results to according your search word </div>");
            $this->load->view('web-site/blog/find-result', $data);
        } elseif ($this->session->has_userdata('FindSearchWord')) {
            $data['all'] = $this->CountFindBlog($this->session->userdata('FindSearchWord'));
            $pages = (int)ceil($data['all'] / 5);
            $data['pages'] = $pages - 1;
            $data['result'] = $this->findBlogs($this->session->userdata('FindSearchWord'), 5, 0);
            $this->load->view('web-site/blog/find-result', $data);
        } else {
            $this->session->set_flashdata('message', "<div id='toast_message' class='warning'> Access IS Denied </div>");
            redirect(base_url());
        }
    }

    protected function CountFindBlog($data)
    {
        return $this->Find_Model->countFindBlogsModel($data);
    }

    protected function findBlogs($data, $limit, $offset)
    {
        return $this->Find_Model->findBlogsModel($data, $limit, $offset);
    }

    public function Details($passed_url = '')
    {
        if (strtoupper($passed_url) == 'INDEX' or $passed_url == '' or $passed_url == 'blogs') {
            redirect(base_url() . 'BlogFind');
        } elseif (preg_match("/^\d+$/", $passed_url)) {
            $data['news_side'] = $this->Fetch_m->news(2);
            $data['blog_side'] = $this->Fetch_m->popular_blog(3);
            $data['all'] = $this->CountFindBlog($this->session->userdata('FindSearchWord'));
            $pages = (int)ceil($data['all'] / 5);
            $data['pages'] = $pages - 1;
            $data['page_id'] = (int)$passed_url;
            if ((int)$passed_url > $data['pages']) {
                $this->output->set_status_header('404');
                $this->load->view('web-site/Custom404');
            }
            $data['result'] = $this->findBlogs($this->session->userdata('FindSearchWord'), 5, $data['page_id'] * 5);
            $this->load->view('web-site/blog/find-result', $data);
        }
    }
}