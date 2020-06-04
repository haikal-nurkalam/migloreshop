<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    // Fungsi yang selalu di jalankan pada controller ini
    public function __construct()
    {
        parent::__construct();

        // Meload model/Dashboard_Model.php
        $this->load->model('dashboard_model');
    }

    // Halaman Dashboard User
    public function index()
    {   
        // Mengambil data dari model
        $data['product'] = $this->dashboard_model->getAllProduct();
        $data['category'] = $this->dashboard_model->getAllCategory();

        // Meload view Dashboard
        $this->load->view('dashboard/layouts/header');
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar',$data);
        $this->load->view('dashboard/index',$data);
        $this->load->view('dashboard/layouts/footer');
    }


    // Halaman category dengan parameter default
    public function category($category)
    {
        // Mengambil data dari model
        $data['product'] = $this->dashboard_model->getAllProduct($category);
        $data['category'] = $this->dashboard_model->getAllCategory();

        // Meload view Dashboard
        $this->load->view('dashboard/layouts/header');
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('dashboard/layouts/footer');
    }

    // Halaman cari product
    public function search()
    {   
        $keyword = htmlspecialchars($this->input->get('keyword', true));
        // Mengambil data dari model
        $data['product'] = $this->dashboard_model->searchProduct($keyword);
        $data['category'] = $this->dashboard_model->getAllCategory();

        // Meload view Dashboard
        $this->load->view('dashboard/layouts/header');
        $this->load->view('dashboard/layouts/navbar');
        $this->load->view('dashboard/layouts/sidebar', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('dashboard/layouts/footer');
    }
}
