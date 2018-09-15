<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Quiz extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Quiz_model');
        $this->load->library('library');
        $this->load->helper('url');
    }

    public function detail($slug=false)
    {   
        $meta['title'] = '';
        $meta['image'] = '';
        $meta['description'] = '';
        $meta['keyword'] = '';
        
        $exploded = explode('-', $slug);
        $id = end($exploded);
        $data['url'] = $slug;
        
        $data['title'] = "Kuis Pajak Mahasiswa";

        $quiz = $this->Quiz_model->get_data('', '1', $id);

        if (count($quiz) > 0){

          $meta['title'] = $data['title'];
          $meta['image'] = base_url().'assets/images/banners/'.$quiz[0]->IMAGE;
          $meta['description'] =  $data['title'];

        }

        $this->load->view('layouts/header', $array = array('meta' => $meta));

        if (count($quiz) > 0){
          $this->load->view('layouts/quiz_detail', $array = array(
              'data' => $data,
              'quiz' => $quiz
          ));
         
        } else {
          $this->load->view('layouts/error_page');
        }
        $this->load->view('layouts/footer');
    }

    public function sent() {
      $id = $_POST['i_row_id'];
      $url = $_POST['i_url'];
      $option = $_POST['i_option'];
      $name = $_POST['i_name'];
      $email = $_POST['i_email'];
      $phone = $_POST['i_phone'];
      $twitter = $_POST['i_twitter'];
      $facebook = $_POST['i_facebook'];
      $instagram = $_POST['i_instagram'];
      $university = $_POST['i_university'];

      $check_data = $this->Quiz_model->check_data($id, $email);
      $check_data = 0;
      $check_participant = $this->Quiz_model->check_participant($email);

      if ($check_data > 0){
        redirect(base_url().'quiz/'.$url.'?err=1');
      } else {
        $data = array(
          'EMAIL' => $email,
          'QUIZ_ID' => $id,
          'ANSWER' => $option,
          'SYS_TIMESTAMP' => date('Y-m-d H:i:s'),
          'STATUS' => '1'
        );

        

        if ($check_participant > 0) {
          //update
          $data_participant = array(
            'NAME' => $name,
            'PHONE' => $phone,
            'TWITTER' => $twitter,
            'FACEBOOK' => $facebook,
            'INSTAGRAM' => $instagram,
            'UNIVERSITY' => $university,
          );
          $this->Quiz_model->update_participant($email, $data_participant);
        } else {
          $data_participant = array(
            'EMAIL' => $email,
            'NAME' => $name,
            'PHONE' => $phone,
            'TWITTER' => $twitter,
            'FACEBOOK' => $facebook,
            'INSTAGRAM' => $instagram,
            'UNIVERSITY' => $university,
          );
          $this->Quiz_model->insert_participant($data_participant);
        }

        $this->Quiz_model->insert_answer($data);
        redirect(base_url().'quiz/'.$url.'?did=1');
      }
    }
}
