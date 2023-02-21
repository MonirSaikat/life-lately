<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(['url', 'form']);
        $this->load->library(['form_validation', 'session']);
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
        $this->load->model('User_model'); 
    }

    public function register()
    {
        $this->form_validation->set_rules('name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('register'));
        } else {
            $hashed_password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            
            $data = array(
                'name' => $this->input->post('name'),
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => $hashed_password
            );
            
            $user_id = $this->User_model->create($data);
            
            $this->session->set_flashdata('success', 'You are now logged in');
            $this->session->set_userdata('user_id', $user_id); 

            redirect(base_url('/'));
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->set_flashdata('success', 'You have been logged out successfully');
        redirect(base_url('/'));
    }

    public function login() {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('login'));
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->User_model->authenticate($email, $password);

            if($user) {
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_flashdata('success', 'You are now logged in'); 
                redirect(base_url());
            } else {
                $this->session->set_flashdata('error', 'Invalid email or password');
                redirect(base_url('login')); 
            }
        }

    }
}