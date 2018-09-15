<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminPublikasi extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/publikasi/index');
	}

	public function ajax()
	{
		$list = $this->M_Publication->get_datatables();
        $data = array();
        $no = isset($_POST['start']) ? $_POST['start'] : 0;
        foreach ($list as $publikasi) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $publikasi->TITLE;
            $row[] = $publikasi->HIT;
            $row[] = $publikasi->DOWNLOADED;
            if($publikasi->STATUS == 1)
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';

			
            $row[] = '<a onclick="showModal(\'edit\', '.$publikasi->ID.')"><button type="button" class="btn btn-info">Edit</button></a>';
            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Publication->count_all(),
                        "recordsFiltered" => $this->M_Publication->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $data = $this->M_Publication->getdata(['id' => $this->uri->segment(4)], 'single');
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
            $image = $file;
        } else {
            $image = $_POST['image'];            
        }

        if($_FILES['file_pdf']['size'] > 0)
        {
            $target_dir = "assets/pdf/";
            $file = date('ymdhis').basename($_FILES["file_pdf"]["name"]);
            $target_file = $target_dir.$file;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["file_pdf"]["tmp_name"], $target_file);
            $pdf = $file;
        } else {
            $pdf = $_POST['pdf'];            
        }


        $data = array(
            "UPPERDECK"     => $_POST['upperdeck'], 
            "TITLE"         => $_POST['judul'],
            "CONTENT"       => $_POST['isi'],
            "RELEASE_DATE"  => $_POST['tgl_rilis'],
            "IMAGE"         => $image,
            "PDF"           => $pdf,
            "STATUS"        => $_POST['status'],
        );

        $resut = $this->M_Publication->update($this->input->post('id'), $data);
        echo 1;
    }

    public function store()
    { 
        $data = array(
            "UPPERDECK"     => $_POST['upperdeck'], 
            "TITLE"         => $_POST['judul'],
            "CONTENT"       => $_POST['isi'],
            "RELEASE_DATE"  => $_POST['tgl_rilis'],
            "IMAGE"         => $image,
            "PDF"           => $pdf,
            "STATUS"        => $_POST['status'],
        );

        $resut = $this->M_Publication->insert($data);
        echo 1; 
    }
}