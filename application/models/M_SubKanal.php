<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_SubKanal extends CI_Model{
    
    var $table = 'tbl_subcategory';
    var $column_order = array(null, 'tbl_subcategory.ID', 'tbl_category.CATEGORY_NAME', 'SUBCATEGORY_NAME', 'tbl_subcategory.SEO', 'tbl_subcategory.TYPE', 'tbl_subcategory.URL', 'tbl_subcategory.POS', 'tbl_subcategory.STATUS'); 
    var $column_search = array('tbl_subcategory.ID', 'tbl_category.CATEGORY_NAME', 'SUBCATEGORY_NAME', 'tbl_subcategory.SEO', 'tbl_subcategory.TYPE', 'tbl_subcategory.URL', 'tbl_subcategory.POS', 'tbl_subcategory.STATUS'); 
    var $order = array('tbl_subcategory.ID' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }

    public function getdata($search = [], $single = false)
    {
        $this->db->select('tbl_subcategory.*');

        foreach ($search as $key => $value) {
            $this->db->where($key, $value);
        }
        
        $this->db->from($this->table);
        $this->db->join('tbl_category', 'tbl_category.ID = tbl_subcategory.CATEGORY_ID');
        $query = $this->db->get();
        if($query->num_rows() != 0)
        {
            if($single)
                return $query->row();
            else    
                return $query->result_array();
        }
        else
        {
            return [];
        }
    }

    public function update($id, $data, $key = 'id')
    {
        $this->db->where($key, $id);  
        $data = $this->db->update($this->table, $data);
        return true;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);  
        $this->db->delete($this->table);
    }

    private function _get_datatables_query()
    {
        $this->db->select('tbl_subcategory.*');
        $this->db->select('tbl_category.CATEGORY_NAME');
        $this->db->from($this->table);
        $this->db->join('tbl_category', 'tbl_category.ID = tbl_subcategory.CATEGORY_ID');
        $i = 0;
        foreach ($this->column_search as $item) 
        {
            if(isset($_POST['search']['value'])) 
            {
                 
                if($i===0) 
                {
                    $this->db->group_start(); 
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }


        if(isset($_POST['order'])) 
        {           
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {            
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if(isset($_POST['length']) AND $_POST['length'] != -1)
        {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        
        $query = $this->db->get();
        return $query->result();
    }
 
    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }
}
