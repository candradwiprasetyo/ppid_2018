<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class webminStatic extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/static/index');
	}

	public function ajax()
	{
		$list = $this->M_Static->get_datatables();
        $data = array();
        foreach ($list as $user) {
            $row = array();
            $row[] = $user->ID;           
            $row[] = $user->TITLE;
            $row[] = '<a onclick="showModal(\'edit\', '.$user->ID.')"><button type="button" class="btn btn-info">Edit</button></a>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Static->count_all(),
                        "recordsFiltered" => $this->M_Static->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $data = $this->M_Static->getdata(['id' => $this->uri->segment(4)], 'single');
        echo json_encode($data);
    }

    public function put()
    {
        $data = array(
            "CONTENT"  => $_POST['content']
        );

        $resut = $this->M_Static->update($this->input->post('id'), $data);
        echo 1;
    }

    public function store()
    {        
        $data = array(
            "CONTENT"  => $_POST['content'],
        );

        $resut = $this->M_Static->insert($data);
        echo 1; 
    }
}