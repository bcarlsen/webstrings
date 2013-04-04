<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('log_in'))
{
	function log_in($id)
	{
		$CI =& get_instance();
		
		$CI->load->library('session');
		
		$CI->session->set_userdata('id', $id);
	}
}

if ( ! function_exists('log_out'))
{
	function log_out()
	{
		$CI =& get_instance();
		
		$CI->load->library('session');
		
		$CI->session->unset_userdata('id');
	}
}

if ( ! function_exists('is_logged_in'))
{
	function is_logged_in()
	{
		$CI =& get_instance();
		
		$CI->load->library('session');
		
		$logged_in = $CI->session->userdata('id');
		if(!isset($logged_in) || $logged_in != true){
			// not signed in
			return false;
		} else {
			// is signed in
			return true;
		}
	}
}