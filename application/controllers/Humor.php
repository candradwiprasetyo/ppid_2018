<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Humor extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {   
        $this->load->view('layouts/header');
        $this->load->view('layouts/humor');
        $this->load->view('layouts/footer');
    }
}
