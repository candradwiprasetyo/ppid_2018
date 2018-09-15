<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lomba_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get essay theme
    function get_essay_theme()
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_theme');
        $this->db->order_by(' ID DESC ');
        return $this->db->get()->result();
    }

    // get data tmp
    function get_data_tmp($session)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_file_tmp');
        $this->db->where('SESSION', $session);  
        $this->db->order_by(' ID DESC ');
        return $this->db->get()->result();
    }

    
    // insert lomba
    function insert_lomba($data)
    {
        $this->db->insert('tbl_tax_competition', $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    // insert essay file tmp
    function insert_essay_file_tmp($data)
    {
        $this->db->insert('tbl_essay_file_tmp', $data);
    }

    // insert essay file 
    function insert_essay_file($data)
    {
        $this->db->insert('tbl_essay_file', $data);
    }

    // get data
    function get_data($id='')
    {
        $sql = "select 
            b.NAME as ESSAY_THEME_NAME,
            a.*
            from tbl_tax_competition a 
            join tbl_essay_theme b on b.ID = a.ESSAY_THEME_ID
            where a.ID = '$id'";    
        $query = $this->db->query($sql);
        $result = null;
        return $query->result_array();
    }

    public function delete_tmp($session)
    {
        $this->db->where('SESSION', $session);  
        $this->db->delete('tbl_essay_file_tmp');
    }
}
