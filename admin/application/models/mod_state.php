<?php

class mod_state extends Model{

    public function __construct() {
        parent::Model();
    }


   function get_all_state(){
        $sortname = common::getVar('sidx', 'state_id');
        $sortorder = common::getVar('sord', 'desc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = "1";

        $sql = "select * from state where $con $sort";
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
            $status=$row['status']==1?'Active':'Inactive';
            $responce->rows[$i]['id'] = $row['state_id'];
            $responce->rows[$i]['cell'] = array($row['state_name'],'$'.$row['shipping_state'],$status);
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

    function add_state(){
         
        $data = array(
            'state_name'=>$_POST['state'],
            'shipping_state'=>$_POST['shipping_state']
          
        );

        $this->db->insert("state", $data);
        return true;


    
    }

    function update_state($state_id=''){
    $data = array(
            'state_name'=>$_POST['state'],
            'shipping_state'=>$_POST['shipping_state']
        );

        $this->db->update("state", $data, array("state_id" => $state_id));
        return true; 

    }

   function delete_state($state_id) {
        $sql = "delete from state where state_id=$state_id";
        return $this->db->query($sql);
    }

}

?>
