<?php

class Bookmarklet extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array('url','login'));
		
		$vars = array(
			'title' => 'String It!',
			'dir' => 'bookmarklet'
		);
		
		$this->load->vars($vars);
	}
	
	
	function index() {
		$this->load->model(array('User_model', 'String_model'));
		
		$user = $this->User_model->current_user();
		
		if($this->input->post('submit') != FALSE) {
			
			$string_id = $this->input->post('string_id');
			$user_id = $user->id;
			$url = $this->_get_string_url(uri_string());
			$title = $this->input->post('title');
			
			$this->String_model->add_page_to_string($string_id, $user_id, $url, $title);
			
			echo '<script type="text/javascript">';
			echo 'window.close();';
			echo '</script>';
			
		} else {
			$url = $this->_get_string_url(uri_string()); 
			$data['url'] = $url;
			
			if(!is_logged_in()) {
				redirect('bookmarklet/login/?url='.$url);
			}
			
			$data['strings'] = $this->String_model->get_editable_strings_for_user_id($user->id);
		
			$data['view_file'] = 'add_page_view';
			$this->load->view('std_template', $data);
		}
	}
	
	function login() {
		
		$url = $this->_get_string_url(uri_string());
		$data['url'] = $url;
		
		if($this->input->post('submit') != FALSE){
			$this->load->model('User_model');
				
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if($this->User_model->authenticate_credentials($email, md5($password))) 
				$user = $this->User_model->get_user_by_email($email);
				log_in($user->id);
			
			redirect('bookmarklet/index/?url='.$url);
		}
		
		$data['view_file'] = 'login_view';
		$this->load->view('std_template', $data);
	}
	
	function _get_string_url($uri) {
			$url_param = substr($uri, strpos($uri, '?url='));
			return substr($url_param, strlen('?url='));
	}	
}

?>