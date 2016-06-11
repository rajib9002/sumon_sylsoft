<?php
class product_category extends Controller{
    function product_category() {
        parent::Controller();
        $this->load->Model('mod_product_category');
        if (common::is_logged());
    }
    function index(){
        $this->load->library('grid');
        $gridObj = new grid();
        $gridObj->cellEdit = true;
        $gridObj->cellUrl = site_url('product_category/cell_edit');
        $gridColumn = array('category_name','status','Sort');
        $gridColumnModel = array(

            array("name" => "Category Name",
                "index" => "category_name",
                "width" => 150,
                "sortable" => true,
                "align" => "left",
                "editable" => FALSE
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "sort",
                "index" => "sort",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions('Manage Product Category Information', 880, 250, "id", "desc", $gridColumn, $gridColumnModel, site_url('?c=product_category&m=load_all_product_category&category_name='. $_POST['category_name']. '&status='. $_POST['status']), true);
        } else {
        $gridObj->setGridOptions("All Categories", 880, 250, "id", "desc", $gridColumn, $gridColumnModel, site_url('product_category/load_all_product_category'), true);
        }
        $data['nav_array'] = array(
            array('title' => 'All Categories', 'url' => '')
        );
        $data['menu'] = true;
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'product_category';
        $data['page_title'] = 'Product Category';
        $data['page'] = 'product_category';
        $this->load->view('main', $data);
    }


    function load_all_product_category(){
        $this->mod_product_category->get_all_product_category();
    }

   
   function add_product_category(){
        if ($_POST['save']) {
            if ($this->form_validation->run('add_product_category')) {

                $this->mod_product_category->add_product_category();
                $this->session->set_flashdata('msg','Category added Successfully!!!');
                redirect('product_category', 'refresh');
            }
        }
        $data['sub_category_option'] = $this->mod_product_category->sub_category_option1($_POST['category_id']);
        $data['category_option'] = $this->mod_product_category->get_category_option($_POST['parent_id']);
        $data['action'] = 'product_category/add_product_category';
        $data['dir'] = 'product_category';
         $data['title']='Add Product Category';
        $data['page'] = 'add_product_category';
        $this->load->view('main', $data);
    }

    function edit_product_category($id='') {

        if ($_POST['save']) {
            if ($this->form_validation->run('add_product_category')) {
                $res = sql::row('product_category', "id=$id");
                $this->mod_product_category->update_product_category($id);

                $this->session->set_flashdata('msg', $images . ' Updates Successfully');
                redirect('product_category');
            }
        }

        $data['category_info'] = sql::row('product_category', 'id=' . $id);
        $data['sub_category_option'] = $this->mod_product_category->sub_category_option1($data['category_info']['parent_id']);
        $data['category_option'] = $this->mod_product_category->get_category_option($data['category_info']['parent_id']);
//       print_r($data['category_info']);
//       exit();
       $data['action'] = 'product_category/edit_product_category/' . $id;
        $data['dir'] = 'product_category';
        $data['title']='Edit Product Category';
        $data['page'] = 'edit_product_category';
        $this->load->view('main', $data);
    }
    function delete_product_category($product_id=''){
        if ($product_id == ''){
            common::redirect();
        }
        if (sql::delete('product_category', "id=$product_id")) {
            $this->session->set_flashdata('msg', 'Product Category Deleted Successfully!!!');
            common::redirect();
        }
    }

    function update_category_status($status='', $pr_id='') {

        if ($pr_id == '') {
            common::redirect();
        }
        $updateOp = "status='$status'";
        $con = "id=$pr_id";

        sql::change_status('product_category', $con, $updateOp);

        $this->session->set_flashdata('msg', 'Content Status Updated Successfully!!!');
        common::redirect();
    }


    function cell_edit() {
        $id = $_REQUEST['id'];
        $row = sql::row("product_category", "id='$id'");
            if ($_REQUEST['sort']) {
            $this->db->update("product_category", array('sort' => $_REQUEST['sort']), array('id' => $id));
        }
        }

}
?>
