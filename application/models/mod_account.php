<?php

class mod_account extends Model {

    function mod_account() {
        parent::Model();
    }


    function save_info(){
        
        $user_id=$this->session->userdata('user_id');
        $data = array(
            'user_username' => $_POST['user_username'],
            'user_email'=>$_POST['user_email'],
            'phone_no'=>$_POST['phone_no'],
            'address'=>$_POST['address'],
            'post_code'=>$_POST['post_code'],
            'country'=>$_POST['country']
           
        );

        $this->db->update("user", $data, array("user_id" => $user_id));
        return true;
    }



 
}
?>
