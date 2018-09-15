<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login()
	{
		$ddtc = get_cookie('ddtc');
		if(isset($ddtc)){
			redirect('webmin');
		}
		
		$this->load->view('auth/login');
	}	

	public function logout()
	{
		delete_cookie("ddtc");
		redirect('webmin');
	}

	public function ceklogin()
	{		
		$userId = $this->input->post('email');
		$password = $this->input->post('password'); 
		$query = $this->db->query("SELECT * FROM tbl_user where email = '".$userId."' AND PASSWD='".$password."'");

		if ($query->num_rows() > 0 AND (isset($password) AND $password != "") AND (isset($userId) AND $userId != "") )
		{
			$result = (array) $query->row();
			$this->session->set_userdata('ddtc', base64_encode(serialize($result)));
			set_cookie('ddtc', base64_encode(serialize($result)) , 7200);
			redirect('webmin');
		}

		$messge = array('message' => 'Wrong email or password','class' => 'alert alert-danger fade in');
		$this->session->set_flashdata('item',$messge );
		$this->session->keep_flashdata('item',$messge);
		redirect('webmin','refresh');
	}
}