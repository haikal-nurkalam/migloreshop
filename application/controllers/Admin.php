<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // Fungsi yang selalu di jalankan pada controller ini
    public function __construct()
    {   
        parent::__construct();

        // Cek jika admin yang login 
        if ($this->session->userdata('role') != 1) {
            redirect(base_url());
        }

        $this->load->model('admin_model');
    }

    // Dashboard admin
    public function index()
    {
        // Info Data
        $data['user'] = $this->admin_model->getNumRowsUser();
        $data['order'] = $this->admin_model->getNumRowsOrder();
        $data['product'] = $this->admin_model->getNumRowsProduct();
        $data['wishlist'] = $this->admin_model->getNumRowsWish();

        // Statistik
        $data['statistik'] = $this->admin_model->getStatistikOrder();
        
        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/navbar');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/index',$data);
        $this->load->view('admin/layouts/footer');
    }

    // Halaman management produk
    public function product()
    {   
        // tampilkan produk maksimal 10 teratas
        $data['product'] = $this->admin_model->getTopProduct();

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/navbar');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/addProduct',$data);
        $this->load->view('admin/layouts/footer');
    }

    // search product system
    public function search()
    {
        $keyword = htmlspecialchars($this->input->get('keyword', true));
        
        // Mengambil data dari model
        $data['product'] = $this->admin_model->getProductByKey($keyword);

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/navbar');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/addProduct', $data);
        $this->load->view('admin/layouts/footer');
    }

    // Add Product System
    public function addProduct()
    {

        // Pengecekan input
        $this->form_validation->set_rules('product_name', '"Product Name"', 'required|min_length[5]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules('product_price', '"Product Price"', 'numeric|required|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('product_stock', '"Product Stok"', 'numeric|required|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('product_desc', '"Description"', 'required|min_length[5]|max_length[250]|encode_php_tags');

        if ($this->form_validation->run() !== FALSE) {
            $input['product_name'] = htmlspecialchars($this->input->post('product_name', true));
            $input['product_category'] = htmlspecialchars($this->input->post('product_category',true));
            $input['product_price'] = htmlspecialchars($this->input->post('product_price', true));
            $input['product_stock'] = htmlspecialchars($this->input->post('product_stock', true));
            $input['product_img'] = $this->_upload()['file_name'];
            $input['product_desc'] = htmlspecialchars($this->input->post('product_desc', true));
            $this->admin_model->add_Product($input);

            $this->load->view('admin/layouts/form_success');
        } else {
            $this->product();
        }
    }

    // Upload Image System
    private function _upload()
    {
        $config['upload_path']          = './assets/product/img/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['overwrite']            = true;
        $config['max_size']             = 2024; // 2MB
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

    // delete product system
     public function delete($id) 
    {
        $this->admin_model->_delete($id);
    }

    // get value edit product system
    public function getEdit($id)
    {
        echo json_encode($this->admin_model->get_edit($id));
    }

    // Edit product system
    public function edit($id)
    {
        // Pengecekan input
        $this->form_validation->set_rules('product_name', '"Product Name"', 'required|min_length[5]|max_length[50]|encode_php_tags');
        $this->form_validation->set_rules('product_price', '"Product Price"', 'numeric|required|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('product_stock', '"Product Stok"', 'numeric|required|max_length[52]|encode_php_tags');
        $this->form_validation->set_rules('product_desc', '"Description"', 'required|min_length[5]|max_length[250]|encode_php_tags');

        if ($this->form_validation->run() !== FALSE) {
            $input['product_id'] = $id;
            $input['product_name'] = $this->input->post('product_name', true);
            $input['product_category'] = htmlspecialchars($this->input->post('product_category', true));
            $input['product_price'] = htmlspecialchars($this->input->post('product_price', true));
            $input['product_stock'] = htmlspecialchars($this->input->post('product_stock', true));
            $input['product_desc'] = $this->input->post('product_desc', true);
            
            // CEK GAMBAR
            if ($_FILES['cover']['error'] === 0) {
                $input['product_img'] = $this->_upload()['file_name'];
            } else {
                $input['product_img'] = null;
            }
            $this->admin_model->edit_Product($input);
            $this->product();
        } else {
            $this->product();
        }
    }

    // Order Page
    public function order()
    {   
        // Get all order list
        $data['all_order'] = $this->admin_model->oderList();

        $this->load->view('admin/layouts/header');
        $this->load->view('admin/layouts/navbar');
        $this->load->view('admin/layouts/sidebar');
        $this->load->view('admin/order',$data);
        $this->load->view('admin/layouts/footer');
    }

    // Print order 
    public function print($id)
    {
        // Get all order list
        $data['order'] = $this->admin_model->oderListId($id);
        $data['address'] = $this->admin_model->addressInfo($id);

        $this->load->view('admin/print', $data);
    }

    // Sending status
    public function sending($id)
    {
        $this->admin_model->sending($id);
        redirect($_SERVER['HTTP_REFERER']);
    }
}
