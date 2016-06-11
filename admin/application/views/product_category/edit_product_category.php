<div class="form_content"style="width:860px;">
        <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
        <span class="ui-jqdialog-title"><h1 style="padding:3px 10px;font-family: arial;font-size: 14px;"><?= $title ?></h1></span>
    </div>
    <form id="valid_form" method='post' action='<?=site_url($action);?>' enctype="multipart/form-data">
       <div id="add_form">
        <table id="add_image">
            <tbody>
                <tr>
                    <th> Parent Category <span class='req_mark'>*</span></th>
                    <td><select name="parent_id"><?=$sub_category_option?></select><?=form_error('parent_id','<span>','</span>')?></td>
                </tr>
                <tr>
                    <th width=150>Category Name <span class='req_mark'>*</span></th>
                    <td><input type='text' class="text ui-widget-content ui-corner-all width_200  required" name='category_name' value="<?= set_value('category_name', $category_info['category_name'])?>" /><?=form_error('category_name','<span>','</span>')?></td>
                </tr>
               <tr>
                   <th>&nbsp;</th>
                   <td><input type='submit' name='save' value='Save' class="button" /> <input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></td>
               </tr>

            </tbody>
        </table>

       </div>
    </form>
</div>
