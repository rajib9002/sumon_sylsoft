<div class="table_content" style="margin-right:10px;">
        <table cellpadding="1" border="0" cellspacing="1" style="text-align:left;">
            <tr class="title">
                <th>State ID</th><th>State Name</th><th>Shipping Rate For This State</th>
            </tr>
            <?php if (count($all_rate) > 0) {?>
            <?php foreach ($all_rate as $all_rate): ?>
                    <tr class="odd">
                        <td><?php echo $all_rate['state_id'] ?></td>
                        <td align="left"><?php echo $all_rate['state_name'] ?></td>
<td align="right"><?php echo '$'.$all_rate['shipping_state'] ?></td>
                        
                        
                    </tr>
            <?php endforeach; ?>

                    <?php } else { ?>

                    <tr>

                        <td>State List Is Empty</td>
                    </tr>
                    <?php } ?>
            </table>
    </div>
    <div class="clear"></div>