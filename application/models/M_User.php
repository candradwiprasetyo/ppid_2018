<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_User extends MY_Model{
    
    var $table = 'tbl_user';
    var $column_order = array(null, 'EMAIL', 'PASSWD', 'ROLE', 'STATUS'); 
    var $column_search = array('EMAIL', 'PASSWD', 'ROLE', 'STATUS'); 
    var $order = array('ID' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}