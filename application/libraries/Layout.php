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
        $loadedData['_content_for_layout_'] = $this->obj->load->view($view,$data,true);
        $loadedData['_title_for_layout_']   = $title;
        $loadedData['_is_logged_in_'] = $this->obj->twitteroauth->isLoggedIn();
        
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