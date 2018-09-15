<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Static extends MY_Model{
    
    var $table = 'tbl_static';
    var $column_order = array(null, 'TITLE', 'CONTENT', 'SEO'); 
    var $column_search = array('TITLE', 'CONTENT', 'SEO'); 
    var $order = array('ID' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}