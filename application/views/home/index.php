<?php $p_cate=sql::rows("product_category","parent_id=0");

foreach($p_cate as $p_cat) {

    $all_product='';



    $all_product=sql::rows("product","p_main_cat_id='$p_cat[id]' order by product_id desc limit 0,5");?>

    

<div class="category_wrapper">



    <h2><?php echo $p_cat['category_name']?></h2>



    <span  id="prev"><img src="images/prev1.png"></span>

    <span  id="next"><img src="images/next1.png"></span>

    <ul id="image_slider">



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



    <?php }?>



<script type="text/javascript">

    var slider_wrapper;

    var ul = document.getElementById('image_slider');

    var li_items;

    var imageNumber;

    var imageWidth;

    var imageHeight;

    var prev = document.getElementById("prev");

    var next = document.getElementById("next");

    var currentPostion = 0;

    var currentImage = 0;

    //function init_slider() {

    li_items = ul.children;

    imageNumber = li_items.length;

    // imageWidth = screen.width;

    imageWidth = 1126;

    ul.style.width = parseInt((imageWidth * imageNumber)) + 'px';

    prev.onclick = function () {

        onClickPrev();

    };

    next.onclick = function () {

        onClickNext();

    };

    //}

    function slideTo(imageToGo) {

        ul.style.left = parseInt(imageWidth * imageToGo * -1) + 'px';

        currentImage = imageToGo;

    }

    function onClickPrev() {

        if (currentImage == 0) {

            slideTo(imageNumber - 1);

        }

        else {

            slideTo(currentImage - 1);

        }

    }

    function onClickNext() {

        if (currentImage == imageNumber - 1) {

            slideTo(0);

        }

        else {

            slideTo(currentImage + 1);

        }

    }

</script>