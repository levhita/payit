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

	public function edit()
	{
		//edit campaign
		$data = array(); // Load this data from database
		$this->layout->view('campaign/edit', $data);
	}
	
	public function create()
	{
		
		$data = array (
			'name' => $this->input->post('name'),
			'pretty_url' => str_replace(' ','_', strtolower($this->input->post('name'))),
			'description' => 'This is an example description',
			'twit' => 'This is an example twit',
			'thank_you' => 'This is an example thank you text'
		);
		$data = $this->security->xss_clean($data);

		if ($this->user_model->isLoggedIn()) {
			$user = $this->user_model->getLoggedInUser();
			$data['user_id']=$user->user_id;
		}
		
		if (!$campaign_id = $this->campaign_model->add($data)) {
				echo "//TODO: error creating campaign";
				return;
		}
		
		if (!$this->user_model->isLoggedIn()) {
		 	$this->session->set_userdata('pending_campaign_id',$campaign_id);
		}

		header('Content-type: application/json');
		header('HTTP/1.1 200 OK');
		echo json_encode(array(
			'status' => true,
			'campaign' => (array)$this->campaign_model->get($campaign_id),
		));
	}

	public function save(){
		if (!$this->user_model->isLoggedIn()) {
			//TODO: Send 403 error
			return;
		}
		$user = $this->user_model->getLoggedInUser();
		$data = array (
			'user_id' => $user->user_id,
			'name' => $this->input->post('name'),
			'pretty_url' => $this->input->post('pretty_url'),
			'description' => $this->input->post('description'),
			'twit' => $this->input->post('twit'),
			'thank_you' => $this->input->post('thank_you')
		);
		$data = $this->security->xss_clean($data);

		$campaign_id = (int)$this->input->post('campaign_id');
		
		if ($campaign_id!==0) {
			$campaign = $this->campaign_model->get($campaign_id);
			if (!$campaign) {
				echo "//TODO: send badrequest error campaign doesn't exist";
				return;
			} 
			if ($campaign->user_id != $user->user_id) {
				echo "//TODO: Send 403 no permission";
				return;
			}
			$this->campaign_model->update($campaign_id, $data);
		} else {
			if (!$campaign_id = $this->campaign_model->add($data)){
				echo "//TODO: error creating campaign";
				return;
			}
		}
		header('Content-type: application/json');
		header('HTTP/1.1 200 OK');
		echo json_encode(array(
			'status' => true,
			'campaign' => (array)$this->campaign_model->get($campaign_id),
		));
	}
	
	public function view() {
		if(!$campaign = $this->campaign_model->getByPrettyURL($this->uri->segment(2))) {
			$this->user_model->setFlash("That Campaign doesn't exists", 'error');
			redirect(base_url('/'));
		}	
		
		$data = array();
		$data['campaign'] = $campaign;
		
		if ($this->user_model->isLoggedIn()) {
			$user = $this->user_model->getLoggedInUser();
			$data['is_owner'] = ($user->user_id==$campaign->user_id);
		} else {
			if($pending_campaign_id = $this->session->userdata('pending_campaign_id')){
				$data['pending_campaign_id'] = $pending_campaign_id;
				$data['is_owner'] = ($campaign->campaign_id==$pending_campaign_id);
			} else {
				$data['is_owner'] = false;
			}
		}
		
		
		$this->layout->view('campaign/view', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */