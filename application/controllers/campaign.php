<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign extends CI_Controller {

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
		// see campaign... retrieve id
		$this->layout->view('landpage');
	}

	public function edit()
	{
		//edit campaign
		$data = array(); // Load this data from database
		$this->layout->view('campaign_edit', $data);
	}
	
	public function create()
	{
		if (!$this->user->isLoggedIn()) {
			$this->user->setFlash('You need to be logged in to create a new campaign.');
			redirect(base_url('/'));
		}
		
		$data = array(); // Add default data
		$this->layout->view('campaign_edit', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */