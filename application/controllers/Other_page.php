<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Other_page extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->library('library');
    }

    public function unduh_kajian()
    {   
        $meta['image'] = '';
        $meta['keyword'] = ''; 
        $meta['title'] = "Unduh Kajian Akademis dan DIM RUU Konsultan Pajak";
        $meta['description'] = $meta['title'];

        $terpopuler = $this->News_model->get_news_popular('', '5');
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

        $data['title'] = "Unduh Kajian Akademis dan DIM RUU Konsultan Pajak";

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/unduh_kajian', $array = array(
            'data' => $data,
            'terpopuler' => $terpopuler,
            'berita_terbaru' => $berita_terbaru,
        ));   
        $this->load->view('layouts/footer');
    }
}
