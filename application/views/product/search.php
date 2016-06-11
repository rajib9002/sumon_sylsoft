<div class="search_bg">
<ul class="link_alp_bg">
    <li><a href="<?php echo site_url('product/get_search/'.'A')?>">A</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'B')?>">B</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'C')?>">C</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'D')?>">D</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'E')?>">E</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'F')?>">F</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'G')?>">G</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'H')?>">H</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'I')?>">I</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'J')?>">J</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'K')?>">K</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'L')?>">L</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'M')?>">M</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'N')?>">N</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'O')?>">O</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'P')?>">P</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'Q')?>">Q</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'R')?>">R</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'S')?>">S</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'T')?>">T</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'U')?>">U</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'V')?>">V</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'W')?>">W</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'X')?>">X</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'Y')?>">Y</a></li>
    <li><a href="<?php echo site_url('product/get_search/'.'Z')?>">Z</a></li>
    
</ul>
<div class="clear"></div>
</div>
<div class="clear"></div>

<div class="height_10"></div>
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



    <?php $multiple_data=$this->mod_home->get_multiple_data($product['product_id']);?>

    <div class="des float_left">
        <a href="<?php echo site_url('product/product_des/'.$product['product_id'].'/'.$product['p_main_cat_id']).'/'.url_title($product['product_name'])?>"><?php echo $product['product_name']?></a>
        <p><strong>Item Code : </strong><?php echo $product['item_code']?></p>
        <h1 style="float:left;width:110px;height:16px;">Price: $<?php echo $multiple_data[0]['price']?></h1>
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
