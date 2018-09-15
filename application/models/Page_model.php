<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get news
    function get_page($seo)
    {
        $this->db->select('*');
        $this->db->from('tbl_static');
        if ($seo) {
            $this->db->where("SEO='".$seo."'");
        }
        $this->db->limit(1);
        //$this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }
}
