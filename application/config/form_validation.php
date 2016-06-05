<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$config = array(
    'valid_user' => array(
        array('field' => 'user_username', 'label' => 'User Name', 'rules' => 'trim|required|max_length[20]|callback_user_name_check'),
        array('field' => 'user_first_name', 'label' => 'First Name', 'rules' => 'trim|required|max_length[20]'),
        array('field' => 'user_last_name', 'label' => 'Last Name', 'rules' => 'trim|required|max_length[20]'),
        array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required|valid_email|matches[conf_email]|callback_user_email_check'),
        array('field' => 'conf_email', 'label' => 'Confirm Email', 'rules' => 'required|valid_email|callback_user_email_check'),
        array('field' => 'user_password', 'label' => 'Password', 'rules' => 'trim|required|min_length[6]|matches[conf_password]'),
        array('field' => 'conf_password', 'label' => 'Confirm Password', 'rules' => 'trim|required|min_length[6]'),
        array('field'=>'phone_no', 'label'=>'Phone No.', 'rules'=>'required'),
        array('field'=>'address', 'label'=>'Address', 'rules'=>'required'),
        array('field'=>'post_code', 'label'=>'Post Code', 'rules'=>'required'),
        array('field'=>'country', 'label'=>'Country', 'rules'=>'required')

    ),


'valid_login' => array(
        array('field' => 'user_username', 'label' => 'Username', 'rules' => 'required'),
        array('field' => 'user_password', 'label' => 'Password', 'rules' => 'required')
    ),
    'valid_change_password' => array(
        array('field' => 'old_password', 'label' => 'Old Password', 'rules' => 'required|callback_is_valid_user_password'),
        array('field' => 'user_password', 'label' => 'New Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[user_password]')
    ),
    'valid_forgot_password' => array(
        array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_is_user'),
    ),
    'valid_contact' => array(
        array('field' => 'contact_name', 'label' => 'Name', 'rules' => 'required'),
        array('field' => 'contact_email', 'label' => 'Email', 'rules' => 'required'),
        array('field' => 'contact_subject', 'label' => 'Subject', 'rules' => 'required'),
        array('field' => 'contact_message', 'label' => 'Message', 'rules' => 'required')
    ),
    'valid_shipping_address' => array(
        array('field' => 'full_name', 'label' => 'Full Name', 'rules' => 'required'),
        array('field' => 'phone_no', 'label' => 'Phone No', 'rules' => 'required'),
        array('field' => 'area_name', 'label' => 'State Name', 'rules' => 'required'),
        array('field' => 'dis_city', 'label' => 'District or City', 'rules' => 'required'),
        array('field' => 'country', 'label' => 'Country', 'rules' => 'required')
    ),
    'valid_credit_card' => array(
        array('field' => 'credit_card_type_id', 'label' => 'Credit Card Type', 'rules' => 'required'),
        array('field' => 'credit_card_no', 'label' => 'Credit Card No', 'rules' => 'trim|required|callback_credit_card_no'),
        array('field' => 'expiration_month', 'label' => 'Expiration Month', 'rules' => 'trim|required'),
        array('field' => 'expiration_year', 'label' => 'Expiration Year', 'rules' => 'trim|required'),
        array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'),
        array('field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'),
        array('field' => 'address1', 'label' => 'Address', 'rules' => 'required'),
        array('field' => 'city', 'label' => 'City', 'rules' => 'required'),
        array('field' => 'state', 'label' => 'State', 'rules' => 'required'),
        array('field' => 'postal_code', 'label' => 'ZIP/Postal Code', 'rules' => 'required'),
        array('field' => 'country_id', 'label' => 'Country', 'rules' => 'required')
    ),

);
?>
