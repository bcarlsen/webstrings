<?php

class MY_Email extends CI_Email {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function ws_send_email($to, $subject, $body){
		
		$config['mailtype'] = 'html';
		
		$this->initialize($config);
			
		$this->from('webmaster@web-strings.com', 'WebStrings');
		$this->to($to);
		
		$this->subject($subject);
		$this->message($body);
		
		if($this->send()){
			// success
			return TRUE;
		} else {
			// failure
			return FALSE;
		}
	}
	
	public function send_anony_url($to, $share_URL, $sender_id, $string_id) {
		$CI =& get_instance(); 
		$CI->load->model(array('String_model', 'User_model'));
		$CI->load->helper('url');
		
		$data['sender'] = $CI->User_model->get_user_by_id($sender_id);
		$data['string'] = $CI->String_model->get_string_by_id($string_id);
		$data['share_url'] = $share_URL;
		
		$subject = "String View Invite";
		$data['view_file'] = 'anony_url';
		$body = $CI->load->view('email/template', $data, TRUE);
		
		if($this->ws_send_email($to, $subject, $body)){
			//echo "it worked!";
		} else {
			//echo "it failed!";
		}
	}
	
	public function send_contributor_invite($receiver_id, $nid, $sender_id, $string_id) {
		$CI =& get_instance(); 
		$CI->load->model(array('String_model', 'User_model'));
		$CI->load->helper('url');
		
		$receiver = $CI->User_model->get_user_by_id($receiver_id);
		$data['sender'] = $CI->User_model->get_user_by_id($sender_id);
		$data['string'] = $CI->String_model->get_string_by_id($string_id);
		$data['nid'] = $nid;
		
		$subject = "String Contributor Invite";
		$data['view_file'] = 'contributor_invite';
		$body = $CI->load->view('email/template', $data, TRUE);
		
		if($this->ws_send_email($receiver->email, $subject, $body)){
			//echo "it worked!";
		} else {
			//echo "it failed!";
		}
	}
	
	public function send_member_invite($receiver_email, $nid, $sender_id, $string_id) {
		$CI =& get_instance(); 
		$CI->load->model(array('String_model', 'User_model'));
		$CI->load->helper('url');
		
		//$receiver = $CI->User_model->get_user_by_id($temp_receiver_id);
		$data['sender'] = $CI->User_model->get_user_by_id($sender_id);
		$data['string'] = $CI->String_model->get_string_by_id($string_id);
		$data['nid'] = $nid;
		
		$subject = "WebStrings: Collabrative Research - ". $data['sender']->f_name . ' '. $data['sender']->l_name. " has invited you to contribute";
		$data['view_file'] = 'member_invite';
		$body = $CI->load->view('email/template', $data, TRUE);
		
		if($this->ws_send_email($receiver_email, $subject, $body)){
			//echo "it worked!";
		} else {
			//echo "it failed!";
		}
	}
}
