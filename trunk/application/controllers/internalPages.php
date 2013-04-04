<?php

class InternalPages extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		
		$vars = array(
			'title' => 'WebStrings',
			'dir' => 'internalPages'
		);
		
		$this->load->vars($vars);
	}
	
	public function index() {
		
	}
	
	public function new_user_registration() {
		$this->load->model(array('User_model', 'String_model'));
		
		if($this->input->post('create_user') != FALSE){
			
			$genderCheck = $this->input->post('gender');
			if($genderCheck == "male") $gender = 1;
			else $gender = 0;
			
			$dataSet = array(
				'email' => $this->input->post('email'),
				'date_created' => strftime("%Y-%m-%d %H:%M:%S", time()),
				'f_name' => $this->input->post('f_name'),
				'l_name' => $this->input->post('l_name'),
				'gender' => $gender,
				'birthday' => $this->input->post('bday')
			);
			
			$this->User_model->create($dataSet, $this->input->post('password'));
			//redirect('browser');
			
			echo '<script type="text/javascript">';
			echo '$(function(){ alert("blah"); window.location = "'.site_url('browser').'"; });';
			echo '</script>';
		}
		
		
		$data['view_file'] = 'user_registration_view';
		$this->load->view('std_template', $data);
	}
	
	
}

?>