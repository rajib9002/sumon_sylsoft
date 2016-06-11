<div class="mail_success">
    <h3>Contact Us</h3>

<h1 style="padding-left:10px;">ZAFRAN PERFUMES</h1>
<p>936 S MAPLE AVE , SPACE # 12</p>
<p>LOS ANGELES, CA 90015</p>

<p><strong>TEL :</strong> 1-213-253-8817</p>
<p><strong>Contract person :</strong> JAMAL</p>

<p>Monday - Sunday</p>
<p>10:00 am - 6:00 pm PDT (PacificDaylight Time)</p>

<p><strong>E-mail:</strong> zafranperfumes@att.net</p>

 


                <form action="<?= site_url('contact') ?>"  id="valid_contact" method="POST">
                    <div class="table_width">
                    <table width="600" border="0" align="left" style="margin-top: 5px;  margin-bottom:15px; font-family: Tahoma; font-size: 12px; color:#000000; font-weight: normal;padding-top: 10px;padding-right: 80px;">
                        <tr>
                           <td valign="top" align="right">Name:<span class='req_mark'>*</span></td>
                            <td align="left">
                                <input type="text"  name="contact_name" value="<?= $_REQUEST[contact_name] ?>" class='text ui-widget-content ui-corner-all required width_200 dis_block input_style' style="border:1px solid #ccc" /><?php echo form_error('contact_name', "<span class=error>", "</span>"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">Contact Email:<span class='req_mark'>*</span></td>
                            <td align="left">
                                <input type="text"   name="contact_email" value="<?= $_REQUEST[contact_email] ?>"class='text ui-widget-content ui-corner-all required width_200 dis_block input_style' style="border:1px solid #ccc"  /><?php echo form_error('contact_email', "<span class=error>", "</span>"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">Contact Subject:<span class='req_mark'>*</span></td>
                            <td align="left">
                                <input type="text" name="contact_subject"  value="<?= $_REQUEST[contact_subject] ?>"class='text ui-widget-content ui-corner-all required width_200 dis_block input_style' style="border:1px solid #ccc"  /><?php echo form_error('contact_subject', "<span class=error>", "</span>"); ?>
                            </td>
                        </tr>
                        <tr>
                            <td valign="top" align="right">Contact Message:<span class='req_mark'>*</span></td>
                            <td align="left">
                                <textarea  name="contact_message"  cols="30" rows="5" class="dis_block" ><?= $_REQUEST[contact_message] ?></textarea><?php echo form_error('contact_message', "<span class=error>", "</span>"); ?>
                            </td>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <td align="left">
                                <input type="submit" name="submit" value="Send" class="p_payment"/>
                            </td>
                        </tr>
                    </table>
                        </div>
                </form>
<!--            </div>-->
            <div class="clear"></div>

</div>
