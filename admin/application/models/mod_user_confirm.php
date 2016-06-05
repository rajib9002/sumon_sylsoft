<?php

class mod_user_confirm extends Model {

    public function __construct() {
        parent::Model();
    }
    function get_all_customer() {
        $sortname = common::getVar('sidx', 'user_id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";

        $con = " where 1";
        if ($_REQUEST['name'])
            $con.=" and user_username like '%$_REQUEST[name]%'";
        if ($_REQUEST['status'] != "")
            $con.=" and user_status='$_REQUEST[status]'";

        $sql = "select * from user $con $sort";
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $tmp = $this->db->query($sql);
        $count = count($tmp->result_array());
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 5;
        }
        if ($page > $total_pages)
            $page = $total_pages;
        if ($limit < 0)
            $limit = 0;
        $start = $limit * $page - $limit;
        if ($start < 0)
            $start = 0;
        $sql_query = $this->db->query($sql . " limit $start, $limit");
        $rows = $sql_query->result_array();
        $responce->page = $page;
        $responce->total = $total_pages;
        $responce->records = $count;
        foreach ($rows as $row) {
            $status = $row['user_status'] == 1 ? 'Active' : 'Inactive';
            $user_type = $row['user_type'] == 1 ? 'Customer' : 'Customer';
            $responce->rows[$i]['id'] = $row['user_id'];
            $responce->rows[$i]['cell'] = array($row['user_first_name'] . $row['user_last_name'], $row['user_username'], $row['user_email'], $row['phone_no'], $row['address'] . '<br>Post Code:' . $row['post_code'], $row['country'],$status);
            $i++;
        }
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }

    function send_user_mail($user_id) {
        $sql = "select* from user where user_id=$user_id";
        $sql_query = $this->db->query($sql);
        $rows = $sql_query->row_array();
        $user_email = $rows['user_email'];
        $user_username = $rows['user_username'];
        common::user_account_activation($user_email, $user_username);
    }



    function update_customer($user_id='') {
        $sql = "update user set
        user_username={$this->db->escape($_POST['user_username'])},
        user_password={$this->db->escape($_POST['user_password'])},
        user_first_name={$this->db->escape($_POST['user_first_name'])},
        user_last_name={$this->db->escape($_POST['user_last_name'])},
        user_email={$this->db->escape($_POST['user_email'])},
        paypal_email={$this->db->escape($_POST['paypal_email'])},
        phone_no={$this->db->escape($_POST['phone_no'])},
        address={$this->db->escape($_POST['address'])},
        post_code={$this->db->escape($_POST['post_code'])},
        country={$this->db->escape($_POST['country'])}
        where user_id=$user_id";
        return $this->db->query($sql);
    }

    function add_balance($user_id='') {
        $sql = "select * from user where user_id=$user_id";
        $sql_query = $this->db->query($sql);
        $rows = $sql_query->row_array();
        $current_balance = $rows['current_balance'];
        $rate = $rows['rate'];
        $amount = $_POST['amount'];
        $amount_bdt = $amount * $rate;
        $update_amount = $current_balance + $amount_bdt;
        $sql1 = "update user set
        current_balance=$update_amount
        where user_id=$user_id";
        $this->db->query($sql1);

        $data = array(
            'agent_id' => $user_id,
            'agent_name' => $_POST['username'],
            'giving_amount' => $amount_bdt
        );

        $this->db->insert("agent_transaction", $data);
        return true;
    }

    function return_balance($user_id='') {
        $sql = "select * from user where user_id=$user_id";
        $sql_query = $this->db->query($sql);
        $rows = $sql_query->row_array();
        $username=$rows['user_username'];
        $current_balance = $rows['current_balance'];
        $withdraw_amount = $_POST['withdraw_balance'];
        $update_amount = $current_balance - $withdraw_amount;
        $sql1 = "update user set
        current_balance=$update_amount
        where user_id=$user_id";
        $this->db->query($sql1);

        $data = array(
            'agent_id' => $user_id,
            'agent_name'=>$username,
            'withdraw_amount' => $withdraw_amount,
            'agent_transaction_status'=>2
        );

        $this->db->insert("agent_transaction", $data);
        return true;
    }

}
?>