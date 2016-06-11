
<div class="mail_success">
    <h3>Registration</h3>
    <p>Fill in gaps with your correct information for successful registration process </p>
    <p style="color:red;line-height: 25px;"><span style="color:#000;font-weight:bold;font-size: 12px;font-family: verdana;">Note:</span><br/>
<span style="color:#000;font-size: 12px;font-family: verdana;padding-bottom:7px;">1. The * labels are mandatory fields.</span><br/>
<span style="color:#000;font-size: 12px;font-family: verdana;padding-bottom:7px;">2. Additional Fee may apply to addresses of residential type.</span><br/>
***--- Please note: Register Only if.. ***--<br/>

A. Never Register Before ( Online or through telephone or mail service.)<br/>
B. Never order from us before<br/>
C. Never received a catalog from us before<br/>
<span style="color:#0000CC;font-size: 12px;font-family: verdana;">
***-- If any of the above is false, then you already have an account with us. Please call  to find out your account information. Duplicate account will be disabled. customer service can help you locate your account information as well as login information and password. (should you forget them). ***--
</span>
    </p>


    <form id="site_user" action='<?=site_url($action)?>' method='post'>
<div class="table_width" style="margin-top:15px;">
        <table  border="0" align="center" style="font-family:verdana; font-size: 11px; font-weight: normal;">
            <tr>
                <td align="right" valign="top"><strong>Username:</strong><span class='req_mark'>*</span></td>
                <td><input type='text' name='user_username' value='<?=set_value('user_username',$user_username)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block bg_color input_style' /><?=form_error('user_username', "<span class=error>", "</span>");?></td>
            </tr>
            <tr>
                <td  align="right" valign="top"><strong>First Name:</strong><span class='req_mark'>*</span></td>
                <td><input type='text' name='user_first_name' value='<?=set_value('user_first_name',$user_first_name)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style' /><?=form_error('user_first_name', "<span class=error>", "</span>");?></td>
            </tr>
            <tr>
                <td  align="right" valign="top"><strong>Last Name:</strong><span class='req_mark'>*</span></td>
                <td><input type='text' name='user_last_name' value='<?=set_value('user_last_name',$user_last_name)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style' /><?=form_error('user_last_name', "<span class=error>", "</span>");?></td>
            </tr>

            <tr>
                <td  align="right" valign="top"><strong>Email:</strong><span class='req_mark'>*</span></td>
                <td><input type='text' id="user_email" name='user_email' value='<?=set_value('user_email',$user_email)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style' /><?=form_error('user_email', "<span class=error>", "</span>");?></td>
            </tr>
            <tr>
                <td  align="right" valign="top"><strong>Confirm Email:</strong><span class='req_mark'>*</span></td>
                <td><input type='text' name='conf_email' value='<?=set_value('conf_email',$user_email)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style' /><?=form_error('conf_email', "<span class=error>", "</span>");?></td>
            </tr>

                            <tr>
<td  align="right" valign="top"><strong>Business type:</strong></td>

<td>

<select class="input_style" name="business_type">
<option value="0">Please select address type</option>
<option value="Business">Business</option>
<option value="Residential">Residential</option>
</select>

</td>
</tr>

             <tr>
                 <td  align="right" valign="top"><strong>Password:</strong><span class='req_mark'>*</span></td>
                 <td><input type='password' id="user_password"  name='user_password' value='<?=set_value('user_password',$user_password)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style'  /><?=form_error('user_password', "<span class=error>", "</span>");?></td>
             </tr>

             <tr>
                    <td  align="right" valign="top"><strong>Confirm Password:</strong><span class='req_mark'>*</span></td>
                    <td><input type='password' name='conf_password' value='<?=set_value('conf_password',$user_password)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style'  /><?=form_error('conf_password', "<span class=error>", "</span>");?></td>
                </tr>
             

            </table>
        </div>





        <div class="table_width" style="margin-top:15px;">
            <table  border="0" align="center" style="font-family:verdana; font-size: 11px; font-weight: normal;">
                







<tr>
                    <td  align="right" valign="top"><strong>Company Name:</strong></td>
                    <td><input type='text' name='company_name' value='' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style'  /></td>
                </tr>

                <tr>
                    <td  align="right" valign="top"><strong>Phone No.:</strong><span class='req_mark'>*</span></td>
                    <td><input type='text' name='phone_no' value='<?=set_value('phone_no',$phone_no)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style'  /><?=form_error('phone_no', "<span class=error>", "</span>");?></td>
                </tr>

                <tr>
                    <td  align="right" valign="top"><strong>Fax:</strong></td>
                    <td><input type='text' name='fax' value='' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style'  /></td>
                </tr>







                <tr>
                    <td align="right" valign="top"><strong>Street Address:</strong><span class='req_mark'>*</span></td>
                    <td align="left"><textarea name="address" rows="6" cols="35" class="text ui-widget-content ui-corner-all input_style dis_block"><?= set_value('address') ?></textarea><?=form_error('address', "<span class=error>", "</span>");?></td>
                </tr>


                <tr>
                    <td  align="right" valign="top"><strong>City:</strong></td>
                    <td><input type='text' name='city' value='' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style'  /></td>
                </tr>



                <tr>
                    <td align="right" valign="top"><strong>State</strong></td>
                    <td>
                        <select  name="state" class="input_style dis_block">
<option value="AA">Armed Forces Americas</option>
<option value="AE">Armed Forces Europe</option>
<option value="AK">Alaska</option>
<option value="AL">Alabama</option>
<option value="AP">Armed Forces Pacific</option>
<option value="AR">Arkansas</option>
<option value="AS">AMERICAN SAMOA</option>
<option value="AZ">Arizona</option>
<option value="CA">California</option>
<option value="CO">Colorado</option>
<option value="CT">Connecticut</option>
<option value="DC">Washington DC</option>
<option value="DE">Delaware</option>
<option value="FL">Florida</option>
<option value="FM">Federated States OF Micronesia</option>
<option value="GA">Georgia</option>
<option value="GU">GUAM</option>
<option value="HI">Hawaii</option>
<option value="IA">Iowa</option>
<option value="ID">Idaho</option>
<option value="IL">Illinois</option>
<option value="IN">Indiana</option>
<option value="KS">Kansas</option>
<option value="KY">Kentucky</option>
<option value="LA">Louisiana</option>
<option value="MA">Massachusetts</option>
<option value="MD">Maryland</option>
<option value="ME">Maine</option>
<option value="MH">Marshall Islands</option>
<option value="MI">Michigan</option>
<option value="MN">Minnesota</option>
<option value="MO">Missouri</option>
<option value="MP">MARIANA ISLANDS</option>
<option value="MS">Mississippi</option>
<option value="MT">Montana</option>
<option value="NC">North Carolina</option>
<option value="ND">North Dakota</option>
<option value="NE">Nebraska</option>
<option value="NH">New Hampshire</option>
<option value="NJ">New Jersey</option>
<option value="NM">New Mexico</option>
<option value="NV">Nevada</option>
<option value="NY">New York</option>
<option value="OH">Ohio</option>
<option value="OK">Oklahoma</option>
<option value="OR">Oregon</option>
<option value="PA">Pennsylvania</option>
<option value="PR">Puerto Rico</option>
<option value="PW">PALAU</option>
<option value="RI">Rhode Island</option>
<option value="SC">South Carolina</option>
<option value="SD">South Dakota</option>
<option value="TN">Tennessee</option>
<option value="TX">Texas</option>
<option value="UT">Utah</option>
<option value="VA">Virginia</option>
<option value="VI">VIRGIN ISLANDS</option>
<option value="VT">Vermont</option>
<option value="WA">Washington</option>
<option value="WI">Wisconsin</option>
<option value="WV">West Virginia</option>
<option value="WY">Wyoming</option>
</select>

                        </td>


                    </tr>



                


                <tr>
                    <td align="right" valign="top"><strong>Zip/Postal Code:</strong><span class='req_mark'>*</span></td>
                    <td><input type='text' name='post_code' value='<?=set_value('post_code',$post_code)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style'  /><?=form_error('post_code', "<span class=error>", "</span>");?></td>
                </tr>

                <tr>
                    <td align="right" valign="top"><strong>Country:</strong><span class='req_mark'>*</span></td>
<!--                    <td><input type='text' name='country' value='<?//=set_value('country',$country)?>' class='text ui-widget-content ui-corner-all required width_200 dis_block input_style'  /><?=form_error('country', "<span class=error>", "</span>");?></td>-->
<td>
                    <select name="country" class="input_style dis_block">
                                     
                                    <?php echo common::get_country();?>
                    </select>
                    <?=form_error('country', "<span class=error>", "</span>");?></td>
                </tr>

                <tr><td>&nbsp;</td><td align="left"><input type='submit' name='save' value="Save" class='p_payment' /></td></tr>

            </table>
        </div>
        <div class="clear"></div>
    </form>


</div>

