<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @return id of the user inserted, or FALSE in case of failure
     **/
    public function addNewUser($data) {
        if ($this->db->insert('user', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }
    
    public function updateUserData($user_id, $user_data){
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data); 
    }

    public function isNewUser() {
    	if ( $this->isLoggedIn() ) {
            $user = $this->getLoggedInUser();
            $this->db->select('new_user')->from('user')->where('user_id', $user_data->user_id); 
            return ($this->db->get()->row()->new_user == 0)?false:true;
           }
        return false;
    }
    public function getLoggedInUserData() {
        $user_data = 
    }
    
    public function getLoggedInUser(){
        return (object)$this->session->userdata('user');
    }
    
    public function userExists($twitter_user_id) {
        return false;
    }

    public function setFlash($message, $type="info") {
    	$flash = array('message'=>$message);
    	if( $type=='success' || $type=='info' || $type=='warning' || $type=='danger' ) {
    		$flash['class']		='alert-'.$type;
	    	$flash['label']		= ucfirst($type).'!';
	    }
    	$this->session->set_userdata('flash', $flash);
    }
    
    public function getFlash($destroy=true) {
    	$flash = $this->session->userdata('flash');
    	if($destroy){
    		$this->session->unset_userdata('flash');
    	}
		return $flash;
    }

    public function isLoggedIn(){
        return ($this->session->userdata('user'))?true:false;
    }
    /**
     * Reset session data
     * @return  void
     */
    public function clearSession ()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('request_token');
        $this->session->unset_userdata('request_token_secret');
    }
}
