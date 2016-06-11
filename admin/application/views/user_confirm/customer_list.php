       <div class="form_content" style="width:860px;">
            <form action="<?=site_url('user_confirm/customer_confirm')?>" method="post">
                   <table width="50%" border="0" cellpadding="2" cellspacing="2" align="center">
                        <tr>
                            <th valign="top">Name Keyword:</th>
                            <td>
                                <input type="text" name="name" value="<?=$_REQUEST['name']?>" class="text ui-widget-content ui-corner-all width_150" />
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td valign="top" >
                                <input type='radio' name='status' <?=$_REQUEST['status']==''?'checked':''?> value=""/><font color="#2E6E9E"><b>All</b></font>
                               <input type='radio' name='status'  value="1" <?=$_REQUEST['status']==1?'checked':''?>/><font color="#2E6E9E"><b>Active</b></font>
                                <input type='radio' name='status'  value="0" <?=$_REQUEST['status']=='0'?'checked':''?>/><font color="#2E6E9E"><b>Inactive</b></font>

                            </td>
                        </tr>
                        <tr>
                            <th>&nbsp;</th>
                            <td><input type='submit' name='search' value='Search' class='button' /></td>
                        </tr>
                   </table>
            </form>
   </div>

<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
    <div class="tooolbars">
<!--           <button  title="user_confirm/add_customer"  class="jadd_button">Add</button>-->
            <button id="add" title="user_confirm/edit_customer" class="jedit_button">Edit</button>
            <button title="user_confirm/delete_customer" class="jdelete_button">Delete</button>
            <button title="user_confirm/status_cus/1" class="jstatus_button">Activate</button>
            <button title="user_confirm/status_cus/0" class="jstatus_button">Deactivate</button>
    </div>
<?php echo $grid_data ?>
</div>
