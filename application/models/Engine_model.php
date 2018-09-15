<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Engine_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        // $dsn2 = 'mysqli://ddtc_darussalam:internasional23@localhost/ddtc_engine';
        $dsn2 = 'mysqli://root:root@localhost/ddtc_engine';
        $this->db2= $this->load->database($dsn2, true);
    }

    // get peraturan pajak
    function get_peraturan_pajak($start=0, $end='')
    {
             

        $this->db2->select("*, 'peraturan-pajak' as TIPE, id as ID, nomordokumen as TITLE");
        $this->db2->from('regulasi_pajak');
        $this->db2->where('publish=1');
        $this->db2->order_by(' tanggal DESC ');
        $this->db2->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db2->get()->result();
    }
    
    // get Putusan Pengadilan
    function get_putusan_pengadilan($start=0, $end='')
    { 

        $this->db2->select("*, 'putusan-pengadilan-pajak' as TIPE, id as ID, name as TITLE");
        $this->db2->from('putusanpengadilan');
        $this->db2->where('status=1');
        $this->db2->order_by(' tahun_keputusan DESC ');
        $this->db2->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db2->get()->result();
    }

    // get p3b
    function get_p3b($start=0, $end='')
    { 
        $this->db2->select("* ,'p3b' as TIPE, p3b_id as ID, p3b_country as TITLE");
        $this->db2->from('p3b');
        $this->db2->where('p3b_status=1');
        $this->db2->order_by(' p3b_date_effective DESC ');
        $this->db2->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db2->get()->result();
    }

    // get Mahkamah Agung
    function get_mahkamah_agung($start=0, $end='')
    { 
        $this->db2->select("* ,'putusan-mahkamah-agung' as TIPE, ma_id as ID, ma_number as TITLE");
        $this->db2->from('mahkamahagung');
        $this->db2->where('ma_status=3');
        $this->db2->order_by(' ma_year DESC ');
        $this->db2->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db2->get()->result();
    }

    function get_peraturan_pajak_terbanyak($start=0, $end='') {
        $this->db2->select("*");
        $this->db2->from('regulasi_pajak');
        $this->db2->where('publish=1');
        $this->db2->where('tanggal > (CURDATE() - interval 90 DAY)');
        $this->db2->order_by(' download DESC ');
        $this->db2->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db2->get()->result();  
    }
	
	function get_peraturan_pajak_terpopuler($start=0, $end='') {
        $this->db2->select("*");
        $this->db2->from('regulasi_pajak');
        $this->db2->where('publish=1');
        $this->db2->where('tanggal > (CURDATE() - interval 90 DAY)');
        $this->db2->order_by(' view DESC ');
        $this->db2->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db2->get()->result();  
    }
	
	function get_peraturan_pajak_terbaru($start=0, $end='') {
        $this->db2->select("*");
        $this->db2->from('regulasi_pajak');
        $this->db2->where('publish=1');
        $this->db2->order_by(' tanggal DESC ');
        $this->db2->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db2->get()->result();  
    }

    function get_p3b_populer($start=0, $end='') {
        $this->db2->select("*");
        $this->db2->from('p3b');
        $this->db2->where('p3b_status=1');
        $this->db2->order_by(' p3b_view DESC ');
        $this->db2->limit($end, $start);
        //$this->output->enable_profiler(TRUE);
        return $this->db2->get()->result();  
    }
}
