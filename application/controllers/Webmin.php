<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webmin extends MY_Controller {

	public function index()
	{        
		$this->view('administrator/index.php');
	}
}