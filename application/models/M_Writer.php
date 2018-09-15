<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Writer extends MY_Model{
    
    var $table = 'tbl_writer';
    var $column_order = array(null, 'EMAIL', 'FULLNAME', 'STATUS', 'BIOGRAFI', 'IMAGE'); 
    var $column_search = array('EMAIL', 'FULLNAME', 'STATUS', 'BIOGRAFI', 'IMAGE'); 
    var $order = array('ID' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}