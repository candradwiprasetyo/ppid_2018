<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminSubcriber extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/subcriber/index');
	}

	public function ajax()
	{
		$list = $this->M_Subcriber->get_datatables();
        $data = array();
        $no = isset($_POST['start']) ? $_POST['start'] : 0;
        foreach ($list as $subcriber) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $subcriber->NAME;
            $row[] = $subcriber->PHONE;
            $row[] = $subcriber->EMAIL;
            $row[] = $subcriber->REG_TIMESTAMP;
			
            $row[] = '<a onclick="showModal(\''.$subcriber->EMAIL.'\')"><button type="button" class="btn btn-info">VIEW</button></a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Subcriber->count_all(),
                        "recordsFiltered" => $this->M_Subcriber->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function viewdata()
    {
        $data = $this->M_Subcriber->getdata(['EMAIL' => $_GET['email']], 'single');
        echo json_encode($data);
    }
}