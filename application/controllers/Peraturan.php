<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Peraturan extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Indikator_model');
        $this->load->model('Engine_model');
        $this->load->model('Chart_model');
        $this->load->library('library');
    }

    public function index()
    {   
        $meta['title'] = '';
        $meta['image'] = '';
        $meta['description'] = 'Berita Pajak Nasional – Pajak Daerah – Pajak Internasional – Infografis Pajak';
        $meta['keyword'] = '';

        // get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='')

        $category_id = '6';
        $header_banner = $this->News_model->get_banner('', '5', 'header');
        $headline = $this->News_model->get_news('', '5', '', $category_id);
        $sub_headline = $this->News_model->get_news('5', '2', '', $category_id);
        $others = $this->News_model->get_news('7', '3', '', $category_id);
        $editorpick = $this->News_model->get_news('', '4', '', $category_id, '', '', '1');
        $terpopuler = $this->News_model->get_news_popular('', '5', $category_id);
		
		$indikator = $this->Indikator_model->get_data();
        $tax_engine_banner = $this->News_model->get_banner('', '1', 'bottom', '3');
        $peraturan_pajak_terbanyak = $this->Engine_model->get_peraturan_pajak_terbanyak('', '5');
        $p3b_populer = $this->Engine_model->get_p3b_populer('', '3');
        $data_alat_banner = $this->News_model->get_banner('', '2', 'bottom-data-alat', '');
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

        $data['title'] = "Peraturan";
        $meta['title'] = 'Peraturan DDTCNews';
        $data['view_all'] = base_url().'indeks/peraturan';

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/kanal_peraturan', $array = array(
            'data' => $data,
            'header_banner' => $header_banner,
            'headline' => $headline, 
            'sub_headline' => $sub_headline,
            'others' => $others,
            'editorpick' => $editorpick,
            'terpopuler' => $terpopuler,
			'data' => $data,
            'indikator' => $indikator,
            'tax_engine_banner' => $tax_engine_banner,
            'peraturan_pajak_terbanyak' => $peraturan_pajak_terbanyak,
            'p3b_populer' => $p3b_populer,
            'data_alat_banner' => $data_alat_banner,
            'berita_terbaru' => $berita_terbaru,
        ));
        $this->load->view('layouts/footer');
    }

    public function sub($subcategory)
    {   
        $meta['image'] = '';
        $meta['keyword'] = '';

        $subcategory_id = $this->News_model->get_subcategory($subcategory);
        $data['title'] = $this->News_model->get_subcategory_name($subcategory);


        $headline = $this->News_model->get_news('', '5', '', '', $subcategory_id);
        
        if ($subcategory_id == '28') {
            $sub_headline = $this->News_model->get_news('1', '2', '', '', $subcategory_id);
        } else {
            $sub_headline = $this->News_model->get_news('5', '2', '', '', $subcategory_id);
        }
        $others = $this->News_model->get_news('7', '3', '', '', $subcategory_id);
        $editorpick = $this->News_model->get_news('', '4', '', '', $subcategory_id, '', '1');
        $terpopuler = $this->News_model->get_news_popular('', '5', '', $subcategory_id);
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
            'berita_terbaru' => $berita_terbaru,
        ));
        
        $this->load->view('layouts/footer');
    }
}
