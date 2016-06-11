<div class="form_content" style="width:860px;">
     <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><h1 style="padding:3px 10px;font-family: arial;font-size: 14px;"><?= $title ?></h1></span>
    </div>
    <?php if($msg!=''){echo "<div class='success'>".$msg."</div>";}?>
    <form action='<?=site_url('settings/setting_company') ?>' method='post'>
            <table>
                <tr>
                    <th>Company Name <span class='req_mark'>*</span></th>
                    <td><input type='text' name='company_name' value='<?=$company_name?>' class='text ui-widget-content ui-corner-all required width_200' /></td>
                </tr>
                <tr>
                    <th>Address <span class='req_mark'>*</span></th>
                    <td><textarea name="company_address" rows="5" cols="40" class="text ui-widget-content ui-corner-all"><?=$company_address ?></textarea></td>
                </tr>
                <tr>
                    <th>Company Phone <span class='req_mark'>*</span></th>
                    <td><input type='text' name='company_phone' value='<?=$company_phone ?>' class='text ui-widget-content ui-corner-all required width_200' /></td>
                </tr>
                <tr>
                    <th>Company Mobile <span class='req_mark'>*</span></th>
                    <td><input type='text' name='company_mobile' value='<?=$company_mobile ?>' class='text ui-widget-content ui-corner-all required width_200' /></td>
                </tr>
                <tr>
                    <th>Custome care Phone</th>
                    <td><input type='text' name='company_email' value='<?=$company_email ?>' class='text ui-widget-content ui-corner-all required width_200' /></td>
                </tr>
                <tr>
                    <th>Shipping Amount</th>
                    <td><input type='text' name='shipping_amount' value='<?=$shipping_amount ?>' class='text ui-widget-content ui-corner-all' />$</td>
                </tr>
                <tr>
                    <th>&nbsp;</th><td><input type='submit' name='company_info' value='Update Information' class='button' /> <input type='button' name='cancel' value='Cancel' class='cancel' onclick="window.history.back(-1)"  /></td>
                </tr>
            </table>
        </form>
</div>
