<div class="table_content">
<table cellpadding="1" border="0" cellspacing="1">
    <tr>
        <th>Item Name</th><th>Quantity</th><th>Amount</th>
        </tr>


        <?php $i=1; foreach($cart as $cart){?>
            <?php $total+= $cart['item_price'];
            $total_quan+= $cart['item_quantity'];
            ?>
            <tr>
                <td><?php echo $i;?>. <?php echo $cart['item_name']?></td><td><?php echo $cart['item_quantity'].$cart['item_unit']?></td><td style="text-align: right;"><?php echo '$'.number_format($cart['item_price'],2)?></td>
            </tr>
            <?php $i=$i+1;?>
       <?php }
       $shipping_amount=$totalOrder-$total_without_ship;
       ?>

            <tr>
                <td style="color:green;font-weight: bold;">Sub Total</td><td>&nbsp;</td><td style="text-align: right;"><?php echo '$'.number_format($total,2)?></td>
                </tr>

                <tr>
                <td style="color:green;font-weight: bold;">shipping amount</td><td>&nbsp;</td><td style="text-align: right;"><?php echo '$'.number_format($shipping_amount,2)?></td>
                </tr>

                <tr>
                <td style="color:green;font-weight: bold;">Total</td><td>&nbsp;</td><td style="text-align: right;"><?php echo '$'.number_format($totalOrder,2)?></td>
                </tr>


    </table>


    </div>