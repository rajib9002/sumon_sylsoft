<?php
$p_cate = sql::rows("product_category", "parent_id=0");
$c_counter=1;
foreach ($p_cate as $p_cat) {

    $all_product = '';



    $all_product = sql::rows("product", "p_main_cat_id='$p_cat[id]' order by product_id desc limit 0,50");
    ?>



    <div class="category_wrapper">



        <h2><?php echo $p_cat['category_name'] ?></h2>



        <span id="prev" class="prev<?=$c_counter?>"><img src="images/prev1.png"></span>

        <span id="next"  class="next<?=$c_counter?>"><img src="images/next1.png"></span>

        <ul id="image_slider" class="image_slider<?=$c_counter?>">



            <?php
            $i = 1;

            foreach ($all_product as $product) {
                ?>



                <?php $multiple_data = $this->mod_home->get_multiple_data($product['product_id']); ?>

                <?php
                $type = $product['pro_type'];

                if ($type == 1) {

                    $type = '';
                } elseif ($type == 2) {

                    $type = 'Special';
                } elseif ($type == 3) {

                    $type = '';
                } elseif ($type == 3) {

                    $type = '';
                } elseif ($type == 4) {

                    $type = 'New';
                } else {

                    $type = 'On sale';
                }
                ?>







                <?php if ($i == 1) { ?>

                    <li>

                    <?php } ?>

                    <div class="area">

                        <div class="item">

                            <?php if ($product['image'] != '') { ?>

                                <img src="<?php echo base_url() . '/uploads/product/thumb_' . $product['image'] ?>" alt="<?php echo $product['product_name'] ?>">

                            <?php } else { ?>

                                <img src="images/none_sm.png" alt="<?php echo $product['product_name'] ?>">

                            <?php } ?>

                            <span class="type"><?php echo $type ?></span>

                        </div>

                        <div class="text_area">

                            <a href="<?php echo site_url('product/product_des/' . $product['product_id'] . '/' . $product['p_main_cat_id']) . '/' . url_title($product['product_name']) ?>"><?php echo $product['product_name'] ?></a>

                            <div class="clear"></div>

                            <h4>$<?php echo $multiple_data[0]['price'] ?></h4>

                        </div>



                        <!--<div class="color_area">



                            <div class="clear"></div>

                            <div class="quantity">

                                <span><h3>Size:</h3>&nbsp;<h3><?php echo $multiple_data[0]['size'] ?><?php echo substr($multiple_data[0]['unit'], 0, 5) ?></h3></span>

                                <span style="padding-top:3px;color:red;">Quantity:&nbsp;</span>

                                <input type="text" name="quantity" value="1" id="qnt_<?= $multiple_data[0]['product_price_id'] ?>">

                            </div>

                            <div class="clear"></div>



                            <div class="cart">

                                <div class="detail float_left">

                                    <a href="<?php echo site_url('product/product_des/' . $product['product_id'] . '/' . $product['p_main_cat_id']) . '/' . url_title($product['product_name']) ?>"></a>

                                </div>

                                <div class="add_cart float_left">

                                    <a href="javascript:void(0)" onclick="javascript:add_item(<?= $product['product_id'] ?>,<?= $multiple_data[0]['product_price_id']; ?>)"></a>

                                </div>

                            </div>

                        </div>-->

                    </div>

                    <?php if ($i == 5) { ?>

                    </li>

                <?php } ?>

                <?php
                $i++;

                if ($i == 6) {

                    $i = 1;
                }
            }
            ?>

        </ul>



    </div>



<?php $c_counter++; } ?>



<script type="text/javascript">
    var slider_wrapper1;
    var ul1 = document.querySelector(".image_slider1");
    var li_items1;
    var imageNumber1;
    var imageWidth1;
    var imageHeight1;
    var prev1 = document.querySelector(".prev1");
    var next1 = document.querySelector(".next1");
    var currentPostion1 = 0;
    var currentImage1 = 0;
    li_items1 = ul1.children;
    imageNumber1 = li_items1.length;
    imageWidth1 = 1126;
    ul1.style.width = parseInt((imageWidth1 * imageNumber1)) + 'px';
    prev1.onclick = function () {
        onClickPrev1();
    };
    next1.onclick = function () {
        onClickNext1();
    };
    function slideTo1(imageToGo1) {
        ul1.style.left = parseInt(imageWidth1 * imageToGo1 * -1) + 'px';
        currentImage1 = imageToGo1;
    }
    function onClickPrev1() {
        if (currentImage1 == 0) {
            slideTo1(imageNumber1 - 1);
        }
        else {
            slideTo1(currentImage1 - 1);
        }
    }
    function onClickNext1() {
        if (currentImage1 == imageNumber1 - 1) {
            slideTo1(0);
        }
        else {
            slideTo1(currentImage1 + 1);
        }
    }
</script>


<script type="text/javascript">
    var slider_wrapper2;
    var ul2 = document.querySelector(".image_slider2");
    var li_items2;
    var imageNumber2;
    var imageWidth2;
    var imageHeight2;
    var prev2 = document.querySelector(".prev2");
    var next2 = document.querySelector(".next2");
    var currentPostion2 = 0;
    var currentImage2 = 0;
    li_items2 = ul2.children;
    imageNumber2 = li_items2.length;
    imageWidth2 = 1126;
    ul2.style.width = parseInt((imageWidth2 * imageNumber2)) + 'px';
    prev2.onclick = function () {
        onClickPrev2();
    };
    next2.onclick = function () {
        onClickNext2();
    };
    function slideTo2(imageToGo2) {
        ul2.style.left = parseInt(imageWidth2 * imageToGo2 * -1) + 'px';
        currentImage2 = imageToGo2;
    }
    function onClickPrev2() {
        if (currentImage2 == 0) {
            slideTo2(imageNumber2 - 1);
        }
        else {
            slideTo2(currentImage2 - 1);
        }
    }
    function onClickNext2() {
        if (currentImage2 == imageNumber2 - 1) {
            slideTo2(0);
        }
        else {
            slideTo2(currentImage2 + 1);
        }
    }
</script>


<script type="text/javascript">
    var slider_wrapper3;
    var ul3 = document.querySelector(".image_slider3");
    var li_items3;
    var imageNumber3;
    var imageWidth3;
    var imageHeight3;
    var prev3 = document.querySelector(".prev3");
    var next3 = document.querySelector(".next3");
    var currentPostion3 = 0;
    var currentImage3 = 0;
    li_items3 = ul3.children;
    imageNumber3 = li_items3.length;
    imageWidth3 = 1126;
    ul3.style.width = parseInt((imageWidth3 * imageNumber3)) + 'px';
    prev3.onclick = function () {
        onClickPrev3();
    };
    next3.onclick = function () {
        onClickNext3();
    };
    function slideTo3(imageToGo3) {
        ul3.style.left = parseInt(imageWidth3 * imageToGo3 * -1) + 'px';
        currentImage3 = imageToGo3;
    }
    function onClickPrev3() {
        if (currentImage3 == 0) {
            slideTo3(imageNumber3 - 1);
        }
        else {
            slideTo3(currentImage3 - 1);
        }
    }
    function onClickNext3() {
        if (currentImage3 == imageNumber3 - 1) {
            slideTo3(0);
        }
        else {
            slideTo3(currentImage3 + 1);
        }
    }
</script>

<script type="text/javascript">
    var slider_wrapper4;
    var ul4 = document.querySelector(".image_slider4");
    var li_items4;
    var imageNumber4;
    var imageWidth4;
    var imageHeight4;
    var prev4 = document.querySelector(".prev4");
    var next4 = document.querySelector(".next4");
    var currentPostion4 = 0;
    var currentImage4 = 0;
    li_items4 = ul4.children;
    imageNumber4 = li_items4.length;
    imageWidth4 = 1126;
    ul4.style.width = parseInt((imageWidth4 * imageNumber4)) + 'px';
    prev4.onclick = function () {
        onClickPrev4();
    };
    next4.onclick = function () {
        onClickNext4();
    };
    function slideTo4(imageToGo4) {
        ul4.style.left = parseInt(imageWidth4 * imageToGo4 * -1) + 'px';
        currentImage4 = imageToGo4;
    }
    function onClickPrev4() {
        if (currentImage4 == 0) {
            slideTo4(imageNumber4 - 1);
        }
        else {
            slideTo4(currentImage4 - 1);
        }
    }
    function onClickNext4() {
        if (currentImage4 == imageNumber4 - 1) {
            slideTo4(0);
        }
        else {
            slideTo4(currentImage4 + 1);
        }
    }
</script>

<script type="text/javascript">
    var slider_wrapper5;
    var ul5 = document.querySelector(".image_slider5");
    var li_items5;
    var imageNumber5;
    var imageWidth5;
    var imageHeight5;
    var prev5 = document.querySelector(".prev5");
    var next5 = document.querySelector(".next5");
    var currentPostion5 = 0;
    var currentImage5 = 0;
    li_items5 = ul5.children;
    imageNumber5 = li_items5.length;
    imageWidth5 = 1126;
    ul5.style.width = parseInt((imageWidth5 * imageNumber5)) + 'px';
    prev5.onclick = function () {
        onClickPrev5();
    };
    next5.onclick = function () {
        onClickNext5();
    };
    function slideTo5(imageToGo5) {
        ul5.style.left = parseInt(imageWidth5 * imageToGo5 * -1) + 'px';
        currentImage5 = imageToGo5;
    }
    function onClickPrev5() {
        if (currentImage5 == 0) {
            slideTo5(imageNumber5 - 1);
        }
        else {
            slideTo5(currentImage5 - 1);
        }
    }
    function onClickNext5() {
        if (currentImage5 == imageNumber5 - 1) {
            slideTo5(0);
        }
        else {
            slideTo5(currentImage5 + 1);
        }
    }
</script>