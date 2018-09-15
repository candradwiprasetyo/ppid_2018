<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Indikator_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get news
    function get_data()
    {
        $this->db->select('*');
        $this->db->from('tbl_indikator');
        $this->db->where("STATUS='1'");
        $this->db->order_by(' NO ASC ');
        //$this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }
}
