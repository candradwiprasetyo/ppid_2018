<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Quiz extends MY_Model{
    
    var $table = 'tbl_quiz';
    var $column_order = array('null', 'TITLE', 'QUESTION', 'START_DATE', 'END_DATE', 'STATUS'); 
    var $column_search = array('TITLE', 'QUESTION', 'START_DATE', 'END_DATE', 'STATUS'); 
    var $order = array('ID' => 'desc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}