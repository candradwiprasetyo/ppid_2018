<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Subcriber extends MY_Model{
    
    var $table = 'tbl_subscriber';
    var $column_order = array(null, 'EMAIL', 'NAME', 'PHONE', 'ADDRESS', 'REG_TIMESTAMP'); 
    var $column_search = array('EMAIL', 'NAME', 'PHONE', 'ADDRESS', 'REG_TIMESTAMP'); 
    var $order = array('REG_TIMESTAMP' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}