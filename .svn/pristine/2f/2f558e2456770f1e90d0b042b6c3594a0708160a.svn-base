<?php

class Test extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->helper('url');
		
		$vars = array(
			'dir' => 'test'
		);
		
		$this->load->vars($vars);
	}
	
	public function index(){
		$data['title'] = 'Test Contents';
		
		$data['view_file'] = 'table_of_contents';
		
		$this->load->view('std_template', $data);
	}
	
	public function modals_test(){
		
		$data['title'] = 'Modals Test';
			
		$data['extraJS'] = '<script src="'.base_url().'/public_html/js/wsModal.js"></script>';
		
		$data['view_file'] = 'modals_test_view';
		$this->load->view('std_template', $data);
		
	}
	
	public function user_and_login_test(){
		$this->load->library('session');
		$this->load->model('User_model');
		$this->load->helper('login');
		
		$data['users'] = $this->User_model->get_all_users();
		
		if($this->input->post('create_user') != FALSE){
			$this->create_user();
		}
		
		// test login feature
		
		if($this->input->post('login') != FALSE){
			if($this->User_model->authenticate_credentials($this->input->post('email'), md5($this->input->post('password')))){
				$email = $this->input->post('email');
				$user = $this->User_model->get_user_by_email($email);
				
				log_in($user->id);
				
				$data['cur_user'] = $this->session->userdata('id');
			}
		}
		
		if($this->input->post('logout') != FALSE){
			log_out();
		}
		
		if(is_logged_in()){
			$data['logged_in'] = true;
			$data['cur_user'] = $this->User_model->current_user();
		}
		
		$data['title'] = 'User and Login Test';
		
		$data['view_file'] = 'user_and_login_test_view';
		$this->load->view('std_template', $data);
	}
	
	private function create_user(){
		
		$genderCheck = $this->input->post('gender');
		if($genderCheck == "male") $gender = 1;
		else $gender = 0;
		
		$dataSet = array(
			'date_created' => strftime("%Y-%m-%d %H:%M:%S", time()),
			'f_name' => $this->input->post('f_name'),
			'l_name' => $this->input->post('l_name'),
			'gender' => $gender,
			'birthday' => $this->input->post('bday'),
			'email' => $this->input->post('email')
		);
		
		$this->User_model->create($dataSet, $this->input->post('password'));
		redirect('test/user_and_login_test');
	}
	
	public function delete_user($user_id) {
		$this->load->model('User_model');
		$this->User_model->delete_user($user_id);
		redirect('test/user_and_login_test');
	}
	
	public function browser_test(){
		$this->load->helper('login');
		
		if(is_logged_in()) $data['logged_in'] = true;
		
		$data['title'] = 'Browsing Test';
		
		$data['view_file'] = 'browser_test_view';
		$this->load->view('std_template', $data);
	}
	
	public function autocomplete_test() {
		
		$data['title'] = 'Autocomplete Test';
		
		//$data['extraCSS'] = '<link href="'.base_url().'public_html/css/jqueryUI/jquery-ui-1.8.23.custom.css" type="text/css" rel="stylesheet"/>';
		$data['extraJS'] = '<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js"></script>';
		
		$data['view_file'] = 'autocomplete_view';
		$this->load->view('std_template', $data);
	}

	public function search() {
		$this->load->model('User_model');
		
		$term = $this->input->get('term');
		
		$users = $this->User_model->search_users($term);
		
		$array = array();
		
		foreach($users as $user) {
			$userArray['label'] = $user->f_name.' '.$user->l_name;
			$userArray['value'] = $user->id;
			$array[] = $userArray;
		}
		
		echo json_encode($array);
	}
	
	public function styles_test() {
		$this->load->helper('form');
		
		$data['extraJS'] = '<script src="'.base_url().'/public_html/js/wsModal.js"></script>'.
						   '<script src="'.base_url().'/public_html/js/forms.js"></script>'.
						   '<script src="'.base_url().'public_html/js/browser.js"></script>';
		
		$data['title'] = 'Styles Test';
		
		$data['view_file'] = 'styles_test_view';
		$this->load->view('std_template', $data);
	}
	
	public function bookmarklet_test() {
		
		$data['title'] = 'Bookmarklet Test';
		
		$data['view_file'] = 'bookmarklet_test_view';
		$this->load->view('std_template', $data);
	}
	
	public function bookmarklet($url) {
		
		$requestUri = urldecode($_SERVER['REQUEST_URI']);
        $current_page_url = substr($requestUri, strlen(site_url()) + 2);
		
		$data['url'] = $current_page_url;
		
		$data['title'] = 'String It!';
		
		$data['view_file'] = 'bookmarklet_view';
		$this->load->view('std_template', $data);
	}
	
	
	public function calendar_test(){
		$this->load->library('calendar');
			
		$data['title'] = 'Calendar Test';
		
		$data['cal'] = $this->calendar->generate();
		
		$data['view_file'] = 'calendar_test_view';
		$this->load->view('std_template', $data);
	}

	public function email_test(){
		/*$this->load->library('email');
			
		$config['mailtype'] = 'html';
		$this->email->initialize($config);
			
		$this->email->from('dev@localhost', 'WebStrings');
		$this->email->to('david.w.rockwood@gmail.com');
		
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
		
		if($this->email->send()){
			echo "success";
			$data['result'] = $this->email->print_debugger();
		} else {
			echo "failed";
			$data['result'] = $this->email->print_debugger();
		}*/
		
		if(mail('david.w.rockwood@gmail.com', 'Test Email', 'This is a test of the email function.')){
			$data['result'] = 'success';
		} else {
			$data['result'] = 'failure';
		}
		
		$data['title'] = 'Email Test';
		$data['view_file'] = 'email_test_view';
		$this->load->view('std_template', $data);
	}

	public function internal_test($filename = NULL) {
		$this->load->helper('file');
		
		$data['files'] = get_filenames('./application/views/internalPages');
		
		if($filename)
			$data['vfile'] = $filename;
		
		$data['title'] = 'Internal Pages Test';
		
		$this->load->view('test/internal_test_view', $data);
	}
}
