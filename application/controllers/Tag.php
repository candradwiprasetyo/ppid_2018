<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tag extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->library('library');
    }

    public function sub($keyword='')
    {   
        $meta['image'] = '';
        $meta['keyword'] = '';
        $data['date'] = '';
        $data['keyword_value'] = str_replace("-", " ", $keyword);
        $data['keyword'] = $keyword;
        $category_id = '';
        $subcategory_id = '';

        $page = isset($_REQUEST['p']) ? $_REQUEST['p'] : '1';
        $date = isset($_REQUEST['d']) ? $_REQUEST['d'] : '';

        if ($date) {
            $d = explode("-", $date);
            $date = $d[2]."-".$d[1]."-".$d[0];
            $data['date'] = $date;
        }

        $cat = isset($_REQUEST['cat']) ? $_REQUEST['cat'] : '';
        $data['cat'] = $cat;

        if($cat) {
            $title = $this->News_model->get_category_name($cat);

            if($title) {
                $category_id = $this->News_model->get_category($cat);
            } else {
                $title = $this->News_model->get_subcategory_name($cat);
                if ($title) {
                    $subcategory_id = $this->News_model->get_subcategory($cat);
                }
            }
        }

        $row_per_page = 12;
        $start = ($page-1) * $row_per_page;

        //function get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='', $keyword='', $date='')
                
        $data['title'] = $data['keyword_value'];
        $news = $this->News_model->get_news($start, $row_per_page, '', $category_id, $subcategory_id, '', '', $data['keyword_value'], $date);
        
        
        $meta['description'] = $data['title'];
        $meta['title'] = $meta['description'];
        $data['category_id'] = $category_id;
        $data['subcategory_id'] = $subcategory_id;

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        
        $this->load->view('layouts/tag', $array = array(
            'data' => $data,
            'news' => $news,
        ));
        
        $this->load->view('layouts/footer');
    }
}
