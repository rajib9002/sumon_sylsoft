<div class="user_nav">
    <h3 style="margin:0;padding:10px;font-size: 12px;color:#fff;"><?= $title ?></h3>
</div>

    <form id="valid_login" action='<?= site_url('login/reset_password/' . $verify_code) ?>' method='post'>

        <table width="770px" style="background-color:#e2e2e2; color:#000000;padding:15px 0;">

            <tr>
                <td align="right">New Password: <span class='req_mark'>*</span></td>
                <td align="left"><input type='password' name='new_password'  value='' class="width_200 input_style" /><?= form_error('new_password', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <td align="right">Confirm Password: <span class='req_mark'>*</span></td>
                <td align="left"><input type='password' name='conf_password' value='' class="width_200 input_style" /><?= form_error('conf_password', '<span>', '</span>') ?></td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td align="left">
                    <input type='submit' name='change_password' value='Change Password' class='p_payment' />
                </td>
            </tr>
        </table>
    </form>










