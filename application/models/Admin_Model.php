<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Model extends CI_Model
{

    // Hitung semua user di database
    public function getNumRowsUser() {
        return $this->db->get('user')->num_rows();
    }

    // Hitung semua Order di database
    public function getNumRowsOrder()
    {
        return $this->db->get('order_list')->num_rows();
    }

    // Hitung semua Product di database
    public function getNumRowsProduct()
    {
        return $this->db->get('product')->num_rows();
    }

    // Hitung semua Product di database
    public function getNumRowsWish()
    {
        return $this->db->get('wishlist')->num_rows();
    }

    public function getStatistikOrder()
    {
        $this->db->select('order_id, month, count(month) as cnt');
        $this->db->group_by(array("month"))->having("cnt > 1", null, false);
        $q = $this->db->get('order_list')->result_array();
        
        $month = array('1' => 0);;
        for ($i = 1; $i < 12; $i++) {
            array_push($month, 0);
        }

        // Set month value
        for ($i = 0; $i < count($q); $i++) {
            for ($z = 1; $z <= 12; $z++) {
                if ($z == $q[$i]['month']) {
                    $month[$z] = $q[$i]['cnt'];
                }
            }
        }
        
       return $month;
    }
    
    // ambil produk 10 teratas
    public function getTopProduct() {
        return $this->db->order_by('product_purchased','DESC')->get('product');
    }

    public function add_Product($input) {
        $data = [
            'product_id' => null,
            'product_name' => $input['product_name'],
            'product_category' => $input['product_category'],
            'product_price' => $input['product_price'],
            'product_stock' => $input['product_stock'],
            'product_img' => $input['product_img'],
            'product_desc' => $input['product_desc'],
            'product_rating' => 0,
            'product_purchased' => 0,
            'product_created_at' => null,
            'product_update_at' => null
        ];
        $this->db->insert('product',$data);
    }

    // Delete product function
    public function _delete($id)
    {
        $this->db->delete('product',array('product_id'=>$id));
    }

    // Edit product function
    public function get_edit($id)
    {
        return $this->db->get_where('product',array('product_id'=>$id))->row_array();
    }

    // edit product function 
    public function edit_Product($input) {
        $data = [
            'product_name' => $input['product_name'],
            'product_category' => $input['product_category'],
            'product_price' => $input['product_price'],
            'product_stock' => $input['product_stock'],
            'product_desc' => $input['product_desc'],
            'product_update_at' => date('Y-m-d H:i:s')
        ];

        if ($input['product_img'] != null) {
            $data['product_img'] = $input['product_img'];
        }

        $this->db->where('product_id', $input['product_id']);
        $this->db->update('product', $data);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // Search product where name like keyword
    public function getProductByKey($key)
    {
        return $this->db->like('product_name',$key)->get('product');
    }

    // oderList
    public function oderList()
    {
        return $this->db->get('order_list');
    }

    // Get info spesifik
    public function oderListId($id)
    {
        $this->db->from('order_list');
        $this->db->join('product', 'product.product_id = order_list.order_product_id');
        $this->db->where('order_id', $id);
        return $this->db->get()->row_array();
    } 
    // Get address Info
    public function addressInfo($id)
    {
        $this->db->from('order_list');
        $this->db->join('address', 'address.address_id = order_list.order_address_id');
        $this->db->where('order_id', $id);
        return $this->db->get()->row_array();
    }

    // Sending status
    public function sending($id)
    {
        // Pengurangan Produk
        $this->db->from('order_list');
        $this->db->join('product', 'product.product_id = order_list.order_product_id');
        // $this->db->join('address', 'address.address_id = order_list.order_address_id');
        $this->db->where('order_id', $id);
        $q = $this->db->get()->row_array();

        $data1 = [
            'product_stock' => $q['product_stock'] - $q['order_product_purchased'],
            'product_purchased' => $q['product_purchased'] + 1
        ];
        $this->db->where('product_id', $q['product_id']);
        $this->db->update('product', $data1);

        // Konfirmasi Pesanan
        $data2 = [
            'order_status' => 2
        ];
        $this->db->where('order_id', $id);
        $this->db->update('order_list', $data2);

    }
    
}