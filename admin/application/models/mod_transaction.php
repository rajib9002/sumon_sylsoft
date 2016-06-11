<?php

class mod_transaction extends Model {

    public function __construct() {
        parent::Model();
    }
    function get_transaction_grid() {
        $sortname = common::getVar('sidx', 'name');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $field = $_REQUEST['searchField'];
        $value = $_REQUEST['searchValue'];
        $con = " where 1";
        if ($_REQUEST['name'])
            $con.=" and user.user_username like '%$_REQUEST[name]%'";
        
        $sql = "select transaction.*,user.user_username,user.user_id from transaction left join user on user.user_id=transaction.user_id $con $sort";
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = count($query->result_array());
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 1;
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
            $responce->rows[$i]['id'] = $row['transaction_id'];
            $status = $row['paypal_status'] == 1 ? 'Success Paypal' : 'Error';
            $type = $row['recharge_type'] == 1 ? 'Pre Paid' : 'Post Paid';
            $total_amount+=$row['transaction_amount'];
            $responce->rows[$i]['cell'] = array($row['transaction_date'], $row['user_username'],$row['transaction_amount'].'$',$status);
            $i++;
        }
        $responce->userdata['user_username'] = "Total: ";
        $responce->userdata['transaction_amount'] = number_format($total_amount, 2, '.', ',').'$';
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Author: Shoumitra Dhar Sunny");
        header("Email: suned_p@yahoo.com");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }



    function agent_transaction_grid() {
        $sortname = common::getVar('sidx', 'date');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $field = $_REQUEST['searchField'];
        $value = $_REQUEST['searchValue'];
        $con = " where 1";
        if ($_REQUEST['name'])
            $con.=" and agent_transaction.agent_name like '%$_REQUEST[name]%'";
        if ($_REQUEST['date_from'] && $_REQUEST['date_to']) {
            $fdate = $_REQUEST['date_from'];
            $tdate = $_REQUEST['date_to'];
            $con.=" and agent_transaction.date between '$fdate' and '$tdate'";
        }

        $sql = "select * from agent_transaction $con";
        $page = common::getVar('page', 1);
        $limit = common::getVar('rows');
        $i = 0;
        $query = $this->db->query($sql);
        $count = count($query->result_array());
        if ($count > 0) {
            $total_pages = ceil($count / $limit);
        } else {
            $total_pages = 1;
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
            $responce->rows[$i]['id'] = $row['agent_transaction_id'];
            $status = $row['agent_transaction_status'] == 1 ? 'Pay Amount' : 'Withdraw';
            $giving_amount+=$row['giving_amount'];
            $withdraw_amount+=$row['withdraw_amount'];
            $responce->rows[$i]['cell'] = array($row['date'], $row['agent_name'],$row['giving_amount'].' '.'BDT',$row['withdraw_amount'].' '.'BDT',$status);
            $i++;
        }
        $total_amount=$giving_amount-$withdraw_amount;
        $responce->userdata['agent_name'] = "Total: ".number_format($total_amount, 2, '.', ',').' '.'BDT';
        $responce->userdata['giving_amount'] = number_format($giving_amount, 4, '.', ',').' '.'BDT';
        $responce->userdata['withdraw_amount'] = number_format($withdraw_amount, 4, '.', ',').' '.'BDT';
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Author: Shoumitra Dhar Sunny");
        header("Email: suned_p@yahoo.com");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }


  

}

?>