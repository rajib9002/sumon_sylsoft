
<div class="table_content" style="margin-right:10px;text-align: left;">
    <div style="font-size:12px;padding:15px 5px;text-align: left;color:#fff;font-weight: bold;background-color:#0072bc;">Brand List</div>
            <table cellpadding="10" border="0" cellspacing="1">
<?php $i=1;?>
<?php foreach($all_brand as $sub_cat_list){?>
<tr class="odd">
<td align="left"><a style="text-decoration:none;" href="<?php echo site_url('product/brand_product/'.$sub_cat_list['brand'])?>"><div style="padding:5px 20px;text-align: left;font-size: 14px;color:#000;text-decoration: none;"><?php echo $i?>. &nbsp;<?php echo $sub_cat_list['brand'];?></div></a></td>
</tr>
<?$i=$i+1;?>
<?php }?>
</table>
</div>

