<?php

class Pages extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('BlogPost_model');
        $this->load->model('Category_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
    }

    public function index()
    {
        $data['title'] = 'Home Page';
        $posts = $this->BlogPost_model->get_posts();
        $data['posts'] = $posts; 
        $data['categories'] = $this->Category_model->get_categories();

        $this->load->view('header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('footer');
    }

    public function page($page = 'home')
    {
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = ucfirst($page);

        $this->load->view('header', $data);
        $this->load->view('pages/' . $page, $data);
        $this->load->view('footer');
    } 
}