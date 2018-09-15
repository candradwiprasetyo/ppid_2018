<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminSubKanal extends MY_Controller {

	public function index()
	{        
        $data = $this->M_Category->getdata();
		$this->view('webmin/subkanal/index', ['category' => $data]);
	}

	public function ajax()
	{
		$list = $this->M_SubKanal->get_datatables();
        $data = array();
        foreach ($list as $sub) {
            $row = array();
            $row[] = $sub->ID;           
            $row[] = $sub->CATEGORY_NAME;
            $row[] = $sub->SUBCATEGORY_NAME;     
            $row[] = $sub->SEO;
            $row[] = $sub->TYPE;
            $row[] = $sub->URL;
            $row[] = $sub->POS;
            
            if($sub->STATUS == 1)
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
			
            $row[] = '<a onclick="showModal(\'edit\', '.$sub->ID.')"><button type="button" class="btn btn-info">Edit</button></a>
                <a style="margin-left:10px" onclick="hapusSubkanal('.$sub->ID.')"><button type="button" class="btn btn-danger">Hapus</button></a>
            ';

            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_SubKanal->count_all(),
                        "recordsFiltered" => $this->M_SubKanal->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $data = $this->M_SubKanal->getdata(['tbl_subcategory.ID' => $this->uri->segment(4)], 'single');
        echo json_encode($data);
    }

    public function put()
    {
        $data = array(
            "CATEGORY_ID"       => $_POST['category'], 
            "SUBCATEGORY_NAME"  => $_POST['name'],
            "SEO"               => $_POST['seo'],
            "TYPE"              => $_POST['type'],
            "URL"               => $_POST['url'],
            "POS"               => $_POST['pos'],
            "STATUS"            => $_POST['status']
        );

        $resut = $this->M_SubKanal->update($this->input->post('id'), $data);
        echo 1;
    }

    public function store()
    { 
        $data = array(
            "CATEGORY_ID"       => $_POST['category'], 
            "SUBCATEGORY_NAME"  => $_POST['name'],
            "SEO"               => $_POST['seo'],
            "TYPE"              => $_POST['type'],
            "URL"               => $_POST['url'],
            "POS"               => $_POST['pos'],
            "STATUS"            => $_POST['status']
        );

        $resut = $this->M_SubKanal->insert($data);
        echo 1; 
    }

    public function destroy()
    {
        $id = $this->uri->segment(4);
        $this->M_SubKanal->delete($id);
        redirect('webmin/subKanal');
    }
}