<div style="width:150px;float:left;border:1px solid #eee;margin-right:10px;">
<ul style="margin:0;padding:0;">
    <?php if($more_detail['image']!=''){?>
    <li style="list-style:none;margin:0;padding:0;">
        <img src="<?php echo base_url() . '/uploads/product/' . $more_detail['image'] ?>" alt="" width="150px" height="200px">
        </li>
 <?php } else{?>
        <li style="list-style:none;margin:0;padding:0;">
        <img src="<?php echo base_url() .'images/none_big.png'?>" alt="" width="150px" height="200px">

        </li>
        <?php }?>


</ul>
    </div>

<div style="width:220px;float:left;font-family: verdana;font-size: 11px;">
<p style="margin:0;padding:4px 0;"><strong>Product Name: </strong><?php echo $more_detail['product_name']?></p>
<p style="margin:0;padding:4px 0;"><strong>Item Code: </strong><?php echo $more_detail['item_code']?></p>
<p style="margin:0;padding:4px 0;"><strong>Brand: </strong><?php echo $more_detail['brand']?></p>

</div>