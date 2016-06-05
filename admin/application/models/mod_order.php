<?php

class mod_order extends Model {

    public function __construct() {
        parent::Model();
    }
    function get_all_order() {
        $sortname = common::getVar('sidx', 'order_id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";

        $con = " where 1";
        if ($_REQUEST['name'])
            $con.=" and user_username like '%$_REQUEST[name]%'";
        if ($_REQUEST['status'] != "")
            $con.=" and user_status='$_REQUEST[status]'";

        $sql = "select orders.*, user.user_id,user.user_username from orders left join
        user on user.user_id=orders.user_id $con $sort";
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
            $status = $row['orderDelivered'] == 1 ? 'Delivered' : 'Processing';
            $payment = $row['orderPaymentStatus'] == 1 ? 'Paid' : 'Pending';
            $responce->rows[$i]['id'] = $row['order_id'];
            $responce->rows[$i]['cell'] = array($row['user_username'] , $row['total_quantity'], $row['totalOrder'].'$', $row['orderTime'],$payment,$status);
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




    

}
?>