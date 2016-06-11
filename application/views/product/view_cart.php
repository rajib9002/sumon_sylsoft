<div class="table_content" style="margin-right:10px;">
    <form action="<?=site_url()
?>product/view_cart" method="POST" name="cart_frm" id="cart_frm">
        <input type='hidden' name='update_cart' id='update_cart' value=''>

        <table cellpadding="1" border="0" cellspacing="1">
            <tr class="title">
                <th>Item Name</th><th>Quantity</th><th>Total Price</th><th>Delete</th>
            </tr>
<?php if(count($cart)>0){?>
<?php foreach ($cart as $cart): ?>

            <input type='hidden' name='cartid[]' value='<?=$cart['cart_id'] ?>'>
            <input type='hidden' name='itemid[]' value='<?=$cart['item_id'] ?>'>
            <tr class="odd" id='row_<?=$cart['cart_id'] ?>'>
                <td><?php echo $cart['item_name'] ?></td>
                <td><input type='text' name='quantity[]' style="width:40px;height:16px;" value='<?=$cart['item_quantity']?>'><?php echo $cart['item_unit']?></td>
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

<!--            <tr>
                <td>&nbsp;</td>
                <td>Shipping Amount</td>
                <td class="shipping" align="right">$<?php echo number_format($shipping_rate,2) ?></td>
            </tr>-->

            <tr>
                <td>&nbsp;</td>
                <td>Total</td>
                <td class="total" align="right">$<?php echo number_format($total,2) ?></td>
            </tr>
            <tr>
                <td align="left" class="float_left">
                    <input type="button" name="continue" value="Continue Add" onclick="document.location.href='<?=site_url('product/all_product') ?>'">&nbsp;
                    <input type="button" name="update" value="Update" onclick="document.getElementById('update_cart').value='update';document.cart_frm.submit()">&nbsp;
                    <input type="button" name="confirm" value="Confirm" onclick="document.location.href='<?=site_url('product/confirm') ?>'">
                </td>

            </tr>

<?php } else{?>

<tr>

                <td>No Item In your Cart.</td>
            </tr>
            <?php }?>



        </table>
    </form>
</div>
<div class="clear"></div>