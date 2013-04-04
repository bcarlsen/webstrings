<?php

class User_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	/* reading functions */
	
	public function get_all_users(){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('user_auth', 'users.id = user_auth.id');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_user_by_id($id){
		$this->db->select('users.*, user_info.fullname, user_info.pic_url, user_info.fb');
		$this->db->where('users.id', $id);
		$this->db->join('user_info', 'users.id = user_info.id');
		$query = $this->db->get('users', 1);
		return $query->row();
	}
	
	function get_user_by_email($email){
		$this->db->select('users.*, user_info.fullname, user_info.pic_url, user_info.fb');
		$this->db->where('users.email', $email);
		$this->db->join('user_info', 'users.id = user_info.id');
		$query = $this->db->get('users', 1);
		return $query->row();
	}
	
	public function current_user(){
		$this->load->helper('login');
		
		if(!is_logged_in()) return false;
		
		return $this->get_user_by_email($this->session->userdata('email'));
	}
	
	public function search_users($term) {
		$this->db->like('email', $term);
		$this->db->or_like('f_name', $term);
		$this->db->or_like('l_name', $term);
		$query = $this->db->get('users');
		return $query->result();
	}
	
	/* create, update, delete */
	
	public function create($data, $password){
		
		$this->db->insert('users', $data);
		
		$authData = array(
			'id' => $this->db->insert_id(),
			'email' => $data['email'],
			'password' => md5($password)
		);
		
		$this->db->insert('user_auth', $authData);
		return;
	}
	
	public function update($id, $data){
		$this->db->where('id', $id);
		$count = $this->db->update('users', $data);
		if($count != 0) return true;
		return false;
	}
	
	public function delete_user($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
		
		$this->db->where('id', $id);
		$this->db->delete('user_auth');
		
		$custom_sql = 'string_id IN (SELECT id FROM strings WHERE creator_id = '.$id.')';
		$this->db->where('user_id', $id);
		$this->db->or_where($custom_sql);
		$this->db->delete('contributors');
		
		$this->db->where($custom_sql);
		$this->db->delete('string_pages');
		
		$this->db->where($custom_sql);
		$this->db->or_where('user_id', $id);
		$this->db->delete('pages_read');
		
		$this->db->where('creator_id', $id);
		$this->db->delete('strings');
	}
	
	/* other functions */
	
	function authenticate_credentials($email, $password){
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('user_auth', 1);
		if($query->num_rows() > 0) return true;
		return false;
	}
	
	function change_password($id, $new_password){
		$this->db->where('id', $id);
		$query = $this->db->update('user_auth', array('password' => $new_password));
		if($query > 0)
			return true;
		return false;
	}
}
	