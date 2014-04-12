<?php
/**
 * Twitter OAuth library.
 * Sample controller.
 * Requirements: enabled Session library, enabled URL helper
 * Please note that this sample controller is just an example of how you can use the library.
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Twitter extends CI_Controller
{
	/**
	 * TwitterOauth class instance.
	 */
	private $connection;
	
	/**
	 * Controller constructor
	 */
	function __construct()
	{
		parent::__construct();

		if($this->user->isLoggedIn())
		{
			// If user already logged in
			$this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'), $this->session->userdata('user')->twitter_access_token,  $this->session->userdata('user')->twitter_access_secret);
		}
		else if($this->session->userdata('request_token') && $this->session->userdata('request_token_secret'))
		{
			// If user in process of authentication
			$this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'), $this->session->userdata('request_token'), $this->session->userdata('request_token_secret'));
		}
		else
		{
			// Unknown user
			$this->connection = $this->twitteroauth->create($this->config->item('twitter_consumer_token'), $this->config->item('twitter_consumer_secret'));
		}
	}
	
	/**
	 * Here comes authentication process begin.
	 * @access	public
	 * @return	void
	 */
	public function auth()
	{
		if ( $this->uri->segment(2)=='new_campaign' ) {
			$this->session->set_userdata('new_campaign', true);
		}

		if($this->user->isLoggedIn())
		{
			// User is already authenticated. Add your user notification code here.
			redirect(base_url('/'));
		}
		else
		{
			// Making a request for request_token
			$request_token = $this->connection->getRequestToken(base_url('/twitter/callback'));

			$this->session->set_userdata('request_token', $request_token['oauth_token']);
			$this->session->set_userdata('request_token_secret', $request_token['oauth_token_secret']);
			
			if($this->connection->http_code == 200)
			{
				$url = $this->connection->getAuthorizeURL($request_token);
				redirect($url);
			}
			else
			{
				// An error occured. Make sure to put your error notification code here.
				redirect(base_url('/'));
			}
		}
	}
	
	/**
	 * Callback function, landing page for twitter.
	 * @access	public
	 * @return	void
	 */
	public function callback()
	{
		if($this->input->get('oauth_token') && $this->session->userdata('request_token') !== $this->input->get('oauth_token'))
		{
			$this->user->logout();
			redirect(base_url('/twitter/auth'));
		}
		else
		{
			$access_token = $this->connection->getAccessToken($this->input->get('oauth_verifier'));
		
			if ($this->connection->http_code == 200)
			{
				$twitter_data = array (
					'username' => $access_token['screen_name'],
					'twitter_access_token' => $access_token['oauth_token'],
					'twitter_access_secret' => $access_token['oauth_token_secret'],
					'twitter_user_id' => $access_token['user_id'],
				);
				
				$user_id = $this->user->userExists($twitter_data['twitter_user_id']);
				
				if ($user_id===false) {
					// User doesn't exists add it
					$user_id = $this->user->addNewUser($twitter_data);
					if (!$user_id ){
						log_message('error', 'Couldn\'t add user');
						//die? redirect? this is really extreme.
					}
				} else {
					// Already exists, Update info and keys that could have changed.
					$this->user->updateUserData($user_id, $twitter_data);
				}
				$user_data = $this->user->getUserData($user_id);
				$this->session->set_userdata('user', $user_data);

				$this->session->unset_userdata('request_token');
				$this->session->unset_userdata('request_token_secret');
				
				if ( $this->session->userdata('new_campaign') ) {
					$this->session->unset_userdata('new_campaign');
					redirect(base_url('/campaign/new'));	
				}

				redirect(base_url('/'));
			}
			else
			{
				// An error occured. Add your notification code here.
				redirect(base_url('/'));
			}
		}
	}
	
	public function signout() {
		$this->user->clearSession();
		$this->session->sess_destroy();
		redirect(base_url('/'));
    }

	public function post($in_reply_to)
	{
		$message = 'Test twit for PayIt' ;//$this->input->post('message');
		if(!$message || mb_strlen($message) > 140 || mb_strlen($message) < 1)
		{
			// Restrictions error. Notification here.
			redirect(base_url('/'));
		}
		else
		{
			if($this->user->isLoggedIn())
			{
				$content = $this->connection->get('account/verify_credentials');
				if(isset($content->errors))
				{
					// Most probably, authentication problems. Begin authentication process again.
					$this->user->clearSession();
					redirect(base_url('/twitter/auth'));
				}
				else
				{
					$data = array(
						'status' => $message,
						'in_reply_to_status_id' => $in_reply_to
					);
					$result = $this->connection->post('statuses/update', $data);

					if(!isset($result->errors))
					{
						// Everything is OK
						redirect(base_url('/'));
					}
					else
					{
						// Error, message hasn't been published
						redirect(base_url('/'));
					}
				}
			}
			else
			{
				// User is not authenticated.
				redirect(base_url('/twitter/auth'));
			}
		}
	}
}

/* End of file twitter.php */
/* Location: ./application/controllers/twitter.php */