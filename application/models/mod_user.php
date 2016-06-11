<?php

class mod_user extends Model {

    function mod_user() {
        parent::Model();
    }

    function save_user() {

        $data = array(
            "user_username" => $_POST['user_username'],
            "user_password" => $_POST['user_password'],
            "user_first_name" => $_POST['user_first_name'],
            "user_last_name" => $_POST['user_last_name'],
            "user_email" => $_POST['user_email'],
            "business_type" => $_POST['business_type'],
            "phone_no"=>$_POST['phone_no'],
            "address"=>$_POST['address'],
            "city" => $_POST['city'],
            "state" => $_POST['state'],
            "fax"=>$_POST['fax'],
            "company_name"=>$_POST['company_name'],
            "post_code"=>$_POST['post_code'],
            "country"=>$_POST['country'],
            "user_registration_date" => date('Y-m-d H:i:s'),
            "user_status" => 0
        
        );

        $this->db->insert("user", $data);
        $new_user_id=$this->db->insert_id();
        common::user_account_activation($_POST['user_email'],$_POST['user_username']);
        return $new_user_id;
        //return true;
    }


    function deactive_account(){
        $user_id = $this->session->userdata('user_id');
        $this->db->query("update user set user_status=0 where user_id=$user_id");
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('logged_in');
    }



    

}
?>
