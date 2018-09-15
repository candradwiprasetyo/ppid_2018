<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Engine_model');
        $this->load->library('library');
        $this->load->library('user_agent');
    }

    public function index()
    {   
        $meta['title'] = '';
        $meta['image'] = base_url().'assets/images/meta_images.jpg';
        $meta['description'] = '';
        $meta['keyword'] = '';

        //function get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='', $keyword='', $date='', $sticky='')
        

        $header_banner = $this->News_model->get_banner('', '5', 'header');
        $left_banner = $this->News_model->get_banner('', '1', 'wing-left');
        $right_banner = $this->News_model->get_banner('', '1', 'wing-right');
        $headline = $this->News_model->get_news('', '5', 'HEADLINE');
        $headline_sub = $this->News_model->get_news('5', '4', 'HEADLINE');
        $perspektif = $this->News_model->get_news('', '4', '', '', 21);
        $analisis = $this->News_model->get_news('', '20', '', '', 10);
        $fokus = $this->News_model->get_focus('', '4');
        $berita_sticky = $this->News_model->get_news('', '1', '', '', '', '', '', '', '', '1');
        $sticky_id = (isset($berita_sticky[0]->ID)) ? $berita_sticky[0]->ID : '';
        $berita_terbaru_latest = $this->News_model->get_news('', '2', '', '', '', '', '', '', '', '', $sticky_id);
        $berita_terbaru = $this->News_model->get_news('2', '4', '', '', '', '', '', '', '', '', $sticky_id);
        $terpopuler = $this->News_model->get_news_popular_home('', '5');
        $video = $this->News_model->get_news('', '6', '', '', 28, '');
        $infografis = $this->News_model->get_news('', '4', '', '', 4, '');
        $profil_negara = $this->News_model->get_news('', '4', '', '', 5, '');
        $profil_daerah = $this->News_model->get_news('', '4', '', '', 6, '');
        $wawancara = $this->News_model->get_news('', '4', '', '', 11, '');
        $tajuk = $this->News_model->get_news('', '3', '', '', 9, '');
        $kurs_pajak = $this->News_model->get_news('', '3', '', '', 7, '');
        $reportase = $this->News_model->get_news('', '4', '', '', 31, '');
        $download_peraturan = $this->News_model->get_news('', '3', '', '', 8, '');
        $konsultasi = $this->News_model->get_news('1', '8', '', '', 12, '');
        $konsultasi_terbaru = $this->News_model->get_news('', '1', '', '', 12, '');
        $kelas_pajak = $this->News_model->get_news('', '8', '', '', 16, '');
        $foto = $this->News_model->get_news('', '3', '', '', 26, '');
        $foto_slider = $this->News_model->get_foto('', '3', $foto[0]->ID);
        $selebriti = $this->News_model->get_news('', '3', '', '', 19, '');
        $humor = $this->News_model->get_news('', '3', '', '', 18, '');
        $kutipan = $this->News_model->get_news('', '3', '', '', 15, '');
        $buku = $this->News_model->get_news('', '3', '', '', 13, '');
        $kamus = $this->News_model->get_news('', '3', '', '', 14, '');
        $agenda = $this->News_model->get_news('', '3', '', '', 17, '');
        $kampus = $this->News_model->get_news('', '3', '', '', 20, '');
        $peraturan_pajak = $this->Engine_model->get_peraturan_pajak('', '1');
        $putusan_pengadilan = $this->Engine_model->get_putusan_pengadilan('', '1');
        $p3b = $this->Engine_model->get_p3b('', '1');
        $mahkamah_agung = $this->Engine_model->get_mahkamah_agung('', '1');
        $peraturan_pajak_terbanyak = $this->Engine_model->get_peraturan_pajak_terbanyak('', '3');
        $peraturan_pajak_terpopuler = $this->Engine_model->get_peraturan_pajak_terpopuler('', '3');
        $peraturan_pajak_terbaru = $this->Engine_model->get_peraturan_pajak_terbaru('', '3');
        $kuis_banner = $this->News_model->get_banner('', '1', 'section-0', '');
        $tax_engine_banner = $this->News_model->get_banner('', '1', 'section-1', '');
        $final_research_banner = $this->News_model->get_banner('', '1', 'section-2', '');
        $academy_banner = $this->News_model->get_banner('', '1', 'section-3', '');
        $library_banner = $this->News_model->get_banner('', '1', 'section-4', '');
        $inside_tax_banner = $this->News_model->get_banner('', '1', 'bottom', '');
        $working_paper_banner = $this->News_model->get_banner('1', '1', 'bottom', '');
        $mobile_banner_1 = $this->News_model->get_banner('', '3', 'mobile', '');
        $mobile_banner_2 = $this->News_model->get_banner('3', '3', 'mobile', '');
        $popup = $this->News_model->get_popup();

        if ($this->agent->is_mobile()){
            $berita_terbaru_latest = [];
            $berita_terbaru = $this->News_model->get_news('', '20', '', '', '', '', '', '', '', '', $sticky_id);
          $layout = 'home_mobile';
        } else {
          $layout = 'home';
        }

        $this->load->view('layouts/header', $array = array(
            'meta' => $meta,
            'left_banner' => $left_banner,
            'right_banner' => $right_banner,
        ));
        $this->load->view('layouts/'.$layout, $array = array(
            'header_banner' => $header_banner, 
            'headline' => $headline, 
            'headline_sub' => $headline_sub,
            'perspektif' => $perspektif,
            'analisis' => $analisis,
            'fokus' => $fokus,
            'berita_sticky' => $berita_sticky,
            'berita_terbaru' => $berita_terbaru,
            'berita_terbaru_latest' => $berita_terbaru_latest,
            'terpopuler' => $terpopuler,
            'video' => $video,
            'infografis' => $infografis,
            'profil_negara' => $profil_negara,
            'profil_daerah' => $profil_daerah,
            'wawancara' => $wawancara,
            'tajuk' => $tajuk,
            'kurs_pajak' => $kurs_pajak,
            'reportase' => $reportase,
            'download_peraturan' => $download_peraturan,
            'konsultasi' => $konsultasi,
            'konsultasi_terbaru' => $konsultasi_terbaru,
            'kelas_pajak' => $kelas_pajak,
            'foto' => $foto,
            'foto_slider' => $foto_slider,
            'selebriti' => $selebriti,
            'humor' => $humor,
            'kutipan' => $kutipan,
            'buku' => $buku,
            'kamus' => $kamus,
            'agenda' => $agenda,
            'kampus' => $kampus,
            'peraturan_pajak' => $peraturan_pajak,
            'putusan_pengadilan' => $putusan_pengadilan,
            'p3b' => $p3b,
            'mahkamah_agung' => $mahkamah_agung,
            'tax_engine_banner' => $tax_engine_banner,
            'final_research_banner' => $final_research_banner,
            'academy_banner' => $academy_banner,
            'library_banner' => $library_banner,
            'inside_tax_banner' => $inside_tax_banner,
            'working_paper_banner' => $working_paper_banner,
            'peraturan_pajak_terbanyak' => $peraturan_pajak_terbanyak,
            'peraturan_pajak_terbaru' => $peraturan_pajak_terbaru,
            'peraturan_pajak_terpopuler' => $peraturan_pajak_terpopuler,
            'mobile_banner_1' => $mobile_banner_1,
            'mobile_banner_2' => $mobile_banner_2,
            'popup' => $popup,
            'kuis_banner' => $kuis_banner,

        ));
        $this->load->view('layouts/footer');
    }

    function count_banner() {
        $id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
        $hit = $this->News_model->get_count_banner($id);
    }

}
