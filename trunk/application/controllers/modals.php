<?php

class Modals extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array('url', 'login'));
	}
	
	public function log_in() {
		$this->load->helper('form');
		
		if($this->input->post('submit') != FALSE){
			$this->load->model('User_model');
				
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if($this->User_model->authenticate_credentials($email, md5($password))){
				log_in($email);
			}
			
			$params = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
			
			redirect('browser'.$params);
			
		} else {
			$data['params'] = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
			
			$data['modal_title'] = 'Login';
			$data['modal_content_file'] = 'log_in_view';
			
			$this->load->view('modals/template', $data);
		}
	}
	
	public function log_out($url) {
		log_out();
		redirect($url);
	}
	
	public function settings() {
		$this->load->helper('form');
		
		$data['modal_title'] = 'Settings';
		$data['modal_content_file'] = 'settings_view';
		
		$this->load->view('modals/template', $data);
	}
	
	public function change_password(){
		$this->load->model('User_model');
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('pw', 'Password', 'required|matches[pw_conf]');
		$this->form_validation->set_rules('pw_conf', 'Password confirmation', 'required|matches[pw]');
		
		if($this->form_validation->run() == FALSE){
			$this->load->helper('form');
		
			$data['modal_title'] = 'Settings';
			$data['modal_content_file'] = 'settings_view';
			
			$this->load->view('modals/template', $data);
		} else {
			$this->User_model->change_password($this->User_model->current_user()->id, md5($this->input->post('pw')));
			
			$this->load->view('modals/settings_success');
		}
	}
	
	public function contributors($string_id) {
		$this->load->model('String_model');
		$this->load->helper('form');
			
		$contributors = $this->String_model->get_contributors_for_string($string_id);
		$data['contributors'] = $contributors;
		
		$data['string_id'] = $string_id;
		
		$data['modal_title'] = 'String Contributors';
		$data['modal_content_file'] = 'contributors_modal_view';
		
		$this->load->view('modals/template', $data);
	}
	
	public function contributor_search($string_id) {
		$this->load->model('String_model');
		$term = $this->input->get('term');
		
		$results = $this->String_model->contributor_search($string_id, $term);
		
		$formatted_results = array();
		
		foreach($results as $user){
			$userArray['label'] = $user->f_name.' '.$user->l_name;
			$userArray['value'] = $user->id;
			$formatted_results[] = $userArray;
		}
		
		echo json_encode($formatted_results);
	}
	
	public function contributor_invite($string_id) {
		$this->load->model(array('User_model', 'String_model', 'Notifications_model'));
		
		if($this->input->post('submit') != FALSE){
			
			$contributor_id = $this->input->post('contributor_id');
				
			$this->String_model->invite_contributor_to_string($contributor_id, $string_id);
			
			$contributors = $this->String_model->get_contributors_for_string($string_id);
			$data['contributors'] = $contributors;
			$data['string_id'] = $string_id;
			
			// send notification
			$nid = $this->Notifications_model->user_invited_to_string($string_id, $contributor_id, $this->User_model->current_user()->id);
			
			// send email
			$this->load->library('email');
			$this->email->send_contributor_invite($contributor_id, $nid, $this->User_model->current_user()->id, $string_id);
			
			$this->load->view('modals/contributors_content_view', $data);
			
		} else {
			redirect('browser');
		}
	}
	
	public function contributor_add($string_id) {
		$this->load->model(array('User_model', 'String_model', 'Notifications_model'));
		
		if($this->input->post('submit') != FALSE){
			
			$contributor_id = $this->input->post('contributor_id');
				
			$this->String_model->add_contributor_to_string($contributor_id, $string_id);
			
			$contributors = $this->String_model->get_contributors_for_string($string_id);
			$data['contributors'] = $contributors;
			$data['string_id'] = $string_id;
			
			$this->Notifications_model->user_invited_to_string($string_id, $contributor_id, $this->User_model->current_user()->id);
			
			$this->load->view('modals/contributors_content_view', $data);
			
		} else {
			redirect('browser');
		}
	}
	
	public function contributor_remove($string_id, $user_id) {
		$this->load->model('String_model');
		
		
		
		return $this->String_model->remove_contributor($string_id, $user_id);
	}
	
	public function new_string() {
		$this->load->helper('form');
		
		if(!is_logged_in()) redirect('modals/log_in');
		
		if($this->input->post('submit') != FALSE){
			$this->load->model(array('String_model', 'User_model'));
				
			$cur_user = $this->User_model->current_user();
				
			$dataset = array(
				'creator_id' => $cur_user->id,
				'date_created' => strftime("%Y-%m-%d %H:%M:%S", time()),
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description')
			);
				
			$this->String_model->create_string($dataset);
				
			$this->load->view('modals/new_string_success');
			
		} else {
			$data['modal_title'] = 'New String';
			$data['modal_content_file'] = 'new_string_view';
			
			$this->load->view('modals/template', $data);
		}
	}
	
	public function delete_string($string_id) {
		$this->load->helper('form');
		
		if(!is_logged_in()) redirect('modals/log_in');
		
		if($this->input->post('submit') != FALSE){
			$this->load->model('String_model');
				
			$this->String_model->delete_string($this->input->post('string_id'));
				
			$this->load->view('modals/delete_string_success');
			
		} else {
			$data['string_id'] = $string_id;
			
			$data['modal_title'] = 'Delete String';
			$data['modal_content_file'] = 'delete_string_view';
			
			$this->load->view('modals/template', $data);
		}
	}
	
	public function add_page($string_id) {
		$this->load->helper('form');
		
		if(!is_logged_in()) redirect('modals/log_in');
		
		if($this->input->post('submit') != FALSE){
			$this->load->model(array('String_model', 'User_model', 'Notifications_model'));
				
			$cur_user = $this->User_model->current_user();
			
			$user_id = $cur_user->id;
			$url = $this->input->post('url');
			$title = $this->input->post('title');
				
			$this->String_model->add_page_to_string($string_id, $user_id, $url, $title);
				
			$data['string_id'] = $string_id;
				
			$this->load->view('modals/add_page_success', $data);
			
			// send notification for new page
			
			$this->Notifications_model->new_page_in_string($cur_user->id, $string_id);
			
		} else {
			$data['string_id'] = $string_id;
			
			$data['modal_title'] = 'Add Page';
			$data['modal_content_file'] = 'add_page_view';
			
			$this->load->view('modals/template', $data);
		}
	}

	public function share($string_id) {
		$this->load->library('form_validation');
		$this->load->helper('form');
		
		if($this->input->post('submit') != FALSE){
			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			
			if($this->form_validation->run() != FALSE){
				$this->load->model(array('String_model', 'User_model'));
				$this->load->library('email');
				
				$email = $this->input->post('email');
				$share_URL = $this->String_model->get_share_url_for_string($string_id);
				$this->email->send_anony_url($email, $share_URL, $this->User_model->current_user()->id, $string_id);
				
				$data['message'] = 'Success! Email sent to '.$email;
			}
		}
		
		$data['string_id'] = $string_id;
		
		$data['modal_title'] = 'Share';
		$data['modal_content_file'] = 'share_view';
		
		$this->load->view('modals/template', $data);
	}
}
