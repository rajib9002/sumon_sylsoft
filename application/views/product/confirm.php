<div class="table_content" style="margin-right:10px;">
        <table cellpadding="1" border="0" cellspacing="1">
            <tr class="title">
                <th>Item Name</th><th>Quantity</th><th>Total Price</th><th>Delete</th>
            </tr>
            <?php if (count($cart) > 0) {?>
            <?php foreach ($cart as $cart): ?>

                    <input type='hidden' name='cartid[]' value='<?=$cart['cart_id'] ?>'>
                    <input type='hidden' name='itemid[]' value='<?=$cart['item_id'] ?>'>
                    <tr class="odd" id='row_<?=$cart['cart_id'] ?>'>
                        <td><?php echo $cart['item_name'] ?></td>
                        <td><input type='text' name='quantity[]' style="width:40px;height:16px;" value='<?=$cart['item_quantity'] ?>'><?php echo $cart['item_unit'] ?></td>
                        <td align="right">$<?php echo number_format($cart['item_price'],2) ?></td>
                        <td align="bottom"><a   href='javascript:void(0)' onclick="deleterow(<?=$cart['cart_id'] ?>)" onclick="total_amount()" title="Delete Product"><img src="images/delete.png"/></a></td>
                    </tr>
            <?php $total_price+=$cart['item_price'] ?>
            <?php endforeach; ?>

            <?php
                    $data = common::get_settings_data();
                    $shipping_rate = $data['shipping_amount'];
                    //$total = $total_price + $shipping_rate;
                    $total = $total_price;
                    ?>

<!--                    <tr>
                        <td>&nbsp;</td>
                        <td>Shipping Amount</td>
                        <td class="shipping" align="right">$<?php echo number_format($shipping_rate,2) ?></td>
                    </tr>-->

                    <tr>
                        <td>&nbsp;</td>
                        <td>Total</td>

                        <td class="total" align="right">
                        
                        $<?php echo number_format($total,2)?>
                        </td>
                    </tr>
                    <?php } else { ?>

                    <tr>

                        <td>No Item In your Cart.</td>
                    </tr>
                    <?php } ?>
            </table>
    </div>
    <div class="clear"></div>

<div class="mail_success">
    <h3>Your Details Information</h3>

    <form action="<?=site_url('product/confirm') ?>" method="POST" name="cart_frm" id="cart_frm">
        <input type='hidden' name='update_cart' id='update_cart' value=''>
      <div class="table_width">
        <table  border="0" align="center" style="font-family:verdana; font-size: 11px; font-weight: bold;padding-top:20px;">
            <tr>
                <td align="right" valign="top"><font color="red">*</font>Full Name:</td>
                <td align="left"> <input type="text" name="full_name" class="dis_block input_style" value="<?=set_value('user_first_name',$user_info['user_first_name']) ?>"/><?=form_error('full_name', "<span class=error>", "</span>") ?></td>
            </tr>

            <tr>
                <td align="right" valign="top"><font color="red">*</font>Phone No:</td>
                <td align="left"> <input type="text" name="phone_no" class="dis_block input_style"  value="<?=set_value('phone_no',$user_info['phone_no']) ?>"/><?=form_error('phone_no', "<span class=error>", "</span>") ?></td>
            </tr>

            <tr>
                <td align="right" valign="top">Phone No 2:</td>
                <td align="left"> <input type="text" class="dis_block input_style" name="phone_no_2"  value="<?=set_value('phone_no',$user_info['phone_no']) ?>"/></td>
            </tr>


            <tr>
                <td class="txt_right" valign="top" align="right">
                    House Detail:
                </td>
                <td align="left">
                    <textarea name="home_detail" class="input_style" rows="5"><?=set_value('address',$user_info['address']) ?></textarea>
                </td>
            </tr>


            <tr>
                <td align="right" valign="top"><font color="red">*</font>State Name:</td>
                <td align="left">
                    <select  name="area_name" class="dis_block input_style">
                        <option></option>
<option value="Armed Forces Americas">Armed Forces Americas</option>
<option value="Armed Forces Europe">Armed Forces Europe</option>
<option value="Alaska">Alaska</option>
<option value="Alabama">Alabama</option>
<option value="Armed Forces Pacific">Armed Forces Pacific</option>
<option value="Arkansas">Arkansas</option>
<option value="AMERICAN SAMOA">AMERICAN SAMOA</option>
<option value="Arizona">Arizona</option>
<option value="California">California</option>
<option value="Colorado">Colorado</option>
<option value="Connecticut">Connecticut</option>
<option value="Washington DC">Washington DC</option>
<option value="Delaware">Delaware</option>
<option value="Florida">Florida</option>
<option value="Federated States OF Micronesia">Federated States OF Micronesia</option>
<option value="Georgia">Georgia</option>
<option value="GUAM">GUAM</option>
<option value="Hawaii">Hawaii</option>
<option value="Iowa">Iowa</option>
<option value="Idaho">Idaho</option>
<option value="Illinois">Illinois</option>
<option value="Indiana">Indiana</option>
<option value="Kansas">Kansas</option>
<option value="Kentucky">Kentucky</option>
<option value="Louisiana">Louisiana</option>
<option value="Massachusetts">Massachusetts</option>
<option value="Maryland">Maryland</option>
<option value="Maine">Maine</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Michigan">Michigan</option>
<option value="Minnesota">Minnesota</option>
<option value="Missouri">Missouri</option>
<option value="MARIANA ISLANDS">MARIANA ISLANDS</option>
<option value="Mississippi">Mississippi</option>
<option value="Montana">Montana</option>
<option value="North Carolina">North Carolina</option>
<option value="North Dakota">North Dakota</option>
<option value="Nebraska">Nebraska</option>
<option value="New Hampshire">New Hampshire</option>
<option value="New Jersey">New Jersey</option>
<option value="New Mexico">New Mexico</option>
<option value="Nevada">Nevada</option>
<option value="New York">New York</option>
<option value="Ohio">Ohio</option>
<option value="Oklahoma">Oklahoma</option>
<option value="Oregon">Oregon</option>
<option value="Pennsylvania">Pennsylvania</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="PALAU">PALAU</option>
<option value="Rhode Island">Rhode Island</option>
<option value="South Carolina">South Carolina</option>
<option value="South Dakota">South Dakota</option>
<option value="Tennessee">Tennessee</option>
<option value="Texas">Texas</option>
<option value="Utah">Utah</option>
<option value="Virginia">Virginia</option>
<option value="VIRGIN ISLANDS">VIRGIN ISLANDS</option>
<option value="Vermont">Vermont</option>
<option value="Washington">Washington</option>
<option value="Wisconsin">Wisconsin</option>
<option value="West Virginia">West Virginia</option>
<option value="Wyoming">Wyoming</option>
</select>
                    <?=form_error('area_name', "<span class=error>", "</span>");?>
                    
                </td>
            </tr>

            <tr>
                <td align="right" valign="top">
                    Post Code:
                </td>
                <td align="left">
                    <input type="text" name="post_code" class="dis_block input_style"  value="<?=set_value('post_code',$user_info['post_code']) ?>"/>
                </td>
            </tr>

            

            

    </table>

          </div>

       <div class="table_width">
        <table  border="0" align="center" style="font-family:verdana; font-size: 11px;font-weight: bold;padding-top:20px;">
            <tr>
                <td align="right" valign="top">
                    Address Hints:
                </td>
                <td align="left">
                    <input type="text" name="add_hints" class="dis_block input_style"  value="<?=set_value('address',$user_info['address']) ?>"/>
                </td>
            </tr>

            <tr>
                <td valign="top" align="right">
                    <font color="red">*</font>District or City:
                </td>
                <td align="left">
                    <input type="text" name="dis_city" class="dis_block input_style"  value="<?=set_value('city',$user_info['city']) ?>"/><?=form_error('dis_city', "<span class=error>", "</span>") ?>
                </td>
            </tr>

            <tr>
                <td valign="top" align="right">
                    <font color="red">*</font>Country:
                </td>
                <td align="left">
                   <select name="country" class="input_style dis_block">

                                    <?php echo common::get_country();?>
                    </select>
                     <?=form_error('country', "<span class=error>", "</span>");?>
                </td>
            </tr>


        <input type="hidden" name="total" value="<?=$total?>"/>

        <tr>
            <td>&nbsp;</td>
            <td align="left"><input type="submit" name="submit" class="p_payment" value="Confirm"></td>
        </tr>
        </table>
            </div>


</form>
    <div class="clear"></div>
    </div>

