<div class="user_nav">
    <h3 style="margin:0;padding:10px;font-size: 12px;color:#fff;"><?= $title ?></h3>
</div>

    <form id="valid_login" action='<?= $action ?>' method='post'>
   <?php if ($this->session->flashdata('msg') != '') {?>
        <div style="background-color:#e2e2e2;width:770px;">
               <h1 style="padding:10px;margin:0;font-size: 11px;"> <?= $this->session->flashdata('msg') ?></h1>
            
    </div>
        <?php } ?>
        <div class="clear"></div>
        <table width="770px" style="background-color:#e2e2e2; color:#000000;padding:15px 0;">
            <tr>
                <td width="35%" valign="top" align="right">Username:</td>
                <td><input type="text" name="user_username" value="<?= set_value('user_username')?>" class="width_150 dis_block input_style" /><?=form_error('user_username', "<span class=error>", "</span>");?></td>
            </tr>
       
            <tr>
                <td valign="top" align="right">Password:</td>
                <td><input type="password" name="user_password" value="<?= set_value('user_password')?>" class="width_150  dis_block input_style"/><?=form_error('user_username', "<span class=error>", "</span>");?></td>
            </tr>
            
            <tr>
                <td>&nbsp;</td>
                <td style="width:50px;">
                    <input type="submit" name="login" class="p_payment" value="Login" style=""/>
                </td>
               
            </tr>

            <tr>
                <td>&nbsp;</td>
                <td align="left"><a style="color:darkred;" href="<?=site_url('login/forgot_password') ?>" title="Forgot Password?">Forgot Password?</a></td>
            </tr>
            
        </table>
    </form>
