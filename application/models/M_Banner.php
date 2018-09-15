<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Banner extends MY_Model{
    
    var $table = 'tbl_banners';
    var $column_order = array(null, 'TITLE', 'TYPE', 'POS', 'FILENAME', 'URL', 'START_DATE', 'END_DATE', 'STATUS', 'ORDERNUM', 'HIT'); 
    var $column_search = array('TITLE', 'TYPE', 'POS', 'FILENAME', 'URL', 'START_DATE', 'END_DATE', 'STATUS', 'ORDERNUM', 'HIT'); 
    var $order = array('ID' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}