<?php

class Posts extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BlogPost_model');
        $this->load->helper(['url']);
        $this->load->library(['form_validation', 'session']);
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }
    
    public function index($param) {
        echo $param;
    }

    public function create()
    {
        $data['title'] = 'Create post';

        $this->load->view('header', $data);
        $this->load->view('pages/posts/create');
        $this->load->view('footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('posts/create'));
        } else {
            $config['upload_path'] = APPPATH.'../public/images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('image')) {
                $errors = $this->upload->display_errors();
                $this->session->set_flashdata('validation_errors', $errors);
                redirect('posts/create');
            } else {
                $upload_data = $this->upload->data();
                $data['image'] = $upload_data['file_name'];
                $data['title'] = $this->input->post('title');
                $data['content'] = $this->input->post('content');
                $data['user_id'] = $this->session->userdata('user_id');
                $this->BlogPost_model->create($data);

                $this->session->set_flashdata('success', 'Your post has been created');
                redirect('posts/create'); 
            }
        }
    }
}