<?php

class Category_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_categories()
    {
        $query = $this->db->get('categories');
        return $query->result();
    }
}