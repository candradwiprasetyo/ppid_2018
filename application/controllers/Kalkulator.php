<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kalkulator extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->library('library');
    }

    public function index()
    {   
        $meta['image'] = '';
        $meta['keyword'] = ''; 
        $meta['title'] = "Kalkulator PPh Pasal 21 - DDTCNews";
        $meta['description'] = $meta['title'];

        $terpopuler = $this->News_model->get_news_popular('', '5');
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

        $data['title'] = "Kalkulator PPh 21";

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/kalkulator', $array = array(
            'data' => $data,
            'terpopuler' => $terpopuler,
            'berita_terbaru' => $berita_terbaru,
        ));   
        $this->load->view('layouts/footer');
    }
}
