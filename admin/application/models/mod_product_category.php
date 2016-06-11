<?php

class mod_product_category extends Model {

    function mod_product_category() {
        parent::Model();
    }

    function get_all_product_category() {
        $sortname = common::getVar('sidx', 'category_id');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = "where 1";
        if ($_REQUEST['category_name'] != '')
            $con.=" and product_category.category_name like '%$_REQUEST[category_name]%'";
        if ($_REQUEST['status'] != '')
            $con.=" and product_category.status='$_REQUEST[status]'";
        $sort = "ORDER BY $sortname $sortorder";

        $sql = "select * from product_category $con $sort";
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
            if ($row['parent_id'] != '0') {
                $data = sql::row('product_category', 'id=' . $row['parent_id']);
                //$data['parent'] = sql::row('product_category', 'id=' . $row['parent_id'].'and sub_parent_id=-1');
                $category_name = $data['category_name'] . '->' . $row['category_name'];
            } else {
                $category_name = $row['category_name'];
            }
            $status = $row['status'] == 1 ? 'Active' : 'Inactive';
            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array($category_name,$status,$row['sort']);
            $i++;
        }
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Author: Md. Anwar Hossain");
        header("Email: anwarworld@gmail.com");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }

    function get_product_category_grid(){
        $sql = "select * from product_category where status=1";
        $sortname = common::getVar('sidx', 'id');
        $sortorder = common::getVar('sord', 'desc');
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
            if ($row['parent_id'] != '0') {
                $data = sql::row('product_category', 'id=' . $row['parent_id']);
                $category_name = $data['category_name'] . '->' . $row['category_name'];
            } else {
                $category_name = $row['category_name'];
            }

            $responce->rows[$i]['id'] = $row['id'];
            $responce->rows[$i]['cell'] = array($row['id'], $category_name, $row['status']);
            $i++;
        }
        header("Expires: Sat, 17 Jul 2010 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
        header("Cache-Control: no-cache, must-revalidate");
        header("Pragma: no-cache");
        header("Author: Md. Anwar Hossain");
        header("Email: anwarworld@gmail.com");
        header("Content-type: text/x-json");
        echo json_encode($responce);
        return '';
    }

    function get_category_option($sel=''){
        $opt = '<option value=' . "0" . ' >Main  Category' . '</option>';
        $data = sql::rows('product_category', 'status=1 and parent_id=' . "0");
        foreach ($data as $val) {
            if ($val['id'] == $sel){
                $opt.='<option value=' . $val['id'] . ' selected >' . $val['category_name'] . '</option>';
            } else {
                $opt.='<option value=' . $val['id'] . ' >' . $val['category_name'] . '</option>';
            }
        }
        return $opt;
    }

    function sub_category_option($sel='') {
        $categories = sql::rows('product_category', " parent_id=0 and status='active'");
        $opt = "<option value=''>Select Category</option>";
        foreach ($categories as $parent) {
            $opt.="<optgroup label='$parent[category_name]'>";
            $sub_cats = sql::rows('product_category', "parent_id=$parent[id] and status='active'");

            if (count($sub_cats) > 0) {
                foreach ($sub_cats as $category) {
                    if ($category['id'] == $sel) {
                        $opt.="<option value='{$category['id']}' selected='selected'>{$category['category_name']}</option>";
                    } else {
                        $opt.="<option value='{$category['id']}'>{$category['category_name']}</option>";
                    }
                }
            }
            $opt.="</optgroup>";
        }
        return $opt;
    }

   

    function add_product_category($image_list='') {

//        if($_POST['parent_id']!=0){
//            $sub_cat_id=$_POST['parent_id'];
//        }
//        else{
//            $sub_cat_id=0;
//        }
        $sql = "insert into product_category set
        parent_id={$this->db->escape($_POST['parent_id'])},
        category_name={$this->db->escape($_POST['category_name'])}";
        $flag = $this->db->query($sql);
        return $flag;
    }

    function update_product_category($id='', $image_list='') {
//        if($_POST['parent_id']!=0){
//            $sub_cat_id=$_POST['parent_id'];
//        }
//        else{
//            $sub_cat_id=0;
//        }
        $sql = "update product_category set
        parent_id={$this->db->escape($_POST['parent_id'])},
        category_name={$this->db->escape($_POST['category_name'])}
        where id=$id";
        $flag = $this->db->query($sql);

        return $flag;
    }
function sub_category_option1($sel='') {
        $categories = sql::rows('product_category', " parent_id=0 and status=1");
        $opt = "<option value='0'>main_category</option>";
        foreach ($categories as $parent) {
            if ($parent['id'] == $sel) {
            $opt.="<option style='font-weight:bold' value='$parent[id]' selected>{$parent['category_name']}";
            }
            else{
                 $opt.="<option style='font-weight:bold' value='$parent[id]'>{$parent['category_name']}";
            }
            $opt.="</option>";
            $sub_cats = sql::rows('product_category', "parent_id=$parent[id] and status=1");

            if (count($sub_cats) > 0) {
                foreach ($sub_cats as $category) {
                    if ($category['id'] == $sel) {

                        //$cat_id=$category['id'];
                        $opt.="<option style='color:green;margin-left:5px;' value='{$category['id']}' selected='selected'>{$category['category_name']}</option>";
                    } else {
                        $opt.="<option style='color:green;margin-left:5px;' value='{$category['id']}'>{$category['category_name']}</option>";
                    }
                }
            }

        }
        return $opt;
    }
    


}
?>
