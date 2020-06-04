<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product_Model extends CI_Model
{
    // Mencari product berdasarkan id
    public function get_Product_detail($id) 
    {
        if (filter_var($id, FILTER_VALIDATE_INT) == true && $id != null) {
            $q = $this->db->get_where('product',array('product_id'=>$id));
            if ($q->num_rows()>0) {
                return $q;
            } else {
                redirect(base_url());
                exit;
            }
        } else {
            redirect(base_url());
            exit;
        }
    }

    // Get all review
    public function getReview($id)
    {
        return $this->db->get_where('ulasan',array('ulasan_product_id'=>$id));
    }
}