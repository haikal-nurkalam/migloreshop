<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_Model extends CI_Model {
    
    // Dapatkan user detail berdasarkan id
    public function getUserInfo($id)
    {
        return $this->db->get_where('user',array('user_id'=>$id))->row_array();
    }

    // Ambil semua wishlist user
    public function getlMyWish($id)
    {
        $this->db->select('*');
        $this->db->from('wishlist');
        $this->db->join('product', 'product.product_id = wishlist.product_id');
        $this->db->where('user_id', $id);
        return $this->db->get()->result_array();

        // SELECT * FROM wishlist JOIN porduct ON product.product_id = wishlist.product_id
    }

    // Edit biodata user
    public function editBio($input)
    {
        $data = [
            'user_full_name' => $input['fullname'],
            'user_birth_date' => $input['date_birth'],
            'user_gender' => $input['gender']
        ];

        $this->db->where('user_id', $input['user_id']);
        $this->db->update('user', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Edit gambar profile user
    public function editImage($input)
    {
        $data = [
            'user_img' => $input['user_img']
        ];

        $this->db->where('user_id',$input['user_id']);
        $this->db->update('user', $data);

        $this->session->set_userdata('cover_img', $input['user_img']);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Add New Address
    public function addAddress($input)
    {
        $data = [
            'address_id' => null,
            'address_name' => $input['accepter'],
            'address_provinsi' => $input['prov'],
            'address_kota' => $input['kota'],
            'address_alamat' => $input['address'],
            'address_phone' => $input['phone'],
            'address_zip_code' => $input['zip_code'],
            'address_user' => $input['user_address']
        ];
        $this->db->insert('address',$data);
    }

    // Get All Provinsi 
    public function getAllProv()
    {
        return $this->db->get('provinsi')->result_array();
    }

    // Gel all kota by id
    public function getKotaById($id)
    {
        return $this->db->get_where('kabupaten',array('id_prov'=>$id))->result_array();
    }

    // Get all address user by id
    public function getAllAddress($id)
    {
        return $this->db->get_where('address',array('address_user'=>$id));
    }

    // Get all oder list by type
    public function oderList($user,$status)
    {
        if ($status == 0) {
            $this->db->select('*');
            $this->db->from('order_list');
            $this->db->join('product', 'product.product_id = order_list.order_product_id');
            $this->db->where('oder_user_id', $user);
            return $this->db->get();
        } 
        elseif ($status == 3) {
            $this->db->select('*');
            $this->db->from('order_list');
            $this->db->join('product', 'product.product_id = order_list.order_product_id');
            $this->db->where('oder_user_id', $user);
            $this->db->where('order_status', 3);
            $this->db->or_where('order_status', 4);
            return $this->db->get();
        } else  {
            $this->db->select('*');
            $this->db->from('order_list');
            $this->db->join('product', 'product.product_id = order_list.order_product_id');
            $this->db->where('oder_user_id', $user);
            $this->db->where('order_status', $status);
            return $this->db->get();
        }
    }

    // Get order list by id 
    public function oderListId($id)
    {
        $this->db->from('order_list');
        $this->db->select('*');
        $this->db->join('product', 'product.product_id = order_list.order_product_id');
        $this->db->where('oder_user_id', $this->session->userdata('user_id'));
        $this->db->where('order_id', $id);
        return $this->db->get()->row_array();
    }
}