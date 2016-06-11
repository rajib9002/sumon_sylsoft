<div class='grid_area' style="width:880px;">
    <?php
    if ($msg != "") {
        echo "<div class='success'>$msg</div>";
    }
    ?>
    <div class="tooolbars">
        <button id="add" title="state/add_state"  class="jadd_button">Add</button>
        <button title="state/edit_state" class="jedit_button">Edit</button>
        <button title="state/delete_state" class="jdelete_button">Delete</button>
    </div>
    <?php echo $grid_data ?>
</div>

