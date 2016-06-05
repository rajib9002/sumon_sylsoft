<div class="product_total">
<form action="<?=site_url()?>product/confirm" method="POST" name="cart_frm" id="cart_frm">
    <input type='hidden' name='update_cart' id='update_cart' value=''>
    <table width="100%" border="0" cellpadding="1" cellspacing="1" style="margin-top: 5px; font-family: Tahoma; margin-left:10px; background: #fff">
        <tr>
            <td align="left" style="background-color:#769704; padding:5px; color:#fff;">
                <div class="dotted"><strong>Shopping Cart</strong></div>
            </td>
        </tr>
        <tr>
            <td>
                <table width="100%">
                    <tr>
                        <td colspan="2">
                             <div class="product-list">
                                <ul>
                                    <li style='width:200px;text-align:left;'><b>Item Name</b></li>
                                    <li style='width:150px;text-align:right;'><b>Quantity</b></li>
                                    <li style='width:70px;text-align:right;'><b>Price</b></li>

                                </ul>
                                 <?php foreach($cart as $c){
                                     $price+=$c['item_price'];
                                     $qnt+=$c['item_quantity'];
                                      $currency=$this->session->userdata('currency');
                                     ?>
                                 <input type='hidden' name='cartid[]' value='<?=$c['cart_id'] ?>'>
                                     <ul class="manage_row"  id='row_<?=$c['cart_id']?>'>
                                        <li style='width:200px;text-align:left;'><?=$c['item_name']?></li>
                                        <li style='width:150px;text-align:right;'><?=$c['item_quantity']?></li>
                                        <li style='width:70px;text-align:right;'><?=  GoogleCurrencyConverter::convert($c['item_price'],'USD', $currency)?></li>

                                     </ul>
                                <?php }?>
                                <input type="hidden" name="total" value="<?=$price?>">
                                 <ul class="manage_row"  id='row_<?=$c['item_id']?>'>
                                        <li style='width:200px;text-align:left;'>&nbsp;</li>
                                        <li style='width:150px;text-align:right;border-top:#353535 1px solid'>&nbsp;</li>
                                        <li style='width:70px;text-align:right;border-top:#353535 1px solid'></li>
                                        <li style='width:100px;text-align:right;'></li>
                                    </ul>
                                   <ul class="manage_row"  id='row_<?=$c['item_id']?>'>
                                        <li style='width:200px;text-align:left;'>&nbsp;</li>
                                        <li style='width:150px;text-align:right;'><?=$qnt?></li>
                                        <li style='width:70px;text-align:right;'>Total: <span class='price'><?=$price?></span></li>
                                      
                                        <li style='width:100px;text-align:right;'></li>
                                    </ul>
                             </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="background-color:#769704; padding:5px; color:#fff;">
                            <div class="dotted"><strong>Shipping Address</strong></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" border="0" align="left" class="jform">
                                <tr>
                                    <td>&nbsp;</td>
                                    <td  align="left"> <font color="red">*</font>&nbsp; fields are required</td>
                                </tr>

                                <tr>
                                    <td align="right"><font color="red">*</font>Full Name:</td>
                                    <td align="left"> <input type="text" name="full_name"  value="<?=$_REQUEST['full_name']?>"/><?=form_error('full_name','<span style="color:red;">','</span>')?></td>
                                </tr>

                                <tr>
                                    <td align="right">C/O:</td>
                                    <td align="left"> <input type="text" name="care_of"  value="<?=$_REQUEST['care_of']?>"/></td>
                                </tr>

                                <tr>
                                    <td align="right"><font color="red">*</font>Phone No:</td>
                                    <td align="left"> <input type="text" name="phone_no"  value="<?=$_REQUEST['phone_no']?>"/><?=form_error('phone_no','<span style="color:red;">','</span>')?></td>
                                </tr>

                                <tr>
                                    <td align="right">Phone No 2:</td>
                                    <td align="left"> <input type="text" name="phone_no_2"  value="<?=$_REQUEST['phone_no_2']?>"/></td>
                                </tr>
                             

                                <tr>
                                    <td class="txt_right">
                                        &nbsp;House and Flat Detail:
                                    </td>
                                    <td align="left">
                                        <textarea name="home_detail" cols="30" rows="5"><?=$_REQUEST['home_detail']?></textarea>
                                    </td>
                                </tr>
  
                               
                                <tr>
                                    <td align="right">Area Name:</td>
                                    <td align="left">
                                        <input type="text" name="area_name"  value="<?=$_REQUEST['area_name']?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                       Post Code:
                                    </td>
                                    <td align="left">
                                        <input type="text" name="post_code"  value="<?=$_REQUEST['post_code']?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                        Address Hints:
                                    </td>
                                    <td align="left">
                                        <input type="text" name="add_hints"  value="<?=$_REQUEST['add_hints']?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                       <font color="red">*</font>District or City:
                                    </td>
                                    <td align="left">
                                        <input type="text" name="dis_city"  value="<?=$_REQUEST['dis_city']?>"/><?=form_error('dis_city','<span style="color:red;">','</span>')?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                        <font color="red">*</font>Country:
                                    </td>
                                    <td align="left">
                                        <input type="text" name="country"  value="<?=$_REQUEST['country']?>"/><?=form_error('country','<span style="color:red;">','</span>')?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                        <font color="red">*</font>Delivery Time:
                                    </td>
                                    <td align="left">
                                        <input type="text" name="del_time"  value="<?=$_REQUEST['del_time']?>"/><?=form_error('del_time','<span style="color:red;">','</span>')?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                        <font color="red">*</font>Delivery Date:
                                    </td>
                                    <td align="left">
                                        <input type="text" name="del_date"  value="<?=$_REQUEST['del_date']?>"/><?=form_error('del_date','<span style="color:red;">','</span>')?>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                        Photo Confirmation:
                                    </td>
                                    <td align="left">
                                        <input type="radio" name="photo_conf" value="1">Yes
                                        <input type="radio" name="photo_conf" value="2">No
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                        Call Recipient:
                                    </td>
                                    <td align="left">
                                        <input type="radio" name="call_conf" value="1">Yes
                                        <input type="radio" name="call_conf" value="2">No
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                        Cake Wish:
                                    </td>
                                    <td align="left">
                                        <input type="text" name="cake_wish"  value="<?=$_REQUEST['cake_wish']?>"/>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="txt_right">
                                        <font color="red">*</font>Relationships:
                                    </td>
                                    <td align="left">
                                        <input type="text" name="relationship"  value="<?=$_REQUEST['relationship']?>"/><?=form_error('relationship','<span style="color:red;">','</span>')?>
                                    </td>
                                </tr>

                                <tr>
                                    <td>&nbsp;</td>
                                    <td align="left"><input type="submit" name="submit" value="Confirm"></td>
                                </tr>
                                
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</form>
</div>
  <?php $this->load->view('shared/right_content');?>
<div class="clear"></div>