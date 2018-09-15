<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminKanal extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/kanal/index');
	}

	public function ajax()
	{
		$list = $this->M_Category->get_datatables();
        $data = array();
        foreach ($list as $user) {
            $row = array();
            $row[] = $user->ID;           
            $row[] = $user->CATEGORY_NAME;

            if($user->STATUS == 1)
            	$row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
            	$row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';                      
			
            $row[] = '<a onclick="showModal(\'edit\', '.$user->ID.')"><button type="button" class="btn btn-info">Edit</button></a>';
            
            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Category->count_all(),
                        "recordsFiltered" => $this->M_Category->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $data = $this->M_Category->getdata(['id' => $this->uri->segment(4)], 'single');
        echo json_encode($data);
    }

    public function put()
    {
        $data = array(
            "CATEGORY_NAME"  => $_POST['nama'], 
            "SEO"  => $_POST['seo'],
            "STATUS"    => $_POST['status']
        );

        $resut = $this->M_Category->update($this->input->post('id'), $data);
        echo 1;
    }

    public function store()
    { 
        $data = array(
            "CATEGORY_NAME"  => $_POST['nama'], 
            "SEO"  => $_POST['seo'],
            "STATUS"    => $_POST['status']
        );

        $resut = $this->M_Category->insert($data);
        echo 1; 
    }
}