<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Repair extends CI_Controller
{

    public function blogs()
    {
        $this->load->model('Repair_model');
        $results = $this->Repair_model->blog_urls();
        $count = 0;
        foreach ($results as $result){
            if ($result->url_slug!=str_replace('_','-',$result->url_slug)):
                $this->load->helper('file');
//                write_file('./results.txt',str_replace('_','-',$result->url_slug).PHP_EOL,'a+');
            $this->Repair_model->update_blog_url($result->Blog_ID,str_replace('_','-',$result->url_slug));
                echo $result->Blog_ID . ' <==> ' . $result->url_slug. ' -- '. str_replace('_','-',$result->url_slug). ' <BR />';
                $count++;
            endif;
        }
    }

    public function readBlog()
    {
        $this->load->helper('file');
          $context = read_file('./results.txt');
          $context_array = explode(PHP_EOL,$context);
          foreach ($context_array as $data){
              echo "\$route['blog/".str_replace('-','_',$data)."'] = 'blog/".$data."/';".' <br />';
          }
    }
    
}