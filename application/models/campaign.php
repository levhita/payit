<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Campaign extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
    
    /**
     * @return id of the user inserted, or FALSE in case of failure
     **/
    public function add($data) {
        if ($this->db->insert('campaign', $data)) {
            return $this->db->insert_id();
        }
        return false;
    }
    
    public function update($campaign_id, $data){
        $this->db->where('campaign_id', $campaign_id);
        return $this->db->update('campaign', $data);
    }
    
    public function get($campaign_id) {
        $query = $this->db->get_where('campaign', array('campaign_id'=> $campaign_id)); 
        return $query->row();
    }
}
