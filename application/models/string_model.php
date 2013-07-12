<?php

class String_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
		$this->load->database();
	}
	
	////////////////////////////
	//    String Functions    //
	////////////////////////////
	
	function get_all_strings(){
		$query = $this->db->get('strings');
		if($query->num_rows() < 1)
			return array();
		return $query->result();
	}
	
	function get_string_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get('strings', 1);
		if($query->num_rows() < 1)
			return array();
		return $query->row();
	}
	
	function get_anon_string_by_code($code){
		$this->db->select('strings.*');
		$this->db->from('anon_strings');
		$this->db->join('strings', 'anon_strings.string_id = strings.id');
		$this->db->where('anon_strings.code', $code);
		$query = $this->db->get();
		if($query->num_rows() < 1)
			return array();
		return $query->row();
	}
	
	function get_string_by_page($pid) {
		$this->db->where('id', $pid);
		$query = $this->db->get('string_pages', 1);
		$page = $query->row();
		
		$this->db->where('id', $page->string_id);
		$query = $this->db->get('strings', 1);
		if($query->num_rows() < 1)
			return array();
		return $query->row();
	}
	
	function get_all_strings_for_user_id($id){
		$this->db->select('contributors.string_id AS id, contributors.is_editor, contributors.is_owner, strings.date_created, strings.title, strings.description');
		$this->db->from('contributors');
		$this->db->join('strings', 'contributors.string_id = strings.id');
		$this->db->where('contributors.user_id', $id);
		$this->db->order_by('strings.date_created', 'desc');
		$query = $this->db->get();
		if($query->num_rows() < 1)
			return array();
		return $query->result();
	}
	
	function get_my_strings_for_user_id($id){
		$this->db->select('strings.id, strings.title, strings.description, num_unread_pages.unread_pages');
		$this->db->from('strings');
		$this->db->join('num_unread_pages', 'strings.id = num_unread_pages.string_id AND strings.creator_id = num_unread_pages.user_id');
		$this->db->where('strings.creator_id', $id);
		//$this->db->order_by('num_unread_pages.unread_pages', 'desc'); // list the strings with unread pages first
		$this->db->order_by('strings.date_created', 'desc');
		$query = $this->db->get();
		if($query->num_rows() < 1)
			return array();
		return $query->result();
	}
	
	function get_shared_strings_for_user_id($id){
		$this->db->select('strings.id, strings.title, strings.description, num_unread_pages.unread_pages');
		$this->db->from('contributors');
		$this->db->join('strings', 'contributors.string_id = strings.id AND contributors.user_id != strings.creator_id');
		$this->db->join('num_unread_pages', 'contributors.string_id = num_unread_pages.string_id AND contributors.user_id = num_unread_pages.user_id');
		$this->db->where('contributors.user_id', $id);
		$this->db->where('contributors.accepted', TRUE);
		$this->db->order_by('strings.date_created', 'desc');
		$query = $this->db->get();
		if($query->num_rows() < 1)
			return array();
		return $query->result();
	}

	function get_editable_strings_for_user_id($id){
		$this->db->select('strings.id, strings.title, strings.description, num_unread_pages.unread_pages');
		$this->db->from('contributors');
		$this->db->join('strings', 'contributors.string_id = strings.id');
		$this->db->join('num_unread_pages', 'contributors.string_id = num_unread_pages.string_id AND contributors.user_id = num_unread_pages.user_id');
		$this->db->where('contributors.user_id', $id);
		$this->db->where('(contributors.is_editor OR contributors.is_owner)');
		$this->db->order_by('strings.creator_id = '.$id, 'desc');
		$this->db->order_by('strings.date_created', 'desc');
		$query = $this->db->get();
		if($query->num_rows() < 1)
			return array();
		return $query->result();
	}

	function get_user_roles_for_string($user_id, $string_id) {
		$this->db->select('is_editor, is_owner');
		$this->db->where('string_id', $string_id);
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('contributors');
		if($query->num_rows() < 1)
			return array();
		return $query->row();
	}
	
	function create_string($data){
		$this->db->insert('strings', $data);
		$this->add_contributor_to_string($data['creator_id'], $this->db->insert_id(), true, true);
		return;
	}
	
	function update_string($id, $data){
		$this->db->where('id', $id);
		$count = $this->db->update('strings', $data);
		if($count != 0) return true;
		return false;
	}
	
	function delete_string($id){
		$this->db->where('id', $id);
		$this->db->delete('strings');
		
		$this->db->where('string_id', $id);
		$this->db->delete('string_pages');
		
		$this->db->where('string_id', $id);
		$this->db->delete('contributors');
		return;
	}
	
	////////////////////////////
	//     Page Functions     //
	////////////////////////////
	
	function get_page_by_id($id){
		$this->db->where('id', $id);
		$query = $this->db->get('string_pages', 1);
		return $query->row();
	}
	
	function get_pages_for_string($string_id, $user_id) {
		$this->db->select('string_pages.id, string_pages.url, string_pages.title, string_pages.iframe_allowed, pages_read.unread, pages_read.user_id');
		$this->db->from('string_pages');
		$this->db->join('pages_read', 'string_pages.id = pages_read.page_id');
		$this->db->where('string_pages.string_id', $string_id);
		$this->db->where('pages_read.user_id', $user_id);
		$this->db->order_by('string_pages.date_added', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_pages_for_anon_string($string_id) {
		$this->db->select('string_pages.id, string_pages.url, string_pages.title');
		$this->db->from('string_pages');
		$this->db->where('string_pages.string_id', $string_id);
		$query = $this->db->get();
		return $query->result();
	}
	
	function get_num_unread_pages($string_id, $user_id) {
		$this->db->select('pages_read.unread');
		$this->db->from('string_pages');
		$this->db->join('pages_read', 'string_pages.id = pages_read.page_id');
		$this->db->where('string_pages.string_id', $string_id);
		$this->db->where('pages_read.user_id', $user_id);
		$this->db->where('pages_read.unread', TRUE);
		return $this->db->count_all_results();
	}
	
	function add_page_to_string($string_id, $user_id, $url, $title, $iframe_allowed = true) {
		
		$page_data = array(
			'string_id' => $string_id,
			'user_id' => $user_id,
			'url' => $url,
			'title' => $title,
			'iframe_allowed' => $iframe_allowed,
			'date_added' => strftime("%Y-%m-%d %H:%M:%S", time())
		);
		
		// add page to string
		$this->db->insert('string_pages', $page_data);
		$page_id = $this->db->insert_id();
		
		// mark page unread for contributors
		$custom_sql = 'INSERT INTO pages_read (page_id, string_id, user_id, unread) '.
					  'SELECT '.$page_id.', contributors.string_id, contributors.user_id, 1 '.
					  'FROM contributors '.
					  'WHERE contributors.string_id = '.$string_id.';';
		$this->db->query($custom_sql);
		
		return;
	}
	
	function mark_page_read($page_id, $user_id) {
		$this->db->set('unread', FALSE);
		$this->db->where('page_id', $page_id);
		$this->db->where('user_id', $user_id);
		return $this->db->update('pages_read');
		
	}
	
	function delete_page($page_id){
		$this->db->where('id', $page_id);
		$this->db->delete('string_pages');
		
		$this->db->where('page_id', $page_id);
		$this->db->delete('pages_read');
	}
	
	// Marks the page as being either allowed in an iframe (true), or
	// not allowed in an iframe (false) due to XFrame Option header
	function mark_page_iframe_allowed($page_id, $allowed = true) {
		$this->db->set('iframe_allowed', $allowed);
		$this->db->where('id', $page_id);
		$this->db->update('string_pages');
	}
	
	////////////////////////////
	//   Comments Functions   //
	////////////////////////////
	
	function get_comments_for_page($pid) {
		$this->db->join('user_info', 'comments.user_id = user_info.id');
		$this->db->where('page_id', $pid);
		$this->db->order_by('time_added', 'asc');
		$query = $this->db->get('comments');
		return $query->result();
	}
    
    function create_comment($pid, $uid, $comment_body) {
        
        $data = array(
            'page_id' => $pid,
            'user_id' => $uid,
            'comment' => $comment_body,
            'time_added' => strftime("%Y-%m-%d %H:%M:%S", time())
        );
        
        $this->db->insert('comments', $data);
        
        return $this->db->insert_id();
    }
	
	////////////////////////////
	// Contributor Functions  //
	////////////////////////////
	
	function get_contributors_for_string($id, $exclude_ids = NULL) {
		$this->db->select('*');
		$this->db->from('contributors');
		$this->db->where('string_id', $id);
		if($exclude_ids != NULL) {
			if(!is_array($exclude_ids))
				$this->db->where('user_id !=', $exclude_ids);
			else {
				foreach($exclude_ids as $id){
					$this->db->where('user_id !=', $id);
				}
			}
		}
		$this->db->join('users', 'contributors.user_id = users.id');
		$this->db->join('user_info', 'contributors.user_id = user_info.id');
		$this->db->order_by('is_owner', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
	function add_contributor_to_string($contributor_id, $string_id, $is_editor = true, $is_owner = false) {
		$dataset = array(
			'string_id' => $string_id,
			'user_id' => $contributor_id,
			'is_editor' => $is_editor,
			'is_owner' => $is_owner,
			'accepted' => 1
		);
		
		$this->db->insert('contributors', $dataset);
		
		//add unread pages for new contributor
		$custom_sql = "INSERT INTO pages_read (page_id, string_id, user_id, unread) SELECT id, ".$string_id.", ".$contributor_id.", 1 FROM string_pages WHERE string_id = ".$string_id.";";
		$this->db->query($custom_sql);
		return;
	}
	
	function invite_contributor_to_string($contributor_id, $string_id, $is_editor = true, $is_owner = false) {
		$dataset = array(
			'string_id' => $string_id,
			'user_id' => $contributor_id,
			'is_editor' => $is_editor,
			'is_owner' => $is_owner,
			'accepted' => 0
		);
		
		$this->db->insert('contributors', $dataset);
		
		//add unread pages for new contributor
		$custom_sql = "INSERT INTO pages_read (page_id, string_id, user_id, unread) SELECT id, ".$string_id.", ".$contributor_id.", 1 FROM string_pages WHERE string_id = ".$string_id.";";
		$this->db->query($custom_sql);
		return;
	}
	
	function contributor_accepts_invite($contributor_id, $string_id) {
		$this->db->where('user_id', $contributor_id);
		$this->db->where('string_id', $string_id);
		$this->db->update('contributors', array("accepted" => 1));
	}
	
	function contributor_search($search_query) {
		$search_query  = urldecode($search_query); // decode from url
		$search_query = substr($search_query, 1);
		$params = explode('&', $search_query);
		$string_id = $params[0];
		$string_id = substr($string_id, strpos($string_id, '=') + 1);
		$term = $params[1];
		$term = substr($term, strpos($term, '=') + 1);
		
		$custom_sql = 'users.id NOT IN (SELECT user_id FROM contributors AS id WHERE string_id = '.$string_id.')'.
					'AND (users.email LIKE "'. $this->db->escape_like_str($term). '%")'; // escape search term
					  /*
					  'AND (users.email LIKE "%'.$term.'%"  OR users.f_name LIKE "'.$term.'%" OR users.l_name LIKE "'.$term.
					  '%" OR users.email LIKE "%'.$term.'%")';
					  */
		
		$this->db->where($custom_sql);
		$query = $this->db->get('users');
		return $query->result();
	}
	
	function remove_contributor($string_id, $user_id) {
		$this->db->where('string_id', $string_id);
		$this->db->where('user_id', $user_id);
		$this->db->delete('contributors');
		
		// remove unread pages entries
		$this->db->where('user_id', $user_id);
		$this->db->where('string_id', $string_id);
		$this->db->delete('pages_read');
		
		return;
	}
	
	////////////////////////////
	//    Sharing Functions   //
	////////////////////////////
	
	function get_share_url_for_string($string_id){
		$this->load->helper('url');
		
		$this->db->where('string_id', $string_id);
		$query = $this->db->get('anon_strings');
		
		if(count($query->result()) > 0)
			return site_url('anonybrowser/?id='.$query->row()->code);
		
		// need to generate a code for the string
		$code = md5($string_id);
		
		$this->db->insert('anon_strings', array('string_id' => $string_id, 'code' => $code));
		
		return site_url('anonybrowser/viewer/'.$code);
	}
	
}

?>