<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_Publication extends MY_Model{
    
    var $table = 'tbl_publication';
    var $column_order = array(null, 'UPPERDECK', 'TITLE', 'CONTENT', 'RELEASE_DATE', 'PUBLISH_TIMESTAMP', 'STATUS', 'IMAGE', 'PDF', 'HIT', 'DOWNLOADED'); 
    var $column_search = array('UPPERDECK', 'TITLE', 'CONTENT', 'RELEASE_DATE', 'PUBLISH_TIMESTAMP', 'STATUS', 'IMAGE', 'PDF', 'HIT', 'DOWNLOADED'); 
    var $order = array('ID' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }
}