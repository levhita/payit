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
	
		$this->layout->view('campaign_edit', $data);
	}

	public function saveCampaign(){
		if (!$this->user->isLoggedIn()) {
			//TODO: Send 403 error
			return;
		}
		$user = $this->user->getLoggedInUser();
		$data = array (
			'user_id' => $user->user_id,
			'name' => $this->input->post('name'),
			'pretty_url' => $this->input->post('pretty_url'),
			'description' => $this->input->post('description'),
			'twit' => $this->input->post('twit'),
			'thank_you' => $this->input->post('thank_you')
		);
		$data = $this->security->xss_clean($data);

		$campaign_id = $this->input->post('campaign_id');
		
		if ($campaign_id!==0) {
			$campaign = $this->campaign->get($campaign_id);
			if (!$campaign) {
				echo "//TODO: send badrequest error campaign doesn't exist";
				return;
			} 
			if ($campaign->user_id != $user->user_id) {
				echo "//TODO: Send 403 no permission":
				return;
			}
			$this->campaign->update($campaign_id, $data);
		} else {
			if (!$campaign_id = $this->campaign->add($data)){
				echo "//TODO: error creating campaign";
				return;
			}
		}
		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */