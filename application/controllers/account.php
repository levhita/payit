<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

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
		//Not implemented
		$this->layout->view('landing_page');
	}

	public function register() {
		$user = $this->user->getLoggedInUser();
		$user_data = array(
			'firstname' => $this->input->post('firstname'),
			'lastname' => $this->input->post('lastname'),
			'email' => $this->input->post('email'),
			'new_user' => '0'
			);
		$user_data = $this->security->xss_clean($user_data);
		if (!$this->user->updateUserData($user->user_id, $user_data) ){
			header('Cache-Control: no-cache, must-revalidate');
			header('Content-type: application/json');
			header('HTTP/1.1 400 Bad Request');

			echo json_encode(
				array(
					'status' => FALSE,
					'error' => "Couldn't save user details",
				)
			);
			return;
		}
		
		header('Content-type: application/json');
		header('HTTP/1.1 200 OK');
		echo json_encode(
			array(
				'status' => true,
				'error' => "Succesfully saved",
			)
		);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */