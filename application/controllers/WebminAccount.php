<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminAccount extends MY_Controller {

	public function index()
	{        
        $this->cekUser();
		$this->view('webmin/account/index');
	}

	public function ajax()
	{
        $this->cekUser();
		$list = $this->M_User->get_datatables();
        $data = array();
        
        foreach ($list as $user) {
            $row = array();
           
            $row[] = $user->ID;           
            $row[] = $user->FULLNAME;                       
            $row[] = $user->ROLE; 

            if($user->STATUS == 1)
            	$row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
            	$row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';                      
			                        
            $row[] = '<a onclick="showModal(\'edit\', '.$user->ID.')"><button type="button" class="btn btn-info">Edit</button></a>';;

            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_User->count_all(),
                        "recordsFiltered" => $this->M_User->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $this->cekUser();
        $data = $this->M_User->getdata(['id' => $this->uri->segment(4)], 'single');
        echo json_encode($data);
    }

    public function put()
    {
        $this->cekUser();
        $data = array(
            "FULLNAME"  => $_POST['nama'], 
            "PASSWD"    => $_POST['password'],
            "ROLE"      => $_POST['role'],
            "STATUS"    => $_POST['status'],
            "EMAIL"     => $_POST['email'],
        );

        $resut = $this->M_User->update($this->input->post('id'), $data);
        echo 1;
    }

    public function store()
    {
        $this->cekUser();
        $data = array(
            "FULLNAME"  => $_POST['nama'], 
            "PASSWD"    => $_POST['password'],
            "ROLE"      => $_POST['role'],
            "STATUS"    => $_POST['status'],
            "EMAIL"     => $_POST['email'],
        );

        $resut = $this->M_User->insert($data);
        echo 1; 
    }

    public function cekUser()
    {
        $ddtc = unserialize(base64_decode(get_cookie('ddtc')));;
        if($ddtc['ROLE'] != 'superadmin')
            redirect('webmin');            
    }
}