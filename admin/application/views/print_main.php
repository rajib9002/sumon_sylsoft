<html>
    <head>
        <title>Print <?=$title?></title>
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
        <base href="<?=base_url()?>" />
        <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
        <link type="text/css" rel="stylesheet" href="<?=base_url()?>style/print_style.css">
        <script type="text/javascript">
            <!--
            function printthispage() {
                //window.print();
                if (navigator.appName == "Microsoft Internet Explorer")
                {
                  var PrintCommand = '<object ID="PrintCommandObject" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></object>';
                  document.body.insertAdjacentHTML('beforeEnd', PrintCommand);
                  PrintCommandObject.ExecWB(6, -1); PrintCommandObject.outerHTML = "";
                }
                else {
                  window.print();
                }
            }
            //-->
        </script>
    </head>
    <body onload="printthispage()">
        <div class="doc_wrapper mar_0_auto txt_center">
            <div style="background-color: #005d91;"><img src="images/logo.png" alt="logo.png"/></div>
            <div class="inner mar_0_auto">
                <div class="header_wrapper txt_center">
                    <div style="text-align:left;float:left;">
                    <?=date('d-m-Y')?> 
                    </div>
                    <div style="float:right">
                    <?=date('H:i')?>
                    </div>

                    <div class="clear"></div>
                </div>
                <div class="pad_10 m_height">
                    <?php include_once $dir . '/' . $page . '.php'; ?>
                </div>
                <div class="clear"></div>
            </div>
<div class="table_content" style="margin-top:10px;">
    <h1 style="margin:0;padding:3px 5px;text-align: left;font-size: 14px;font-family: arial;font-weight: bold;">Shipping Address :</h1>

<table cellpadding="1" border="0" cellspacing="1">
    <tr><td>Customer Name: &nbsp;</td><td><?php echo $shipping_detail['full_name']?></td></tr>
    <tr><td>Customer Phone: &nbsp;</td><td><?php echo $shipping_detail['phone_no']?></td></tr>
    <tr><td>Area Name: &nbsp;</td><td><?php echo $shipping_detail['area_name']?></td></tr>
    <tr><td>Home Details: &nbsp;</td><td><?php echo $shipping_detail['home_detail']?></td></tr>
</table>
    <h1 style="margin:0;padding:3px 5px;text-align: center;font-size: 12px;font-family: arial;font-weight: bold;">Thank You for shopping with us</h1>
    <h1 style="margin:0;padding:2px 5px;text-align: center;font-size: 11px;font-family: arial;font-weight: bold;">Powered by</h1>
    <h1 style="margin:0;padding:1px 5px;text-align: center;font-size: 10px;font-family: arial;font-weight: bold;color:darkred;">Zafran Perfumes</h1>
    </div>
        </div>
    </body>
</html>