<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_SubCategory extends MY_Model{
    
    var $table = 'tbl_subcategory';
    var $column_order = array(null, 'ID','CATEGORY_ID', 'SUBCATEGORY_NAME', 'SEO', 'TYPE', 'URL', 'POS', 'STATUS'); 
    var $column_search = array('ID','CATEGORY_ID', 'SUBCATEGORY_NAME', 'SEO', 'TYPE', 'URL', 'POS', 'STATUS'); 
    var $order = array('ID' => 'desc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}