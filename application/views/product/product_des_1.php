<!--one product start-->

<?php $setting_data=common::get_settings_data()?>

<div class="product_box_detail margin_right_8 float_left margin_bottom_8">
    <div class="product_img_detail float_left">
<ul class="gallery clearfix" style="margin:0;padding:0;">
    <?php if($product_detail['image']!=''){?>
    <li style="list-style:none;margin:0;padding:0;"><a href="<?php echo base_url() . '/uploads/product/' . $product_detail['image'] ?>" rel="prettyPhoto[gallery1]">   
        <img src="<?php echo base_url() . '/uploads/product/' . $product_detail['image'] ?>" alt="" width="244px" height="294px">
        </a></li>
 <?php } else{?>
        <li style="list-style:none;margin:0;padding:0;"><a href="images/none_big.png" rel="prettyPhoto[gallery1]">
        <img src="images/none_big.png" alt="" width="244px" height="294px">

        </a></li>
        <?php }?>


</ul>
    </div>

    <div class="des_detail float_left">
        <a class="float_left" ><?php echo $product_detail['product_name'] ?></a>
        <div class="clear"></div>

<ul style="float:left;margin:0;padding:0;">
		<li style="list-style:none;padding:5px 0;"><a style="color:darkred;font-family: verdana;font-size: 11px;text-align: left;" class="fancybox fancybox.iframe" href="<?php echo site_url('product/more'.'/'.$product_detail['product_id'])?>">more details</a></li>
	</ul>




        <div class="clear"></div>
        <div class="table_content">
            <table cellpadding="1" border="0" cellspacing="1">
                <tr class="title">
                    <th>Size</th><th>Price</th><th>Weight</th><th>Order Quantity</th><th>Buy</th>
                </tr>
                <?php foreach ($multiple_data as $multiple):?>
                    <tr class="odd">
                        <td><?php echo $multiple['size'].$multiple['unit']?></td>
                        <td>$<?php echo $multiple['price'] ?></td>
                        <td><?php echo $multiple['weight'] ?></td>
                        <td><input type="text" name="quantity" style="width:50px;height:15px;" value="1" id="qnt_<?= $multiple['product_price_id'] ?>"></td><td align="bottom"><a href="javascript:void(0)" onclick="javascript:add_item(<?=$product_detail['product_id']?>,<?=$multiple['product_price_id'];?>)" title="Add To Cart"><img src="images/add.png"/></a></td>
                    </tr>

                <?php endforeach; ?>
            </table>
            <div class="clear"></div>
            
        </div>
        <p style="font-size:12px;color:darkred;font-family: verdana;">* For larger quantities, please call Customer Service, <span style="color:#000;font-weight: bold;"><?php echo $setting_data['company_email']?></span></p>
    </div>
    <div class="clear"></div>
<!--    <div class="cart_detail">
        <div class="add_cart_detail float_left">
            <a href="#"></a>
        </div>
    </div>-->
</div>
<div class="clear"></div>

<div class="take_more margin_bottom_8"><h1>Take You More</h1></div>
<div class="clear"></div>
<?php foreach($all_product as $product):?>
<div class="product_box margin_right_8 float_left margin_bottom_8">
    <div class="product_img float_left">
        <a href="<?php echo site_url('product/product_des/'.$product['product_id'].'/'.$product['p_main_cat_id']).'/'.url_title($product['product_name'])?>">
            <?php if($product['image']!=''){?>
            <img src="<?php echo base_url().'/uploads/product/thumb_'.$product['image']?>" alt="<?php echo $product['image']?>" width="74px" height="94px"/>
<?php } else{?>
             <img src="images/none_sm.png" alt="<?php echo $product['image']?>" width="74px" height="94px"/>
            <?php }?>
        </a>
    </div>



    <?php $multiple_data=$this->mod_home->get_multiple_data($product['product_id']);?>

    <div class="des float_left">
        <a href="<?php echo site_url('product/product_des/'.$product['product_id'].'/'.$product['p_main_cat_id']).'/'.url_title($product['product_name'])?>"><?php echo $product['product_name']?></a>
        <p><strong>Item Code</strong><?php echo $product['item_code']?></p>
        <h1 style="float:left;width:110px;height:16px;">Price: <?php echo $multiple_data[0]['price']?>$</h1>
        <?php if(count($multiple_data)>1){?>
        <a style="width:16px;height:16px;" href="<?php echo site_url('product/product_des/'.$product['product_id'].'/'.$product['p_main_cat_id']).'/'.url_title($product['product_name'])?>" title="view more size items"><img style="width:16px;height:16px;margin-top:8px;" src="images/view_more.png"/></a>
        <?php }?>
    </div>
    <div class="clear"></div>
    <div class="quantity">
        <span><h1>Size:</h1>&nbsp;<h2><?php echo $multiple_data[0]['size']?><?php echo substr($multiple_data[0]['unit'],0,5)?></h2></span>
        <span style="padding-top:3px;color:red;">Quantity:&nbsp;</span>
        <input type="text" name="quantity" value="1" id="qnt_<?= $product['product_id'] ?>">
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
<div class="clear"></div>
    <div class="pagination_links">
        <div class="float_left bold">Showing <?=$start ?>-<?=$end ?> of <?=$total ?>&nbsp;Products</div><div class="float_right"><?=$pagination_links ?></div>
        <div class="clear"></div>
    </div>


<!--one product end-->


        <script type="text/javascript" src="scripts/jquery-1.6.4.min.js"></script>
	<link rel="stylesheet" href="style/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<script src="scripts/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $("area[rel^='prettyPhoto']").prettyPhoto();

        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: false});

        $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
            custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
            changepicturecallback: function(){ initialize(); }
        });

        $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
            custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
            changepicturecallback: function(){ _bsap.exec(); }
        });
    });
</script>




<!--                for fancy box-->
<!--<script type="text/javascript" src="scripts/jquery-1.7.2.min.js"></script>-->
<script type="text/javascript" src="scripts/jquery.fancybox.js?v=2.0.6"></script>
	<link rel="stylesheet" type="text/css" href="style/jquery.fancybox.css?v=2.0.6" media="screen" />

	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>

        






