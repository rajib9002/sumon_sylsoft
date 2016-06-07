<?php $main_cat = common::get_main_cat() ?>
<!--testing-->
<style type="text/css">

    .nav ul {
        list-style: none;
        background-color: #444;
        text-align: center;
        padding: 0;
        margin: 0;
    }

    .nav li {
        font-family: 'Oswald', sans-serif;
        font-size: 1.2em;
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
        font-size: .8em;
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
            font-size: 1.4em;
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
            width: inherit;
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
        }



    }

    /*tird-manu*/

    .nav li ul li ul{
        position: absolute;
        display: none;
        top: 0;
        left: 130px;
    }

    .nav li ul li:hover ul {
        display: block;
    }
    .nav li ul li ul li{
        display: block;
    }
</style>



<div class="nav">


    <ul>
        <li><a href="#">Test</a>
            <ul>
                <li><a href="#">Test1</a>
                    <ul>
                        <li><a href="#">Test2</a></li>
                    </ul>
                </li>
            </ul>

        </li>
    </ul>


    <ul>
        <?php foreach ($main_cat as $m_cat): ?>
            <?php $sub_cat = $this->mod_home->get_sub_cat($m_cat['id']); ?>
            <li><a href="<?php echo site_url('product/sub_cat_list/' . $m_cat['id']) ?>"><?php echo $m_cat['category_name'] ?></a>
                <ul>
                    <?php
                    if (count($sub_cat) > 0):
                        foreach ($sub_cat as $sub):
                            ?>
                            <?php $three_cat = $this->mod_home->get_sub_cat($sub['id']); ?>
                            <?php if ($m_cat['hidden'] == 2) { ?>
                                <li><a href="<?php echo site_url('product/brand_list/' . $sub['id']) ?>"><?php echo $sub['category_name'] ?></a></li>
                            <?php } else { ?>
                                <li><a href="<?php echo site_url('product/sub_cat_product/' . $sub['id']) ?>"><?php echo $sub['category_name'] ?></a>
                                    <?php if (count($three_cat) > 0) { ?>
                                        <ul>
                                            <?php foreach ($three_cat as $third) { ?>
                                                <li><a href="<?php echo site_url('product/sub_cat_product/' . $third['id']) ?>"><?php echo $third['category_name'] ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                </li>
                            <?php } ?>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </ul>
            </li>
        <?php endforeach; ?>
    </ul>
</div>








