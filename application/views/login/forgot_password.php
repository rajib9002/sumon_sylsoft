<div class="user_nav">
    <h3 style="margin:0;padding:10px;font-size: 12px;color:#fff;"><?= $title ?></h3></div>
    <?php if ($msg != '') {
        echo "<div class='message success'>" . $msg . "</div>";
    } ?>
    <form action='<?= site_url('login/forgot_password') ?>' method='post'>
        <?php
        if ($msg != '') {
            echo "<div class='error'>" . $msg . "</div>";
        }
        ?>
        <table width="770px" style="background-color:#e2e2e2; color:#000000;padding:15px 0;">
            <tr>
                <th>Email:<span class='req_mark'>*</span></th>
                <td><input type="text" name="user_email" class="dis_block input_style" value="<?= set_value('user_email') ?>" style="width:500px;" /><?= form_error('user_email', "<span class=error>", "</span>") ?></td>
                <td>
                    <input type='submit' name='send' value='Send' class='p_payment' />
                </td>
            </tr>

        </table>
    </form>









