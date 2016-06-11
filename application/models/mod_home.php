<?php

class mod_home extends Model {

    public function __construct() {
        parent::Model();
    }

    function get_sub_cat($id='') {
        $sql = "SELECT * from product_category where parent_id=$id";
        $sql_query = $this->db->query($sql);
        $query = $sql_query->result_array();
        return $query;
    }
    
    function get_multiple_data($product_id='') {
        $sql = "SELECT * from product_price where product_id=$product_id";
        $sql_query = $this->db->query($sql);
        $query = $sql_query->result_array();
        return $query;
    }

    function show_featured_product($con='1', $limit='') {
        $sql = "select * from product
        where $con and pro_type=4 and p_status=1 and delete_status=0 order by product_id desc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function special_product() {
        $sql = "select * from product
        where 1 and pro_type=2 and p_status=1 and delete_status=0 order by product_id desc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
?>
