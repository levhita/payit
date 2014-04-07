<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    public function isNewUser() {
    	return true;
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
    	return ($this->session->userdata('access_token') && $this->session->userdata('access_token_secret'))?true:false;
	}
}
