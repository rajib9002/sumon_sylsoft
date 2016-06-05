<?php

class user_confirm extends Controller {

    function __construct() {
        parent::Controller();
        common::is_logged();
        $this->load->model('mod_user_confirm');
    }

    function index() {
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('User Full Name', 'User Name', 'User Email', 'User Phone No', 'Address', 'Country', 'User Status');
        $gridColumnModel = array(
            array("name" => "user_first_name",
                "index" => "user_first_name",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "user_username",
                "index" => "user_username",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "user_email",
                "index" => "user_email",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "phone_no",
                "index" => "phone_no",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "address",
                "index" => "address",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "country",
                "index" => "country",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "user_status",
                "index" => "user_status",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            )
        );
        if ($_POST['search']) {

            $gridObj->setGridOptions("All Customer List", 880, 250, "user_id", "desc", $gridColumn, $gridColumnModel, site_url("?c=user_confirm&m=load_all_customer&name={$_POST['name']}&status={$_POST['status']}"), true);
        } else {
            $gridObj->setGridOptions("All Customer List", 880, 250, "user_id", "desc", $gridColumn, $gridColumnModel, site_url("user_confirm/load_all_customer"), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['nav_array'] = array(
            array('title' => 'Customer List', 'url' => '')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'user_confirm';
        $data['page'] = 'customer_list';
        $data['title'] = 'Customer List';
        $this->load->view('main', $data);
    }

    function load_all_customer() {
        $this->mod_user_confirm->get_all_customer();
    }

    function delete_customer($user_id='') {
        if ($user_id == '') {
            redirect('user_confirm');
        }
        sql::delete("user", "user_id=$user_id");
        $this->session->set_flashdata('msg', 'User Deleted Successfully!!!');
        redirect('user_confirm');
    }

    function status_cus($user_status='', $user_id='') {
        $this->db->query("update user set user_status='$user_status' where user_id='$user_id'");
        $this->session->set_flashdata('msg', 'User Status Changed Successfully');
        redirect("user_confirm");
    }

    function edit_customer($user_id='') {
        if ($_POST['update']) {
            if ($this->form_validation->run('valid_customer')) {
                $new_user_id = $this->mod_user_confirm->update_customer($user_id); //Don't Change
                redirect('user_confirm');
            }
        }
        $data = sql::row('user', 'user_id=' . $user_id);
        $data['action'] = 'user_confirm/edit_customer/' . $user_id;
        $data['title'] = 'Edit Customer';
        $data['dir'] = 'user_confirm';
        $data['page'] = 'customer_form';
        $this->load->view("main", $data);
    }

}
?>
