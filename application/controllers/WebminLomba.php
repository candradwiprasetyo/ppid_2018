<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminLomba extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/lomba/index');
	}

	public function ajax()
	{
		$list = $this->M_Lomba->get_datatables();
        $data = array();
        $ddtc = unserialize(base64_decode(get_cookie('ddtc')));
        $no = isset($_POST['start']) ? $_POST['start'] : 0;
        foreach ($list as $view) {
            $row = array();
            $no++;
            $row[] = $no;
            $row[] = $view->UNIVERSITY_NAME;
            $row[] = $view->UNIVERSITY_FACULTY;
            $row[] = $view->UNIVERSITY_PROGRAM;
            $row[] = $view->UNIVERSITY_GRADE;
            $row[] = $view->LEADER_NAME;
            $row[] = $view->LEADER_EMAIL;
            $row[] = $view->MEMBER_NAME;
            $row[] = $view->MEMBER_EMAIL;
			
            $action = '<a onclick="showModal(\''.$view->ID.'\')"><button type="button" class="btn btn-info">VIEW</button></a>';
            if($ddtc['ROLE'] == "superadmin") {
                $action .= '<a style="margin-left:10px" onclick="hapus( '.$view->ID.')"><button type="button" class="btn btn-danger">DELETE</button></a>';
            }

            $row[] = $action;
                    

            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Lomba->count_all(),
                        "recordsFiltered" => $this->M_Lomba->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function viewdata()
    {
        $data = $this->M_Lomba->getdata(['tbl_tax_competition.ID' => $_GET['ID']], 'single');
        $data_file = $this->M_Lomba->get_data_file($_GET['ID']);
        $output = array(
            'data' => $data,
            'data_file' => $data_file,
        );
        echo json_encode($output);
    }

    public function destroy()
    {
        $id = $this->uri->segment(4);
        $data = $this->M_Lomba->getdata(['tbl_tax_competition.ID' => $id], 'single');

        if($data->LEADER_PHOTO !="")
        {            
            $file = "uploads/tax_competition/leader_profile/".$data->LEADER_PHOTO;
            if (file_exists($file)) {
                 unlink($file);
            }
        }

        if($data->MEMBER_PHOTO !="")
        {            
            $file = "uploads/tax_competition/member_profile/".$data->MEMBER_PHOTO;
            if (file_exists($file)) {
                 unlink($file);
            }
        }

        if($data->ESSAY_STATEMENT_LETTER !="")
        {            
            $file = "uploads/tax_competition/statement_letter/".$data->ESSAY_STATEMENT_LETTER;
            if (file_exists($file)) {
                 unlink($file);
            }
        }

        if($data->ESSAY_FILE !="")
        {            
            $file = "uploads/tax_competition/file_essay/".$data->ESSAY_FILE;
            if (file_exists($file)) {
                 unlink($file);
            }
        }

        $this->M_Lomba->delete($id);
        redirect('webmin/lomba');
    }
}