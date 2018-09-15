<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Category extends MY_Model{
    
    var $table = 'tbl_category';
    var $column_order = array(null, 'ID','CATEGORY_NAME', 'SEO', 'NO', 'DESCRIPTION'); 
    var $column_search = array('ID','CATEGORY_NAME', 'SEO', 'NO', 'DESCRIPTION'); 
    var $order = array('ID' => 'desc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}