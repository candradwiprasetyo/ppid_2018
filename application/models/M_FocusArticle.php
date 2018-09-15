<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_FocusArticle extends MY_Model{
    
    var $table = 'tbl_focus_article';
    var $column_order = array(null, 'FOCUS_ID', 'ARTICLE_ID'); 
    var $column_search = array('FOCUS_ID', 'ARTICLE_ID'); 
    var $order = array('ID' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}