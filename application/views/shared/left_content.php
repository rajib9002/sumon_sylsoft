<?php $main_cat = common::get_main_cat() ?>
<div class="demo">
    <style type="text/css">
	
	
        .sidebarmenu ul{
            margin: 0;
            padding: 0;
            list-style-type: none;
            font: bold 13px Verdana;
            /*width: 206px;  Main Menu Item widths */
            /*border-bottom: 1px solid #ccc;*/
        }
        .sidebarmenu ul li{
            position: relative;
        }
        /* Top level menu links style */
        .sidebarmenu ul li a{
            display: block;
            overflow: auto; /*force hasLayout in IE7 */
            color: white;
            text-decoration: none;
            padding: 6px;
            border-bottom: 1px dotted #ffffff;;
            border-right: 1px solid #778;
            text-align: left;
        }

        .sidebarmenu ul li a:link, .sidebarmenu ul li a:visited, .sidebarmenu ul li a:active{
            background-color: #4a88ff; /*background of tabs (default state)*/
        }

        .sidebarmenu ul li a:visited{
            color: white;
        }

        .sidebarmenu ul li a:hover{
            background-color: #0095d6;

        }
        .sidebarmenu ul li:hover{
            background-image: url("../images/sub_bullet.png");background-repeat: no-repeat;
        }

        /*Sub level menu items */
        .sidebarmenu ul li ul{
            position: absolute;
            /*width: 170px; Sub Menu Items width */
            top: 0;
            visibility: hidden;
        }

        .sidebarmenu a.subfolderstyle{
            /*background: url(right.gif) no-repeat 97% 50%;*/
        }
        /* Holly Hack for IE \*/
        * html .sidebarmenu ul li { float: left; height: 1%; }
        * html .sidebarmenu ul li a { height: 1%; }
        /* End */

    </style>
    <script type="text/javascript">
        //Nested Side Bar Menu (Mar 20th, 09)
        //By Dynamic Drive: http://www.dynamicdrive.com/style/
        var menuids = ["sidebarmenu1"] //Enter id(s) of each Side Bar Menu's main UL, separated by commas
        function initsidebarmenu() {
            for (var i = 0; i < menuids.length; i++) {
                var ultags = document.getElementById(menuids[i]).getElementsByTagName("ul")
                for (var t = 0; t < ultags.length; t++) {
                    ultags[t].parentNode.getElementsByTagName("a")[0].className += " subfolderstyle"
                    if (ultags[t].parentNode.parentNode.id == menuids[i]) //if this is a first level submenu
                        ultags[t].style.left = ultags[t].parentNode.offsetWidth + "px" //dynamically position first level submenus to be width of main menu item
                    else //else if this is a sub level submenu (ul)
                        ultags[t].style.left = ultags[t - 1].getElementsByTagName("a")[0].offsetWidth + "px" //position menu to the right of menu item that activated it
                    ultags[t].parentNode.onmouseover = function () {
                        this.getElementsByTagName("ul")[0].style.display = "block"
                    }
                    ultags[t].parentNode.onmouseout = function () {
                        this.getElementsByTagName("ul")[0].style.display = "none"
                    }
                }
                for (var t = ultags.length - 1; t > -1; t--) { //loop through all sub menus again, and use "display:none" to hide menus (to prevent possible page scrollbars
                    ultags[t].style.visibility = "visible"
                    ultags[t].style.display = "none"
                }
            }
        }
        if (window.addEventListener)
            window.addEventListener("load", initsidebarmenu, false)
        else if (window.attachEvent)
            window.attachEvent("onload", initsidebarmenu)
    </script>
    <div class="sidebarmenu">
        <ul id="sidebarmenu1">
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
</div>






