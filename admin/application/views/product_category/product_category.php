<div class="form_content"style="width:860px;">
    <form action="<?= site_url('product_category') ?>" method="post">
        <table>
             <tr>
                <th>Category Name </th><td><input type="text" name="category_name" value="<?= $_REQUEST['category_name'] ?>" class="text ui-widget-content ui-corner-all width_160" /></td>

            </tr>
            <tr>
                <th>Category Status </th>
                <td>
                    <input type="radio" name="status" value="1" <?= $_REQUEST['status'] == 1 ? 'checked' : '' ?>>&nbsp;Active&nbsp;
                    <input type="radio" name="status" value="0" <?= $_REQUEST['status'] == 0 ? 'checked' : '' ?>>&nbsp;Inactive&nbsp;
                    <input type="radio" name="status" value="" <?= $_REQUEST['status'] == '' ? 'checked' : '' ?>>&nbsp;All&nbsp;
                </td>
            </tr>
            <tr>
                <th><td align="left"><input type='submit' name='search' value='Search' class='button' /></td>
            </tr>
        </table>
    </form>
</div>
<div class='grid_area'>
    <?php if ($msg != ''): echo '<div class="success">' . $msg . '</div>';
    endif; ?>
    <div class="tooolbars">
        <button id="add" title="product_category/add_product_category"  class="jadd_button">Add</button>
        <button title="product_category/edit_product_category" class="jedit_button">Edit</button>
        <button title="product_category/delete_product_category" class="jdelete_button">Delete</button>
        <button title="product_category/update_category_status/1" class="jstatus_button">Activate</button>
        <button title="product_category/update_category_status/0" class="jstatus_button">Deactivate</button>
    </div>
<?php echo $grid_data ?>
</div>