<link rel="stylesheet" href="<?php echo base_url() ?>style/vanillaSlideshow.css">
<div class="slider_banner" style="overflow:hidden;height:400px;position:relative;border:0;margin-top:13px;">
    <div class="slider" style="position:absolute;z-index:0;width:100%;border:0;">
        <div id="vanilla-slideshow-container">
            <div id="vanilla-slideshow">
                <?php
                $slider_new_product = sql::rows("product", "pro_type=4 order by product_id desc limit 0,10");
                ?>
                <?php foreach ($slider_new_product as $new) { ?>
                    <div class="vanilla-slide">
                        <a href="<?php echo site_url('product/product_des/' . $new['product_id'] . '/' . $new['p_main_cat_id']) . '/' . url_title($new['product_name']) ?>">
                            <img src="<?php echo base_url() . '/uploads/product/' . $new['image'] ?>" alt="<?php echo $new['product_name'] ?>">
                        </a>
                    </div>
                <?php } ?>
            </div>
            <div id="vanilla-indicators"></div>
            <div id="vanilla-slideshow-previous">
                <img src="images/arrow-previous.png" alt="slider arrow">
            </div>
            <div id="vanilla-slideshow-next">
                <img src="images/arrow-next.png" alt="slider arrow">
            </div>
        </div>
        <script src="<?php echo base_url() ?>scripts/vanillaSlideshow.min.js"></script>
        <script>
            vanillaSlideshow.init({
                slideshow: true,
                delay: 5000,
                arrows: true,
                indicators: true,
                random: false,
                animationSpeed: '1s'
            });
        </script>
    </div>
</div>