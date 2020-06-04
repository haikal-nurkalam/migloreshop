<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller {
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('logged_in') == null) {
            redirect(base_url());
        }

        // Meload model/Dashboard_Model.php
        $this->load->model('dashboard_model');
        $this->load->model('user_model');
    }

    // Halaman Profile 
    public function profile() 
    {
        // Mengambil data dari model
        $data['category'] = $this->dashboard_model->getAllCategory();
        $data['profile'] = $this->user_model->getUserInfo($this->session->userdata('user_id'));
        $data['prov'] = $this->user_model->getAllProv();
        $data['address'] = $this->getAllAddress($data['profile']['user_address_id']);

        // Load tampilan
        $this->load->view('user/layouts/header');
        $this->load->view('user/layouts/navbar');
        $this->load->view('user/layouts/sidebar',$data);
        $this->load->view('user/index',$data);
        $this->load->view('user/layouts/footer');
    }

    // Halaman shopping cart
    public function cart()
    {
        // Mengambil data dari model
        $data['category'] = $this->dashboard_model->getAllCategory();
        $data['wishlist'] = $this->user_model->getlMyWish($this->session->userdata('user_id'));
        $data['all_order'] = $this->user_model->oderList($this->session->userdata('user_id'), 0);
        $data['pending_order'] = $this->user_model->oderList($this->session->userdata('user_id'), 1);
        $data['sending_order'] = $this->user_model->oderList($this->session->userdata('user_id'), 2);
        $data['accepted_order'] = $this->user_model->oderList($this->session->userdata('user_id'), 3);

        // Load Tampilan
        $this->load->view('user/layouts/header');
        $this->load->view('user/layouts/navbar');
        $this->load->view('user/layouts/sidebar', $data);
        $this->load->view('user/cart',$data);
        $this->load->view('user/layouts/footer');
    }

    // System Edit biodata
    public function editBio()
    {
        $input['user_id'] = htmlspecialchars($this->input->post('user_id', true));
        $input['fullname'] = htmlspecialchars($this->input->post('fullname', true));
        $input['date_birth'] = htmlspecialchars($this->input->post('date_birth', true));
        $input['gender'] = htmlspecialchars($this->input->post('gender', true));

        $this->user_model->editBio($input);
    }

    // Upload Image System
    private function _upload()
    {
        $config['upload_path']          = './assets/product/user/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['overwrite']            = true;
        $config['max_size']             = 5024; // 5MB
        $config['encrypt_name']         = true;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;

        $this->load->library('upload', $config);

        // Cek upload
        if (!$this->upload->do_upload('cover')) {
            return array('file_name' => 'defaultImage.png');
        } else {
            return $this->upload->data();
        }
    }

    // Edit Image User
    public function editImg()
    {
        $input['user_id'] = htmlspecialchars($this->input->post('user_id', true));
        $input['user_img'] = $this->_upload()['file_name'];

        $this->user_model->editImage($input);
    }

    // Add Address
    public function addAddress()
    {
        $input['accepter'] = htmlspecialchars($this->input->post('accepter', true));
        $input['prov'] = htmlspecialchars($this->input->post('prov', true));
        $input['kota'] = htmlspecialchars($this->input->post('kota', true));
        $input['zip_code'] = htmlspecialchars($this->input->post('zip_code', true));
        $input['address'] = htmlspecialchars($this->input->post('address', true));
        $input['user_address'] = htmlspecialchars($this->input->post('user_address', true));
        $input['phone'] = htmlspecialchars($this->input->post('phone', true));

        $this->user_model->addAddress($input);
        echo "<script>
            alert('Berhasil Menambahkan Alamat');
            document.location.href = '" . $_SERVER['HTTP_REFERER'] . "';
            </script>";
    }

    // Get request data from ajax 
    public function getKotaById($id)
    {
        echo json_encode($this->user_model->getKotaById($id));
    }

    // Get all address user by id
    public function getAllAddress($id)
    {
        return $this->user_model->getAllAddress($id);
    }

    // Halaman invoice user
    public function invoice($id)
    {
        // Data
        $data['category'] = $this->dashboard_model->getAllCategory();
        $data['invoice'] = $this->user_model->oderListId($id);
        // Load Tampilan
        $this->load->view('user/layouts/header');
        $this->load->view('user/layouts/navbar');
        $this->load->view('user/layouts/sidebar', $data);
        $this->load->view('user/invoice', $data);
        $this->load->view('user/layouts/footer');
    }
}