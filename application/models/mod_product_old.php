<?php

class mod_product extends Model {

    public function __construct() {
        parent::Model();
    }

    function get_sub_cat($id='') {
        $sql = "SELECT * from product_category where parent_id=$id";
        $sql_query = $this->db->query($sql);
        $query = $sql_query->result_array();
        return $query;
    }

    function get_special_product($con='1', $limit='') {
        $sql = "select * from product
        where $con and pro_type=2 and p_status=1 and delete_status=0 order by product_id desc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function on_sale($con='1', $limit='') {
        $sql = "select * from product
        where $con and pro_type=5 and p_status=1 and delete_status=0 order by product_id desc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all_product($con='1', $limit='') {
        $sql = "select * from product
        where $con and p_status=1 and delete_status=0 order by product_id asc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_new_product($con='1', $limit='') {
        $sql = "select * from product
        where $con and p_status=1 and delete_status=0 and pro_type=4 order by product_id desc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_same_cat_product($con='1', $p_main_cat_id='', $limit='') {
        $sql = "select * from product
        where $con and p_status=1 and delete_status=0 and p_main_cat_id=$p_main_cat_id order by product_id desc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_special_more_product($con='1', $limit='') {
        $sql = "select * from product
        where $con and p_status=1 and delete_status=0 and pro_type=2 order by product_id desc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_sub_product($con='1', $id='',$key='', $limit='') {
        if($key=='all'){
         $sql = "select * from product where $con and p_status=1 and delete_status=0 and p_main_cat_id=$id order by product_id desc $limit";
        }else{
           $sql = "select * from product where $con and p_status=1 and delete_status=0 and p_main_cat_id=$id and product_name LIKE '$key%' order by product_id desc $limit";
            
            }
        $query = $this->db->query($sql);
        return $query->result_array();
    }



    function get_sub_product_pagi($con='1', $id='', $limit='') {
        $sql = "select * from product
        where $con and p_status=1 and delete_status=0 and p_main_cat_id=$id order by product_id asc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_brand_product_pagi($con='1', $name='', $limit='') {
        $sql = "select * from product
        where $con and p_status=1 and delete_status=0 and brand='$name' order by product_id asc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }


//    for cart


    function get_products($id='') {
        $query = $this->db->query("select * from product where product_id='$id'");
        return $query->row_array();
    }

    function cart_ajax_itme() {
        $session_id = $this->session->userdata('session_id');
        $sql = "select count(*) as total,sum(item_price) as total_price from shopping_cart where session_id='$session_id' and is_checkout='0'";
        $query = $this->db->query($sql);
        $row = $query->row_array();
        if ($row['total'] == 0)
            return 0;
        else
            return $row['total'] . '|' . $row['total_price'];
    }

    function cart_detail() {
        $sessid = $this->session->userdata('session_id');
        $query = $this->db->query("select * from shopping_cart where session_id='$sessid' and is_checkout='0'");
        return $query->result_array();
    }

    function save_shipping_addrress() {
        $session_id = $this->session->userdata('session_id');
        $user_id = $this->session->userdata('user_id');
        $sql = "insert into shipping_detail set
        user_id={$this->db->escape($user_id)},
        full_name={$this->db->escape($_POST['full_name'])},
        phone_no={$this->db->escape($_POST['phone_no'])},
        phone_no_2={$this->db->escape($_POST['phone_no_2'])},
        home_detail={$this->db->escape($_POST['home_detail'])},
        area_name={$this->db->escape($_POST['area_name'])},
        post_code={$this->db->escape($_POST['post_code'])},
        add_hints={$this->db->escape($_POST['add_hints'])},
        dis_city={$this->db->escape($_POST['dis_city'])},
        country={$this->db->escape($_POST['country'])},
        shi_session_id='$session_id'
        ";
        $this->db->query($sql);
        return $this->db->insert_id();
    }

    function save_order($ins_id='',$shipping_rate='') {
        $cart = $this->cart_detail();
        $session_id = $this->session->userdata('session_id');
        $date = date('Y-m-d H:i:s');
        $user_id = $this->session->userdata('user_id');

        $total_amount_without_shipment=$_REQUEST['total'];
        $total_amount_with_shipment=$total_amount_without_shipment+$shipping_rate;
        
        $msg.="<html>
               <head>
               <title></title>
               </head>
               <Body>

                <div style='width:370px;'>
                <div style='margin:0 auto; text-align:center;'><img src='" . base_url() . "./images/logo.png' alt='zafran perfumes'/></div>
                <table width='100%' border='0' align='center' style='border:1px solid #dedede;' >
                    <tr>
                       <td colspan='3' align='center'><h3 style='font-family:Verdana;font-size:14px;'><u>Zafran perfumes  Online Order Confirmation</u></h3></td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='3' align='center' style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size:15px'>
                            Thank you for placing your order with us<br> please see your order confirmation below.
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan='3'>
                        <table width='360px;' align='center' border='0' cellspacing='0' cellpadding='4' style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;border:1px solid #dedede;'>
                            <tr>
                            <td style='width:260px;border-bottom:1px solid #dedede;border-right:1px solid #dedede;' align='left'><b>Items</b></td>

                            <td  style='width:70px;border-bottom:1px solid #dedede;border-right:1px solid #dedede;' align='left'><b>Quantity</b></td>
                            <td  style='width:70px;border-bottom:1px solid #dedede;' align='left'><b>Price</b></td>
                            </tr>
                    ";

        foreach ($cart as $c) {
            $price+=$c['item_price'];
            $qnt+=$c['item_quantity'];
            $cart_id.=$c['cart_id'];
            $cid.=$c['cart_id'] . ",";
//            $sql = "update shopping_cart set is_checkout='1' where cart_id='$cart_id'";
//            $this->db->query($sql);

            $msg.="<tr>
                        <td style='width:260px;border-bottom:1px solid #dedede;border-right:1px solid #dedede;' align='left'>" . $c['item_name'] . "</td>
                        <td style='width:70px;border-bottom:1px solid #dedede;border-right:1px solid #dedede;' align='left'>" . $c['item_quantity'] . "</td>
                        <td style='width:70px;border-bottom:1px solid #dedede;' align='left'><span style='text-align:left;'>$</span><span style='float:right;'>" . number_format($c['item_price'], 2, '.', '') . "</span></td>
                  </tr>";
        }
        $sql = "insert into orders set
        user_id={$this->db->escape($user_id)},
        cart_id={$this->db->escape($cid)},
        total_quantity={$this->db->escape($qnt)},
        orderTime={$this->db->escape($date)},
        orderSessionId={$this->db->escape($session_id)},
        total_without_ship=$total_amount_without_shipment,
        totalOrder=$total_amount_with_shipment,
        add_id={$this->db->escape($ins_id)}
        ";
        $this->db->query($sql);
        $order_id = $this->db->insert_id();
        $this->session->set_userdata('order_id', $order_id);
        $tatal_amount = $total_amount_with_shipment;
        $this->session->set_userdata('total', $tatal_amount);
        $this->session->set_userdata('shipping_rate_state', $shipping_rate);


        $user_info = sql::row("user", "user_id=$user_id");
        $data = common::get_settings_data();
        $admin_email = $data['admin_email'];
        //$admin_email=sql::row("email_settings","status=1 order by id desc");
        $msg.="<tr>
                      <td align='left' colspan='2' style='border-bottom:1px solid #dedede;border-right:1px solid #ccc;'><b>Shipment Rate:</td><td style='border-bottom:1px solid #dedede;font-weight:bold;' align='left'><span style='text-align:left;'>$</span><span style='float:right;'>" . number_format($shipping_rate, 2, '.', '') . "</span>&nbsp;</td>
               </tr>";
        $msg.="<tr>
                      <td align='left' colspan='2' style='border-bottom:1px solid #dedede;border-right:1px solid #ccc;'><b>Total:</td><td style='border-bottom:1px solid #dedede;font-weight:bold;' align='left'><span style='text-align:left;'>$</span><span style='float:right;'>" . number_format($total_amount_with_shipment, 2, '.', '') . "</span>&nbsp;</td>
               </tr>";
        $msg.="<tr>
                      <td colspan='3' width='100%'>
                        <table width='100%' border='0' cellpadding='0' cellspacing='0' style='border:#000 1px solid;font-family:Verdana, Arial, Helvetica, sans-serif; text-align:center;' >
                            <tr>
                                <td width='50%' valign='top'>
                                    <table width='100%' border='0'  cellspacing='3' style='font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px' >


                                      <tr>
                                            <td style='width:200px;' align='left'><p>Name: " . $user_info['user_first_name'] . ' ' . $user_info['user_last_name'] . "</p></td>
                                      </tr>
                                       <tr>
                                            <td style='width:200px;' align='left'>Address: " . $user_info['address'] . "</td>
                                        </tr>
                                        <tr>
                                            <td style='width:200px;' align='left'>Postcode: " . $user_info['postcode'] . "</td>
                                        </tr>
                                        <tr>
                                            <td style='width:200px;' align='left'>Email: " . $user_info['user_email'] . "</td>
                                        </tr>
                                        <tr>
                                            <td style='width:200px;' align='left'>Telephone: " . $user_info['phone_no'] . "</td>
                                        </tr>
                                        <tr>
                                            <td style='width:200px;' align='left'><p>Country: " . $user_info['country'] . "</p></td>
                                        </tr>

                                        </table>
                                        </td>
                                        </tr>";
        $msg.="</table></table></td></tr></table></div></body></html>";
        // echo $msg;exit;
        $header .= "From: " . $admin_email['email'] . "\r\n";
        $header.="Content-Type: text/html; charset=iso-8859-1" . "\r\n";
        @mail($user_info['user_email'], "Order Confirmation", $msg, $header);
        @mail($admin_email['email'], "Order Confirmation", $msg, $header);
        @mail($admin_email['email'], "Order Confirmation", $msg, $header);
    }

    function get_all_search($key='all', $limit='') {
        if ($key == 'all') {
            $sql = "select * from product order by product_id asc $limit";
        }
        else
            $sql="SELECT * FROM  product WHERE product_name LIKE '$key%' order by product_id asc $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
?>
