    <div class="navi_bg">
                    <ul class="navigation">
                        <li><a href="<?php echo site_url('home') ?>"<?php if($condition=='featured_product'){?>class="select"<?}?>>Home</a></li>
                        <li>  </li>
                        <li><a href="<?php echo site_url('product/special_product') ?>"<?php if($condition=='special_product'){?>class="select"<?}?>>Special Product</a></li>
                        <li> </li>
                        <li><a href="<?php echo site_url('product/new_product') ?>"<?php if($condition=='new_product'){?>class="select"<?}?>>New Product</a></li>
                        <li>  </li>
                        <li><a href="<?php echo site_url('product/all_product') ?>"<?php if($condition=='all_product'){?>class="select"<?}?>>Products</a></li>
                        <li> </li>
                        <li><a href="<?php echo site_url('home/on_sale') ?>"<?php if($condition=='on_sale'){?>class="select"<?}?>>On Sale</a></li>

<li> </li>


<li><a href="<?php echo site_url('contents/fragrance_list') ?>"<?php if($page=='fragrance_list'){?>class="select"<?}?>>Fragrance List</a></li>
                        <li>  </li>
                        <li><a href="<?php echo site_url('contents/home_fragrance_list') ?>"<?php if($page=='home_fragrance_list'){?>class="select"<?}?>>Home Fragrance List</a></li>



                    <?if(common::is_logged_in()==true){?>
                        <li>  </li>
                        <li><a href="<?php echo  site_url('account/my_info')?>"<?php if($dir=='account'){?> class="select"<?php }?>>My Account</a></li>
                        <li>  </li>
                        <li><a href="<?php echo  site_url('login/logout')?>">Logout</a></li>
                        <?}else{?>
                        <li>  </li>
                        <li><a href="<?php echo  site_url('user/register')?>"<?php if($dir=='user'){?> class="select"<?php }?>>Register</a></li>
                        <li>  </li>
                        <li><a href="<?php echo site_url('login')?>"<?php if($dir=='login'){?> class="select"<?php }?>>Login</a></li>
                        <?}?>



                    </ul>

                </div>
