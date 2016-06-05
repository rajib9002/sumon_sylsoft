 <?php $this->load->view('shared/user_nav');?>

<div class="bg_notice">
 <form id="success_story" action='<?=site_url($action)?>' method='post' enctype="multipart/form-data">
        <table width="70%" border="0" cellspacing="3" align="left" class="mar_top_20 mar_left_25">
           
            <tr>
                <th width="25%" align="right" valign="top">Username:</th>
                <td><input type='text' name='user_username' class="input_style" value='<?=set_value('user_username',$info['user_username'])?>'></td>

            </tr>

            <tr>
                <th align="right" valign="top">Email:</th>
               <td><input type='text' name='user_email' class="input_style" value='<?=set_value('user_email',$info['user_email'])?>'></td>


            </tr>

            <tr>
                <th align="right" valign="top">Phone No:</th>
                <td><input type='text' name='phone_no' class="input_style" value='<?=set_value('phone_no',$info['phone_no'])?>'></td>

            </tr>

             <tr>
                <th align="right" valign="top">Address:</th>
                <td><textarea  name="address" style="width:200px; height:auto;"><?=set_value('address',$info['address'])?></textarea></td>

             </tr>

            <tr>
                <th align="right" valign="top">Post Code:</th>
                <td><input type='text' name='post_code' class="input_style" value='<?=set_value('post_code',$info['post_code'])?>'></td>

            </tr>

            <tr>
                <th align="right" valign="top">Country:</th>
<!--                <td><input type='text' name='country' class="input_style" value='<?=set_value('country',$info['country'])?>'></td>-->
<td>
                    <select name="country" class="input_style">

                                    <?php echo common::get_country();?>
                    </select>
                    <?=form_error('country', "<span class=error>", "</span>");?></td>
            </tr>

            <tr>
                <th>&nbsp;</th>
                <td>
                    <input type="submit" name="submit" value="Submit" class="p_payment"/>
                </td>
            </tr>


        </table>

  </form>

    

    <div class="clear"></div>
    </div>

 <div class="clear"></div>

