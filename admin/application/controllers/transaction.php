<?php

class transaction extends Controller {

    public function __construct() {
        parent::Controller();
         common::is_logged();
        $this->load->model('mod_transaction');
    }

    function index() {
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Date', 'Customer Name','Paypal Transaction Amount','Transaction Status');
        $gridColumnModel = array(
            array("name" => "date",
                "index" => "date",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "user_username",
                "index" => "user_username",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
             array("name" => "transaction_amount",
                "index" => "transaction_amount",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "paypal_status ",
                "index" => "paypal_status ",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage transaction", 880, 200, "transaction_id", "desc", $gridColumn, $gridColumnModel, site_url("?c=transaction&m=load_transaction&name={$_POST['name']}"), true,true,true);
        } else {
            $gridObj->setGridOptions("Manage transaction", 880, 250, "transaction_id", "desc", $gridColumn, $gridColumnModel, site_url('transaction/load_transaction'), true,true,true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['dir'] = 'transaction';
        $data['page'] = 'index';
        $this->load->view('main', $data);
    }
    function load_transaction() {                          
        $this->mod_transaction->get_transaction_grid();
    }


    function agent_transaction() {
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array('Date', 'Agent Name','Giving Amount','Withdraw Amount','Status');
        $gridColumnModel = array(
            array("name" => "date",
                "index" => "date",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
            array("name" => "agent_name",
                "index" => "agent_name",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            ),
             array("name" => "giving_amount",
                "index" => "giving_amount",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
             array("name" => "withdraw_amount",
                "index" => "withdraw_amount",
                "width" => 50,
                "sortable" => true,
                "align" => "center",
                "editable" => true
            ),
            array("name" => "agent_transaction_status ",
                "index" => "agent_transaction_status ",
                "width" => 50,
                "sortable" => true,
                "align" => "left",
                "editable" => true
            )
        );
        if ($_POST['search']) {
            $gridObj->setGridOptions("Manage Agent transaction", 880, 200, "agent_transaction_id", "desc", $gridColumn, $gridColumnModel, site_url('?c=transaction&m=load_agent_transaction&name=' . $_POST['name'] .'&date_from=' . $_POST['date_from'] . '&date_to=' . $_POST['date_to']),true,true,true);
        } else {
            $gridObj->setGridOptions("Manage Agent transaction", 880, 250, "agent_transaction_id", "desc", $gridColumn, $gridColumnModel, site_url('transaction/load_agent_transaction'), true,true,true);
        }
        $data['grid_data'] = $gridObj->getGrid();
        $data['dir'] = 'transaction';
        $data['page'] = 'agent_transaction';
        $this->load->view('main', $data);
    }
    function load_agent_transaction() {
        $this->mod_transaction->agent_transaction_grid();
    }





}

?>