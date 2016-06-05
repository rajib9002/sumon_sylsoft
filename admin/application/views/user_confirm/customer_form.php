<div class="form_content">
    <form id="valid_news" method='post' action='<?= site_url($action); ?>' enctype="multipart/form-data">
        <table>
<tr>
                <td width="35%" align="right">Username:<span class='req_mark'>*</span></td>
                <td><input type='text' name='user_username' value='<?= set_value('user_username', $user_username) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block bg_color' style="border:1px solid #ccc"/>
                <?= form_error('user_username', '<span class="error">', '</span>') ?></td>
            </tr>
            <tr>
                <td align="right">First Name:<span class='req_mark'>*</span></td>
                <td><input type='text' name='user_first_name' value='<?= set_value('user_first_name', $user_first_name) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block' style="border:1px solid #ccc" /><?= form_error('user_first_name', '<span class="error">', '</span>') ?></td>
            </tr>
            <tr>
                <td align="right">Last Name:<span class='req_mark'>*</span></td>
                <td><input type='text' name='user_last_name' value='<?= set_value('user_last_name', $user_last_name) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block' style="border:1px solid #ccc" /><?= form_error('user_last_name', '<span class="error">', '</span>') ?></td>
            </tr>

            <tr>
                <td align="right">Email:<span class='req_mark'>*</span></td>
                <td><input type='text' id="user_email" name='user_email' value='<?= set_value('user_email', $user_email) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block'  style="border:1px solid #ccc"/><?= form_error('user_email', '<span class="error">', '</span>') ?></td>
            </tr>
            <tr>
                <td align="right">Confirm Email:<span class='req_mark'>*</span></td>
                <td><input type='text' name='conf_email' value='<?= set_value('conf_email', $user_email) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block' style="border:1px solid #ccc" /><?= form_error('conf_email', '<span class="error">', '</span>') ?></td>
            </tr>
            <tr>
                <td align="right">Paypal Email:<span class='req_mark'>*</span></td>
                <td><input type='text' name='paypal_email' value='<?= set_value('paypal_email', $paypal_email) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block' style="border:1px solid #ccc" /><?= form_error('paypal_email', '<span class="error">', '</span>') ?></td>
            </tr>
            <tr>
                <td align="right">Password:<span class='req_mark'>*</span></td>
                <td><input type='password' id="user_password"  name='user_password' value='<?= set_value('user_password', $user_password) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block' style="border:1px solid #ccc" /><?= form_error('user_password', '<span class="error">', '</span>') ?></td>
            </tr>
            <tr>
                <td align="right">Confirm Password:<span class='req_mark'>*</span></td>
                <td><input type='password' name='conf_password' value='<?= set_value('conf_password', $user_password) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block'  style="border:1px solid #ccc" /><?= form_error('conf_password', '<span class="error">', '</span>') ?></td>
            </tr>

            <tr>
                <td align="right">Phone No:</td>
                <td><input type='text' name='phone_no' value='<?= set_value('phone_no', $phone_no) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block'  style="border:1px solid #ccc" /></td>
            </tr>
            <tr>
                <td align="right">Address:</td>
                <td align="left"><textarea name="address" rows="4" cols="25" class="text ui-widget-content ui-corner-all dis_block" style="border:1px solid #ccc"><?= set_value('address') ?></textarea></td>
            </tr>

            <tr>
                <td align="right">Postcode:</td>
                <td><input type='text' name='post_code' value='<?= set_value('post_code', $post_code) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block'  style="border:1px solid #ccc" /><?= form_error('post_code', '<span class="error">', '</span>') ?></td>
            </tr>

            <tr>
                <td align="right">Country:<span class='req_mark'>*</span></td>
                <td><input type='text' name='country' value='<?= set_value('country', $country) ?>' class='text ui-widget-content ui-corner-all required width_200 dis_block' style="border:1px solid #ccc" /><?= form_error('country', '<span class="error">', '</span>') ?></td>
            </tr>
            <tr><td>&nbsp;</td><td align="left"><input type='submit' name='update' value="Save" class='button' /><input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></td></tr>
        </table>

        </form>

    </div>