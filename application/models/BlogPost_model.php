<?php

class BlogPost_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_posts()
    {
        $this->db->select('blog_post.*, users.username');
        $this->db->from('blog_post');
        $this->db->join('users', 'blog_post.user_id = users.id');
        $this->db->order_by('blog_post.created_at', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_post($id) {
        return $this->db->get_where('blog_post', 'id='.$id)->first_row();
    }

    public function create($data) {
        $this->db->insert('blog_post', $data); 
        return $this->db->insert_id();
    }


}