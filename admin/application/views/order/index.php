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
<button id="add" title="order/print_view" class="jpopwindow_button">Details</button>
            <button title="order/delete_order" class="jdelete_button">Delete</button>
            <button title="order/paid" class="jstatus_button">Paid</button>
            <button title="order/delivered" class="jstatus_button">Delivered</button>
    </div>
<?php echo $grid_data ?>
</div>
