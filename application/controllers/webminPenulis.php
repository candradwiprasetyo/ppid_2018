<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminPenulis extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/penulis/index');
	}

	public function ajax()
	{
		$list = $this->M_Writer->get_datatables();
        $data = array();
        foreach ($list as $user) {
            $row = array();
           
            $row[] = $user->ID;           
            $row[] = $user->FULLNAME;                       
            $row[] = $user->EMAIL; 

            if($user->STATUS == 1)
            	$row[] = 'REDAKTUR';
            elseif($user->STATUS == 2)
            	$row[] = 'REPORTER';   
            else
            	$row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';   
			
            $row[] = '<a onclick="showModal(\'edit\', '.$user->ID.')"><button type="button" class="btn btn-info">Edit</button></a>';


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
        $data = $this->M_Writer->getdata(['id' => $this->uri->segment(4)], 'single');
        echo json_encode($data);
    }

    public function put()
    {
        if($_FILES['photo']['size'] > 0)
        {
            $target_dir = "assets/images/thumb/";
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $target_file = $target_dir.$file;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $filename = $file;
        } else {
            $filename = $_POST['image'];            
        }

        $data = array(
            "FULLNAME"  => $_POST['nama'], 
            "BIOGRAFI"  => $_POST['biografi'],
            "IMAGE"     => $filename,
            "STATUS"    => $_POST['status'],
            "EMAIL"     => $_POST['email'],
        );

        $resut = $this->M_Writer->update($this->input->post('id'), $data);
        echo 1;
    }

    public function store()
    {
        if($_FILES['photo']['size'] > 0)
        {
            $target_dir = "assets/images/thumb/";
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $target_file = $target_dir.$file;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $filename = $file;
        } else {
            $filename = $_POST['image'];            
        }
        
        $data = array(
            "FULLNAME"  => $_POST['nama'], 
            "BIOGRAFI"  => $_POST['biografi'],
            "IMAGE"     => $filename,
            "STATUS"    => $_POST['status'],
            "EMAIL"     => $_POST['email'],
        );

        $resut = $this->M_Writer->insert($data);
        echo 1; 
    }
}