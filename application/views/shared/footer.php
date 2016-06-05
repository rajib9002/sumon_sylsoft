<div id="footer_new" style="background-color:#fbf7f7;border-top:1px solid gray;">
    <div class="bredcrumbs">
        <div style="float:left;width:97%">
            <ul>
                <li style="color:darkred;padding-bottom:8px;float:left;width:20%;text-align: left;list-style:none;">
                    <?php
                    if (count($nav_array) > 0) {
                        echo common::nav_menu_link($nav_array);
                    }
                    ?>
                </li>
                <li style="color:#000000;padding-bottom:8px;float:left;width:40%;font-size:12px;list-style:none;">
                    <p style="text-align:center;margin:0;padding:0;">Copyright &copy; <?php echo date('Y'); ?>. Allright Reserved SR Shop Online</p>
                </li>
                <li style="color:darkred;padding-bottom:8px;float:right;width:20%;text-align: right;list-style:none;">
                    <?= date('l F d,Y') ?>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>