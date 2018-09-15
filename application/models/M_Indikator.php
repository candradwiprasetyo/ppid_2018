<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Indikator extends MY_Model{
    
    var $table = 'tbl_indikator';
    var $column_order = array(null, 'COMPONENT', 'REALIZATION', 'PERIOD', 'STATUS', 'NO'); 
    var $column_search = array('COMPONENT', 'REALIZATION', 'PERIOD', 'STATUS', 'NO'); 
    var $order = array('NO' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }

    // insert detail
    function save_detail($data)
    {
        $this->db->insert('tbl_indikator_detail', $data);
    }
}