 <?php $this->load->view('shared/user_nav');?>
<div class="table_content" style="margin-right:10px;margin-top:10px;">
            <table cellpadding="1" border="0" cellspacing="1">
                <tr class="title">
                    <th>Serial Id</th><th>Item Name</th><th>Quantity</th><th>Item Price</th>
                </tr>

                <?php
                $i=1;
                foreach ($order_details as $details):?>
                    <tr class="odd">
                        <td><?php echo $i?></td>
                        <td><?php echo $details['item_name']?></td>
                        <td><?php echo $details['item_quantity'].$details['item_unit']?></td>
                        <td align="right">$<?php echo $details['item_price'];?></td>
                    </tr>
                <?php $i=$i+1;?>
                <?php endforeach; ?>
            </table>
        </div>
