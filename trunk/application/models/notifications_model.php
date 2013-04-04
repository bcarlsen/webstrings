<?php

class Notifications_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('pusher');
	}
	
	function get_note_by_id($nid){
		$this->db->where('id', $nid);
		$query = $this->db->get('notifications', 1);
		if($query->num_rows() < 1)
			return false;
		return $query->row();
	}
	
	function get_note_body_by_id($nid){
		$note = $this->get_note_by_id($nid);
		$note->data = json_decode($note->data);
		return $this->get_body_for_note($note);
	}
	
	function get_notes_for_user($uid) {
		$this->db->select('*');
		$this->db->where('user_id', $uid);
		$this->db->order_by('date_added', 'desc');
		$query = $this->db->get('notifications');
		$notes = array();
		foreach($query->result() as $note){
			$note->data = json_decode($note->data);
			$note->body = $this->get_body_for_note($note);
			$notes[] = $note;
		}
		//print_r($notes);
		return $notes;
	}
	
	function get_num_unread_notes_for_user($uid) {
		$this->db->from('notifications');
		$this->db->where('user_id', $uid);
		$this->db->where('unread', TRUE);
		return $this->db->count_all_results();
	}
	
	function remove_notification($nid){
		$this->db->where('id', $nid);
		$this->db->delete('notifications');
	}
	
	function mark_note_read($nid) {
		$this->db->where('id', $nid);
		$this->db->update('notifications', array("unread" => 0));
	}
	
	function user_invited_to_string($string_id, $receiver_id, $sender_id) {
		$this->load->model(array("User_model", "String_model"));
		
		$note_data = array(
			"string_id" => $string_id,
			"receiver_id" => $receiver_id,
			"sender_id" => $sender_id,
			"response" => INVITE_PENDING
		);
		
		// add notification to db for insert id
		$recordData = array(
			'type' => NOTE_INVITE_TO_STRING,
			'user_id' => $receiver_id,
			'date_added' => strftime("%Y-%m-%d %H:%M:%S", time()),
			'unread' => 1,
			'data' => json_encode($note_data)
		);
		
		$this->db->insert('notifications', $recordData);
		$note = $this->get_note_by_id($this->db->insert_id());
		$note->data = json_decode($note->data);
		$body = $this->get_body_for_note($note);
		
		// send notification via pusher
		$pusherData['body'] = $body;
		$pusherData['unread'] = TRUE;
		
		$this->pusher->trigger('private-'.$receiver_id.'-notes', 'newNote', $pusherData);
		
		return $note->id;
	}
	
	function new_contributor_to_string($note_id) {
		$this->load->model(array('User_model', 'String_model'));
		
		$invite = $this->get_note_by_id($note_id);
		$invite->data = json_decode($invite->data);
		
		$receivers = $this->String_model->get_contributors_for_string($invite->data->string_id, array($invite->user_id, $invite->data->sender_id));
		
		foreach($receivers as $receiver){
			
			$note_data = array(
				"string_id" => $invite->data->string_id,
				"contributor_id" => $invite->user_id
			);
			
			$this->create_and_push_notification(NOTE_NEW_CONTRIBUTOR, $note_data, $receiver->id);
		}
	}
	
	function user_accepted_invite_to_string($note_id) {
		$this->load->model(array('User_model', 'String_model'));
		
		$invite = $this->get_note_by_id($note_id);
		$invite->data = json_decode($invite->data);
			
		$note_data = array(
			"string_id" => $invite->data->string_id,
			"invitee_id" => $invite->user_id
		);
		
		$this->create_and_push_notification(NOTE_ACCEPTED_INVITE, $note_data, $invite->data->sender_id);
	}
	
	function new_page_in_string($adder_id, $string_id) {
		$this->load->model(array('User_model', 'String_model'));
		
		$note_data = array(
			"string_id" => $string_id,
			"adder_id" => $adder_id
		);
		
		$receivers = $this->String_model->get_contributors_for_string($string_id, $adder_id);
		
		// add a notification for everyone who will receive it
		foreach($receivers as $receiver) {
			
			// add notification to db for insert id
			$recordData = array(
				'type' => NOTE_NEW_PAGES,
				'user_id' => $receiver->id,
				'date_added' => strftime("%Y-%m-%d %H:%M:%S", time()),
				'unread' => 1,
				'data' => json_encode($note_data)
			);
			
			$this->db->insert('notifications', $recordData);
			
			// send notification via pusher
			$note = $this->get_note_by_id($this->db->insert_id());
			$note->data = json_decode($note->data);
			$body = $this->get_body_for_note($note);
			
			$pusherData['body'] = $body;
			$pusherData['unread'] = TRUE;
		
			$this->pusher->trigger('private-'.$receiver->id.'-notes', 'newNote', $pusherData);
		}
	}
	
	function new_comment_in_string($commenter_id, $string_id, $page_id) {
		$this->load->model(array('User_model', 'String_model'));
		
		$note_data = array(
			"commenter_id" => $commenter_id,
			"string_id" => $string_id,
			"page_id" => $page_id
		);
		
		$receivers = $this->String_model->get_contributors_for_string($string_id, $commenter_id);
		
		// add a notification for everyone who will receive it
		foreach($receivers as $receiver) {
			
			// add notification to db for insert id
			$recordData = array(
				'type' => NOTE_NEW_COMMENTS,
				'user_id' => $receiver->id,
				'date_added' => strftime("%Y-%m-%d %H:%M:%S", time()),
				'unread' => 1,
				'data' => json_encode($note_data)
			);
			
			$this->db->insert('notifications', $recordData);
		
			// send notification via pusher
			$note = $this->get_note_by_id($this->db->insert_id());
			$note->data = json_decode($note->data);
			$body = $this->get_body_for_note($note);
				
			$pusherData['body'] = $body;
			$pusherData['unread'] = TRUE;
		
			$this->pusher->trigger('private-'.$receiver->id.'-notes', 'newNote', $pusherData);
		}
	}
	
	////////////////////////////
	//    Helper Functions    //
	////////////////////////////
	
	function create_and_push_notification($note_type, $note_data, $receiver_id){
		// add notification to db for insert id
		$recordData = array(
			'type' => $note_type,
			'user_id' => $receiver_id,
			'date_added' => strftime("%Y-%m-%d %H:%M:%S", time()),
			'unread' => 1,
			'data' => json_encode($note_data)
		);
		
		$this->db->insert('notifications', $recordData);
	
		// send notification via pusher
		$note = $this->get_note_by_id($this->db->insert_id());
		$note->data = json_decode($note->data);
		$body = $this->get_body_for_note($note);
			
		$pusherData['body'] = $body;
		$pusherData['unread'] = TRUE;
	
		$this->pusher->trigger('private-'.$receiver_id.'-notes', 'newNote', $pusherData);
	}
	
	function update_note_data($nid, $data){
		$note = $this->get_note_by_id($nid);
		$note->data = json_decode($note->data);
		foreach($data as $key => $value){
			$note->data->$key = $value;
		}
		
		$this->db->where('id', $note->id);
		$this->db->update('notifications', array("data" => json_encode($note->data)));
	}
	
	function get_body_for_note($note){
		$this->load->model(array('User_model', 'String_model'));
		
		$string = $this->String_model->get_string_by_id($note->data->string_id);
		if(!$string)
			return false;
		$data['string'] = $string;
		
		switch($note->type){
			case NOTE_INVITE_TO_STRING:
				$data['sender'] = $this->User_model->get_user_by_id($note->data->sender_id);
				$data['note'] = $note;
				
				return $this->load->view('notifications/invite', $data, true);
			case NOTE_ACCEPTED_INVITE:
				$data['invitee'] = $this->User_model->get_user_by_id($note->data->invitee_id);
				$data['note_id'] = $note->id;
				
				return $this->load->view('notifications/invite_accepted', $data, true);
				break;
			case NOTE_NEW_COMMENTS:
				$data['commenter'] = $this->User_model->get_user_by_id($note->data->commenter_id);
				$data['page'] = $this->String_model->get_page_by_id($note->data->page_id);
				$data['is_owner'] = ($this->User_model->current_user()->id == $data['string']->creator_id);
				$data['note_id'] = $note->id;
				
				return $this->load->view('notifications/new_comment', $data, true);
				
				break;
			case NOTE_NEW_CONTRIBUTOR:
				$data['contributor'] = $this->User_model->get_user_by_id($note->data->contributor_id);
				$data['is_owner'] = ($this->User_model->current_user()->id == $data['string']->creator_id);
				$data['note_id'] = $note->id;
				
				return $this->load->view('notifications/contributor_added', $data, true);
				break;
			case NOTE_NEW_PAGES:
				$data['adder'] = $this->User_model->get_user_by_id($note->data->adder_id);
				$data['is_owner'] = ($this->User_model->current_user()->id == $data['string']->creator_id);
				$data['note_id'] = $note->id;
				
				return $this->load->view('notifications/page_added', $data, true);
				break;
			default:
				break;
		}
		return "";
	}
}

?>