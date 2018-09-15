<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sample extends CI_Controller
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
        $meta['title'] = 'DDTCNews - Berita Pajak Terbaru Hari Ini, Peraturan dan Analisis Perpajakan';
        $meta['image'] = base_url().'assets/images/meta_images.jpg';
        $meta['description'] = 'Berita pajak dan analisis peraturan perpajakan terbaru hari ini, dilengkapi dengan berita pajak daerah, pajak internasional, konsultasi pajak, agenda dan informasi kegiatan komunitas pajak.';
        $meta['keyword'] = 'berita pajak, berita pajak hari ini, berita pajak terbaru, analisis pajak, konsultan pajak, konsultasi pajak, pajak internasional, tax amnesty, pengampunan pajak, beps, pemeriksaan pajak, transfer pricing, pertukaran informasi pajak, humor pajak, anekdot pajak, pajak daerah, pajak kendaraan, pajak mobil, pajak online, pajak restoran, pbb, pajak properti, dirjen pajak, kasus pajak, perhitungan pajak, peraturan pajak, pajak tanah, pajak digital';

        

        $header_banner = $this->News_model->get_banner('', '5', 'header');
        $left_banner = $this->News_model->get_banner('', '1', 'wing-left');
        $right_banner = $this->News_model->get_banner('', '1', 'wing-right');
        $headline = $this->News_model->get_news('', '5', 'HEADLINE');
        $headline_sub = $this->News_model->get_news('5', '6', 'HEADLINE');
        $perspektif = $this->News_model->get_news('', '4', '', '', 21);
        $analisis = $this->News_model->get_news('', '20', '', '', 10);
        $fokus = $this->News_model->get_focus('', '4');
        $berita_terbaru_latest = $this->News_model->get_news('', '1', '', '', '', '');
        $berita_terbaru = $this->News_model->get_news('1', '4', '', '', '', '');
        $terpopuler = $this->News_model->get_news_popular('', '5');
        $video = $this->News_model->get_news('', '6', '', '', 28, '');
        $infografis = $this->News_model->get_news('', '4', '', '', 4, '');
        $profil_negara = $this->News_model->get_news('', '4', '', '', 5, '');
        $wawancara = $this->News_model->get_news('', '4', '', '', 11, '');
        $tajuk = $this->News_model->get_news('', '3', '', '', 9, '');
        $kurs_pajak = $this->News_model->get_news('', '3', '', '', 7, '');
        $konsultasi = $this->News_model->get_news('1', '8', '', '', 12, '');
        $konsultasi_terbaru = $this->News_model->get_news('', '1', '', '', 12, '');
        $kelas_pajak = $this->News_model->get_news('', '6', '', '', 16, '');
        $foto = $this->News_model->get_news('', '4', '', '', 26, '');
        $foto_slider = $this->News_model->get_foto('', '3', $foto[0]->ID);
        $selebriti = $this->News_model->get_news('', '3', '', '', 19, '');
        $humor = $this->News_model->get_news('', '3', '', '', 18, '');
        $kutipan = $this->News_model->get_news('', '3', '', '', 15, '');
        $buku = $this->News_model->get_news('', '3', '', '', 13, '');
        $kamus = $this->News_model->get_news('', '3', '', '', 14, '');
        $agenda = $this->News_model->get_news('', '3', '', '', 17, '');
        $kampus = $this->News_model->get_news('', '3', '', '', 20, '');
        $peraturan_pajak = $this->Engine_model->get_peraturan_pajak('', '3');
        $putusan_pengadilan = $this->Engine_model->get_putusan_pengadilan('', '3');
        $p3b = $this->Engine_model->get_p3b('', '3');
        $mahkamah_agung = $this->Engine_model->get_mahkamah_agung('', '3');
        $peraturan_pajak_terbanyak = $this->Engine_model->get_peraturan_pajak_terbanyak('', '5');
        $tax_engine_banner = $this->News_model->get_banner('', '1', 'bottom', '3');
        $academy_banner = $this->News_model->get_banner('', '1', 'bottom', '1');
        $inside_tax_banner = $this->News_model->get_banner('', '1', 'bottom', '4');
        $working_paper_banner = $this->News_model->get_banner('', '1', 'bottom', '2');

        if ($this->agent->is_mobile()){
          $berita_terbaru = $this->News_model->get_news('1', '20', '', '1', '', '');
          $layout = 'home_mobile';
        } else {
          $layout = 'home';
        }

        // $this->load->view('layouts/header', $array = array(
        //     'meta' => $meta,
        //     'left_banner' => $left_banner,
        //     'right_banner' => $right_banner,
        // ));
        // $this->load->view('layouts/'.$layout, $array = array(
        //     'header_banner' => $header_banner, 
        //     'headline' => $headline, 
        //     'headline_sub' => $headline_sub,
        //     'perspektif' => $perspektif,
        //     'analisis' => $analisis,
        //     'fokus' => $fokus,
        //     'berita_terbaru' => $berita_terbaru,
        //     'berita_terbaru_latest' => $berita_terbaru_latest,
        //     'terpopuler' => $terpopuler,
        //     'video' => $video,
        //     'infografis' => $infografis,
        //     'profil_negara' => $profil_negara,
        //     'wawancara' => $wawancara,
        //     'tajuk' => $tajuk,
        //     'kurs_pajak' => $kurs_pajak,
        //     'konsultasi' => $konsultasi,
        //     'konsultasi_terbaru' => $konsultasi_terbaru,
        //     'kelas_pajak' => $kelas_pajak,
        //     'foto' => $foto,
        //     'foto_slider' => $foto_slider,
        //     'selebriti' => $selebriti,
        //     'humor' => $humor,
        //     'kutipan' => $kutipan,
        //     'buku' => $buku,
        //     'kamus' => $kamus,
        //     'agenda' => $agenda,
        //     'kampus' => $kampus,
        //     'peraturan_pajak' => $peraturan_pajak,
        //     'putusan_pengadilan' => $putusan_pengadilan,
        //     'p3b' => $p3b,
        //     'mahkamah_agung' => $mahkamah_agung,
        //     'tax_engine_banner' => $tax_engine_banner,
        //     'academy_banner' => $academy_banner,
        //     'inside_tax_banner' => $inside_tax_banner,
        //     'working_paper_banner' => $working_paper_banner,
        //     'peraturan_pajak_terbanyak' => $peraturan_pajak_terbanyak,
        // ));
        // $this->load->view('layouts/footer');
    }
}
