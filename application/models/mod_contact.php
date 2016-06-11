<?php

class mod_contact extends Model {

    function _construct() {
        parent::_construct();
    }

    function save_contact() {
        $data = array(
            'contact_name' => $_POST['contact_name'],
            'contact_email' => $_POST['contact_email'],
            'contact_subject' => $_POST['contact_subject'],
            'contact_message' => $_POST['contact_message'],
            'contact_date' => date('Y-m-d h:i:s')
        );
        $this->db->insert("mlm_contact", $data);
        $msg.="<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=ISO-8859-1'>
<title>return page</title>
<meta name='generator' content='WYSIWYG Web Builder - http://www.zafranperfumes.com'>
<style type='text/css'>
body
{
   background-color: #FFFFFF;
   color: #000000;
   scrollbar-face-color: #ECE9D8;
   scrollbar-arrow-color: #000000;
   scrollbar-3dlight-color: #ECE9D8;
   scrollbar-darkshadow-color: #716F64;
   scrollbar-highlight-color: #FFFFFF;
   scrollbar-shadow-color: #ACA899;
   scrollbar-track-color: #D4D0C8;
}
</style>
<style type='text/css'>
a
{
   color: #0000FF;
   outline: none;
   text-decoration: underline;
}
a:visited
{
   color: #800080;
}
a:active
{
   color: #FF0000;
}
a:hover
{
   color: #0000FF;
   text-decoration: underline;
}
</style>
<style type='text/css'>
#Table1
{
   border: 2px #C0C0C0 solid;
   background-color: transparent;
   border-spacing: 1px;
}
#Table1 td
{
   padding: 0px 0px 0px 0px;
}
#Table1 td div
{
   white-space: nowrap;
}
#Image1
{
   border: 0px #000000 solid;
}
#wb_Text1 
{
   background-color: transparent;
   border: 0px #000000 none;
   padding: 0;
}
#wb_Text1 div
{
   text-align: left;
}
#Table2
{
   border: 2px #C0C0C0 solid;
   background-color: transparent;
   border-spacing: 1px;
}
#Table2 td
{
   padding: 0px 0px 0px 0px;
}
#Table2 td div
{
   white-space: nowrap;
}
#wb_Text2 
{
   background-color: transparent;
   border: 0px #000000 none;
   padding: 0;
}
#wb_Text2 div
{
   text-align: left;
}
#Table3
{
   border: 2px #C0C0C0 solid;
   background-color: transparent;
   border-spacing: 1px;
}
#Table3 td
{
   padding: 0px 0px 0px 0px;
}
#Table3 td div
{
   white-space: nowrap;
}
#wb_Text3 
{
   background-color: transparent;
   border: 0px #000000 none;
   padding: 0;
}
#wb_Text3 div
{
   text-align: left;
}
#wb_Text4 
{
   background-color: transparent;
   border: 0px #000000 none;
   padding: 0;
}
#wb_Text4 div
{
   text-align: left;
}
#wb_Text5 
{
   background-color: transparent;
   border: 0px #000000 none;
   padding: 0;
}
#wb_Text5 div
{
   text-align: left;
}
#wb_Text6 
{
   background-color: transparent;
   border: 0px #000000 none;
   padding: 0;
}
#wb_Text6 div
{
   text-align: left;
}
#wb_Text7 
{
   background-color: transparent;
   border: 0px #000000 none;
   padding: 0;
}
#wb_Text7 div
{
   text-align: left;
}
#wb_Text8 
{
   background-color: transparent;
   border: 0px #000000 none;
   padding: 0;
}
#wb_Text8 div
{
   text-align: left;
}
</style>
</head>
<body>
<table style='position:absolute;left:434px;top:47px;width:492px;height:442px;z-index:0;' cellpadding='0' cellspacing='1' id='Table1'>
<tr>
<td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:left;vertical-align:top;height:116px;'>
&nbsp;</td>
</tr>
<tr>
<td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:left;vertical-align:top;height:144px;'>
&nbsp;</td>
</tr>
<tr>
<td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:left;vertical-align:top;height:168px;'>
&nbsp;</td>
</tr>
</table>
<div id='wb_Image1' style='position:absolute;left:569px;top:64px;width:228px;height:92px;z-index:1;padding:0;'>
<img src='images/logo.png' id='Image1' alt='' border='0' style='width:228px;height:92px;'></div>
<div id='wb_Text1' style='position:absolute;left:455px;top:240px;width:68px;height:16px;z-index:2;'>
<span style='color:#000000;font-family:Arial;font-size:13px;'><strong>Message:</strong></span></div>
<table style='position:absolute;left:530px;top:174px;width:354px;height:142px;z-index:3;' cellpadding='0' cellspacing='1' id='Table2'>
<tr>
<td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:left;vertical-align:top;height:134px;'>
<div><span style='color:#000000;font-family:Arial;font-size:13px;'>" . $_REQUEST['contact_message'] . "</span></div>
</td>
</tr>
</table>
<div id='wb_Text2' style='position:absolute;left:551px;top:192px;width:291px;height:32px;z-index:4;'>
<span style='color:#000000;font-family:Arial;font-size:13px;'><br></span></div>
<table style='position:absolute;left:530px;top:336px;width:354px;height:132px;z-index:5;' cellpadding='0' cellspacing='1' id='Table3'>
<tr>
<td style='background-color:transparent;border:1px #C0C0C0 solid;text-align:left;vertical-align:top;height:124px;'>
&nbsp;</td>
</tr>
</table>
<div id='wb_Text3' style='position:absolute;left:548px;top:357px;width:70px;height:16px;z-index:6;'>
<span style='color:#000000;font-family:Arial;font-size:13px;'><strong>Name:</strong></span></div>
<div id='wb_Text4' style='position:absolute;left:607px;top:358px;width:282px;height:16px;z-index:7;'>
<span style='color:#000000;font-family:Arial;font-size:13px;'>" . $_REQUEST['contact_name'] . "</span></div>
<div id='wb_Text5' style='position:absolute;left:550px;top:392px;width:69px;height:16px;z-index:8;'>
<span style='color:#000000;font-family:Arial;font-size:13px;'><strong>Email:</strong></span></div>
<div id='wb_Text6' style='position:absolute;left:607px;top:391px;width:265px;height:16px;z-index:9;'>
<span style='color:#000000;font-family:Arial;font-size:13px;'>" . $_REQUEST['contact_email'] . "</span></div>
<div id='wb_Text7' style='position:absolute;left:545px;top:425px;width:96px;height:16px;z-index:10;'>
<span style='color:#000000;font-family:Arial;font-size:13px;'><strong>Subject:</strong></span></div>
<div id='wb_Text8' style='position:absolute;left:608px;top:425px;width:297px;height:16px;z-index:11;'>
<span style='color:#000000;font-family:Arial;font-size:13px;'>" . $_REQUEST['contact_subject'] . "</span></div>
</body>
</html>";
        $msg = $_POST['contact_message'];
        $site = common::get_settings_data();
        $admin_email=$site['admin_email'];
//        echo $admin_email;
//        exit();
        $to = $admin_email;
        $from_name = 'zafran perfumes';
        $from = $_POST['contact_email'];
        $subject = $_REQUEST['contact_subject'];
        //common::sending_mail($_POST['contact_name'], $_POST['contact_email'], $subject, $msg, $to);
        //common::sending_mail($_POST['contact_name'], $_POST['contact_email'], $subject, $msg, $to);
        @mail($_REQUEST['contact_email'], "Contact Information", $msg, $header);
        @mail($admin_email, "Contact Information", $msg, $header);
        return true;
    }

}

?>
