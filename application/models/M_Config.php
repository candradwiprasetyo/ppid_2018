<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Config extends MY_Model{
    
    var $table = 'tbl_config';
    var $column_order = array(null, 'CATEGORY', 'LABEL', 'CKEY', 'CVALUE', 'CTYPE', 'ORDNUM', 'STATUS'); 
    var $column_search = array('CATEGORY', 'LABEL', 'CKEY', 'CVALUE', 'CTYPE', 'ORDNUM', 'STATUS'); 
    var $order = array('ORDNUM' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}