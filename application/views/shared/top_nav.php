
<?php $main_cat = common::get_main_cat() ?>

<!--testing-->
<div class="clear"></div>
<style type="text/css">

    .nav{width:1126px;margin: 0 auto;margin-top: 10px;}

    .nav ul {

        list-style: none;

        background-color: #444;

        text-align: center;

        padding: 0;

        margin: 0;

        text-align:left;

        position: absolute;

        z-index: 2;


        width:1126px;margin: 0 auto;
        left: 0;



    }



    .nav li {

        line-height: 40px;

        text-align: left;



    }



    .nav a {

        text-decoration: none;

        color: #fff;

        display: block;

        padding-left: 15px;

        border-bottom: 1px solid #888;

        transition: .3s background-color;

        font-size:14px;

    }



    .nav a:hover {

        background-color: #005f5f;

    }



    .nav a.active {

        background-color: #aaa;

        color: #444;

        cursor: default;

    }



    /* Sub Menus */

    .nav li li {



    }



    /*******************************************

       Style menu for larger screens



       Using 650px (130px each * 5 items), but ems

       or other values could be used depending on other factors

    ********************************************/



    @media screen and (min-width: 650px) {

        .nav li {

            width: 130px;

            border-bottom: none;

            height: 50px;

            line-height: 50px;

            position:relative;

            display: inline-block;

            margin-right: -4px;

        }



        .nav a {

            border-bottom: none;

        }



        .nav > ul > li {

            text-align: center;

        }



        .nav > ul > li > a {

            padding-left: 0;

        }



        /* Sub Menus */



        .nav li ul {

            position: absolute;

            display: none;



            width:200px;

        }



        .nav li:hover ul {

            display: block;

        }



        .nav li:hover ul li ul {

            display: none;

        }

        .nav li:hover ul li:hover ul {

            display: block;

        }



        .nav li ul li {

            display: block;

            position:relative;

            width:200px;



            text-align:left;

        }

        .nav li i{

            background-image: url('images/down_arrow.png');

            display: inline-block;

            width: 16px;

            height: 16px;

            text-align: right;

            position: absolute;

            right: 5px;

            top: 17px;

        }

        .nav li ul li i{

            background-image:url('images/right_arrow.png');

            display:inline-block;

            width:16px;height:16px;

            text-align:right;

            position: absolute;

            right: 5px;

            top: 17px;

        }







    }



    /*tird-manu*/



    .nav li ul li ul{

        position: absolute;

        display: none;

        top: 0;

        left: 200px;

        width:200px;

        text-align:left;

    }



    .nav li ul li:hover ul {

        display: block;

    }

    .nav li ul li ul li{

        display: block;

        width:200px;

        text-align:left;

    }

    .nav li ul li a{text-align:left;}

    .nav li ul li ul li a{text-align:left;}







</style>







<div class="nav">





    <ul>

        <li><a href="<?php echo site_url('home'); ?>">Home</a></li>

        <?php foreach ($main_cat as $m_cat) { ?>

            <li><a href="<?php echo site_url('product/sub_cat_list/' . $m_cat['id']) ?>"><?php echo $m_cat['category_name'] ?></a>



                <?php

                $sub_cat = $this->mod_home->get_sub_cat($m_cat['id']);

                if (count($sub_cat) > 0) {

                    ?>

                    <i></i>



                    <ul>





                        <?php

                        foreach ($sub_cat as $sub) {

                            ?>



                            <li><a href="<?php echo site_url('product/sub_cat_product/' . $sub['id']) ?>"><?php echo substr($sub['category_name'], 0, 22) ?></a>



                                <?php

                                $three_cat = $this->mod_home->get_sub_cat($sub['id']);

                                if (count($three_cat) > 0) {

                                    ?>



                                    <i></i>

                                    <ul>

                                        <?php foreach ($three_cat as $third) { ?>

                                            <li><a href="<?php echo site_url('product/sub_cat_product/' . $third['id']) ?>"><?php echo substr($third['category_name'], 0, 22); ?></a></li>

                                        <?php }

                                        ?>

                                    </ul>

                                <?php } ?>

                            </li>

                        <?php }

                        ?>

                    </ul>

                <?php } ?>



            </li>

        <?php } ?>

    </ul>







</div>

