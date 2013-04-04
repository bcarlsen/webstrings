<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
		//redirect('welcome/beta_signup');
		$this->beta_signup();
	}
	
	public function beta_signup(){
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('Beta_model');
		
		$data['init'] = 'nada';
		
		if($this->input->post('submit')){
			
			$this->form_validation->set_rules('email', "email", 'callback_email_check');//'required|valid_email|is_unique[beta_sign_ups.email]|xss_clean');
			
			if($this->form_validation->run() != FALSE){
				// success
				
				$record_data = array(
					'email' => $this->security->xss_clean($this->input->post('email')),
					'date' => time()
				);
				
				$this->Beta_model->create($record_data);
				
				$data['thank_you_message'] = "Thank you for signing up. We'll send you an invite when it's ready.";
			}
		}
		
		$this->load->view('launch_page', $data);
		
	}
	
	public function email_check($str){
		$this->load->helper('email');
		
		if($str == ''){
			$this->form_validation->set_message('email_check', "Please enter an email address.");
			return false;
		} 
		
		if(!valid_email($str)){
			$this->form_validation->set_message('email_check', "Please enter a valid email address.");
			return false;
		}
		
		if(!$this->Beta_model->is_unique($str)){
			$this->form_validation->set_message('email_check', "You've already signed up!");
			return false;
		}
		
		return true;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */