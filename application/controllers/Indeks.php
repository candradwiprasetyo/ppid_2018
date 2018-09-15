<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Indeks extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Quiz_model');
        $this->load->library('library');
    }

    public function sub($cat='')
    {   
        $meta['image'] = '';
        $meta['keyword'] = '';
        $category_id = '';
        $subcategory_id = '';
        $data['cat'] = $cat;
        $data['date'] = '';

        $page = isset($_REQUEST['p']) ? $_REQUEST['p'] : '1';
        $date = isset($_REQUEST['d']) ? $_REQUEST['d'] : '';
        
        if ($date) {
            $d = explode("-", $date);
            $date = $d[2]."-".$d[1]."-".$d[0];
            $data['date'] = $date;
        }

        $row_per_page = 12;
        $start = ($page-1) * $row_per_page;

        if ($cat == 'all' || $cat == '') {
            $data['title'] = 'Indeks';
            $title = '';
            $cat = '';
            $news = $this->News_model->get_news($start, $row_per_page, '', '', '', '', '', '', $date);
        } else if($cat == 'quiz') {
            $title = 'Quiz';

            if($title) {
                $data['title'] = "Indeks ".$title;
                $news = $this->Quiz_model->get_data($start, $row_per_page, '', $date);
            }
        } else {

        //function get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='', $keyword='', $date='')

            $title = $this->News_model->get_category_name($cat);

            if($title) {
                $data['title'] = "Indeks ".$title;
                $category_id = $this->News_model->get_category($cat);
                $news = $this->News_model->get_news($start, $row_per_page, '', $category_id, '', '', '', '', $date);
            } else {
                $title = $this->News_model->get_subcategory_name($cat);
                if ($title) {
                    $data['title'] = "Indeks ".$title;
                    $subcategory_id = $this->News_model->get_subcategory($cat);
                    $news = $this->News_model->get_news($start, $row_per_page, '', '', $subcategory_id, '', '', '', $date);
                }
            }
        }
        
        $meta['description'] = 'Indeks '.strtolower($title).' DDTC News';
        $meta['title'] = $meta['description'];
        $data['category_id'] = $category_id;
        $data['subcategory_id'] = $subcategory_id;

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        if ($cat == 'quiz') {  
            $this->load->view('layouts/indeks_quiz', $array = array(
                'data' => $data,
                'news' => $news,
            ));

        } else {
            $this->load->view('layouts/indeks', $array = array(
                'data' => $data,
                'news' => $news,
            ));
        }
        $this->load->view('layouts/footer');
    }
}
