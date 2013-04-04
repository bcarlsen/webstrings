<?php

class Browser extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
		$this->load->helper(array('url', 'login'));
		
		$vars = array(
			'title' => 'WebStrings',
			'dir' => 'browser',
			'extraJS' => '<script src="'.base_url().'public_html/js/browser.js"></script>'.
						 '<script src="'.base_url().'public_html/js/wsModal.js"></script>'.
						 '<script src="'.base_url().'public_html/js/forms.js"></script>'
		);
		
		$this->load->vars($vars);
	}
	
	function index() {		
		if(is_logged_in()) {
			$this->logged_in_browser();
		} else {
			$this->not_logged_in_browser();
		}
	}
	
	function not_logged_in_browser(){
		
		$data['params'] = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
		
		$data['view_file'] = 'not_logged_in/frame';
		$data['browser_ribbon_file'] = 'strings_ribbon';
		$data['browser_view_file'] = 'string_list_view';
		$this->load->view('std_template', $data);
	}
	
	function log_in(){
		
		if($this->input->post('submit') != FALSE){
			$this->load->model('User_model');
				
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
			if($this->User_model->authenticate_credentials($email, md5($password))){
				$user = $this->User_model->get_user_by_email($email);
				log_in($user->id);
			}
			
			//$params = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
			
			redirect('browser');//.$params);
			
		} else {
			//$data['params'] = $_SERVER['QUERY_STRING'] ? '?'.$_SERVER['QUERY_STRING'] : '';
			
		}
	}
	
	function logged_in_browser(){
		$this->load->model(array('User_model', 'String_model', 'Notifications_model'));
		
		$cur_user = $this->User_model->current_user();
		$data['user'] = $cur_user;
		$data['strings'] = $this->String_model->get_my_strings_for_user_id($cur_user->id);
		$data['notes'] = $this->Notifications_model->get_notes_for_user($cur_user->id);
		$data['unread_notes'] = $this->Notifications_model->get_num_unread_notes_for_user($cur_user->id);
		
		$data['view_file'] = 'frame';
		$data['browser_ribbon_file'] = 'strings_ribbon';
		$data['browser_view_file'] = 'string_list_view';
		$this->load->view('std_template', $data);
	}
	
	function my_strings() {
		if(!is_logged_in())
			redirect('browser');
			
		$this->load->model(array('User_model', 'String_model'));
		
		$cur_user = $this->User_model->current_user();
		$data['user'] = $cur_user;
		$data['strings'] = $this->String_model->get_my_strings_for_user_id($cur_user->id);
		$data['my_strings'] = true;
		
		$this->load->view('browser/string_list_view', $data);
	}

	function shared_strings() {
		if(!is_logged_in())
			redirect('browser');
		
		$this->load->model(array('User_model', 'String_model'));
		
		$cur_user = $this->User_model->current_user();
		$data['user'] = $cur_user;
		$data['strings'] = $this->String_model->get_shared_strings_for_user_id($cur_user->id);
		$data['shared_strings'] = true;
		
		$this->load->view('browser/string_list_view', $data);
	}

	function pages_for($sid) {
		if(!is_logged_in())
			redirect('browser');
		
		$this->load->model(array('String_model', 'User_model'));
		
		$cur_user = $this->User_model->current_user();
		
		$data['pages'] = $this->String_model->get_pages_for_string($sid, $cur_user->id);
		$data['string_id'] = $sid;
		
		$this->load->view('browser/string_pages_view', $data);
	}

	function comments_for_page($pid) {
		if(!is_logged_in())
			redirect('browser');
		
		$this->load->model(array('String_model', 'User_model'));
		
		$data['comments'] = $this->String_model->get_comments_for_page($pid);
		$data['cur_user'] = $this->User_model->current_user();
        $data['pid'] = $pid;
		
		$this->load->view('browser/page_comments_view', $data);
	}

	function delete_page($pid) {
		if(!is_logged_in())
			redirect('browser');
		
		$this->load->model('String_model');
		
		$this->String_model->delete_page($pid);
		
		return;
	}
	
	function mark_page_read($pid) {
		if(!is_logged_in())
			redirect('browser');
		
		$this->load->model(array('String_model', 'User_model'));
		
		$this->String_model->mark_page_read($pid, $this->User_model->current_user()->id);
		
		return;
	}
	
	function mark_note_read($nid) {
		if(!is_logged_in())
			redirect('browser');
			
		$this->load->model(array('Notifications_model'));
		
		$this->Notifications_model->mark_note_read($nid);
		
		return;
	}
	
	function ribbon_picker($ribbon_type) {
		if(!is_logged_in())
			redirect('browser');
			
		switch ($ribbon_type) {
			case "view_strings":
				
				$this->load->view('browser/strings_ribbon');
				break;
			case "view_pages":
				$this->load->model(array('String_model', 'User_model'));
				
				$string_id = $this->input->post('string_id');
				$user = $this->User_model->current_user();
				$data['roles'] = $this->String_model->get_user_roles_for_string($user->id, $string_id);
				$data['string_id'] = $string_id;
				$this->load->view('browser/string_pages_ribbon', $data);
				break;
			default:
				echo "type not identified";
		}
		
	}

    function add_comment_for_page($pid) {
    	if(!is_logged_in())
			redirect('browser');
		
        $this->load->model(array('String_model', 'User_model', 'Notifications_model'));
		$this->load->library('pusher');
		
		$user = $this->User_model->current_user();
		
        $comment_body = $this->input->post('comment_body');
		
		// create comment in database
		$this->String_model->create_comment($pid, $user->id, $comment_body);
		
		if($user->fb) 
			$event_data['pic_url'] = $user->pic_url; 
		else 
			$event_data['pic_url'] =  base_url()."public_html/images/default_avatar.png";
		
		$event_data['comment_body'] = $comment_body;
		
		// send comment to string via pusher
		$this->pusher->trigger('private-comments-'.$pid, 'newComment', $event_data);
		
		$string = $this->String_model->get_string_by_page($pid);
		
		$contributors = $this->String_model->get_contributors_for_string($string->id, $user->id);
		
		// set notification
		$this->Notifications_model->new_comment_in_string($user->id, $string->id, $pid);
    }
	
	function accept_string_invite($nid) {
		if(!is_logged_in())
			redirect('browser');
			
		$this->load->model(array('Notifications_model', 'String_model'));
		
		$update_data = array(
			"response" => INVITE_ACCEPTED
		);
		$this->Notifications_model->update_note_data($nid, $update_data);
		
		$note = $this->Notifications_model->get_note_by_id($nid);
		$note->data = json_decode($note->data);
		
		$this->String_model->contributor_accepts_invite($note->data->receiver_id , $note->data->string_id);
		
		$this->Notifications_model->user_accepted_invite_to_string($nid);
		$this->Notifications_model->new_contributor_to_string($nid);
		
		$this->Notifications_model->remove_notification($nid);
		
		echo $this->Notifications_model->get_body_for_note($note);
	}
	
	function accept_string_invite_extern($nid, $sid) {
		if(!is_logged_in())
			redirect('browser');
		
		$this->load->model(array('Notifications_model', 'String_model'));
		
		$note = $this->Notifications_model->get_note_by_id($nid);
		
		if($note) {
			$update_data = array(
				"response" => INVITE_ACCEPTED
			);
			$this->Notifications_model->update_note_data($nid, $update_data);
			
			$note = $this->Notifications_model->get_note_by_id($nid);
			$note->data = json_decode($note->data);
			
			$this->String_model->contributor_accepts_invite($note->data->receiver_id , $note->data->string_id);
			
			$this->Notifications_model->user_accepted_invite_to_string($nid);
			$this->Notifications_model->new_contributor_to_string($nid);
			
			$this->Notifications_model->remove_notification($nid);
		}
		
		redirect('browser/?s='.$sid.'&t=1');
	}
	
	function reject_string_invite($nid) {
		if(!is_logged_in())
			redirect('browser');
		
		$this->load->model(array('Notifications_model', 'String_model'));
		
		$update_data = array(
			"response" => INVITE_REJECTED
		);
		$this->Notifications_model->update_note_data($nid, $update_data);
		
		$note = $this->Notifications_model->get_note_by_id($nid);
		$note->data = json_decode($note->data);
		
		$this->String_model->remove_contributor( $note->data->string_id, $note->data->receiver_id);
		
		$this->Notifications_model->remove_notification($nid);
		
		echo $this->Notifications_model->get_body_for_note($note);
	}
	
	function pusher_auth() {
		$this->load->library('pusher');
		$this->load->helper('login');
		
		$channel_name = $this->input->post('channel_name');
		$socket_id = $this->input->post('socket_id');
		
		if(is_logged_in()){
			echo $this->pusher->socket_auth($channel_name, $socket_id);
		} else {
			header('', true, 403);
			echo "Forbidden";
		}
	}
	
}

?>