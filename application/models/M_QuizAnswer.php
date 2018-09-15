<?php if (!defined('BASEPATH')) {exit('No direct script access allowed');}

class M_QuizAnswer extends CI_Model{
    
    var $table = 'tbl_quiz_answer';
    var $quiz_id = 0;
    var $column_order = array(null, 'QUIZ_ID', 'EMAIL', 'ANSWER', 'QUIZ_ID', 'QUIZ_ID', 'QUIZ_ID', 'QUIZ_ID', 'QUIZ_ID');
    var $column_search = array('ID', 'QUIZ_ID', 'EMAIL', 'ANSWER', 'QUIZ_ID', 'QUIZ_ID', 'QUIZ_ID', 'QUIZ_ID', 'QUIZ_ID'); 
    var $order = array('ID' => 'asc'); 
 
    public function __construct()
    {
        parent::__construct();
    }

	public function getdata($search = [], $single = false)
    {
        $this->db->select('*');

        foreach ($search as $key => $value) {
            $this->db->where($key, $value);
        }
        
        $this->db->from($this->table);

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

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        $insert_id = $this->db->insert_id();
        return  $insert_id;
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);  
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
         
        $this->db->from($this->table);
 
        $i = 0;

        if($this->quiz_id != 0)
        	$this->db->where("QUIZ_ID", $this->quiz_id);
        
        foreach ($this->column_search as $item) // loop column 
        {
            if(isset($_POST['search']['value'])) // if datatable send POST for search
            {
                 
                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) // here order processing
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

    function get_phone($email) {
        $sql = "select PHONE as result from tbl_participant where EMAIL = '$email'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    function get_address($email) {
        $sql = "select ADDRESS as result from tbl_participant where EMAIL = '$email'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    function get_university($email) {
        $sql = "select UNIVERSITY as result from tbl_participant where EMAIL = '$email'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    function get_twitter($email) {
        $sql = "select TWITTER as result from tbl_participant where EMAIL = '$email'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    function get_facebook($email) {
        $sql = "select FACEBOOK as result from tbl_participant where EMAIL = '$email'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    function get_instagram($email) {
        $sql = "select INSTAGRAM as result from tbl_participant where EMAIL = '$email'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    function get_name($email) {
        $sql = "select NAME as result from tbl_participant where EMAIL = '$email'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }
}