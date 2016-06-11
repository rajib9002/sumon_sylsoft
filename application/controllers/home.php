<?php

class home extends Controller {

    public function __construct() {
        parent::Controller();
        $this->load->Model("mod_home");
        $this->load->Model("mod_product");
    }

    function index() {
//        $this->load->library('pagination');
//        $start = $this->uri->segment(3);
//        $con = 1;
//        if (!is_numeric($start)) {
//            $start = 0;
//        }
//        $config['uri_segment'] =3;
//        $config['base_url'] = site_url('home/index');
//       // $config['total_rows'] = count($this->mod_product->get_special_product($con));
//        $config['per_page'] = 9;
//        $config['next_link'] = "Next &raquo;";
//        $config['prev_link'] = "&laquo; Previous";
//        $config['page_query_string'] = false;
//        $this->pagination->initialize($config);
//        $data['pagination_links'] = $this->pagination->create_links();
//
//        //$data['all_product'] = $this->mod_product->get_special_product($con, "limit $start,{$config['per_page']}"); //Don't Change
//       // print_r($data['all_product']);exit();
//        if (count($data['all_product']) > 0) {
//            $data['start'] = $start + 1;
//        } else {
//            $data['start'] = 0;
//        }
//        $data['end'] = $start + count($data['all_product']);
//        $data['total'] = $config['total_rows'];
        $data['title'] = 'Home';
        $data['condition']='featured_product';
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $this->load->view("main", $data);
    }


    function on_sale() {
        $this->load->library('pagination');
        $start = $this->uri->segment(3);
        $con = 1;
        if (!is_numeric($start)) {
            $start = 0;
        }
        $config['uri_segment'] =3;
        $config['base_url'] = site_url('home/on_sale');
        $config['total_rows'] = count($this->mod_product->on_sale($con));
        $config['per_page'] = 9;
        $config['next_link'] = "Next &raquo;";
        $config['prev_link'] = "&laquo; Previous";
        $config['page_query_string'] = false;
        $this->pagination->initialize($config);
        $data['pagination_links'] = $this->pagination->create_links();

        $data['all_product'] = $this->mod_product->on_sale($con, "limit $start,{$config['per_page']}"); //Don't Change
       // print_r($data['all_product']);exit();
        if (count($data['all_product']) > 0) {
            $data['start'] = $start + 1;
        } else {
            $data['start'] = 0;
        }
        $data['end'] = $start + count($data['all_product']);
        $data['total'] = $config['total_rows'];
        $data['title'] = 'On sale';
        $data['condition']='on_sale';
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $this->load->view("main", $data);
    }


    function search() {
        $product_name=$_POST['product_name'];
        $data['all_product']=sql::rows("product","product_name='$product_name'");
        $data['title'] = 'Search Product';
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $this->load->view("main", $data);
    }

    function shipping_rate() {
        $data['all_rate']=sql::rows("state","status=1");
        $data['title'] = 'Shipping Rate';
        $data['dir'] = 'home';
        $data['page'] = 'shipping_rate';
        $this->load->view("main", $data);
    }

}
?>