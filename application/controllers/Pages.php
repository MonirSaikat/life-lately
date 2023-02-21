<?php 

class Pages extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model'); 
    }

    public function index() {

        $data['title'] = 'Home Page';

        $this->load->view('header', $data);
        $this->load->view('pages/home', $data); 
        $this->load->view('footer');
    }

    public function about() {

        $data['title'] = 'About page';
        
        $this->load->view('pages/about', $data); 
    }

    public function users() {
        
        $this->load->database();

        $result = $this->User_model->get_users(); 
        
        $data['title'] = 'Users';
        $data['users'] = $result;

        $this->load->view('header', $data);
        $this->load->view('pages/users', $data);
        $this->load->view('footer'); 
    }
}