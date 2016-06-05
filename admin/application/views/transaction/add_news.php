<div class="form_content">
    <form id="valid_news" method='post' action='<?= site_url($action); ?>' enctype="multipart/form-data">
        <table>

            <tr>
                <th>News Title<span class='req_mark'>*</span></th>
                <td><input type='text' name='news_title' value='<?= set_value('news_title') ?>' class='text ui-widget-content ui-corner-all width_200 required' /> <?= form_error('news_title', '<span>', '</span>') ?></td>
            </tr>

            <tr>
                <th>News Description<span class='req_mark'>*</span></th>
                <td><textarea name="news_des" rows="4" cols="30" id="content" class="content text ui-widget-content ui-corner-all"><?= set_value('news_des', $product_data['news_des']) ?></textarea><?= form_error('news_des', '<span>', '</span>') ?></td>
            </tr>

            <tr>
                <th>News Date<span class='req_mark'>*</span></th>
                <td><input type='text' name='news_date' value='<?= set_value('news_date') ?>' class='text ui-widget-content ui-corner-all width_200 required date_picker' /> <?= form_error('news_date', '<span>', '</span>') ?></td>
                
            </tr>

            <tr>
                <th>News Image<span class='req_mark'>*</span></th>
                <? if ($product_data['image'] != '') { ?>
                    <td><img src="../uploads/news_image/<?= $product_data['image'] ?>" alt="<?= $product_data['image'] ?>" style="width:100px;height:64px;" />

                    </td>
                <? } ?>
                <td><input type='file' name='image'/></td>
            </tr>


            <tr><th>&nbsp;</th><td><input type='submit' name='save' value='Save' class='button' /> <input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></tr>
        </table>
    </form>

</div>