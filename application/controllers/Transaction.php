<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller {

    // Fungsi yang selalu di jalankan pada controller ini
    function __construct()
    {
        parent::__construct();

        $this->load->model('transaction_model');
    }

    // Redirect to wa chat
    public function chat($product)
    {
        redirect('https://wa.me/6285789249656?text=Hai%20Saya%20ingin%20memesan%20' .$product. '%20apakah%20masih%20tersedia%20?');
    }

    // add to wishlist
    public function addWish($id)
    {
        if ($this->session->userdata('logged_in') !== true) {
            redirect('auth/login');
            exit;
        }
        $this->transaction_model->addWish($id);
    }

    // System payment
    public function buy()
    {
        if ($this->session->userdata('logged_in') !== true) {
            redirect('auth/login');
            exit;
        }

        $input['order_user_id'] = $this->session->userdata('user_id');
        $input['product_id'] = $this->input->post('product_id',true);
        $input['product_name'] = $this->input->post('product_name', true);
        $input['product_price'] = $this->input->post('product_price', true);
        $input['product_purchased'] = $this->input->post('product_purchased', true);
        $input['product_ongkir'] = $this->input->post('product_ongkir', true);
        $input['product_total'] = $this->input->post('product_total', true);
        $input['address'] = $this->input->post('address', true);

        $this->transaction_model->order_system($input);
    }

    // Success buy system
    public function success($id)
    {
        $this->transaction_model->order_success($id);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function review($id)
    {
        $input['product_id'] = $id;
        $input['order_id'] = $this->input->post('order_id',true);
        $input['range'] = $this->input->post('range',true);
        $input['ulasan'] = $this->input->post('ulasan',true);

        $this->transaction_model->addreview($input);
        redirect($_SERVER['HTTP_REFERER']);
    }
}