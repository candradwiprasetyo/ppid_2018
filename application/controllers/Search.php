<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Search extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->library('library');
        $this->load->model('News_model');
    }

    public function index()
    {   
        $meta['title'] = '';
        $meta['image'] = '';
        $meta['description'] = '';
        $meta['keyword'] = '';

        $data['title'] = "Pencarian";
        $meta['title'] = 'Pencarian DDTCNews';

        $terpopuler = $this->News_model->get_news_popular('', '5', '');

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/search', $array = array(
            'data' => $data,
            'terpopuler' => $terpopuler,
        ));
        $this->load->view('layouts/footer');
    }
}
