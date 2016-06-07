<style>
    .ep_background{background-color:#fbf7f7;border-bottom:1px solid #b0b3b3;}
    ul.ep_design{margin:0;padding:0;}
    ul.ep_design li{list-style: none;margin:0;padding:0;}
    ul.ep_design li a{color:#6c6c6c;font-family:arial;padding:7px 20px;
                      text-align: center;float:left;display:block;
                      font-weight:bold;font-size:12px;text-decoration: none;}
    ul.ep_design li a:hover{background-color:#e2eefe;text-decoration: none;border-bottom:3px solid #e2eefe;color:#0054a6;}
    ul.ep_design li a.select_ep_design{border-left:1px solid #b0b3b3;border-right:1px solid #b0b3b3;background-color:#e2eefe;text-decoration: none;border-bottom:3px solid #e2eefe;color:#0054a6;}
    .en_function_background{background-color:#e2eefe;border-bottom:1px solid #e2eefe;}
    ul.ep_design_function{margin:0;padding:0;}
    ul.ep_design_function li{list-style: none;margin:0;padding:0;}
    ul.ep_design_function li a{text-decoration: none;border-right:1px solid #b0b3b3;color:#6c6c6c;font-size:13px;font-family:arial;;text-align: center;float:left;display:block;margin:5px 0;padding:5px 30px;font-weight:bold;}
    ul.ep_design_function li a:hover{background-color:#e2eefe;text-decoration: none;color:#0054a6;}
    ul.ep_design_function li a.select_ep_design{background-color:#e2eefe;font-weight:bold;text-decoration: none;color:#0054a6;}
</style>

<div class="ep_background">
    <ul class="ep_design">
<!--        <li><a  class="select_ep_design"  href="<?= site_url('home') ?>">HOME</a></li>-->
       
        <li style="float:right;">
            <a href="<?= site_url('product/view_cart') ?>">View Cart</a>
        </li>
        <li style="float:right;"><a href="javascript:void(0);">
                <?php
                $total_item = $this->mod_product->cart_ajax_itme();
                $element = explode('|', $total_item);
                ?>
                <?php if ($dir == 'product' && $page == 'view_cart') { ?>
                    Your Cart Detail In Bellow
                <?php } else { ?>
                    <span class="item" style="color:#f05f10;"><?php echo $element[0]; ?></span>&nbsp Items In Your Cart. And Total Amount is ৳&nbsp;<span class="price" style="color:#f05f10;"><?php
                        if ($element[1] == '') {
                            $element[1] = 0;
                        } echo $element[1];
                        ?>
                    </span>
                <?php } ?>
            </a>
        </li>
        
    </ul>
    <div class="clear"></div>
</div>
<div class="clear"></div>
