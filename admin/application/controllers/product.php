<?php

class product extends Controller {

    public function __construct() {
        parent::Controller();
        common::is_logged();
        $this->load->Model('mod_product');
    }
    function index() {
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array("Item Code","Category Name", "Product Name","Brand", "Image","Quantity and Price","Product Type", "status");
        $gridColumnModel = array(
            array("name" => "item_code",
                "index" => "item_code",
                "width" => 120,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "category_name",
                "index" => "category_name",
                "width" => 120,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),

            array("name" => "product_name",
                "index" => "product_name",
                "width" => 120,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "brand",
                "index" => "brand",
                "width" => 120,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "image",
                "index" => "image",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "price",
                "index" => "price",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "product_type",
                "index" => "product_type",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 80,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions('Manage Product Information', 880, 350, "product_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=product&m=load_all_product&category_name=' . $_POST['category_name'] . '&product_name=' . $_POST['product_name'] . '&status=' . $_POST['status']), true);
        } else {
            $gridObj->setGridOptions("All Product", 880, 350, "product_id", "desc", $gridColumn, $gridColumnModel, site_url('product/load_all_product'), true);
        }
        $data['nav_array'] = array(
            array('title' => 'All Product', 'url' => '')
        );
        $data['menu'] = true;
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'product';
        $data['page'] = 'product_index';
        $data['title'] = 'Product List';
        $this->load->view('main', $data);
    }

    function load_all_product() {
        $this->mod_product->get_all_product();
    }

    function add_product() {
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_product')) {
                $this->mod_product->add_product();
                $this->session->set_flashdata('msg', 'Product added Successfully!!!');
                redirect('product');
                }
        }
        $data['nav_array'] = array(
            array('title' => 'Manage Products', 'url' => site_url('product')),
            array('title' => 'Add New Products', 'url' => '')
        );
        $data['sub_category_option'] = $this->mod_product->sub_category_option($_POST['category_id']);
        $data['action'] = 'product/add_product';
        $data['dir'] = 'product';
        $data['page'] = 'product_form';
        $data['title'] = 'Add New Products';
        $this->load->view('main', $data);
    }



    function edit_product($product_id='') {
        $data['product_data'] = sql::row("product", "product_id=$product_id");
        $image = $data['product_data']['image'];
        $data['price_table_info']=sql::rows("product_price","product_id=$product_id");
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_product')) {
                $this->mod_product->update_product($product_id, $image);
                $this->session->set_flashdata('msg', 'Product Updated Successfully!!!');
                redirect('product');
            }
        }
     //   echo $data['product_data']['p_main_cat_id'];exit;
        $data['editor'] = false;
        $data['sub_category_option'] = $this->mod_product->sub_category_option($data['product_data']['p_main_cat_id']);
        //print_r($data['sub_category_option']);exit();
        //$data['sub_category']=sql::row("product","product_id=$product_id");
        $data['action'] = 'product/edit_product/' .$product_id;
        $data['dir'] = 'product';
        $data['title'] = 'Edit Product';
        $data['page'] = 'edit_product';
        $this->load->view('main', $data);
    }

    function delete_product($product_id='') {
        $this->db->query("update product set delete_status=1 where product_id='$product_id'");
        $this->session->set_flashdata("msg", "Content Deleted Successfully");
        redirect("product");
    }

    function product_status_update($status='', $product_id='') {
        $this->db->query("update product set p_status='$status' where product_id='$product_id'");
        $this->session->set_flashdata('msg', 'Status Changed Successfully');
        redirect("product");
    }

}
?>