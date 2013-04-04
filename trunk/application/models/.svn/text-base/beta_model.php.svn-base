<?php

class Beta_model extends CI_Model{
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	public function get_all_emails(){
		$query = $this->db->get('beta_sign_ups');
		return $query->result_array();
	}
	
	public function is_unique($email){
		$this->db->where('email', $email);
		$query = $this->db->get('beta_sign_ups', 1);
		if($query->num_rows() > 0) return false;
		else return true;
	}
	
	public function create($data){
		$this->db->insert('beta_sign_ups', $data);
		return;
	}
}

?>