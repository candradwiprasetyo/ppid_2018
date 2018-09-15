<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Lomba extends MY_Model{
    
    var $table = 'tbl_tax_competition';
    var $column_order = array(null, 'UNIVERSITY_NAME', 'UNIVERSITY_FACULTY', 'UNIVERSITY_PROGRAM', 'UNIVERSITY_GRADE', 'LEADER_NAME', 'LEADER_EMAIL', 'MEMBER_NAME', 'MEMBER_EMAIL'); 
    var $column_search = array('UNIVERSITY_NAME', 'UNIVERSITY_FACULTY', 'UNIVERSITY_PROGRAM', 'UNIVERSITY_GRADE', 'LEADER_NAME', 'LEADER_EMAIL', 'MEMBER_NAME', 'MEMBER_EMAIL'); 
    var $order = array('CREATED_AT' => 'desc'); 
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getdata($search = [], $single = false)
    {
        $this->db->select('tbl_tax_competition.*, tbl_essay_theme.*');

        foreach ($search as $key => $value) {
            $this->db->where($key, $value);
        }
        
        $this->db->from($this->table);
        $this->db->join('tbl_essay_theme', 'tbl_essay_theme.ID = tbl_tax_competition.ESSAY_THEME_ID');
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {
            if($single)
                return $query->row();
            else    
                return $query->result_array();
        }
        else
        {
            return [];
        }
    }

    // get data file
    function get_data_file($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_essay_file');
        $this->db->where('TAX_COMPETITION_ID', $id);  
        $this->db->order_by(' ID DESC ');
        return $this->db->get()->result();
    }
}