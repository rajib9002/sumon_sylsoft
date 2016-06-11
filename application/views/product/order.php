 <?php $this->load->view('shared/user_nav');?>

<div class="table_content" style="margin-right:10px;margin-top:10px;">
            <table cellpadding="1" border="0" cellspacing="1">
                <tr class="title">
                    <th>Order ID</th><th>Total Quantity</th><th>Total Amount</th><th>Order Time</th><th>Delivery Status</th><th>Payment Status</th><th>&nbsp;</th>
                </tr>
                <?php if(count($order_item)>0){?>

                <?php foreach ($order_item as $order):?>
                    <tr class="odd">
                        <td><?php echo $order['order_id']?></td>
                        <td><?php echo $order['total_quantity']?></td>
                        <td>$<?php echo $order['totalOrder']?></td>
                        <td><?php echo $order['orderTime']?></td>
                        <td><?php $deliver=$order['orderDelivered'];
                            if($deliver==0)
                            {
                                $deliver='Pending';
                                echo $deliver;

                            } 
                            else
                            {
                                $deliver='Success'; 
                                echo $deliver;
                            }
                            ?>
                        </td>
                        <td><?php $payment_status=$order['orderPaymentStatus'];
                            if($payment_status==0)
                            {
                                $payment_status='Pending';
                                echo $payment_status;

                            }
                            else
                            {
                                $payment_status='Success';
                                echo $payment_status;
                            }
                            ?>
                        </td>
                        <td><a style="color:red;font-size: 11px;font-family: arial;" href="<?php echo site_url('product/order_details').'/'.$order['orderSessionId']?>" title="Details">Detail>></a></td>
                    </tr>

                <?php endforeach; ?>
                    <?php } else{?>
                    <tr><td>Ordered Listing is 0</td></tr>

                    <?php }?>
            </table>
        </div>