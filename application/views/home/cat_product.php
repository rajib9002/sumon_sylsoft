<!--<div class="search_bg">
<ul class="link_alp_bg">
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'A')?>">A</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'B')?>">B</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'C')?>">C</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'D')?>">D</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'E')?>">E</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'F')?>">F</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'G')?>">G</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'H')?>">H</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'I')?>">I</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'J')?>">J</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'K')?>">K</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'L')?>">L</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'M')?>">M</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'N')?>">N</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'O')?>">O</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'P')?>">P</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'Q')?>">Q</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'R')?>">R</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'S')?>">S</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'T')?>">T</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'U')?>">U</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'V')?>">V</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'W')?>">W</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'X')?>">X</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'Y')?>">Y</a></li>
    <li><a href="<?php echo site_url('product/sub_cat_list/'.$sub_id.'/'.'Z')?>">Z</a></li>

</ul>
<div class="clear"></div>
</div>-->
<div class="clear"></div>

<div class="height_10"></div>












<!--one product start-->
<?php foreach($all_product as $product):?>
<div class="product_box margin_right_8 float_left margin_bottom_8">
    <div class="product_img float_left">
        <a href="<?php echo site_url('product/product_des/'.$product['product_id'].'/'.$product['p_main_cat_id']).'/'.url_title($product['product_name'])?>">
           <?php if($product['image']!=''){?>
            <img src="<?php echo base_url().'/uploads/product/thumb_'.$product['image']?>" alt="<?php echo $product['product_name']?>" width="74px" height="94px">
        <?php } else{?>

             <img src="images/none_sm.png" alt="<?php echo $product['product_name']?>" width="74px" height="94px">
            <?php }?>
        </a>
    </div>

<?php
    $type = $product['pro_type'];
            if($type==1){$type='';}elseif($type==2){$type='Special';}elseif($type==3){$type='';}elseif($type==3){$type='';}elseif($type==4){$type='New';}else{$type='On sale';}?>


    <?php $multiple_data=$this->mod_home->get_multiple_data($product['product_id']);?>

    <div class="des float_left">
        <a href="<?php echo site_url('product/product_des/'.$product['product_id'].'/'.$product['p_main_cat_id']).'/'.url_title($product['product_name'])?>"><?php echo $product['product_name']?></a>
        <div class="clear"></div>
        <h1 style="float:left;width:110px;height:16px;">Price: $<?php echo $multiple_data[0]['price']?></h1>
        <div class="clear"></div>
        <p style="color:darkred;font-weight: bold;"><?php echo $type?></p>
        <div class="clear"></div>
        <?php if(count($multiple_data)>1){?>

        <a style="width:16px;height:16px;" href="<?php echo site_url('product/product_des/'.$product['product_id'].'/'.$product['p_main_cat_id']).'/'.url_title($product['product_name'])?>"><img style="width:16px;height:16px;margin-top:8px;" src="images/view_more.png"/></a>
        <?php }?>
    </div>
    <div class="clear"></div>
    <div class="quantity">
        <span><h1>Size:</h1>&nbsp;<h2><?php echo $multiple_data[0]['size']?><?php echo substr($multiple_data[0]['unit'],0,5)?></h2></span>
        <span style="padding-top:3px;color:red;">Quantity:&nbsp;</span>
        <input type="text" name="quantity" value="1" id="qnt_<?= $multiple_data[0]['product_price_id'] ?>">
    </div>
    <div class="clear"></div>

    <div class="cart">
        <div class="detail float_left">
            <a href="<?php echo site_url('product/product_des/'.$product['product_id'].'/'.$product['p_main_cat_id']).'/'.url_title($product['product_name'])?>"></a>
        </div>
        <div class="add_cart float_left">
            <a href="javascript:void(0)" onclick="javascript:add_item(<?=$product['product_id']?>,<?=$multiple_data[0]['product_price_id'];?>)"></a>
        </div>
    </div>
</div>
<?php endforeach;?>


<!--one product end-->
<?php if($condition!='new_product'):?>
    <div class="clear"></div>
    <div class="pagination_links">
        <div class="float_left bold">Showing <?=$start ?>-<?=$end ?> of <?=$total ?>&nbsp;Products</div><div class="float_right"><?=$pagination_links ?></div>
        <div class="clear"></div>
    </div>
<?php endif;?>