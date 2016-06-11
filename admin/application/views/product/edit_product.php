<? $inc=0 ?>
    <script type="text/javascript">
        function add_more_products(){
                        var new_products="<tr>"+
                            "<td><input type='text' class='text ui-widget-content ui-corner-all width_80 size_"+inc+"'name='size[]'/><input type='hidden' name='pro_serial[]' value='' id='pr_serial_"+inc+"'/></td>"+
                            "<td><input type='text' class='text ui-widget-content ui-corner-all width_80 unit_"+inc+"'name='unit[]'/></td>"+
                            "<td><input type='text' class='text ui-widget-content ui-corner-all width_80 weight_"+inc+"'name='weight[]'/></td>"+
                            "<td><input type='text' class='text ui-widget-content ui-corner-all width_80 price_"+inc+"'name='price[]'/></td>"+
                            "<td><input type='text' class='text ui-widget-content ui-corner-all width_80 quantity_"+inc+"' autocomplete='off' onkeyup='javascript:item_calculation.price_quantity("+inc+")'  name='quantity[]'  /></td>"+
                            "<td><input type='text' class='text ui-widget-content ui-corner-all width_80 color_"+inc+"'name='color[]'/></td>"+
                            "<td><input type='text' class='text ui-widget-content ui-corner-all width_80 designer_"+inc+"'name='designer[]'/></td>"+
                            "</tr>";
                        $j('#product').append(new_products);
                        inc++;
                        return false;
        }
    </script>


    <div class="form_content"style="width:860px;">
        <div class="ui-jqdialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix form_title">
            <span class="ui-jqdialog-title"><h1 style="padding:3px 10px;font-family: arial;font-size: 14px;"><?= $title?></h1></span>
        </div>

        <form id="valid_form" class="sale_form" method='post' action='<?=site_url($action);?>' enctype="multipart/form-data">
        <?php// if(validation_errors()){ echo "<div class='error'>".validation_errors()."</div>";}?>
        <table>
                    <tbody>
                        <tr>
                            <th>Category:<span class='req_mark'>*</span></th>
                            <td><select name="category_id"><?=$sub_category_option?></select><?= form_error('category_id', '<span>', '</span>') ?></td>
                        </tr>
                        <tr>
                            <th width=150>Item Code<span class='req_mark'>*</span></th>
                            <td><input type='text' class="text ui-widget-content ui-corner-all" name='item_code' style="width:190px;" value="<?= set_value('item_code', $product_data['item_code'])?>" /><?= form_error('item_code', '<span>', '</span>')?></td>
                        </tr>

                        <tr>
                            <th width=150>Title:<span class='req_mark'>*</span></th>
                            <td><input type='text' class="text ui-widget-content ui-corner-all" name='product_name' style="width:190px;" value="<?= set_value('product_name', $product_data['product_name'])?>" /><?= form_error('product_name', '<span>', '</span>')?></td>
                        </tr>
                        <tr>
                            <th width=150>Brands</th>
                            <td><input type='text' class="text ui-widget-content ui-corner-all" name='brand' style="width:190px;" value="<?= set_value('brand', $product_data['brand'])?>" /><?= form_error('brand', '<span>', '</span>')?></td>
                        </tr>

                        <tr>
                        <th>Description:</th>
                        <td><textarea name="description" rows="6" cols="50" id="content" class="text ui-widget-content ui-corner-all"><?= set_value('description', $product_data['description'])?></textarea></td>
                    </tr>

                        <tr>
                            <th width=150>Product Type:<span class='req_mark'>*</span></th>
                            <td>
                                <?php if($product_data['pro_type']==1){?>
                                <input type="radio" name="pro_type" value="1" checked> Ordinary
                                <input type="radio" name="pro_type" value="2" > Special
                                <input type="radio" name="pro_type" value="3"> Featured
                                <input type="radio" name="pro_type" value="4"> New Product
                                <input type="radio" name="pro_type" value="5"> On Sale
                                <?php } elseif($product_data['pro_type']==2){?>
                                <input type="radio" name="pro_type" value="1"> Ordinary
                                <input type="radio" name="pro_type" value="2" checked> Special
                                <input type="radio" name="pro_type" value="3"> Featured
                                <input type="radio" name="pro_type" value="4"> New Product
                                <input type="radio" name="pro_type" value="5"> On Sale
                                <?php }elseif($product_data['pro_type']==3){?>
                                <input type="radio" name="pro_type" value="1"> Ordinary
                                <input type="radio" name="pro_type" value="2"> Special
                                <input type="radio" name="pro_type" value="3" checked> Featured
                                <input type="radio" name="pro_type" value="4"> New Product
                                <input type="radio" name="pro_type" value="5"> On Sale
                                <?php } elseif($product_data['pro_type']==4){?>
                                <input type="radio" name="pro_type" value="1"> Ordinary
                                <input type="radio" name="pro_type" value="2"> Special
                                <input type="radio" name="pro_type" value="3"> Featured
                                <input type="radio" name="pro_type" value="4" checked> New Product
                                <input type="radio" name="pro_type" value="5"> On Sale
                                <?php } else{?>
                                <input type="radio" name="pro_type" value="1"> Ordinary
                                <input type="radio" name="pro_type" value="2"> Special
                                <input type="radio" name="pro_type" value="3"> Featured
                                <input type="radio" name="pro_type" value="4"> New Product
                                <input type="radio" name="pro_type" value="5" checked> On Sale
                                <?php }?>
                            </td>
                        </tr>

                        <tr>
                        <th>Additional Info:</th>
                        <td><textarea name="additional_info" rows="6" cols="50"><?= set_value('additional_info', $product_data['additional_info'])?></textarea></td>
                    </tr>

                        <tr>
                            <th>Image:</th>
                            <td>
                            <?php if ($product_data['image'] != '') { ?>
                                <img src="<?= base_url() . '../uploads/product/thumb_' . $product_data['image'] ?>" alt="alt"/>
                            <?php } ?>
                                <input type="file" name="image" /><?=set_value('../uploads/product/thumb_' . $product_data['image']) ?>
                            </td>
                        </tr>
                    </tbody>

    </table>


    <table id="product"  width="100%" border="0" style="margin:0;background-color:#fff;">
        <tbody>
            <tr>
                <td colspan="10">
                    <a href="javascript:void(0)" class="more_purchase_products" style="color:#0072bc;font-weight: bold;" onclick="return add_more_products()"><b>Add Multiple Price</b></a><br />
                </td>
            </tr>
            <tr>
            <td>Size <font color="red">(Example: 1)</font></td>
            <td>Unit <font color="green">(Example: case)</font></td>
            <td>weight<font color="red">(Example: 250gm)</font></td>
            <td>Price <font color="red">(fill with number)</font></td>
            <td>Stock <font color="red">(fill with number)</font></td>
            <td>Color</td>
            <td>Designer</td>
            </tr>
            <?php if(count($price_table_info)>0):
                foreach($price_table_info as $info):?>

            <tr>
                <td><input type='text' value="<?= $info['size']; ?>"class="text ui-widget-content ui-corner-all width_80  size_<?=$inc ?> "  name='size[]' value=""/>
                <input type="hidden" name="pro_serial[]" value="<?= $info[product_id]; ?>" id="pr_serial_<?= $inc ?>"/>
                <input type="hidden" name="serial_id[]" value="<?= $info[product_price_id]; ?>"/>
                </td>
                <td><input type='text' value="<?= $info['unit']; ?>" class="text ui-widget-content ui-corner-all width_80  unit_<?=$inc ?> " name='unit[]' value="" /></td>
                <td><input type='text' value="<?= $info['weight']; ?>" class="text ui-widget-content ui-corner-all width_80  unit_<?=$inc ?> " name='weight[]' value="<?=$_REQUEST['weight'][$inc]?>" /></td>
                <td><input type='text' value="<?= $info['price']; ?>" class="text ui-widget-content ui-corner-all width_80  price_<?=$inc ?> " name='price[]' value="" /></td>
                <td><input type='text' value="<?= $info['total_p_qty']; ?>" class="text ui-widget-content ui-corner-all width_80  quantity_<?=$inc ?>"name='quantity[]' value="" /></td>
             <td><input type='text' value="<?= $info['color']; ?>" class="text ui-widget-content ui-corner-all width_80  color_<?=$inc ?>"name='color[]' value="<?=$_REQUEST['color'][$inc]?>" /></td>
                <td><input type='text' value="<?= $info['designer']; ?>" class="text ui-widget-content ui-corner-all width_80  designer_<?=$inc ?>"name='designer[]' value="<?=$_REQUEST['designer'][$inc]?>" /></td>

            </tr>
            <?php
            endforeach;
            endif;
            ?>
        </tbody>
    </table>
    <div style="margin-left:110px;margin-top:20px;"><input type='submit' name='save' value='Save' class="button" /><input type='button' value='Cancel' onclick='window.history.back();' class="cancel" /></div>
    </form>
    </div>