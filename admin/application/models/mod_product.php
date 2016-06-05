<?php

class mod_product extends Model{

    public function Model() {
        parent::Model();
    }
    function get_all_product(){
        $sortname = common::getVar('sidx', 'product_id');
        $sortorder = common::getVar('sord', 'asc');
        $sort = "ORDER BY $sortname $sortorder";
        $con = " where 1 and product.delete_status=0";
        if ($_REQUEST['product_name'] != '')
            $con.=" and product_name='$_REQUEST[product_name]'";
        if ($_REQUEST['status'] != '')
            $con.=" and p_status='$_REQUEST[status]'";
        $sort = "ORDER BY $sortname $sortorder";
        $sql = "SELECT product. * , product_category . * 
FROM product
LEFT JOIN product_category ON product_category.id = product.p_main_cat_id $con $sort";
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
            $status = $row['p_status'] == '1' ? 'active' : 'Inactive';
            //$type = $row['pro_type'] == '1' ? 'Ordinary' : 'Special';
            $type = $row['pro_type'];
            if($type==1){$type=Ordinary;}elseif($type==2){$type=Special;}elseif($type==3){$type=Featured;}elseif($type==4){$type=New_product;}else{$type=On_sale;}
            $product_image = "<img src='" . site_url('../uploads/product/thumb_' . $row['image']) . "' />";
            $product_id=$row['product_id'];
$sql1="select * from product_price where product_id=$product_id";
$sql_query = $this->db->query($sql1);
$info= $sql_query->result_array();
//count($info);
$string='';
foreach($info as $info){
    $string.="<div style='text-align:left;color:green;background-color:#e5e5e5;margin:5px 0;'>";
    $string.='Item Size='.$info['size'].' '.$info['unit'].'<br/>'.'Item Weight='.$info['weight'].'<br/>'.'Item Price='.'$'.$info['price'].'<br/>'.'Item Quantity='.$info['total_p_qty'].'<br/>'.'Color='.$info['color'].'<br/>'.'Designer='.$info['designer'].'<br/>';
    $string.="</div>";
}
            $responce->rows[$i]['id'] = $row['product_id'];
            $responce->rows[$i]['cell'] = array($row['item_code'],$row['category_name'],$row['product_name'],$row['brand'],$product_image,$string,$type,$status);
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
    
    function add_image($file='', $pre_image=''){
        $param['dir'] = UPLOAD_PATH."product/";
        $param['type'] = IMG_EXT;
        if (class_exists('zupload')) {
            $this->zupload->setUploadDir(UPLOAD_PATH . 'product/');
        } else {
            $this->load->library('zupload', $param);
        }
        if ($pre_image != "") {
            $this->zupload->delFile($pre_image);
            $this->zupload->delFile("thumb_" . $pre_image);
            $this->zupload->delFile("full_" . $pre_image);
        }
        $this->zupload->setFileInputName($file);
        $this->zupload->upload(true);
        $img = $this->zupload->getOutputFileName();
        if (!class_exists('zthumb')) {
            $this->load->library('zthumb');
        }
        $this->zthumb->createThumb($img, "thumb_" . $img, $param['dir'], $param['dir'], 80, 100, false);
        return $img;
    }



    function delete_image($image_url){
        $param['dir'] = UPLOAD_PATH . "product/";
        $param['type'] = IMG_EXT;
        $this->load->library('zupload', $param);
        $this->zupload->delFile($image_url);
        $this->zupload->delFile("thumb_" . $image_url);
        $this->zupload->delFile("full_" . $image_url);
        return true;
    }

    function get_main_cat_name($sel='') {
        $arr = sql::rows('product_category', "status=1");
        $opt.='<option value="">As a Root</option>';
        foreach ($arr as $val) {
            if ($sel == $val['category_id']) {
                $opt.='<option value="' . $val['category_id'] . '" selected="selected">' . $val['category_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['category_id'] . '">' . $val['category_name'] . '</option>';
            }
        }
        return $opt;
    }
        function get_sub_cat_name($sel='') {
        $arr = sql::rows('pro_sub_cat', "status=1");
        $opt.='<option value="">As a Root</option>';
        foreach ($arr as $val) {
            if ($sel == $val['sub_cat_id']) {
                $opt.='<option value="' . $val['sub_cat_id'] . '" selected="selected">' . $val['sub_cat_name'] . '</option>';
            } else {
                $opt.='<option value="' . $val['sub_cat_id'] . '">' . $val['sub_cat_name'] . '</option>';
            }
        }
        return $opt;
    }

    function add_product() {
        $product_id = $this->add_product_table();
        if (count($_POST['pro_serial']) > 0) {
            $inc = 0;
            foreach ($_POST['pro_serial'] as $val) {
                $this->db->query("insert into product_price set
                                                    product_id=$product_id,
                                                    size={$this->db->escape($_POST['size'][$inc])},
                                                    unit={$this->db->escape($_POST['unit'][$inc])},
                                                    weight={$this->db->escape($_POST['weight'][$inc])},
                                                    price={$this->db->escape($_POST['price'][$inc])},
                                                    color={$this->db->escape($_POST['color'][$inc])},
                                                    designer={$this->db->escape($_POST['designer'][$inc])},
                                                    total_p_qty={$this->db->escape($_POST['quantity'][$inc])}
                                                    ");
                $inc++;
            }
        }
        return $product_price_id;
    }


    function add_product_table() {
       $file = 'image';
       $image="";
        if ($_FILES[$file]['name'] != '') {
            $image = $this->add_image($file);
        }
        $sql = "insert into product set
                p_main_cat_id={$this->db->escape($_POST['category_id'])},
                product_name={$this->db->escape($_POST['product_name'])},
                item_code={$this->db->escape($_POST['item_code'])},
                brand={$this->db->escape($_POST['brand'])},
                description={$this->db->escape($_POST['description'])},
                additional_info={$this->db->escape($_POST['additional_info'])},
                pro_type={$this->db->escape($_POST['pro_type'])},
                image='$image'";
        $this->db->query($sql);
        $product_id = $this->db->insert_id();
        return $product_id;
    }


        function update_product($product_id='',$image='') {

        $product_id1=$product_id;
        $image1=$image;
        $id = $this->update_product_table($product_id1,$image1);
         if (count($_POST['pro_serial']) > 0) {
            $inc = 0;

            foreach ($_POST['pro_serial'] as $val) {
                if ($product_id != '') {
                    if (is_numeric($_POST['serial_id'][$inc])) {
                        $this->db->query("update product_price set
                                                    product_id=$product_id,
                                                    size={$this->db->escape($_POST['size'][$inc])},
                                                    unit={$this->db->escape($_POST['unit'][$inc])},
                                                   weight={$this->db->escape($_POST['weight'][$inc])},
                                                    price={$this->db->escape($_POST['price'][$inc])},
                                                   color={$this->db->escape($_POST['color'][$inc])},
                                                    designer={$this->db->escape($_POST['designer'][$inc])},
                                                    total_p_qty={$this->db->escape($_POST['quantity'][$inc])}
                                                   where product_price_id={$this->db->escape($_POST['serial_id'][$inc])}
                                                    ");
                    } else {
                        $this->db->query("insert into product_price set
                                                    product_id=$product_id,
                                                    size={$this->db->escape($_POST['size'][$inc])},
                                                    unit={$this->db->escape($_POST['unit'][$inc])},
                                                   weight={$this->db->escape($_POST['weight'][$inc])},
                                                    price={$this->db->escape($_POST['price'][$inc])},
                                                   total_p_qty={$this->db->escape($_POST['quantity'][$inc])}
                                                    ");
                    }
                    $inc++;
                }
            }
        }
        return TRUE;
    }

    function update_product_table($product_id1='',$image1='') {
       $file = 'image';
        if ($_FILES[$file]['name'] != '') {
            $image1 = $this->add_image($file);
        }
        $sql = "update product set
                p_main_cat_id={$this->db->escape($_POST['category_id'])},
                p_sub_cat_id={$this->db->escape($_POST['sub_cat_id'])},
                item_code={$this->db->escape($_POST['item_code'])},
                brand={$this->db->escape($_POST['brand'])},
                product_name={$this->db->escape($_POST['product_name'])},
                description={$this->db->escape($_POST['description'])},
                additional_info={$this->db->escape($_POST['additional_info'])},
                pro_type={$this->db->escape($_POST['pro_type'])},
                image='$image1' where product_id=$product_id1";
        $this->db->query($sql);
        //$product_id = $this->db->insert_id();
        return $product_id;
    }



      function sub_category_option($sel='') {
        $categories = sql::rows('product_category', " parent_id=0 and status=1");
        $opt = "<option value=''>Select Category</option>";
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
                        $opt.="<option style='margin-left:5px;color:green;' value='{$category['id']}' selected='selected'>{$category['category_name']}</option>";
                    } else {
                        $opt.="<option style='margin-left:5px;color:green;' value='{$category['id']}'>{$category['category_name']}</option>";
                    }
                    $opt.="</option>";
                
                    
                    $sec_cat_id=$category['id'];



    $third_cats = sql::rows('product_category', "parent_id=$sec_cat_id and status=1");
                 if (count($third_cats) > 0) {
                foreach ($third_cats as $category) {

                        if ($category['id'] == $sel) {

                        //$cat_id=$category['id'];
                        $opt.="<option style='margin-left:10px;color:red;' value='{$category['id']}' selected='selected'>{$category['category_name']}</option>";
                    } else {
                        $opt.="<option style='margin-left:10px;color:red' value='{$category['id']}'>{$category['category_name']}</option>";
                    }
                    $opt.="</option>";

                }
                }



                    
                }
            }
            
            
        }
        return $opt;
    }

}
?>
