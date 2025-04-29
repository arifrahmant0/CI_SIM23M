<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation'); // Load form validation library
    }

    public function register()
    {
        $this->load->view('templates/header');
        $this->load->view('auth/register');
        $this->load->view('templates/footer');
    }

    public function process_register()
    {
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]'); // Corrected min_length
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'required|matches[password]'); // Corrected matches
        $this->form_validation->set_rules('role', 'Role', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $this->load->view('templates/header');
            $this->load->view('auth/register');
            $this->load->view('templates/footer');
        } else {
            // Validation passed
            $data = [
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role' => $this->input->post('role')
            ];

            if ($this->user_model->insert_user($data)) {
                $this->session->set_flashdata('success', 'Pendaftaran Berhasil');
                redirect('auth/login');
            } else {
                $this->session->set_flashdata('error', 'Pendaftaran Gagal'); // Changed to 'error'
                redirect('auth/register');
            }
        }
    }
}
