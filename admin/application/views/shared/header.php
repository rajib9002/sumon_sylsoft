<?php if (common::is_logged_in()):?>
    <div class="top_menu">
        <ul class="sf-menu">
            <li><a href="<?=site_url('home') ?>" title='Home' class="white">Home</a></li>
            

            <li class="current"><a href="<?=  site_url('home')?>" class="white">Settings</a>
                <ul>
                    <li><a href="<?=site_url('admin')?>">Admin User</a></li>
                    <li><a href="<?=site_url('settings/set_paypal')?>">Paypal Settings</a></li>
                    <li><a href="<?=site_url('admin/change_password') ?>">Change Admin Password</a></li>
                    <li><a href="<?=site_url('settings/setting_company') ?>">Company Settings</a></li>
                </ul>
            </li>
            <li class="current"> <a href="<?=site_url('home')?>" class="white">Products</a>

            <ul>
                <li class="current"><a href="<?=site_url('product_category')?>">Product Categories</a></li>
                
                <li class="current"><a href="<?=site_url('product')?>">Products</a></li>
            </ul>
            </li>

            <li class="current"> <a href="<?=site_url('user_confirm')?>" class="white">User List</a></li>

            <li class="current"> <a href="<?=site_url('contact')?>" class="white">Contact List</a></li>

            <li class="current"> <a href="<?=site_url('seo')?>" class="white">Search Engine</a></li>

            <li class="current"> <a href="<?=site_url('order')?>" class="white">Ordered Items</a></li>
            <li><a href="<?=site_url('transaction') ?>" title='Transaction' class="white">Paypal Transaction</a></li>

            <li class="current"> <a href="<?=site_url('static_pages')?>" class="white">Static Pages</a>
                
            <ul>

<li class="current"><a href="<?=site_url('static_pages/fragrance_list') ?>">Fragrance List</a></li>
                <li class="current"><a href="<?=site_url('static_pages/home_fragrance_list') ?>">Home Fragrance List</a></li>
                
                <li class="current"><a href="<?=site_url('static_pages') ?>">About Us</a></li>
                <li class="current"><a href="<?=site_url('static_pages/terms_and_condition')?>">Terms And Condition</a></li>
                <li class="current"><a href="<?=site_url('static_pages/privacy_policy')?>">Privacy Policy</a></li>
                <li class="current"><a href="<?=site_url('static_pages/help')?>">Help</a></li>  
            </ul>
            </li>
            <li><a href="<?=site_url('state') ?>" title='State' class="white">Shipping Rate</a></li>
        </ul>
    </div>
    <div class="clear"></div>
    <?php endif; ?>