<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lomba extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('News_model');
        $this->load->model('Lomba_model');
        $this->load->library('library');
        $this->load->library('user_agent');
        $this->load->library('session');
        $this->load->helper('cookie');
    }

    public function tax_competition_2018()
    {   
        $meta['title'] = 'Formulir DDTCNews Tax Competition 2018';
        $meta['image'] = '';
        $meta['description'] = 'Formulir DDTCNews Tax Competition 2018';
        $meta['keyword'] = '';

        // get_news($start=0, $end='', $type='', $category='', $subcategory='', $id='', $editorpick='')

        $category_id = '1';
        $terpopuler = $this->News_model->get_news_popular('', '5', $category_id);
        $berita_terbaru = $this->News_model->get_news('0', '5', '', '', '', '', '', '', '', '');

        $essay_theme = $this->Lomba_model->get_essay_theme();


        $data['title'] = "Formulir DDTCNews Tax Competition 2018";
        $meta['title'] = 'Formulir DDTCNews Tax Competition 2018';

        $this->create_session();

        $this->load->view('layouts/header', $array = array('meta' => $meta));
        $this->load->view('layouts/lomba', $array = array(
            'data' => $data,
            'terpopuler' => $terpopuler,
            'berita_terbaru' => $berita_terbaru,
            'essay_theme' => $essay_theme,
        ));
        $this->load->view('layouts/footer');
    }

    public function create_session() {
        $this->session->unset_userdata('file_essay');
        $this->session->set_userdata('file_essay', array_sum(explode(' ', microtime())));
        // echo $this->session->userdata('file_essay');
    }

    public function sent() {
      $i_university_name = $_POST['i_university_name'];
      $i_university_faculty = $_POST['i_university_faculty'];
      $i_university_program = $_POST['i_university_program'];
      $i_university_grade = $_POST['i_university_grade'];
      $i_leader_name = $_POST['i_leader_name'];
      $i_leader_born_place = $_POST['i_leader_born_place'];
      $i_leader_born_date = $_POST['i_leader_born_date'];
      $i_leader_address = $_POST['i_leader_address'];
      $i_leader_gender = $_POST['i_leader_gender'];
      $i_leader_grade = $_POST['i_leader_grade'];
      $i_leader_email = $_POST['i_leader_email'];
      $i_leader_phone = $_POST['i_leader_phone'];
      $i_leader_handphone = $_POST['i_leader_handphone'];
      $i_leader_allergy = $_POST['i_leader_allergy'];
      $i_leader_photo = (isset($_POST['i_leader_photo'])) ? $_POST['i_leader_photo'] : '';
      $i_member_name = $_POST['i_member_name'];
      $i_member_born_place = $_POST['i_member_born_place'];
      $i_member_born_date = $_POST['i_member_born_date'];
      $i_member_address = $_POST['i_member_address'];
      $i_member_gender = $_POST['i_member_gender'];
      $i_member_grade = $_POST['i_member_grade'];
      $i_member_email = $_POST['i_member_email'];
      $i_member_phone = $_POST['i_member_phone'];
      $i_member_handphone = $_POST['i_member_handphone'];
      $i_member_allergy = $_POST['i_member_allergy'];
      $i_member_photo = (isset($_POST['i_member_photo'])) ? $_POST['i_member_photo'] : '';
      $i_essai_theme_id = $_POST['i_essai_theme_id'];
      $i_essai_title = $_POST['i_essai_title'];
      // $i_essai_file = $_POST['i_essai_file'];
      $i_essai_statement_letter = (isset($_POST['i_essai_statement_letter'])) ? $_POST['i_essai_statement_letter'] : '';

      if (isset($_POST['i_leader_born_date'])) {
        $leader_born_date = explode("-", $i_leader_born_date);
        $i_leader_born_date = $leader_born_date[2]."-".$leader_born_date[1]."-".$leader_born_date[1];
      }
      
      if (isset($_POST['i_member_born_date'])) {
        $member_born_date = explode("-", $i_member_born_date);
        $i_member_born_date = $member_born_date[2]."-".$member_born_date[1]."-".$member_born_date[1];
      }

      if($_FILES['i_leader_photo']['size'] > 0)
      {
          $target_dir = "uploads/tax_competition/leader_profile/";
          $file = date('ymdhis').basename($_FILES["i_leader_photo"]["name"]);
          $target_file = $target_dir.$file;
          // $target_file = str_replace(" ", "", $target_file);
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          move_uploaded_file($_FILES["i_leader_photo"]["tmp_name"], $target_file);
          $i_leader_photo = $file;
      }

      if($_FILES['i_member_photo']['size'] > 0)
      {
          $target_dir = "uploads/tax_competition/member_profile/";
          $file = date('ymdhis').basename($_FILES["i_member_photo"]["name"]);
          $target_file = $target_dir.$file;
          // $target_file = str_replace(" ", "", $target_file);
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          move_uploaded_file($_FILES["i_member_photo"]["tmp_name"], $target_file);
          $i_member_photo = $file;
      } 

      // if($_FILES['i_essai_file']['size'] > 0)
      // {
      //     $target_dir = "uploads/tax_competition/file_essay/";
      //     $file = date('ymdhis').basename($_FILES["i_essai_file"]["name"]);
      //     $target_file = $target_dir.$file;
      //     // $target_file = str_replace(" ", "", $target_file);
      //     $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      //     move_uploaded_file($_FILES["i_essai_file"]["tmp_name"], $target_file);
      //     $i_essai_file = $file;
      // } 

      if($_FILES['i_essai_statement_letter']['size'] > 0)
      {
          $target_dir = "uploads/tax_competition/statement_letter/";
          $file = date('ymdhis').basename($_FILES["i_essai_statement_letter"]["name"]);
          $target_file = $target_dir.$file;
          // $target_file = str_replace(" ", "", $target_file);
          $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
          move_uploaded_file($_FILES["i_essai_statement_letter"]["tmp_name"], $target_file);
          $i_essai_statement_letter = $file;
      } 
     
      $data = array(
        'UNIVERSITY_NAME' => $i_university_name,
        'UNIVERSITY_FACULTY' => $i_university_faculty,
        'UNIVERSITY_PROGRAM' => $i_university_program,
        'UNIVERSITY_GRADE' => $i_university_grade,
        'LEADER_NAME' => $i_leader_name,
        'LEADER_BORN_PLACE' => $i_leader_born_place,
        'LEADER_BORN_DATE' => $i_leader_born_date,
        'LEADER_ADDRESS' => $i_leader_address,
        'LEADER_GENDER' => $i_leader_gender,
        'LEADER_YEAR' => $i_leader_grade,
        'LEADER_EMAIL' => $i_leader_email,
        'LEADER_PHONE' => $i_leader_phone,
        'LEADER_HANDPHONE' => $i_leader_handphone,
        'LEADER_ALLERGY' => $i_leader_allergy,
        'LEADER_PHOTO' => $i_leader_photo,
        'MEMBER_NAME' => $i_member_name,
        'MEMBER_BORN_PLACE' => $i_member_born_place,
        'MEMBER_BORN_DATE' => $i_member_born_date,
        'MEMBER_ADDRESS' => $i_member_address,
        'MEMBER_GENDER' => $i_member_gender,
        'MEMBER_YEAR' => $i_member_grade,
        'MEMBER_EMAIL' => $i_member_email,
        'MEMBER_PHONE' => $i_member_phone,
        'MEMBER_HANDPHONE' => $i_member_handphone,
        'MEMBER_ALLERGY' => $i_member_allergy,
        'MEMBER_PHOTO' => $i_member_photo,
        'ESSAY_THEME_ID' => $i_essai_theme_id,
        'ESSAY_TITLE' => $i_essai_title,
        'ESSAY_FILE' => '',
        'ESSAY_STATEMENT_LETTER' => $i_essai_statement_letter,
        'CREATED_AT' => date("Y-m-d H:i:s"),
      );
      
      $id = $this->Lomba_model->insert_lomba($data);
      $this->copy_essay_file($id);
      $this->sent_email_user($id, 1);
      $this->sent_email_user($id, 2);
      $this->sent_email_admin($id);
      redirect(base_url().'lomba/tax-competition-2018?did=1'); 
      
    }

    public function copy_essay_file($id) {
      $session = $this->session->userdata('file_essay');
      // $session = 'code';
      $data_tmp = $this->Lomba_model->get_data_tmp($session);
      
      foreach($data_tmp as $key => $row){
        $data = array(
          'TAX_COMPETITION_ID' => $id,
          'FILENAME' => $row->FILENAME,
          'CREATED' => date("Y-m-d H:i:s"),
        );
        $this->Lomba_model->insert_essay_file($data);
        $path_tmp = "uploads/tax_competition/temp/";
        $path = "uploads/tax_competition/file_essay/";
        copy($path_tmp.$row->FILENAME, $path.$row->FILENAME);
        if($row->FILENAME !="")
        {            
            $file = "uploads/tax_competition/temp/".$row->FILENAME;
            if (file_exists($file)) {
              unlink($file);
            }
        }
      }
      $this->Lomba_model->delete_tmp($session);
    }

    public function sent_email_user($id, $type) {
      $data = $this->Lomba_model->get_data($id);
      $content = $this->load->view('email/lomba/user', $array = array('data' => $data, 'type' => $type), true);
      // $this->load->view('layouts/header', $array = array('meta' => $meta));
      

      $this->load->library('email');
      $this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'news@ddtc.co.id',
          'smtp_pass' => 'internasional2',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'crlf' => "\r\n",
          'newline' => "\r\n"
      ));
      $email_to = ($type==1) ? $data[0]['LEADER_EMAIL'] : $data[0]['MEMBER_EMAIL'];
      $this->email->from("adminweb@ddtc.co.id", 'DDTC News');
      $this->email->to($email_to);

      $title = "DDTC News Tax Competition 2018";
      $this->email->subject($title);
      $this->email->message($content);
      $this->email->send();
    }

    public function sent_email_admin($id) {
      $data = $this->Lomba_model->get_data($id);
      $content = $this->load->view('email/lomba/admin', $array = array('data' => $data), true);
      // $this->load->view('layouts/header', $array = array('meta' => $meta));

      $this->load->library('email');
      $this->email->initialize(array(
          'protocol' => 'smtp',
          'smtp_host' => 'ssl://smtp.googlemail.com',
          'smtp_user' => 'news@ddtc.co.id',
          'smtp_pass' => 'internasional2',
          'smtp_port' => 465,
          'mailtype' => 'html',
          'crlf' => "\r\n",
          'newline' => "\r\n"
      ));
      $this->email->attach($_SERVER["DOCUMENT_ROOT"].'/uploads/tax_competition/leader_profile/'.$data[0]['LEADER_PHOTO']);
      $this->email->attach($_SERVER["DOCUMENT_ROOT"].'/uploads/tax_competition/member_profile/'.$data[0]['MEMBER_PHOTO']);
      $this->email->attach($_SERVER["DOCUMENT_ROOT"].'/uploads/tax_competition/file_essay/'.$data[0]['ESSAY_FILE']);
      $this->email->attach($_SERVER["DOCUMENT_ROOT"].'/uploads/tax_competition/statement_letter/'.$data[0]['ESSAY_STATEMENT_LETTER']);
      $this->email->from("adminweb@ddtc.co.id", 'DDTC News');
      $this->email->to('adminweb@ddtc.co.id, news@ddtc.co.id, rama@ddtc.co.id');
      // $this->email->to('candradwiprasetyo@gmail.com, candra.dwi@bukalapak.com, selubungers@gmail.com');

      $title = "DDTC News Tax Competition 2018";
      $this->email->subject($title);
      $this->email->message($content);
      $this->email->send();
    }

    public function upload_file() {
      $output_dir = "uploads/tax_competition/temp/";
      if(isset($_FILES["myfile"]))
      {
        $ret = array();
        
      //  This is for custom errors;  
      /*  $custom_error= array();
        $custom_error['jquery-upload-file-error']="File already exists";
        echo json_encode($custom_error);
        die();
      */
        $error =$_FILES["myfile"]["error"];
        //You need to handle  both cases
        //If Any browser does not support serializing of multiple files using FormData() 

        // $file_essay = 'code'; 
        $file_essay = $this->session->userdata('file_essay'); 

        if(!is_array($_FILES["myfile"]["name"])) //single file
        {
          $fileName = $file_essay.'_'.$_FILES["myfile"]["name"];
          move_uploaded_file($_FILES["myfile"]["tmp_name"],$output_dir.$fileName);
            $ret[]= $fileName;
          $data = array(
            'FILENAME' => $fileName,
            'SESSION' => $file_essay,
            'CREATED' => date("Y-m-d H:i:s"),
          );
          $this->Lomba_model->insert_essay_file_tmp($data);
        }
        else  //Multiple files, file[]
        {


          $fileCount = count($_FILES["myfile"]["name"]);
          for($i=0; $i < $fileCount; $i++)
          {
            $fileName = $file_essay.'_'.$_FILES["myfile"]["name"][$i];
          move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$output_dir.$fileName);
            $ret[]= $fileName;
            $data = array(
              'FILENAME' => $fileName,
              'SESSION' => $file_essay,
              'CREATED' => date("Y-m-d H:i:s"),
            );
            $this->Lomba_model->insert_essay_file_tmp($data);
          }
        
        }
          // echo json_encode($ret);
       }

    }
}
