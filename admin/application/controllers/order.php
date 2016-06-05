<?php

class order extends Controller {

    function __construct() {
        parent::Controller();
        common::is_logged();
        $this->load->model('mod_order');
    }

    function index() {
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('User Name', 'Total Order Item', 'Total amount', 'Order Time', 'Payment Status','Delivered Status');
        $gridColumnModel = array(
            array("name" => "user_username",
                "index" => "user_username",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "total_quantity",
                "index" => "total_quantity",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "totalOrder",
                "index" => "totalOrder",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "orderTime",
                "index" => "orderTime",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "orderPaymentStatus",
                "index" => "orderPaymentStatus",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => false
            ),
            array("name" => "orderDelivered",
                "index" => "orderDelivered",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            )
        );
        if ($_POST['search']) {

            $gridObj->setGridOptions("All Customer List", 880, 250, "order_id", "desc", $gridColumn, $gridColumnModel, site_url("?c=order&m=load_all_order&name={$_POST['name']}&status={$_POST['status']}"), true);
        } else {
            $gridObj->setGridOptions("All Customer List", 880, 250, "order_id", "desc", $gridColumn, $gridColumnModel, site_url("order/load_all_order"), true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['nav_array'] = array(
            array('title' => 'Customer List', 'url' => '')
        );
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'order';
        $data['page'] = 'index';
        $data['title'] = 'Order List';
        $this->load->view('main', $data);
    }

    function load_all_order() {
        $this->mod_order->get_all_order();
    }

    function delete_order($order_id='') {
        if ($order_id == '') {
            redirect('order');
        }
        sql::delete("orders", "order_id=$order_id");
        $this->session->set_flashdata('msg', 'Order Deleted Successfully!!!');
        redirect('order');
    }

    function paid($order_id='') {
        $this->db->query("update orders set orderPaymentStatus=1 where order_id='$order_id'");
        $this->session->set_flashdata('msg', 'Amount Paid');
        redirect("order");
    }

    function delivered($order_id='') {
        $this->db->query("update orders set orderDelivered=1 where order_id='$order_id'");
        $this->session->set_flashdata('msg', 'Items Delivered Successfully');
        redirect("order");
    }

    function print_view($order_id='', $dir=true) {
        $data= sql::row('orders', 'order_id=' . $order_id);
        $session_id=$data['orderSessionId'];
        $data['cart']=sql::rows("shopping_cart","session_id='$session_id'");
        $data['shipping_detail']=sql::row("shipping_detail","shi_session_id='$session_id'");
        $data['title'] = 'Order details';
        $data['dir'] = 'order';
        $data['page_title'] = 'Print Priview Data';
        $data['action'] ='order/print_view'.'/'.$order_id;
        $data['page'] = 'detail';
        $this->load->view('print_main', $data);
    }

}
?>
