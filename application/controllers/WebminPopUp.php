<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminPopUp extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/popup/index');
	}

	public function ajax()
	{
		$list = $this->M_PopUp->get_datatables();
        $data = array();
        foreach ($list as $pop) {
            $row = array();
           
            $row[] = $pop->ID;           
            $row[] = $pop->URL;
            $row[] = '<img src="'.site_url("assets/images/banners/".$pop->FILENAME).'" width="100px" />';

            if($pop->STATUS == 1)
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
			
            $row[] = '<a onclick="showModal(\'edit\', '.$pop->ID.')"><button type="button" class="btn btn-info">Edit</button></a>
            <a style="margin-left:10px" onclick="hapus( '.$pop->ID.')"><button type="button" class="btn btn-danger">Hapus</button></a>
            ';


            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_PopUp->count_all(),
                        "recordsFiltered" => $this->M_PopUp->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $data = $this->M_PopUp->getdata(['id' => $this->uri->segment(4)], 'single');
        echo json_encode($data);
    }

    public function put()
    {
        if($_FILES['photo']['size'] > 0)
        {
            $target_dir = "assets/images/banners/";
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $target_file = $target_dir.$file;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $filename = $file;
        } else {
            $filename = $_POST['image'];            
        }

        $data = array(
            "URL"           => $_POST['url'], 
            "FILENAME"      => $filename,
            "STATUS"        => $_POST['status'],
        );

        $resut = $this->M_PopUp->update($this->input->post('id'), $data);
        echo 1;
    }

    public function store()
    {
        if($_FILES['photo']['size'] > 0)
        {
            $target_dir = "assets/images/banners/";
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $target_file = $target_dir.$file;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $filename = $file;
        } else {
            $filename = $_POST['image'];            
        }
        
        $data = array(
            "URL"           => $_POST['url'], 
            "FILENAME"      => $filename,
            "STATUS"        => $_POST['status'],
        );

        $resut = $this->M_PopUp->insert($data);
        echo 1; 
    }

    public function destroy()
    {
        $id = $this->uri->segment(4);
        $data = $this->M_PopUp->getdata(['id' => $id], 'single');
        if($data->IMAGE !="")
        {            
            $file = "assets/images/banners/".$data->FILENAME;
            if (file_exists($file)) {
                 unlink($file);
            }
        }

        $this->M_PopUp->delete($id);
        redirect('webmin/popup');
    }
}