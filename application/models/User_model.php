<?php

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_users()
    {
        $query = $this->db->get('users');
        return $query->result();
    }

    public function create($data)
    {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function authenticate($email, $password) {
        $query = $this->db->get_where('users', ['email' => $email]);

        if($query->num_rows() == 1) {
            $user = $query->row();

            if(password_verify($password, $user->password)) {
                return $user;
            }
        } 

        return false;
    }
}