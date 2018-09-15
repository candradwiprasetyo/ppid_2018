<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminIndikatorDetail extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/indikator_detail/index');
	}

	public function ajax()
	{
		$list = $this->M_IndikatorDetail->get_datatables();
        $data = array();
        foreach ($list as $user) {
            $row = array();     
            $date = explode("-", $user->DATE);
            $row[] = isset($user->DATE) ? $date[2].'-'.$date[1].'-'.$date[0] : "";
            $row[] = $user->VALUE;            
            $row[] = $user->PERIOD;
			
            $row[] = '<a onclick="showModal(\'edit\', '.$user->ID.')"><button type="button" class="btn btn-info">Edit</button></a>
            <a href="'.base_url().'webminIndikatorDetail/delete/'.$user->ID.'"><button type="button" class="btn btn-danger">Hapus</button></a>';


            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_IndikatorDetail->count_all(),
                        "recordsFiltered" => $this->M_IndikatorDetail->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $data = $this->M_IndikatorDetail->getdata(['id' => $this->uri->segment(4)], 'single');
        echo json_encode($data);
    }

    public function put()
    {
        $date = explode("-", $_POST['date']);

        $data = array(
            "DATE"          => $date[2].'-'.$date[1].'-'.$date[0], 
            "VALUE"         => $_POST['value'],
            "PERIOD"        => $_POST['period'],
        );

        $resut = $this->M_IndikatorDetail->update($this->input->post('id'), $data);

        echo 1;
    }

    public function store()
    { 
        $date = explode("-", $_POST['date']);

        $data = array(
            "DATE"          => $date[2].'-'.$date[1].'-'.$date[0], 
            "VALUE"         => $_POST['value'],
            "PERIOD"        => $_POST['period'],
        );

        $resut = $this->M_IndikatorDetail->insert($data);
        echo 1; 
    }

    public function delete($id) {
        $resut = $this->M_IndikatorDetail->delete($id);
        redirect('webmin/indikator_detail');
    }
}