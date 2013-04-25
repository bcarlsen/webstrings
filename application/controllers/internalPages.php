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
	
	public function getting_started(){
		$data['view_file'] = 'getting_started';
		$this->load->view('internalPages/template', $data);
	}
	
	public function new_user_registration() {
		$this->load->model(array('User_model', 'String_model'));
		$this->load->library('form_validation');
		$this->load->helper('login');
		
		if($this->input->post('submit') != FALSE){
			
			$this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha_dash|xss_clean|ucfirst');
			$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha_dash|xss_clean|ucfirst');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[password_conf]');
			$this->form_validation->set_rules('password_conf', 'Confirm Password', 'trim|required');
			
			if($this->form_validation->run() != FALSE){
				
				$dataSet = array(
					'f_name' => $this->input->post('fname'),
					'l_name' => $this->input->post('lname'),
					'email' => $this->input->post('email'),
					'date_created' => strftime("%Y-%m-%d %H:%M:%S", time())
				);
				
				$uid = $this->User_model->create($dataSet, $this->input->post('password'));
				
				log_in($uid);
				
				echo '<script type="text/javascript">';
				echo 'top.location.href="'.site_url('browser').'";';
				echo '</script>';
			}
			else {
				$data['view_file'] = 'sign_up_view';
				$this->load->view('internalPages/template', $data);
			}
		} else {
			$data['view_file'] = 'sign_up_view';
			$this->load->view('internalPages/template', $data);
		}
	}
	
	
}

?>