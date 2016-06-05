<?php

class product extends Controller {

    public function __construct() {
        parent::Controller();
        $this->load->Model("mod_home");
        $this->load->Model("mod_product");
    }

    function special_product() {
        $this->load->library('pagination');
        $start = $this->uri->segment(3);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('product/special_product');
        $config['total_rows'] = count($this->mod_product->get_special_product($con));
        $config['per_page'] = 9;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_product'] = $this->mod_product->get_special_product($con, "limit $start,{$config['per_page']}"); //Don't Change
        // print_r($data['all_product']);exit();
        if (count($data['all_product']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_product']);
        $data['total'] = $config['total_rows'];
        $data['condition'] = 'special_product';
        $data['title'] = 'Special Product';
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $this->load->view("main", $data);
    }

    function all_product() {
        $this->load->library('pagination');
        $start = $this->uri->segment(3);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('product/all_product');
        $config['total_rows'] = count($this->mod_product->get_all_product($con));
        $config['per_page'] = 9;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_product'] = $this->mod_product->get_all_product($con, "limit $start,{$config['per_page']}"); //Don't Change

        if (count($data['all_product']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_product']);
        $data['total'] = $config['total_rows'];
        $data['condition'] = 'all_product';
        $data['title'] = 'All Product';
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $this->load->view("main", $data);
    }

    function new_product() {
        $this->load->library('pagination');
        $start = $this->uri->segment(3);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 3;
        $config['base_url'] = site_url('product/new_product');
        $config['total_rows'] = count($this->mod_product->get_new_product($con));
        $config['per_page'] = 9;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_product'] = $this->mod_product->get_new_product($con, "limit $start,{$config['per_page']}"); //Don't Change

        if (count($data['all_product']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_product']);
        $data['total'] = $config['total_rows'];

        //$data['all_product'] = $this->mod_product->get_new_product();
        $data['condition'] = 'new_product';
        $data['title'] = 'New Product';
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $this->load->view("main", $data);
    }

    function sub_cat_list($id='', $key='all') {
        $data['sub_cat_list'] = sql::rows("product_category", "parent_id=$id");
        $data['hidden_list'] = sql::row("product_category", "id=$id");
//print_r($data['hidden_list']);exit();
        $data['hidden_value'] = $data['hidden_list']['hidden'];
        //print_r($data['hidden_value']);exit;

        if ($data['hidden_value'] == 0) {

//            if (count($data['sub_cat_list']) > 0) {
//                $data['title'] = 'Sub Category List';
//                $data['dir'] = 'product';
//                $data['page'] = 'load_sub_cat';
//                $this->load->view("main", $data);
//            } //else {

                $this->load->library('pagination');
                $start = $this->uri->segment(5);
                $con = 1;
                if (!is_numeric($start)) {
                    $start = 0;
                }
                $config['uri_segment'] = 5;
                $config['base_url'] = site_url('product/sub_cat_list/' . $id . '/' . $key);
                $config['total_rows'] = count($this->mod_product->get_sub_product($con, $id, $key));
                $config['per_page'] = 9;
                $config['next_link'] = "Next &raquo;";
                $config['prev_link'] = "&laquo; Previous";
                $config['page_query_string'] = false;
                $this->pagination->initialize($config);
                $data['pagination_links'] = $this->pagination->create_links();

                $data['all_product'] = $this->mod_product->get_sub_product($con, $id, $key, "limit $start,{$config['per_page']}"); //Don't Change

                if (count($data['all_product']) > 0) {
                    $data['start'] = $start + 1;
                } else {
                    $data['start'] = 0;
                }
                $data['end'] = $start + count($data['all_product']);
                $data['total'] = $config['total_rows'];

                //$data['all_product'] = sql::rows("product","p_main_cat_id=$id");

                $data['sub_id'] = $id;
                $data['condition'] = 'sub_cat_product';
                $data['title'] = 'Sub Product';
                $data['dir'] = 'home';
                $data['page'] = 'cat_product';
                $this->load->view("main", $data);
            //}
        }
//        elseif ($data['hidden_value'] == 2) {
//            $data['title'] = 'Sub Category List';
//                $data['dir'] = 'product';
//                $data['page'] = 'load_incense_cat';
//                $this->load->view("main", $data);
//        }

        else {
            $this->load->library('pagination');
            $start = $this->uri->segment(5);
            $con = 1;
            if (!is_numeric($start)) {
                $start = 0;
            }
            $config['uri_segment'] = 5;
            $config['base_url'] = site_url('product/sub_cat_list/' . $id . '/' . $key);

            $config['total_rows'] = count($this->mod_product->get_sub_product($con, $id, $key));
            $config['per_page'] = 50;
            $config['next_link'] = "Next &raquo;";
            $config['prev_link'] = "&laquo; Previous";
            $config['page_query_string'] = false;
            $this->pagination->initialize($config);
            $data['pagination_links'] = $this->pagination->create_links();

            $data['all_product'] = $this->mod_product->get_sub_product($con, $id, $key, "limit $start,{$config['per_page']}"); //Don't Change

            if (count($data['all_product']) > 0) {
                $data['start'] = $start + 1;
            } else {
                $data['start'] = 0;
            }
            $data['end'] = $start + count($data['all_product']);
            $data['total'] = $config['total_rows'];

            //$data['all_product'] = sql::rows("product","p_main_cat_id=$id");

            $data['sub_id'] = $id;
            $data['condition'] = 'sub_cat_product';
            $data['title'] = 'Sub Product';
            $data['dir'] = 'home';
            $data['page'] = 'body_oil';
            $this->load->view("main", $data);
        }
    }

    function brand_list($id=''){
        $data['all_brand']=sql::rows("product","p_main_cat_id=$id");
        $data['condition'] = 'brand_list';
        $data['title'] = 'Brand List';
        $data['dir'] = 'product';
        $data['page'] = 'brand_list';
        $this->load->view("main", $data);
    }



    function brand_product($name=''){
       $this->load->library('pagination');
        $start = $this->uri->segment(4);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('product/brand_product/' . $name);
        $config['total_rows'] = count($this->mod_product->get_brand_product_pagi($con, $name));
        $config['per_page'] = 9;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_product'] = $this->mod_product->get_brand_product_pagi($con, $name, "limit $start,{$config['per_page']}"); //Don't Change

        if (count($data['all_product']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_product']);
        $data['total'] = $config['total_rows'];

        //      //$data['all_product'] = sql::rows("product","p_main_cat_id=$id");
        $data['sub_id'] = $id;
        $data['condition'] = 'brand_product';
        $data['title'] = 'Brand Product';
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $this->load->view("main", $data);
    }


    function sub_cat_product($id='') {
        $this->load->library('pagination');
        $start = $this->uri->segment(4);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('product/sub_cat_product/' . $id);
        $config['total_rows'] = count($this->mod_product->get_sub_product_pagi($con, $id));
        $config['per_page'] = 9;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_product'] = $this->mod_product->get_sub_product_pagi($con, $id, "limit $start,{$config['per_page']}"); //Don't Change

        if (count($data['all_product']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_product']);
        $data['total'] = $config['total_rows'];

        //      //$data['all_product'] = sql::rows("product","p_main_cat_id=$id");
        $data['sub_id'] = $id;
        $data['condition'] = 'sub_cat_product';
        $data['title'] = 'Sub Product';
        $data['dir'] = 'home';
        $data['page'] = 'cat_product';
        $this->load->view("main", $data);
    }

    function product_des($product_id='', $p_main_cat_id='') {
        $this->load->library('pagination');
        $start = $this->uri->segment(5);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 5;
        $config['base_url'] = site_url('product/product_des/' . $product_id . '/' . $p_main_cat_id);
        $config['total_rows'] = count($this->mod_product->get_same_cat_product($con, $p_main_cat_id));
        $config['per_page'] = 6;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_product'] = $this->mod_product->get_same_cat_product($con, $p_main_cat_id, "limit $start,{$config['per_page']}"); //Don't Change

        if (count($data['all_product']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_product']);
        $data['total'] = $config['total_rows'];



        //$data['all_product'] = $this->mod_product->get_same_cat_product($p_main_cat_id);



        $data['product_detail'] = sql::row("product", "product_id=$product_id");
        $data['multiple_data'] = sql::rows("product_price", "product_id=$product_id");
        $data['condition'] = 'des_product';
        $data['title'] = 'Product Description';
        $data['dir'] = 'product';
        $data['page'] = 'product_des';
        $this->load->view("main", $data);
    }

    function details($product_id='', $p_main_cat_id='') {
        $this->load->library('pagination');
        $start = $this->uri->segment(5);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 5;
        $config['base_url'] = site_url('product/details/' . $product_id . '/' . $p_main_cat_id);
        $config['total_rows'] = count($this->mod_product->get_special_more_product($con));
        $config['per_page'] = 6;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_product'] = $this->mod_product->get_special_more_product($con, "limit $start,{$config['per_page']}"); //Don't Change

        if (count($data['all_product']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_product']);
        $data['total'] = $config['total_rows'];






        //$data['all_product'] = $this->mod_product->get_special_more_product($pro_type);
        $data['product_detail'] = sql::row("product", "product_id=$product_id");
        $pro_type = $data['product_detail']['pro_type'];
        $data['multiple_data'] = sql::rows("product_price", "product_id=$product_id");
        $data['condition'] = 'des_product';
        $data['title'] = 'Product Description';
        $data['dir'] = 'product';
        $data['page'] = 'product_des';
        $this->load->view("main", $data);
    }

//   start cart program

    function add_item() {
        $session_id = $this->session->userdata('session_id');
        if ($_POST['quantity'] > 0 && !$this->is_add_to_cart($_POST['product_id'], $session_id)) {
            $product = $this->mod_product->get_products($_POST['product_id']);

            $price_id = $_POST['price_id'];
            $product_price = sql::row("product_price", "product_price_id=$price_id");

            $item_id = $_POST['product_id'];
            $item_name = $product['product_name'];
            $item_desc = $product['description'];

            $field_quantity = $_POST['quantity'];

            $size = $product_price['size'];
            $unit = $product_price['unit'];

            $item_quantity = $field_quantity * $size;

            $price = $product_price['price'];

            //$item_price = $field_quantity * $price * $size;
            $item_price = $field_quantity * $price;

            $sql = "insert into shopping_cart set item_id='$item_id',item_name='$item_name',item_desc='$item_desc',item_quantity='$item_quantity',item_unit='$unit',item_price='$item_price',session_id='$session_id'";
            $this->db->query($sql);
            echo $this->mod_product->cart_ajax_itme();
        } elseif ($_POST['quantity'] > 0 && $this->is_add_to_cart($_POST['product_id'], $session_id)) {
            $product = $this->mod_product->get_products($_POST['product_id']);

            $price_id = $_POST['price_id'];
            $product_price = sql::row("product_price", "product_price_id=$price_id");

            $item_id = $_POST['product_id'];
            $item_name = $product['product_name'];
            $item_desc = $product['description'];

            $field_quantity = $_POST['quantity'];

            $size = $product_price['size'];
            $unit = $product_price['unit'];

            $item_quantity = $field_quantity * $size;

            $price = $product_price['price'];

            $item_price = $field_quantity * $price;

            $sql = "update shopping_cart set item_name='$item_name',item_desc='$item_desc',item_quantity='$item_quantity',item_unit='$unit',item_price='$item_price' where item_id='$item_id'";
            $this->db->query($sql);
            echo $this->mod_product->cart_ajax_itme();
        }



//        else
//            echo $this->mod_product->cart_ajax_itme();
    }

    /* checking the multiple order. If it is ordered already */

    function is_add_to_cart($id, $sess_id) {
        $sql = "select count(*) as total from shopping_cart where session_id='$sess_id' and item_id='$id' and is_checkout='0'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        return $row['total'];
    }

    /* Checking the order if it is ordered */

    function view_cart() {
        if ($_REQUEST['update_cart'] == "update") {
            for ($i = 0; $i < count($_REQUEST['cartid']); $i++) {
                if ($_REQUEST['quantity'][$i] == 0) {
                    $id = $_REQUEST['cartid'][$i];
                    $sql = "delete from shopping_cart where cart_id='$id'";
                    $this->db->query($sql);
                } else {
                    $id = $_REQUEST['itemid'][$i];
                    $cid = $_REQUEST['cartid'][$i];

                    $qnt = $_REQUEST['quantity'][$i];
                    $query = $this->db->query("select * from shopping_cart where cart_id='$cid'");
                    $row = $query->row_array();
                    $item_price = $row['item_price'] / $row['item_quantity'];
                    $price = $qnt * $item_price;
                    $new_price = $price;
                    $sql = "update shopping_cart set item_quantity='$qnt',
                    item_price='$new_price' where cart_id='$cid'";
                    $this->db->query($sql);
                }
            }
            redirect("product/view_cart");
        }
        $data['cart'] = $this->mod_product->cart_detail();
        $data['dir'] = 'product';
        $data['title'] = 'View Cart';
        $data['page'] = 'view_cart';
        $this->load->view('main', $data);
    }

    function delete_item() {
        $id = $_POST['id'];
        $this->db->query("delete from shopping_cart where cart_id='$id'");
        $session_id = $this->session->userdata('session_id');
        $sql = "select sum(item_price) as total from shopping_cart where session_id='$session_id'";
        $query = $this->db->query($sql);
        $row = $query->row_array();

        $data = common::get_settings_data();
        $shipping_rate = $data['shipping_amount'];
        $total = $row['total'];
        echo $total + $shipping_rate;
    }

    function confirm() {
        common::is_logged();
        if ($this->form_validation->run('valid_shipping_address')) {
            $ins_id = $this->mod_product->save_shipping_addrress();
            $state_name=$_POST['area_name'];

        $data['state_value']=sql::row("state","state_name='$state_name'");

        $data['shipping']=$data['state_value']['shipping_state'];

            $this->mod_product->save_order($ins_id,$data['shipping']);
            redirect("payment/checkout");
        }
         $user_id=$this->session->userdata('user_id');
		$data['user_info']=sql::row("user","user_id=$user_id");
        $data['cart'] = $this->mod_product->cart_detail();
        $data['dir'] = 'product';
        $data['page'] = 'confirm';
        $this->load->view('main', $data);
    }

    function get_search($key='all') {
        $this->load->library('pagination');
        $start = $this->uri->segment(4);
        //$con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] = 4;
        $config['base_url'] = site_url('product/get_search/' . $key . '/');
        $config['total_rows'] = count($this->mod_product->get_all_search($key));
        $config['per_page'] = 9;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_product'] = $this->mod_product->get_all_search($key, "limit $start,{$config['per_page']}"); //Don't Change

        if (count($data['all_product']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_product']);
        $data['total'] = $config['total_rows'];
        $data['dir'] = 'product';
        $data['title'] = 'Search Product';
        $data['page'] = 'search';
        $this->load->view("main", $data);
    }

    function view_order() {
        common::is_logged();
        $user_id = $this->session->userdata('user_id');
        $data['order_item'] = sql::rows("orders", "user_id=$user_id order by order_id desc");
//        print_r($data['order_item']);
//        exit();
        $data['condition'] = 'view_order';
        $data['title'] = 'Ordered Item';
        $data['dir'] = 'product';
        $data['page'] = 'order';
        $this->load->view("main", $data);
    }

    function order_details($session_id='') {
        common::is_logged();
        $data['order_details'] = sql::rows("shopping_cart", "session_id='$session_id'");
//        print_r($data['order_item']);
//        exit();
        $data['condition'] = 'order_details';
        $data['title'] = 'Ordered Details';
        $data['dir'] = 'product';
        $data['page'] = 'order_des';
        $this->load->view("main", $data);
    }

    function more($product_id='') {
//        $data['order_details']=sql::rows("shopping_cart","session_id='$session_id'");
        $data['more_detail'] = sql::row("product", "product_id=$product_id");
        $data['multi_data'] = sql::rows("product_price", "product_id=$product_id");
        $data['condition'] = 'more_fancy_box';
        $data['title'] = 'more Details';
//        $data['dir'] = 'product';
//        $data['page'] = 'more';
        $this->load->view("more", $data);
    }

}
?>