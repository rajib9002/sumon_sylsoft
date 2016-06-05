<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include_once 'shared/html_header.php'; ?>
    <body>
        <div class="container">
            <?php include_once 'shared/header.php'; ?>
            <div class="clear"></div>
            <?php include_once 'shared/slider.php'; ?>
            <div class="clear"></div>
            <?php include_once 'shared/navigation.php'; ?>
            <div class="clear"></div>
            <div class="mid_body margin-top_10">
                <div class="mid_left float_left margin_right_10">
                    <?php include_once 'shared/left_content.php'; ?>
                </div>
                <div class="mid_right float_left">
                    <div style="background-color:#e2e2e2;width:770px;margin:0;padding:0;">
                        <div class="user_nav">
                            <h3 style="margin:0;padding:10px;font-size: 12px;color:#fff;"><?= $title ?></h3>
                        </div>
                        <div class="clear"></div>
                        <div style="padding:10px;line-height: 20px;font-family: verdana;font-size: 11px;color:#444444;">
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
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            <?php include_once 'shared/footer.php'; ?>
        </div>
    </body>
</html>