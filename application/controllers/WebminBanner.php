<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminBanner extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/banner/index');
	}

	public function ajax()
	{
		$list = $this->M_Banner->get_datatables();
        $data = array();
        foreach ($list as $banner) {
            $row = array();
            $row[] = $banner->ID;           
            $row[] = $banner->TITLE;
            $row[] = $banner->POS;            
            

            if($banner->STATUS == 1)
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';


            $start_date = explode("-", $banner->START_DATE);
            $end_date = explode("-", $banner->END_DATE);

            $row[] = "From ".$start_date[2].'-'.$start_date[1].'-'.$start_date[0]." To ".$end_date[2].'-'.$end_date[1].'-'.$end_date[0];
            $row[] = $banner->HIT;
			
            $row[] = '<a onclick="showModal(\'edit\', '.$banner->ID.')"><button type="button" class="btn btn-info">Edit</button></a>
                <a style="margin-left:10px" onclick="hapusBanner('.$banner->ID.')"><button type="button" class="btn btn-danger">Hapus</button></a>
            ';

            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Banner->count_all(),
                        "recordsFiltered" => $this->M_Banner->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $data = $this->M_Banner->getdata(['id' => $this->uri->segment(4)], 'single');
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

        // echo $_POST['publish'];

        $date = explode(" - ", $_POST['publish']);
        $start_date = explode("-", $date[0]);
        $end_date = explode("-", $date[1]);

        // print_r($start_date);
        $data = array(
            "TITLE"         => $_POST['title'], 
            "POS"           => $_POST['POS'],
            "FILENAME"      => $filename,
            "URL"           => $_POST['url'],
            "ORDERNUM"      => $_POST['order'],
            "START_DATE"    => (isset($date[0]) ? $start_date[2].'-'.$start_date[1].'-'.$start_date[0] : ""),
            "END_DATE"      => (isset($date[1]) ? $end_date[2].'-'.$end_date[1].'-'.$end_date[0] : ""),
            "STATUS"        => $_POST['status']
        );

        // print_r($data);

        $resut = $this->M_Banner->update($this->input->post('id'), $data);
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

        $date = explode(" - ", $_POST['publish']);
        $start_date = explode("-", $date[0]);
        $end_date = explode("-", $date[1]);
        
        $data = array(
            "TITLE"         => $_POST['title'], 
            "POS"           => $_POST['POS'],
            "FILENAME"      => $filename,
            "URL"           => $_POST['url'],
            "ORDERNUM"      => $_POST['order'],
            "HIT"      => 0,
            "START_DATE"    => (isset($date[0]) ? $start_date[2].'-'.$start_date[1].'-'.$start_date[0] : ""),
            "END_DATE"      => (isset($date[1]) ? $end_date[2].'-'.$end_date[1].'-'.$end_date[0] : ""),
            "STATUS"        => $_POST['status']
        );

        $resut = $this->M_Banner->insert($data);
        echo 1; 
    }

    public function destroy()
    {
        $id = $this->uri->segment(4);
        $data = $this->M_Banner->getdata(['id' => $id], 'single');
        if($data->FILENAME != "")
        {
            $file = "assets/images/banners/".$data->FILENAME;
            if (file_exists($file)) {
                 unlink($file);
            }            
        }

        $this->M_Banner->delete($id);
        redirect('webmin/banner');
    }
}