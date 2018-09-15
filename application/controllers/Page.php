<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Page_model');
        $this->load->model('News_model');
        $this->load->library('library');
    }

    public function detail($seo)
    {   
        $meta['image'] = '';
        $meta['keyword'] = '';
        $meta['title'] = '';
        $meta['description'] = '';

        $page = $this->Page_model->get_page($seo);
        if (count($page) > 0){
            $data['title'] = $page[0]->TITLE;
            $meta['title'] = $data['title'].' DDTCNews';
            $meta['description'] = $meta['title'];
            $terpopuler = $this->News_model->get_news_popular('', '5', '');
        }

        $this->load->view('layouts/header', $array = array('meta' => $meta));

        if (count($page) > 0) {
            $this->load->view('layouts/page', $array = array(
                'data' => $data,
                'page' => $page,
                'terpopuler' => $terpopuler,
            ));
        } else {
            $this->load->view('layouts/error_page');
        }
        $this->load->view('layouts/footer');
    }
}
