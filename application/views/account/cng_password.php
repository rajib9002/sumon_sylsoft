 <?php $this->load->view('shared/user_nav');?>


<div class="bg_notice">
 
    <?php if ($msg != '') {
        echo "<div class='message success'>" . $msg . "</div>";
    } ?>
    <form id="valid_cng_password" action="<?= site_url('account/account_password') ?>" method="post">
        <table width="50%" border="0" align="left" >
            <tr>
                <th align="right" valign="top">Old Password <span class='req_mark'>*</span></th>
                <td><input type='password' name='old_password' value='' class="width_200 dis_block input_style" /><?= form_error('old_password', "<span class=error>", "</span>") ?></td>
            </tr>
            <tr>
                <th align="right" valign="top">New Password <span class='req_mark'>*</span></th>
                <td><input type='password' name='user_password' id="user_password" value='' class="width_200 dis_block input_style" /><?= form_error('user_password', "<span class=error>", "</span>") ?></td>
            </tr>
            <tr>
                <th align="right" valign="top">Confirm Password <span class='req_mark'>*</span></th>
                <td><input type='password' name='confirm_password' value='' class="width_200 dis_block input_style" /><?= form_error('confirm_password',"<span class=error>", "</span>") ?></td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td>
                    <input type='submit' name='change_password' class="p_payment" value='Change Password'/>
                </td>
            </tr>
        </table>
    </form>
    <div class="clear"></div>
</div>


