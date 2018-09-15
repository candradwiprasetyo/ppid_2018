<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller
{ 
    function __construct()
    {
        parent::__construct();
        $this->load->library('library');
        $this->load->helper('url');
    }

    public function detail($id, $title)
    {   
       $url = base_url().$this->library->get_url_news($id, $title);
       redirect($url, 'refresh');
       
    }
}
