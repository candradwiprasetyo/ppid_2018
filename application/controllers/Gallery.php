<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gallery extends CI_Controller
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
        $meta['description'] = '';
        $meta['keyword'] = '';

        // get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='')

        $category_id = '4';
        $header_banner = $this->News_model->get_banner('', '5', 'header');
        $headline = $this->News_model->get_news('', '5', '', $category_id);
        $sub_headline = $this->News_model->get_news('5', '2', '', $category_id);
        $others = $this->News_model->get_news('7', '3', '', $category_id);
        $editorpick = $this->News_model->get_news('', '4', '', $category_id, '', '', '1');
        $terpopuler = $this->News_model->get_news_popular_home('', '5', $category_id);
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

        $data['title'] = "Gallery PPID Prov Jawa Timur";
        $meta['title'] = 'Gallery PPID Prov Jawa Timur';
        $data['view_all'] = base_url().'indeks/gallery';

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

        if ($subcategory_id == 1 || $subcategory_id == 2 || $subcategory_id == 3) {
            $terpopuler = $this->News_model->get_news_popular_home('', '5', '', $subcategory_id);
        } else {
            $terpopuler = $this->News_model->get_news_popular('', '5', '', $subcategory_id);
        }
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');
        

        $meta['description'] = ' '.$data['title'].' PPID Prov Jawa Timur';
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
