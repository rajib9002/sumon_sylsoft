<?php
$config = array(
    'valid_login' => array(
        array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required'),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required')
    ),
    'valid_admin' => array(
        array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'),
        array('field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'),
        array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required'),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required'),
        array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email')
    ),
    'valid_change_password' => array(
        array('field' => 'old_password', 'label' => 'Old Password', 'rules' => 'required'),
        array('field' => 'new_password', 'label' => 'New Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[new_password]')
    ),
    'valid_user' => array(
        array('field' => 'first_name', 'label' => 'First Name', 'rules' => 'required'),
        array('field' => 'last_name', 'label' => 'Last Name', 'rules' => 'required'),
        array('field' => 'user_name', 'label' => 'User Name', 'rules' => 'required'),
        array('field' => 'email', 'label' => 'Email', 'rules' => ''),
        array('field' => 'password', 'label' => 'Password', 'rules' => 'required'),
        array('field' => 'confirm_password', 'label' => 'Confirm Password', 'rules' => 'required|matches[password]')
    ),
    'valid_forgot_password' => array(
        array('field' => 'email', 'label' => 'Email', 'rules' => 'required|valid_email|callback_is_user'),
    ),
    'valid_product_category' => array(
        array('field' => 'category_name', 'label' => 'Category Name', 'rules' => 'required')
    ),
    'valid_product_sub_category' => array(
        array('field' => 'category_id', 'label' => 'Category Name', 'rules' => 'required'),
        array('field' => 'sub_cat_name', 'label' => 'Sub Category Name', 'rules' => 'required')
    ),
    'valid_product' => array(
        array('field' => 'category_id', 'label' => 'Main Category Name', 'rules' => 'required'),
        array('field' => 'item_code', 'label' => 'Item Code', 'rules' => 'required'),
        array('field' => 'product_name', 'label' => 'Product Name', 'rules' => 'required'),
        array('field' => 'size', 'label' => 'size', 'rules' => 'required'),
       
        array('field' => 'price', 'label' => 'Price', 'rules' => 'required'),
        array('field' => 'quantity', 'label' => 'Quantity', 'rules' => 'required')
    ),
    'valid_customer' => array(
        array('field' => 'user_username', 'label' => 'User Name', 'rules' => 'trim|required|max_length[20]|callback_user_name_check'),
        array('field' => 'user_first_name', 'label' => 'First Name', 'rules' => 'trim|required|max_length[20]'),
        array('field' => 'user_last_name', 'label' => 'Last Name', 'rules' => 'trim|required|max_length[20]'),
        array('field' => 'user_email', 'label' => 'Email', 'rules' => 'required|valid_email|matches[conf_email]|callback_user_email_check'),
        array('field' => 'conf_email', 'label' => 'Confirm Email', 'rules' => 'required|valid_email|callback_user_email_check'),
        array('field' => 'paypal_email', 'label' => 'Paypal Email', 'rules' => 'required|valid_email|callback_user_email_check'),
        array('field' => 'user_password', 'label' => 'Password', 'rules' => 'trim|required|min_length[6]|matches[conf_password]'),
        array('field' => 'conf_password', 'label' => 'Confirm Password', 'rules' => 'trim|required|min_length[6]'),
        array('field'=>'country', 'label'=>'Country', 'rules'=>'required'),
    ),
'add_product_category'=>array(
        array('field' => 'parent_id', 'label' => 'Parent Category', 'rules' => 'required'),
        array('field' => 'category_name', 'label' => 'Category Name', 'rules' => 'required')
    ),
    'valid_contact' => array(
        array('field' => 'contact_subject', 'label' => 'Subject', 'rules' => 'required'),
        array('field' => 'contact_message', 'label' => 'Message', 'rules' => 'required'),
    ),

);
?>
