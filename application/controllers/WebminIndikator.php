<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webminIndikator extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/indikator/index');
	}

	public function ajax()
	{
		$list = $this->M_Indikator->get_datatables();
        $data = array();
        foreach ($list as $user) {
            $row = array();
            $row[] = $user->NO;           
            $row[] = $user->COMPONENT;
            $row[] = $user->REALIZATION;            
            $row[] = $user->PERIOD;
            if($user->STATUS == 1)
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';

			
            $row[] = '<a onclick="showModal(\'edit\', '.$user->ID.')"><button type="button" class="btn btn-info">Edit</button></a>';
            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Indikator->count_all(),
                        "recordsFiltered" => $this->M_Indikator->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $data = $this->M_Indikator->getdata(['id' => $this->uri->segment(4)], 'single');
        echo json_encode($data);
    }

    public function put()
    {

        $data = array(
            "COMPONENT"     => $_POST['component'], 
            "REALIZATION"   => $_POST['realisasi'],
            "PERIOD"        => $_POST['periode'],
            "STATUS"        => $_POST['status'],
            "NO"            => $_POST['urut'],
        );

        $resut = $this->M_Indikator->update($this->input->post('id'), $data);

        if ($this->input->post('id')=='1') {
            $data_detail = array(
                "DATE"          => date("Y-m-d"), 
                "VALUE"         => $_POST['realisasi'],
                "PERIOD"        => $_POST['periode'],
            );
            $resut = $this->M_Indikator->save_detail($data_detail);
        }

        

        echo 1;
    }

    public function store()
    { 
        $data = array(
            "COMPONENT"     => $_POST['component'], 
            "REALIZATION"   => $_POST['realisasi'],
            "PERIOD"        => $_POST['periode'],
            "STATUS"        => 1,
            "NO"            => $_POST['urut'],
        );

        $resut = $this->M_Indikator->insert($data);
        echo 1; 
    }
}