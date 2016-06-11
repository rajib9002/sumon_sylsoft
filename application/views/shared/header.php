<?php // $special = $this->mod_home->special_product(); ?>
<!--<script type="text/javascript">
    $(document).ready(function() {
        $("#slider").easySlider({
            auto: true,
            continuous: true,
            numeric: true
        });
    });
</script>
<div class="header">
    <div class="header_left float_left">-->
        
        
        <!--slider of from old-->
<!--        <div id="content" class="float_right">

                        <div id="slider" class="float_right slider_bg" style="height:114px;background-color: #000000;">
                                <ul>
        <?php foreach ($special as $product): ?>
                   <li><a href="<?php echo site_url('product/details/' . $product['product_id'] . '/' . $product['p_main_cat_id']) ?>">           
            <?php if ($product['image'] != '') { ?>
                            <img style="padding-top:8px;padding-left:8px;width:80px;height:80px;float:left" src="<?php echo base_url() . 'uploads/product/thumb_' . $product['image'] ?>" alt="<?php echo $product['product_name'] ?>" />
            <?php } else { ?>
                            <img style="padding-top:8px;padding-left:8px;width:80px;height:80px;float:left" src="images/none_sm.png" alt="<?php echo $product['product_name'] ?>"/>
            <?php } ?>
                    </a>
                  <div class="title_product">
        <a href="<?php echo site_url('product/details/' . $product['product_id'] . '/' . $product['p_main_cat_id']) ?>"><?php echo $product['product_name'] ?></a>
                <p><strong>Item Code : </strong><?php echo $product['item_code'] ?></p>
         <a href="<?php echo site_url('product/details/' . $product['product_id'] . '/' . $product['p_main_cat_id']) ?>">View Details</a>
          </div>
            </li>
        <?php endforeach; ?>
 </ul>
 </div>
 </div>-->

<!--off from old-->

<!--        <div class="search_upper_text">
            <?php
            $site = common::get_settings_data();
            $mobile = $site['company_mobile'];
            ?>
            <p style="margin:0;padding-top:14px;padding-right:23px;text-align:right;color:#fff;font-weight:bold;font-size:20px;"><?php echo $mobile ?></p>
        </div>
        <div class="search_form" style="float:left;margin-left:10px;color:#fff;">
            <form action="<?php echo site_url('home/search') ?>" method="post">
                <input type="text" style="width:200px;color:gray;" name="product_name" maxlength="255" />
                <input type="submit" name="search" value="Search"/>
            </form>
        </div>
    </div>
    <div class="header_mid float_left">
        <div class="height_10"></div>
        <ul class="quick_link">
            <li><a href="<?php echo site_url('product/special_product') ?>"<?php if ($condition == 'special_product') { ?> class="select"<?php } ?>>Special Product</a></li>
            <li><a href="<?php echo site_url('user/register') ?>"<?php if ($dir == 'user') { ?> class="select"<?php } ?>>Create an Account</a></li>
            <li><a href="<?php echo site_url('login') ?>"<?php if ($dir == 'login') { ?> class="select"<?php } ?>>Customer Login</a></li>
            <li><a href="<?php echo site_url('contact') ?>"<?php if ($dir == 'contact') { ?> class="select"<?php } ?>>Contact Us</a></li>
            <li><a href="<?php echo site_url('product/get_search') ?>"<?php if ($page == 'search') { ?> class="select"<?php } ?>>Search Alphabetic</a></li>
            <li><a href="<?php echo site_url('home/shipping_rate') ?>"<?php if ($page == 'shipping_rate') { ?> class="select"<?php } ?>>Shipping Rates</a></li>
        </ul>
    </div>
    <div class="header_right float_left">
        <?php
        $total_item = $this->mod_product->cart_ajax_itme();
        $element = explode('|', $total_item);
        ?>
        <div class="mini_cart_img">
            <?php if ($dir == 'product' && $page == 'view_cart') { ?>
                <h1 style="margin-left:70px;margin-right:20px;"> Your Cart Detail In Bellow</h1>
            <?php } else { ?>
                <h1 style="padding-left:30px;padding-right:20px;margin-left:100px;padding-top:2px;font-size: 12px;"><span class="item" style="color:#f05f10;"><?php echo $element[0]; ?></span> Items In Your Cart. And Total Amount is $<span class="price" style="color:#f05f10;"><?php
                        if ($element[1] == '') {
                            $element[1] = 0;
                        } echo $element[1];
                        ?></span></h1>
            <?php } ?>
            <div class="clear"></div>
            <div class="check_button float_right" style="margin-right:25px;">
                <a href="<?= site_url('product/view_cart') ?>"></a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>-->