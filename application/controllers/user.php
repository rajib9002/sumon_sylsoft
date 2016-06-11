<?php

class user extends Controller{
    private $dir='user';
    function  __construct() {
        parent::Controller();
        $this->load->model('mod_user');
        $this->load->model('mod_product');
    }
    function index(){
        $data['dir']=$this->dir;
        $data['title']='Register';
        $data['page']='index';
        $this->load->view('main',$data);
    }
    function register(){
        if ($_POST['save']) {
            if ($this->form_validation->run('valid_user')) {
                $new_user_id=$this->mod_user->save_user();
                redirect('user/success_register');
            }
        }
        $data['country_list'] = common::get_country();
        $data['dir'] = 'user';
        $data['page'] = 'new_user';
        $data['title']='Register';
        $data['action'] = 'user/register';
        $this->load->view('main', $data);
    }
    function user_name_check(){
        
        if (sql::count('user', "user_username='{$_POST['user_username']}'") > 0) {
            $this->form_validation->set_message('user_name_check', 'This User Name is already used in another account.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function user_email_check() {
        $str = $_POST['user_email'];

        if (sql::count('user', "user_email='$str'") > 0) {
            $this->form_validation->set_message('user_email_check', 'This Email is already used in another account.');
            return FALSE;
        } else {
            return TRUE;
        }
    }


    function success_register(){
        $data['dir'] = 'user';
        $data['page'] = 'success_register';
        $data['title']='Success Register';
        //$data['current_page'] = 'register';
        
        $this->load->view('main', $data);
    }

 

}
?>
