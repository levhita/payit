<?php  
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Layout
{

    var $obj;
    var $layout;

    function __construct()
    {
        $this->obj =& get_instance();
        $this->layout = 'layout_main';
    }

    function setLayout($layout)
    {
      $this->layout = $layout;
    }

    function view($view, $data=null, $title='', $return=false)
    {
        $loadedData = array();
        $data['_title_for_layout_'] = $loadedData['_title_for_layout_'] = $title;
        $data['_is_logged_in_'] = $loadedData['_is_logged_in_'] = $this->obj->user->isLoggedIn();
        $data['_is_new_user_'] = $this->obj->user->isNewUser();
        $data['_flash_'] = $this->obj->user->getFlash();
        $loadedData['_content_for_layout_'] = $this->obj->load->view($view,$data,true);
        
        
        if($return)
        {
            $output = $this->obj->load->view($this->layout, $loadedData, true);
            return $output;
        }
        else
        {
            $this->obj->load->view($this->layout, $loadedData, false);
        }
    }
}
?> 