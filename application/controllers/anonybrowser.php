<?php

class AnonyBrowser extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		
		$vars = array(
			'title' => 'WebStrings',
			'dir' => 'anonybrowser',
			'extraJS' => '<script src="'.base_url().'public_html/js/browser.js"></script>'.
						 '<script src="'.base_url().'public_html/js/wsModal.js"></script>'.
						 '<script src="'.base_url().'public_html/js/forms.js"></script>'
		);
		
		$this->load->vars($vars);
	}
	
	function viewer($id) {
		$this->load->model(array('User_model', 'String_model', 'Notifications_model'));
		
		$code = $id;
		
		if($code){
			$string = $this->String_model->get_anon_string_by_code($code);
			$data['string_info'] = $string;
			$data['pages'] = $this->String_model->get_pages_for_anon_string($string->id);
		} else {
			
		}
		
		$data['view_file'] = 'anonybrowser';
		$this->load->view('std_template', $data);
	}
	
}