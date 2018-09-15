<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fokus extends CI_Controller
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
        $meta['description'] = 'Fokus DDTCNews';
        $meta['keyword'] = '';
        $data['page'] = 1;

        $headline = $this->News_model->get_focus('', '1');
        $headline_detail = $this->News_model->get_focus_news('', '3', $headline[0]->ID);

        $other = $this->News_model->get_focus('1', '4');
        // $other2 = $this->News_model->get_focus('5', '4');
        // $other3 = $this->News_model->get_focus('9', '4');

        $data['title'] = "Fokus";
        $meta['title'] = 'Fokus DDTCNews';
        $data['next_focus'] = $this->News_model->get_focus('5', '1');
        

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/fokus', $array = array(
            'data' => $data,
            'headline' => $headline, 
            'headline_detail' => $headline_detail, 
            'other' => $other,
            // 'other2' => $other2,
            // 'other3' => $other3,
        ));
        $this->load->view('layouts/footer');
    }

    public function page($page)
    {   
        $meta['title'] = '';
        $meta['image'] = '';
        $meta['description'] = 'Fokus DDTCNews';
        $meta['keyword'] = '';
        $data['page'] = $page;
        $headline_detail = [];
        $other = [];



        if ($page) {
            $offset = ($page - 1) * 5;
            $headline = $this->News_model->get_focus($offset, '1');
            if (count($headline) > 0) {
                $headline_detail = $this->News_model->get_focus_news('', '3', $headline[0]->ID);

                $new_page = $offset + 1;
                $other = $this->News_model->get_focus($new_page, '4');
                // $other2 = $this->News_model->get_focus('5', '4');
                // $other3 = $this->News_model->get_focus('9', '4');
            }

            $next_focus = $this->News_model->get_focus($offset+5, '1');
        }

        $data['next_focus'] = $next_focus;
       

        $data['title'] = "Fokus";
        $meta['title'] = 'Fokus DDTCNews';

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/fokus', $array = array(
            'data' => $data,
            'headline' => $headline, 
            'headline_detail' => $headline_detail, 
            'other' => $other,
            // 'other2' => $other2,
            // 'other3' => $other3,
        ));
        $this->load->view('layouts/footer');
    }

    public function sub($slug=false)
    {   
        $meta['title'] = '';
        $meta['image'] = '';
        $meta['keyword'] = '';

        $exploded = explode('-', $slug);
        $focus_id = end($exploded);

        $fokus = $this->News_model->get_focus('', '1', $focus_id);
        $fokus_detail = $this->News_model->get_focus_news('', '4', $fokus[0]->ID);
        $data['title'] = $fokus[0]->TITLE;

        $meta['description'] = $fokus[0]->TITLE;
        $meta['title'] = $meta['description'];

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/fokus_detail', $array = array(
            'data' => $data,
            'fokus_detail' => $fokus_detail,
        ));
        $this->load->view('layouts/footer');
    }
}
