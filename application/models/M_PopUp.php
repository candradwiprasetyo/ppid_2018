<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_PopUp extends MY_Model{
    
    var $table = 'tbl_popups';
    var $column_order = array(null, 'ID', 'FILENAME', 'URL', 'STATUS');
    var $column_search = array('ID', 'FILENAME', 'URL', 'STATUS'); 
    var $order = array('ID' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}