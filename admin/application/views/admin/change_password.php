 
<div class="form_content"style="width:860px;">
    <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><h1 style="padding:3px 10px;font-family: arial;font-size: 14px;"><?= $title ?></h1></span>
    </div>
	 <?php if($msg!=''){echo "<div class='success'>".$msg."</div>";}?>
    <form action="<?=site_url('admin/change_password')?>" method="post">
        <table>
           
            <tr>
                <th>Old Password <span class='required'>*</span></th>
                <td><input type='password' name='old_password' value=''  class="text ui-widget-content ui-corner-all width_200" /><?=form_error('old_password','<span>','</span>')?></td>
            </tr>
            <tr>
                <th>New Password <span class='required'>*</span></th>
                <td><input type='password' name='new_password' value=''  class="text ui-widget-content ui-corner-all width_200" /><?=form_error('new_password','<span>','</span>')?></td>
            </tr>
            <tr>
                <th>Confirm Password <span class='required'>*</span></th>
                <td><input type='password' name='confirm_password' value=''  class="text ui-widget-content ui-corner-all width_200" /><?=form_error('confirm_password','<span>','</span>')?></td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td>
                    <input type='submit' name='change_password' value='Change Password' class='button' />
                    <input type='button' name='cancel' value='Cancel' class='cancel' onclick="window.history.back(-1)" />
                </td>
            </tr>
        </table>
    </form>
</div>
