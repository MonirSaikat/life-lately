<?php 

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }
}   
