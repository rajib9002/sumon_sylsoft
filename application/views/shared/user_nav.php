<div class="user_nav">
<ul class="user_navi_button">
    <li><a href="<?=site_url('account/my_info')?>"<?php if($page=='my_info'){?>class="select"<?}?>>My Info</a></li>
    <li><a href="<?=site_url('account/edit_info')?>" <?php if($page=='edit_info'){?>class="select"<?}?>>Edit Info</a></li>
    <li><a href="<?=site_url('account/account_password')?>" <?php if($page=='cng_password'){?>class="select"<?}?>>Change Password</a></li>
    <li><a href="<?=site_url('product/view_cart')?>">View Cart</a></li>
    <li><a href="<?=site_url('product/view_order')?>" <?php if($page=='order' || $page=='order_des'){?>class="select"<?}?>>View Order</a></li>
</ul>
</div>