<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{
    // Ambil semua produk dari database
    public function getAllProduct($type = 0)
    {    
        if(filter_var($type, FILTER_VALIDATE_INT) == true && $type != 0) {
            return $this->db->get_where('product',array('product_category'=>$type));
        } else {
            return $this->db->get('product');
        }
    }

    public function searchProduct($keyword) 
    {
        $keyword = filter_var(htmlspecialchars($keyword));
        return $this->db->like('product_name',$keyword)->get('product');
    }

    // Ambil semua kategori dari database
    public function getAllCategory()
    {
        return $this->db->get('category')->result_array();
    }

    
}