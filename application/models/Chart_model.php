<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chart_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    function get_data_chart ($start=0, $end='', $param='') {

        $this->db->select("*");
        $this->db->from('tbl_indikator_detail');
        if ($param){
            $this->db->where($param);
        }
        
        $this->db->order_by(' ID DESC ');
        $this->db->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db->get()->result();  
    }

    function get_last_data_chart () {

        $sql = "(select * from tbl_indikator_detail order by DATE desc limit 12) order by DATE";    
        $query = $this->db->query($sql); 
        return $query->result();
    }
}
