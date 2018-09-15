<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Literasi extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->library('library');
    }

    public function index()
    {   
        $meta['title'] = '';
        $meta['image'] = '';
        $meta['description'] = 'Buku Pajak – Kamus Pajak – Kutipan Pajak – Kelas Pajak';
        $meta['keyword'] = '';

        // get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='')

        $category_id = '4';
        $header_banner = $this->News_model->get_banner('', '5', 'header');
        $headline = $this->News_model->get_news('', '5', '', $category_id);
        $sub_headline = $this->News_model->get_news('5', '2', '', $category_id);
        $others = $this->News_model->get_news('7', '3', '', $category_id);
        $editorpick = $this->News_model->get_news('', '4', '', $category_id, '', '', '1');
        $terpopuler = $this->News_model->get_news_popular('', '5', $category_id);
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

        $data['title'] = "Literasi";
        $meta['title'] = 'Literasi DDTCNews';
        $data['view_all'] = base_url().'indeks/literasi';

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/kanal', $array = array(
            'data' => $data,
            'header_banner' => $header_banner,
            'headline' => $headline, 
            'sub_headline' => $sub_headline,
            'others' => $others,
            'editorpick' => $editorpick,
            'terpopuler' => $terpopuler,
            'berita_terbaru' => $berita_terbaru,
        ));
        $this->load->view('layouts/footer');
    }

    public function sub($subcategory)
    {   
        $meta['title'] = '';
        $meta['image'] = '';
        $meta['description'] = 'Berita Pajak Nasional – Pajak Daerah – Pajak Internasional – Infografis Pajak';
        $meta['keyword'] = '';

        $subcategory_id = $this->News_model->get_subcategory($subcategory);
        $data['title'] = $this->News_model->get_subcategory_name($subcategory);
        $data['subcategory'] = $subcategory;

        //function get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='', $keyword='', $date='', $sticky='', $no_id='', $preview='')

        
        $headline = $this->News_model->get_news('', '5', '', '', $subcategory_id);

        $sub_headline = $this->News_model->get_news('5', '2', '', '', $subcategory_id);
        $others = $this->News_model->get_news('7', '3', '', '', $subcategory_id);
        $editorpick = $this->News_model->get_news('', '4', '', '', $subcategory_id, '', '1');
        $terpopuler = $this->News_model->get_news_popular('', '5', '', $subcategory_id);
        $data_profil_daerah = $this->News_model->get_news('0', '1', '', '', '', '6394');
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

        $meta['description'] = 'Indeks '.$data['title'].' DDTC News';
        $meta['title'] = $meta['description'];
        $data['view_all'] = base_url().'indeks/'.$subcategory;

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/kanal', $array = array(
            'data' => $data,
            'headline' => $headline, 
            'sub_headline' => $sub_headline,
            'others' => $others,
            'editorpick' => $editorpick,
            'terpopuler' => $terpopuler,
            'data_profil_daerah' => $data_profil_daerah,
            'berita_terbaru' => $berita_terbaru,
        ));
        $this->load->view('layouts/footer');
    }
}
