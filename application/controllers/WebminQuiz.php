<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminQuiz extends MY_Controller {

	public function index()
	{        
		$this->view('webmin/quiz/index');
	}

	public function ajax()
	{
		$list = $this->M_Quiz->get_datatables();
        $data = array();
        foreach ($list as $quiz) {
            $row = array();
            $row[] = $quiz->ID;
            $row[] = $quiz->QUESTION;
            $row[] = "From ".$quiz->START_DATE." to ".$quiz->END_DATE;
                
            if($quiz->STATUS == 1)
                $row[] = '<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>';
            else 
                $row[] = '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>';
			            
            $row[] = '<a onclick="showModal(\'edit\', '.$quiz->ID.')"><button type="button" class="btn btn-info">Edit</button></a>
                        <a style="margin-left:10px" href="'.site_url('webmin/quiz/answer/'.$quiz->ID).'" ><button type="button" class="btn btn-info">Answer</button></a>
                    ';


            $data[] = $row;
        }

        $output = array(
                        "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                        "recordsTotal" => $this->M_Quiz->count_all(),
                        "recordsFiltered" => $this->M_Quiz->count_filtered(),
                        "data" => $data,
                );

        echo json_encode($output);
	}

    public function edit()
    {
        $data = $this->M_Quiz->getdata(['id' => $this->uri->segment(4)], 'single');
        echo json_encode($data);
    }

    public function put()
    {        
        $temp = explode(" - ", $_POST["periode"]);

         if($_FILES['photo']['size'] > 0)
        {
            $target_dir = "assets/images/view/";
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $target_file = $target_dir.$file;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $filename = $file;
        } else {
            $filename = $_POST['image'];            
        }

        $data = array(
            "TITLE"         => $_POST['title'], 
            "QUESTION"      => $_POST['question'],
            "OPTION_A"      => $_POST['option_a'],
            "OPTION_B"      => $_POST['option_b'],
            "OPTION_C"      => $_POST['option_c'],
            "OPTION_D"      => $_POST['option_d'],
            "ANSWER"        => $_POST['answer'],
            "START_DATE"    => isset($temp[0]) ? $temp[0] : "",
            "END_DATE"      => isset($temp[1]) ? $temp[1] : "",
            "ANSWER"        => $_POST['answer'],
            "IMAGE"         => $filename,
            "STATUS"        => $_POST['status'],
        );

        $resut = $this->M_Quiz->update($this->input->post('id'), $data);
        echo 1;
    }

    public function store()
    {
        $temp = explode(" - ", $_POST["periode"]);

        if($_FILES['photo']['size'] > 0)
        {
            $target_dir = "assets/images/view/";
            $file = date('ymdhis').basename($_FILES["photo"]["name"]);
            $target_file = $target_dir.$file;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file);
            $filename = $file;
        } else {
            $filename = $_POST['image'];            
        }

        $data = array(
            "TITLE"         => $_POST['title'], 
            "QUESTION"      => $_POST['question'],
            "OPTION_A"      => $_POST['option_a'],
            "OPTION_B"      => $_POST['option_b'],
            "OPTION_C"      => $_POST['option_c'],
            "OPTION_D"      => $_POST['option_d'],
            "ANSWER"        => $_POST['answer'],
            "START_DATE"    => isset($temp[0]) ? $temp[0] : "",
            "END_DATE"      => isset($temp[1]) ? $temp[1] : "",
            "ANSWER"        => $_POST['answer'],
            "IMAGE"         => $filename,
            "STATUS"        => $_POST['status'],
        );

        $resut = $this->M_Quiz->insert($data);
        echo 1; 
    }

    public function answer()
    {   
        $data = $this->M_Quiz->getdata(['id' => $this->uri->segment(4)], 'single');
        $this->view('webmin/quiz/answer', ['data' => $data]);
    }

    public function answerAjax()
    {        
        $this->M_QuizAnswer->quiz_id = $_POST['quiz_id'];
        $list = $this->M_QuizAnswer->get_datatables();
        $data = array();
        $no=0;
        foreach ($list as $berita) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $this->M_QuizAnswer->get_name($berita->EMAIL);
            $row[] = $berita->EMAIL;
            $row[] = $berita->ANSWER;
            $row[] = $this->M_QuizAnswer->get_phone($berita->EMAIL);
            $row[] = $this->M_QuizAnswer->get_university($berita->EMAIL);
            $row[] = $this->M_QuizAnswer->get_twitter($berita->EMAIL);
            $row[] = $this->M_QuizAnswer->get_facebook($berita->EMAIL);
            $row[] = $this->M_QuizAnswer->get_instagram($berita->EMAIL);

            $data[] = $row;       
        }

        $output = array(
                "draw" => isset($_POST['draw']) ? $_POST['draw'] : false,
                "recordsTotal" => $this->M_QuizAnswer->count_all(),
                "recordsFiltered" => $this->M_QuizAnswer->count_filtered(),
                "data" => $data,
        );

        echo json_encode($output);
    }
}