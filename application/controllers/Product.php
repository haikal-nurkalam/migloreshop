<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
    // Fungsi yang selalu di jalankan pada controller ini
    public function __construct()
    {
        parent::__construct();

        // Meload model/Dashboard_Model.php
        $this->load->model('dashboard_model');
        // Meload model/product_model.php
        $this->load->model('product_model');;
        // Meload model/user_model.php
        $this->load->model('user_model');
    }

    // Halaman View Product
    public function view($id)
    {
        // Mengambil data dari model
        $data['product'] = $this->product_model->get_Product_detail($id)->row_array();
        $data['category'] = $this->dashboard_model->getAllCategory();
        $data['address'] = $this->user_model->getAllAddress($this->session->userdata('address_id'));
        $data['review'] = $this->product_model->getReview($id);
        
        // Meload view Dashboard
        $this->load->view('dashboard/layouts/header');
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar', $data);
        $this->load->view('dashboard/product', $data);
        $this->load->view('dashboard/layouts/footer');
    }
}
