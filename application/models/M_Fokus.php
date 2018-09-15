<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Fokus extends MY_Model{
    
    var $table = 'tbl_focus';
    var $column_order = array(null, 'ID', 'TITLE'); 
    var $column_search = array('ID', 'tbl_focus.TITLE'); 
    var $order = array('tbl_focus.ID' => 'desc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}
