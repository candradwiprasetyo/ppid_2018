<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminFokus extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/fokus/index');
	}

	public function ajax()
	{
		$list = $this->M_Fokus->get_datatables();
        $data = array();
        foreach ($list as $fokus) {
            $row = array();
           
            $row[] = $fokus->ID;           
            $row[] = $fokus->TITLE;           
            if($fokus->STATUS == 1)
            	$row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
            	$row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';

			$query = "select tbl_article.*,tbl_focus_article.ID as id_sub  from tbl_article left join tbl_focus_article on tbl_focus_article.ARTICLE_ID = tbl_article.ID where tbl_focus_article.FOCUS_ID = ".$fokus->ID;

			$query = $this->db->query($query);
			$temp = "";
			foreach ($query->result() as $result)
			{

			    if($temp == ""){
			    	$temp.= "<ul>";
			    }

			    $temp .="<li><a href='".site_url('webmin/subfokus/destroy')."/".$result->id_sub."'>delete</a> ".$result->TITLE."</li>";
			}

			if($temp != "")
				$temp.="</ul>";

			$temp .="<hr style='margin: 0;padding: 0;'> <center>[ <a href='#' onclick='addSub(".$fokus->ID.")'>add</a> ]</center>";

			$row[] = $temp;
			
            $row[] = '<a onclick="showModal(\'edit\', '.$fokus->ID.')"><button type="button" class="btn btn-info">Edit</button></a>';
            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Fokus->count_all(),
                        "recordsFiltered" => $this->M_Fokus->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

	public function edit()
	{
		$data = $this->M_Fokus->getdata(['id' => $this->uri->segment(4)], 'single');
		echo json_encode($data);
	}

	public function put()
	{
		$day = explode(" ", $_POST['tgl']);
		$date = explode("-", $day[0]);

		$data = array(
			"PUBLISH_TIMESTAMP" => $date[2].'-'.$date[1].'-'.$date[0].' '.$day[1], 
			"STATUS"			=> $_POST['status'],
			"TITLE"				=> $_POST['judul']
		);

		$resut = $this->M_Fokus->update($this->input->post('id'), $data);
		echo 1;
	}

	public function store()
	{
		$day = explode(" ", $_POST['tgl']);
		$date = explode("-", $day[0]);
		
		$data = array(
			"PUBLISH_TIMESTAMP" => $date[2].'-'.$date[1].'-'.$date[0].' '.$day[1],
			"STATUS"			=> $_POST['status'],
			"TITLE"				=> $_POST['judul']
		);

		$resut = $this->M_Fokus->insert($data);
		echo 1;	
	}

	public function deleteSubFokus()
	{
		$query = "delete from tbl_focus_article where ID = ".$this->uri->segment(4);
		$this->db->query($query);
		redirect("webmin/fokus");
	}

	public function getSub()
	{		
		$json = [];
		
		if(!empty($this->input->get("q"))){
			$q = "SELECT  lt.ID as id, lt.TITLE as text FROM  tbl_article lt
        			WHERE lt.ID NOT IN (select lr.ID from tbl_article lr left join tbl_focus_article on tbl_focus_article.ARTICLE_ID = lr.ID where tbl_focus_article.FOCUS_ID = ".$this->uri->segment(5)." ) AND lt.TITLE like '%".$this->input->get("q")."%'  LIMIT 10";
        	$query = $this->db->query($q);			
			$json = $query->result();
		}

		echo json_encode($json);
	}

	public function storeSub()
	{
		$data = array(
			'FOCUS_ID' => $_POST['fokus_id'], 
			'ARTICLE_ID' => $_POST['article']
		);

		$resut = $this->M_FocusArticle->insert($data);
		echo 1;	
	}

}