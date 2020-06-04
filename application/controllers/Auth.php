<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    // Fungsi yang selalu di jalankan pada controller ini
    public function __construct()
    {
        parent::__construct();

        // Meload library form validation
        $this->load->library('form_validation');
        $this->load->model('auth_model');
    }

    // Halaman Login
    public function login()
    {
        // Cek jika sudah login
        if ($this->session->userdata('logged_in') == true) {
            redirect(base_url());
        }
        
        // Meload view Dashboard
        $this->load->view('auth/login');
    }
    
    // Halaman Register
    public function register()
    {
        // Cek jika sudah login
        if ($this->session->userdata('logged_in') == true) {
            redirect(base_url());
        }

        // Meload view Dashboard
        $this->load->view('auth/regist');
    }

    // Cek validasi login
    public function validator()
    {

        // Pengecekan input
        $this->form_validation->set_rules('username', '"username"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('password', '"password"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
        
        if($this->form_validation->run() !== FALSE) {
            $input['username'] = htmlspecialchars($this->input->post('username', true));
            $input['password'] = htmlspecialchars($this->input->post('password', true));

            // Sistem pengecekan login
            $this->auth_model->login_validator($input);
        } else {
            $this->login();
        }
    }   
    
    // Daftar User Baru
    public function register_validator()
    {
        // Pengecekan input
        $this->form_validation->set_rules('fullname', '"Full Name"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('email', '"Email"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('username', '"Username"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('password', '"Password"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('password2', '"Confirm Password"', 'trim|required|min_length[5]|max_length[52]|encode_php_tags|matches[password]');
        
        if ($this->form_validation->run() !== FALSE) {
            $input['fullname'] = htmlspecialchars($this->input->post('fullname', true));
            $input['email'] = htmlspecialchars($this->input->post('email', true));
            $input['username'] = htmlspecialchars($this->input->post('username', true));
            $input['password'] = htmlspecialchars($this->input->post('password', true));

            // Sistem Daftar User Baru
            $this->auth_model->add_user($input);

        } else {
            $this->register();
        }
    }

    // Mengakhiri sesi login
    public function logout()
    {
        $data = array(
            'user_name',
            'role'     ,
            'logged_in'
        );
        $this->session->unset_userdata($data);
        redirect($_SERVER['HTTP_REFERER']);
    }
}