<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_alat extends CI_Controller
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
        $meta['image'] = '';
        $meta['keyword'] = ''; 
        $meta['title'] = "Data dan Alat DDTCNews";
        $meta['description'] = $meta['title'];

        $now = date("m");
        $year = date("Y");
        if ($now == 1 || $now == 2 || $now == 3) {
            $param = '(MONTH(DATE) = 1 and YEAR(DATE)='.$year.') or (MONTH(DATE) = 2 and YEAR(DATE)='.$year.') or  MONTH(DATE) = 3 and YEAR(DATE)='.$year;
        } else if ($now == 4 || $now == 5 || $now == 6) {
            $param = '(MONTH(DATE) = 4 and YEAR(DATE)='.$year.') or (MONTH(DATE) = 5 and YEAR(DATE)='.$year.') or  MONTH(DATE) = 6 and YEAR(DATE)='.$year;
        } else if ($now == 7 || $now == 8 || $now == 9) {
            $param = '(MONTH(DATE) = 7 and YEAR(DATE)='.$year.') or (MONTH(DATE) = 8 and YEAR(DATE)='.$year.') or  MONTH(DATE) = 9 and YEAR(DATE)='.$year;
        } else if ($now == 10 || $now == 11 || $now == 12) {
            $param = '(MONTH(DATE) = 10 and YEAR(DATE)='.$year.') or (MONTH(DATE) = 11 and YEAR(DATE)='.$year.') or  MONTH(DATE) = 12 and YEAR(DATE)='.$year;
        }

        //$chart = $this->Chart_model->get_data_chart(0, 12);
        $chart = $this->Chart_model->get_last_data_chart();



        $berita_kurs_pajak = $this->News_model->get_news('', '3', '', '', 7);
       

        $indikator = $this->Indikator_model->get_data();
        $tax_engine_banner = $this->News_model->get_banner('', '1', 'bottom', '3');
        $peraturan_pajak_terbanyak = $this->Engine_model->get_peraturan_pajak_terbanyak('', '5');
        $p3b_populer = $this->Engine_model->get_p3b_populer('', '3');
        $data_alat_banner = $this->News_model->get_banner('', '2', 'bottom-data-alat', '');
        $terpopuler = $this->News_model->get_news_popular('', '5', '', 7);
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

        $data['title'] = "Data dan Alat";

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/data_alat', $array = array(
            'data' => $data,
            'indikator' => $indikator,
            'tax_engine_banner' => $tax_engine_banner,
            'peraturan_pajak_terbanyak' => $peraturan_pajak_terbanyak,
            'p3b_populer' => $p3b_populer,
            'chart' => $chart,
            'data_alat_banner' => $data_alat_banner,
            'berita_kurs_pajak' => $berita_kurs_pajak,
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

        
        $headline = $this->News_model->get_news('', '5', '', '', $subcategory_id);

        $sub_headline = $this->News_model->get_news('5', '2', '', '', $subcategory_id);
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
