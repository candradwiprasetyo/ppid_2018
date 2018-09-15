<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_IndikatorDetail extends MY_Model{
    
    var $table = 'tbl_indikator_detail';
    var $column_order = array(null, 'DATE', 'VALUE', 'PERIOD'); 
    var $column_search = array('DATE', 'VALUE', 'PERIOD'); 
    var $order = array('DATE' => 'desc'); 
 
    public function __construct()
    {
        parent::__construct();
    }

    public function delete($id){
	  $this->db->where('ID', $id);
	  $this->db->delete('tbl_indikator_detail');
	}
}