<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Indikator extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Indikator_model');
        $this->load->library('library');
    }

    public function index()
    {   
        $meta['image'] = '';
        $meta['keyword'] = ''; 
        $meta['title'] = "Indikator DDTCNews";
        $meta['description'] = $meta['title'];

        $indikator = $this->Indikator_model->get_data();
        $terpopuler = $this->News_model->get_news_popular('', '5');
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

        $data['title'] = "Indikator";

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/indikator', $array = array(
            'data' => $data,
            'indikator' => $indikator,
            'terpopuler' => $terpopuler,
            'berita_terbaru' => $berita_terbaru,
        ));   
        $this->load->view('layouts/footer');
    }
}
