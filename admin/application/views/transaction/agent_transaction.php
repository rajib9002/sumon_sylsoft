<div class="form_content" style="width:860px;">
<form action="<?=site_url('transaction/agent_transaction')?>" method="post">
        <table>
            <tr>
               
                <th>User Name</th>
                <td><input type="text" name="name" value="<?=$_REQUEST['name']?>" class="text ui-widget-content ui-corner-all width_160" />
                </td>
            </tr>
            <tr>
                        <th>Date Between: </th>
                        <td  valign="top" >
                            <input type='text' name='date_from' class='text ui-widget-content ui-corner-all width_80 date_picker' value="<?=$_REQUEST['date_from']?>"/>
                             To
                            <input type='text' name='date_to' class='text ui-widget-content ui-corner-all width_80 date_picker' value="<?=$_REQUEST['date_to']?>"/>
                        </td>
                    </tr>
            <tr><th>&nbsp;</th> <td align="left"><input type='submit' name='search' value='Search' class='button' /></td></tr>
        </table>
    </form>
    </div>
<div class='grid_area'>
    <?php if($msg!=''): echo '<div class="success">'.$msg.'</div>'; endif;?>
<!--    <div class="tooolbars">

        <button  id="add"class="print_view_button" title="transaction/print_view/">Print Preview</button>
        
    </div>-->
<?php echo $grid_data ?>
</div>
<tr>
              
         </tr>