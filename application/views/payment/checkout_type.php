
<div class="mail_success" style="background-color: #fff;">
    <h3>Thank You For Your Request . We will Contact With You Very Soon...</h3>
</div>
<?php $session_id = $this->session->unset_userdata('session_id');?>

<!--<div class="mail_success" style="background-color: #fff;">
    <h3>Fillup the form and make payment</h3>
</div>
<div class="clear"></div>

<div class="payment_left float_left">
    <div class="paypal float_left">
        <div class="p_header_bg">
            </div>
<?php// if ($form_submitting == false) { ?>
           <form action="<?//= site_url('payment/checkout')?>" method="POST" id="valid_form">
<?php// if ($payment_error != '') { ?>
                <table width="100%" class="mar_top_20 red_border ">
                    <tr><td><b>Oops! You have the following errors: </b></td></tr>
                    <tr><td><?//= $payment_error ?></td></tr>
                </table>
        <?php //} ?>
                <table style="padding:13px 37px 13px 13px;border-right:1px solid #eee;border-left:1px solid #eee;">
                    <div style="padding:10px;color:red;font-size:13px;">Shipping Rate For Your State <?//=$this->session->userdata('shipping_rate_state')?> USD</div><br/>
                    <tr><td valign="center">Amount:</td></tr>

                    <tr><td><input type='text'class="input_style" name='amount' value="<?//=$this->session->userdata('total')?>"/></td><td>USD</td></tr>


                    <tr>

                <td align="right"><input type="submit" name="save" class="p_payment" value="Payment"></td>
                </tr>
                    </table>
                </form>
            <?php// } else {
        //echo $paypal_form;?>
        <div class="mar_top_20" style="text-align: left;padding:30px;color:darkred;">Redirecting to payment gateway. Please wait.....</div>

        <?php// } ?>


        
    </div>


    <div class="clear"></div>
<div style="height:20px;"></div>

<div class="clear"></div>

<?php// if ($METHOD_TO_USE == "AIM") {
        ?>
<!--        <form method="POST" action="<?//=site_url('payment/checkout')?>"id="checkout_form">-->
        <?php
    //} else {
        ?>
<!--<img style="border:1px solid #eee;"src="images/autho.jpg" width="291px"height="105px"/>

        <form method="post" action="<?php// echo site_url('payment/checkout')//echo (AUTHORIZENET_SANDBOX ? AuthorizeNetDPM::SANDBOX_URL : AuthorizeNetDPM::LIVE_URL)?>" id="checkout_form">
        <?php
        //$time = time();
        //$fp_sequence = $time;
//		$amount=20;
        //$fp = AuthorizeNetDPM::getFingerprint(AUTHORIZENET_API_LOGIN_ID, AUTHORIZENET_TRANSACTION_KEY, $amount, $fp_sequence, $time);
        //$sim = new AuthorizeNetSIM_Form(
            //array(
            //'x_amount'        => $amount,
            //'x_fp_sequence'   => $fp_sequence,
            //'x_fp_hash'       => $fp,
            //'x_fp_timestamp'  => $time,
            //'x_relay_response'=> "TRUE",
            //'x_relay_url'     => $coffee_store_relay_url,
            //'x_login'         => AUTHORIZENET_API_LOGIN_ID,
            //'x_test_request'  => TEST_REQUEST,
            //)
        //);
        //echo $sim->getHiddenFieldString();
    //}
    //?>
            
<!--
      <fieldset>
        <div>
          <label>Credit Card Number</label>
          <input type="text" class="text required creditcard" size="15" name="x_card_num" value="6011000000000012"/>
        </div>
        <div>
          <label>Exp.</label>
          <input type="text" class="text required" size="4" name="x_exp_date" value="04/15"/>
        </div>
        <div>
          <label>CCV</label>
          <input type="text" class="text required" size="4" name="x_card_code" value="782"/>
        </div>
      </fieldset>
      <fieldset>
        <div>
          <label>First Name</label>
          <input type="text" class="text required" size="15" name="x_first_name" value="John"/>
        </div>
        <div>
          <label>Last Name</label>
          <input type="text" class="text required" size="14" name="x_last_name" value="Doe"/>
        </div>
      </fieldset>
      <fieldset>
        <div>
          <label>Address</label>
          <input type="text" class="text required" size="26" name="x_address" value="123 Four Street"/>
        </div>
        <div>
          <label>City</label>
          <input type="text" class="text required" size="15" name="x_city" value="San Francisco"/>
        </div>
      </fieldset>
      <fieldset>
        <div>
          <label>State</label>
          <input type="text" class="text required" size="4" name="x_state" value="CA"/>
        </div>
        <div>
          <label>Zip Code</label>
          <input type="text" class="text required" size="9" name="x_zip" value="94133"/>
        </div>
        <div>
          <label>Country</label>
          <input type="text" class="text required" size="22" name="x_country" value="US"/>
        </div>
         
      </fieldset>
       <fieldset>
            <div>
          <label>Amount</label>
          <input type='text' name='amount' value="<?//=$this->session->userdata('total')?>"/>USD
        </div>
      </fieldset>
            
      <input type="submit" value="BUY" name="authorize_payment" class="p_payment">
    </form>

    </div>


<div class="payment_right float_left">
<div class="c_header_bg">

</div>

    <div class="clear"></div>

    <?php
//session_unset();
//$paymentType = $_REQUEST['paymentType'];
?>
<div class="card_bg">
    <form method="POST" action="<?//=site_url('payment/checkout')?>">
        <input type=hidden name=paymentType value="<?//=$paymentType?>" />
        <table width="100%" border="0" style="color:#000000;font-size: 11px;font-family: verdana;">
    <div style="padding:10px;color:red;font-size:13px;">Shipping Rate For Your State <?//=$this->session->userdata('shipping_rate_state')?> USD</div><br/>
            <tr>
                <td align=right style="background-color:#2B6FB6;margin:0;padding:20px;color:#fff;"><b>Card Details:</b></td>
            </tr>
            <tr>
                <td align=right>&nbsp;</td>
            </tr>
            <tr>
                <td align=right>First Name:</td>
                <td align=left><input type="text" class="input_style" size=30 maxlength=32 name="firstName" value='<?//= set_value('user_first_name', $user_info['user_first_name'])?>'></td>
            </tr>
            <tr>
                <td align=right>Last Name:</td>
                <td align=left><input type=text class="input_style" size=30 maxlength=32 name=lastName value="<?//= set_value('user_last_name', $user_info['user_last_name'])?>"></td>
            </tr>
            <tr>
                <td align=right>Card Type:</td>
                <td align=left>
                    <select name=creditCardType class="input_style">
                        <option value=Visa selected>Visa</option>
                        <option value=MasterCard>MasterCard</option>
                        <option value=Discover>Discover</option>
                        <option value=Amex>American Express</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align=right>Card Number:</td>
                <td align=left><input type=text class="input_style" size=19 maxlength=19 name=creditCardNumber></td>
            </tr>
            <tr>
                <td align=right>Expiration Date:</td>
                <td align=left><p>
                        <select name=expDateMonth class="height_30">
                            <option value=1>01</option>
                            <option value=2>02</option>
                            <option value=3>03</option>
                            <option value=4>04</option>
                            <option value=5>05</option>
                            <option value=6>06</option>
                            <option value=7>07</option>
                            <option value=8>08</option>
                            <option value=9>09</option>
                            <option value=10>10</option>
                            <option value=11>11</option>
                            <option value=12>12</option>
                        </select>
                        <select name=expDateYear class="height_30">
                            <option value=2005>2005</option>
                            <option value=2006>2006</option>
                            <option value=2007>2007</option>
                            <option value=2008>2008</option>
                            <option value=2009>2009</option>
                            <option value=2010>2010</option>
                            <option value=2011>2011</option>
                            <option value=2012 selected>2012</option>
                            <option value=2013>2013</option>
                            <option value=2014>2014</option>
                            <option value=2015>2015</option>
                        </select>
                    </p></td>
            </tr>
            <tr>
                <td align=right>Card Verification Number:</td>
                <td align=left><input type=text class="input_style" size=3 maxlength=4 name=cvv2Number value=''></td>
            </tr>
            <tr>
                <td align=right>&nbsp;</td>
            </tr>
            <tr>
                <td align=right style="background-color:#2B6FB6;margin:0;padding:20px;color:#fff;"><b>Billing Address:</b></td>
            </tr>
            <tr>
                <td align=right>&nbsp;</td>
            </tr>
            <tr>
                <td align=right>Address 1:</td>
                <td align=left><input class="input_style" type=text size=25 maxlength=100 name=address1 value="<?//= set_value('address', $user_info['address'])?>"></td>
            </tr>
            <tr>
                <td align=right>Address 2:</td>
                <td align=left><input type=text class="input_style"  size=25 maxlength=100 name=address2>(optional)</td>
            </tr>
            <tr>
                <td align=right>City:</td>
                <td align=left><input type=text class="input_style" size=25 maxlength=40 name=city value="<?//= set_value('address', $user_info['address'])?>"></td>
            </tr>
            <tr>
                <td align=right>State:</td>
                <td align=left>
                    <select id=state name=state class="height_30">
                        <option value=></option>
                        <option value=AK>AK</option>
                        <option value=AL>AL</option>
                        <option value=AR>AR</option>
                        <option value=AZ>AZ</option>
                        <option value=CA selected>CA</option>
                        <option value=CO>CO</option>
                        <option value=CT>CT</option>
                        <option value=DC>DC</option>
                        <option value=DE>DE</option>
                        <option value=FL>FL</option>
                        <option value=GA>GA</option>
                        <option value=HI>HI</option>
                        <option value=IA>IA</option>
                        <option value=ID>ID</option>
                        <option value=IL>IL</option>
                        <option value=IN>IN</option>
                        <option value=KS>KS</option>
                        <option value=KY>KY</option>
                        <option value=LA>LA</option>
                        <option value=MA>MA</option>
                        <option value=MD>MD</option>
                        <option value=ME>ME</option>
                        <option value=MI>MI</option>
                        <option value=MN>MN</option>
                        <option value=MO>MO</option>
                        <option value=MS>MS</option>
                        <option value=MT>MT</option>
                        <option value=NC>NC</option>
                        <option value=ND>ND</option>
                        <option value=NE>NE</option>
                        <option value=NH>NH</option>
                        <option value=NJ>NJ</option>
                        <option value=NM>NM</option>
                        <option value=NV>NV</option>
                        <option value=NY>NY</option>
                        <option value=OH>OH</option>
                        <option value=OK>OK</option>
                        <option value=OR>OR</option>
                        <option value=PA>PA</option>
                        <option value=RI>RI</option>
                        <option value=SC>SC</option>
                        <option value=SD>SD</option>
                        <option value=TN>TN</option>
                        <option value=TX>TX</option>
                        <option value=UT>UT</option>
                        <option value=VA>VA</option>
                        <option value=VT>VT</option>
                        <option value=WA>WA</option>
                        <option value=WI>WI</option>
                        <option value=WV>WV</option>
                        <option value=WY>WY</option>
                        <option value=AA>AA</option>
                        <option value=AE>AE</option>
                        <option value=AP>AP</option>
                        <option value=AS>AS</option>
                        <option value=FM>FM</option>
                        <option value=GU>GU</option>
                        <option value=MH>MH</option>
                        <option value=MP>MP</option>
                        <option value=PR>PR</option>
                        <option value=PW>PW</option>
                        <option value=VI>VI</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align=right>ZIP Code:</td>
                <td align=left><input type=text class="input_style" size=10 maxlength=10 name=zip value='<?//= set_value('post_code', $user_info['post_code'])?>'>(5 or 9 digits)</td>
            </tr>
            <tr>
                <td align=right>Country:</td>
                <td align=left>
                    <select id="country"  name="country" class="height_30">
                        <option value="CY">Cyprus</option>
                        <option value="AL">Albania</option>
                        <option value="DZ">Algeria</option>
                        <option value="AD">Andorra</option>
                        <option value="AO">Angola</option>
                        <option value="AI">Anguilla</option>
                        <option value="AG">Antigua and Barbuda</option>
                        <option value="AR">Argentina</option>
                        <option value="AM">Armenia</option>
                        <option value="AW">Aruba</option>
                        <option value="AU">Australia</option>
                        <option value="AT">Austria</option>
                        <option value="AZ">Azerbaijan Republic</option>
                        <option value="BS">Bahamas</option>
                        <option value="BH">Bahrain</option>
                        <option value="BB">Barbados</option>
                        <option value="BE">Belgium</option>
                        <option value="BZ">Belize</option>
                        <option value="BJ">Benin</option>
                        <option value="BM">Bermuda</option>
                        <option value="BT">Bhutan</option>
                        <option value="BO">Bolivia</option>
                        <option value="BA">Bosnia and Herzegovina</option>
                        <option value="BW">Botswana</option>
                        <option value="BR">Brazil</option>
                        <option value="BN">Brunei</option>
                        <option value="BG">Bulgaria</option>
                        <option value="BF">Burkina Faso</option>
                        <option value="BI">Burundi</option>
                        <option value="KH">Cambodia</option>
                        <option value="CA">Canada</option>
                        <option value="CV">Cape Verde</option>
                        <option value="KY">Cayman Islands</option>
                        <option value="TD">Chad</option>
                        <option value="CL">Chile</option>
                        <option value="C2">China Worldwide</option>
                        <option value="CO">Colombia</option>
                        <option value="KM">Comoros</option>
                        <option value="CK">Cook Islands</option>
                        <option value="CR">Costa Rica</option>
                        <option value="HR">Croatia</option>
                        <option value="CZ">Czech Republic</option>
                        <option value="CD">Democratic Republic of the Congo</option>
                        <option value="DK">Denmark</option>
                        <option value="DJ">Djibouti</option>
                        <option value="DM">Dominica</option>
                        <option value="DO">Dominican Republic</option>
                        <option value="EC">Ecuador</option>
                        <option value="SV">El Salvador</option>
                        <option value="ER">Eritrea</option>
                        <option value="EE">Estonia</option>
                        <option value="ET">Ethiopia</option>
                        <option value="FK">Falkland Islands</option>
                        <option value="FO">Faroe Islands</option>
                        <option value="FJ">Fiji</option>
                        <option value="FI">Finland</option>
                        <option value="FR">France</option>
                        <option value="GF">French Guiana</option>
                        <option value="PF">French Polynesia</option>
                        <option value="GA">Gabon Republic</option>
                        <option value="GM">Gambia</option>
                        <option value="DE">Germany</option>
                        <option value="GI">Gibraltar</option>
                        <option value="GR">Greece</option>
                        <option value="GL">Greenland</option>
                        <option value="GD">Grenada</option>
                        <option value="GP">Guadeloupe</option>
                        <option value="GT">Guatemala</option>
                        <option value="GN">Guinea</option>
                        <option value="GW">Guinea Bissau</option>
                        <option value="GY">Guyana</option>
                        <option value="HN">Honduras</option>
                        <option value="HK">Hong Kong</option>
                        <option value="HU">Hungary</option>
                        <option value="IS">Iceland</option>
                        <option value="IN">India</option>
                        <option value="ID">Indonesia</option>
                        <option value="IE">Ireland</option>
                        <option value="IL">Israel</option>
                        <option value="IT">Italy</option>
                        <option value="JM">Jamaica</option>
                        <option value="JP">Japan</option>
                        <option value="JO">Jordan</option>
                        <option value="KZ">Kazakhstan</option>
                        <option value="KE">Kenya</option>
                        <option value="KI">Kiribati</option>
                        <option value="KW">Kuwait</option>
                        <option value="KG">Kyrgyzstan</option>
                        <option value="LA">Laos</option>
                        <option value="LV">Latvia</option>
                        <option value="LS">Lesotho</option>
                        <option value="LI">Liechtenstein</option>
                        <option value="LT">Lithuania</option>
                        <option value="LU">Luxembourg</option>
                        <option value="MG">Madagascar</option>
                        <option value="MW">Malawi</option>
                        <option value="MY">Malaysia</option>
                        <option value="MV">Maldives</option>
                        <option value="ML">Mali</option>
                        <option value="MT">Malta</option>
                        <option value="MH">Marshall Islands</option>
                        <option value="MQ">Martinique</option>
                        <option value="MR">Mauritania</option>
                        <option value="MU">Mauritius</option>
                        <option value="YT">Mayotte</option>
                        <option value="MX">Mexico</option>
                        <option value="FM">Micronesia</option>
                        <option value="MN">Mongolia</option>
                        <option value="MS">Montserrat</option>
                        <option value="MA">Morocco</option>
                        <option value="MZ">Mozambique</option>
                        <option value="NA">Namibia</option>
                        <option value="NR">Nauru</option>
                        <option value="NP">Nepal</option>
                        <option value="NL">Netherlands</option>
                        <option value="AN">Netherlands Antilles</option>
                        <option value="NC">New Caledonia</option>
                        <option value="NZ">New Zealand</option>
                        <option value="NI">Nicaragua</option>
                        <option value="NE">Niger</option>
                        <option value="NU">Niue</option>
                        <option value="NF">Norfolk Island</option>
                        <option value="NO">Norway</option>
                        <option value="OM">Oman</option>
                        <option value="PW">Palau</option>
                        <option value="PA">Panama</option>
                        <option value="PG">Papua New Guinea</option>
                        <option value="PE">Peru</option>
                        <option value="PH">Philippines</option>
                        <option value="PN">Pitcairn Islands</option>
                        <option value="PL">Poland</option>
                        <option value="PT">Portugal</option>
                        <option value="QA">Qatar</option>
                        <option value="CG">Republic of the Congo</option>
                        <option value="RE">Reunion</option>
                        <option value="RO">Romania</option>
                        <option value="RU">Russia</option>
                        <option value="RW">Rwanda</option>
                        <option value="KN">Saint Kitts and Nevis Anguilla</option>
                        <option value="PM">Saint Pierre and Miquelon</option>
                        <option value="VC">Saint Vincent and Grenadines</option>
                        <option value="WS">Samoa</option>
                        <option value="SM">San Marino</option>
                        <option value="ST">São Tomé and Príncipe</option>
                        <option value="SA">Saudi Arabia</option>
                        <option value="SN">Senegal</option>
                        <option value="SC">Seychelles</option>
                        <option value="SL">Sierra Leone</option>
                        <option value="SG">Singapore</option>
                        <option value="SK">Slovakia</option>
                        <option value="SI">Slovenia</option>
                        <option value="SB">Solomon Islands</option>
                        <option value="SO">Somalia</option>
                        <option value="ZA">South Africa</option>
                        <option value="KR">South Korea</option>
                        <option value="ES">Spain</option>
                        <option value="LK">Sri Lanka</option>
                        <option value="SH">St. Helena</option>
                        <option value="LC">St. Lucia</option>
                        <option value="SR">Suriname</option>
                        <option value="SJ">Svalbard and Jan Mayen Islands</option>
                        <option value="SZ">Swaziland</option>
                        <option value="SE">Sweden</option>
                        <option value="CH">Switzerland</option>
                        <option value="TW">Taiwan</option>
                        <option value="TJ">Tajikistan</option>
                        <option value="TZ">Tanzania</option>
                        <option value="TH">Thailand</option>
                        <option value="TG">Togo</option>
                        <option value="TO">Tonga</option>
                        <option value="TT">Trinidad and Tobago</option>
                        <option value="TN">Tunisia</option>
                        <option value="TR">Turkey</option>
                        <option value="TM">Turkmenistan</option>
                        <option value="TC">Turks and Caicos Islands</option>
                        <option value="TV">Tuvalu</option>
                        <option value="UG">Uganda</option>
                        <option value="UA">Ukraine</option>
                        <option value="AE">United Arab Emirates</option>
                        <option value="GB">United Kingdom</option>
                        <option selected="" value="US">United States</option>
                        <option value="UY">Uruguay</option>
                        <option value="VU">Vanuatu</option>
                        <option value="VA">Vatican City State</option>
                        <option value="VE">Venezuela</option>
                        <option value="VN">Vietnam</option>
                        <option value="VG">Virgin Islands (British)</option>
                        <option value="WF">Wallis and Futuna Islands</option>
                        <option value="YE">Yemen</option>
                        <option value="ZM">Zambia</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align=right><br>Amount:</td>
                <td align=left><br><input type=text class="input_style" size=4 maxlength=7 name=amount value="<?//=$this->session->userdata('total')?>"> USD</td>
            </tr>

            <tr>
                <td/>
                <td><input type="Submit" value="submit" class="p_payment" name="card_payment"></td>
            </tr>
        </table>
    </form>
</div>

   
    </div>
-->