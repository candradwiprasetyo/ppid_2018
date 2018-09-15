<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quiz_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    // get quiz
    function get_data($start=0, $end='', $id='', $date='')
    {
        $this->db->select('*');
        $this->db->from('tbl_quiz');
        $this->db->where("STATUS='1'");
        if ($id) {
            $this->db->where("ID='".$id."'");
        }
        if ($date) {
            $this->db->where("start_date <= '".$date."' and end_date >= '".$date."'");
        }
        $this->db->order_by(' ID DESC ');
        $this->db->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db->get()->result();
    }

    // check data
    function check_data($id, $email) {
        $sql = "select count(ID) as result from tbl_quiz_answer where QUIZ_ID = '$id' and EMAIL = '$email'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    // check participant
    function check_participant($email) {
        $sql = "select count(EMAIL) as result from tbl_participant where EMAIL = '$email'";    
        $query = $this->db->query($sql);       
        $result = null;
        foreach ($query->result_array() as $row) $result = ($row);
        return $result['result'];
    }

    // insert answer
    function insert_answer($data)
    {
        $this->db->insert('tbl_quiz_answer', $data);
    }

    // insert participant
    function insert_participant($data)
    {
        $this->db->insert('tbl_participant', $data);
    }

    // update participant
    function update_participant($email, $data)
    {
        $this->db->where('EMAIL', $email);
        $this->db->update('tbl_participant', $data);
    }
}
