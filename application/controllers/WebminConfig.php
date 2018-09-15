<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WebminConfig extends MY_Controller {

	public function index()
	{   
        $data = $this->M_Config->getdata();
		$this->view('webmin/config/index', ['data' => $data]);
	}

	public function store()
	{
		
		$label = $this->input->post('label');
		
		foreach ($label as $key => $value) {
			$data = array(
	            "CVALUE"  	=> $value
	        );

	        $resut = $this->M_Config->update($key, $data);	        
		}
		redirect('webmin/config');
	}
}