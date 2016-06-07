<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include_once 'shared/html_header.php'; ?>

    <style>
        body {
            margin:0;
            padding:0;
            height:100%;
        }
        #wrapper_new {
            min-height:100%;
            position:relative;
        }
        #header_new {
            width:100%;
            z-index:999999;
            position:fixed;
            background-color:#fff;
        }
        #content_new {
            padding-top:70px;
            padding-bottom:30px;
            width:1200px;
            margin:0 auto;
        }
        #footer_new {
            width:100%;
           /* position:fixed;
            bottom:0;
            left:0;*/
        }
    </style>


    <body>


        <div id="wrapper_new"style="margin:0;">
            <div id="header_new">
                <?php include_once 'shared/top.php'; ?>
            </div>
            <div class="clear"></div>
            <div style="height:40px;">&nbsp;</div>
            <div class="header_bg"></div>

            <?php include_once 'shared/top_nav.php'; ?>

            <?php include_once 'shared/slider.php'; ?>


            <div class="main_content">
                <div class="center_content">
                    <div class="float_left" style="width:80%">
                        <?php
                        if ($dir == '') {
                            $dir = 'home';
                        }
                        if ($page == '') {
                            $page = 'index';
                        }
                        include_once $dir . '/' . $page . '.php';
                        ?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div style="height:50px">&nbsp;</div>
            <?php include_once 'shared/footer.php'; ?>
        </div>


    </body>
</html>