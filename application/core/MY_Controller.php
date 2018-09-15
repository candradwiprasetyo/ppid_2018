<?php 

class MY_Controller extends CI_Controller {
    public $ddtc;

    function __construct()
	{
		parent::__construct();
		$ddtc = get_cookie('ddtc');
		if(! isset($ddtc)){
			redirect('webmin/login');
		}

		set_cookie('ddtc', $ddtc , 7200);
		$this->ddtc = unserialize(base64_decode($ddtc));
	}

	public function view($content = null, $data = []){
		$menu = "";
		$this->load->view('template/administrator/header');
		$this->load->view('template/administrator/header_nav', ['ddtc' => $this->ddtc]);
		$this->load->view('template/administrator/left_side',['menu' => $menu, 'ddtc' => $this->ddtc]);
		$this->load->view('template/administrator/content', ['content' => $content, 'data' => $data]);	
		$this->load->view('template/administrator/footer');
	}	
}