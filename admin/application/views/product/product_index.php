<div class="form_content"style="width:860px;">
    <form action="<?= site_url('product/index') ?>" method="post">
        <table>
            <tr>
                <th>Product Name </th><td><input type="text" name="product_name" value="<?= $_REQUEST['product_name'] ?>" class="text ui-widget-content ui-corner-all width_160" /></td>
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
<div class='grid_area' style="width:880px;">
        <?php
        if ($msg != "") {
            echo "<div class='success'>$msg</div>";
        }
        ?>
        <div class="tooolbars">
            <button id="add" title="product/add_product"  class="jadd_button">Add</button>
            <button title="product/edit_product" class="jedit_button">Edit</button>
            <button title="product/product_status_update/1" class="jedit_button">Activate</button>
            <button title="product/product_status_update/0" class="jedit_button">Deactivate</button>
            <button title="product/delete_product" class="jdelete_button">Delete</button>
        </div>
        <?php echo $grid_data ?>
    </div>