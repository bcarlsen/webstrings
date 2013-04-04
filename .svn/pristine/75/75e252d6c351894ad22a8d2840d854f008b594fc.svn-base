<?php

class Dev extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array('url', 'login'));
		
		$vars = array(
			'title' => 'WebStrings - Dev Hub',
			'dir' => 'dev',
			'extraJS' => '<script src="'.base_url().'public_html/js/browser.js"></script>'.
						 '<script src="'.base_url().'public_html/js/wsModal.js"></script>'.
						 '<script src="'.base_url().'public_html/js/forms.js"></script>',
			'extraCSS' => '<link href="'.base_url().'public_html/css/dev.css" type="text/css" rel="stylesheet"/>'
		);
		
		$this->load->vars($vars);
	}
	
	function index() {
		if(!is_logged_in()){
			redirect('dev/login');
		}
		$data['view_file'] = 'table_of_contents';
		$this->load->view('std_template', $data);
	}
	
	function login() {
		
	}
	
	function styles() {
		if(!is_logged_in()){
			redirect('dev/login');
		}
		$data['view_file'] = 'style_guide';
		$this->load->view('std_template', $data);
	}
}