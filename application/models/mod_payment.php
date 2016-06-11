<?php

class mod_payment extends Model {

    function mod_payment() {
        parent::Model();
    }
    function fail_transaction() {
        $user_id = $this->session->userdata('user_id');
        $transaction_id = $this->session->userdata('transaction_id');
        $sql = "update transaction set paypal_status=0 where user_id='$user_id' and transaction_id='$transaction_id'";
        $this->db->query($sql);
    }
    function success_transaction() {
        $user_id = $this->session->userdata('user_id');
        $order_id = $this->session->userdata('order_id');
        $session_id = $this->session->userdata('session_id');
        $sql = "update transaction set paypal_status=1 where user_id='$user_id' and transaction_id='$transaction_id'";
        $this->db->query($sql);
        $order_id = $this->session->userdata('order_id');
        $sql1 = "update orders set orderPaymentStatus=1 where order_id=$order_id and user_id=$user_id and orderSessionId='$session_id'";
        $this->db->query($sql1);
        
    }

    function card_payment_failure($failure='',$id='') {
        $user_id=$this->session->userdata('user_id');
        $transaction_id = $this->session->userdata('transaction_id');
         $msg='Paypal payment fail';
         $data = array(
            'paypal_status'=>0,
            'paypal_transaction_id'=>$id
        );
        $this->db->update("transaction", $data, $data=array('user_id'=>$user_id,'transaction_id'=>$transaction_id));
        return $msg;
    }
    
    function card_payment_success($success_id='') {
        $user_id=$this->session->userdata('user_id');
        $order_id = $this->session->userdata('order_id');
        $session_id = $this->session->userdata('session_id');
         $msg='Paypal payment Successful';
         $data = array(
            'paypal_status'=>1,
            'paypal_transaction_id'=>$success_id
        );
        $this->db->update("transaction", $data, $data=array('user_id'=>$user_id,'transaction_id'=>$transaction_id));
        $sql1 = "update orders set orderPaymentStatus=1 where order_id=$order_id and user_id=$user_id and orderSessionId='$session_id'";
        $this->db->query($sql1);
        return $msg;
    }

    

}
?>