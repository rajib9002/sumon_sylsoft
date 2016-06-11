<?php

class login extends Controller {

    private $dir = 'login';

    function __construct() {
        parent::Controller();
        $this->load->model(array('mod_login'));
        $this->load->model('mod_product');
    }

    function index() {
        if ($_POST['login']) {
            if ($this->form_validation->run('valid_login')) {
                if ($this->mod_login->is_valid_user()) {
                    redirect('account/my_info');
                } else {

                    $this->session->set_flashdata('msg', '<div style="background-position:center left; text-align:left; color:red;">Invalid User Name/Password.Please Try again!</div>');
                    redirect('login');
                }
            }
//            else {
//                $this->session->set_flashdata('msg', lang('msg_login_error'));
//                redirect('login');
//            }
        }
        $data['msg']=  $this->session->flashdata('msg');
        $data['action'] = 'login';
        $data['top_login'] = TRUE;
        $data['dir'] = $this->dir;
        $data['title'] = 'Login with your username and password';
        $data['page'] = 'logfrm';
        $this->load->view('main', $data);
    }

     function logout() {
        $this->mod_login->do_logout();
        redirect('login');
    }
    function forgot_password() {
        if ($_POST['send']) {
            if ($this->form_validation->run('valid_forgot_password')) {
                $this->mod_login->reset_password();
                $this->session->set_flashdata('msg', 'Thank you for contacting Zafran Perfumes Shop Account Support.<p>We have Sent you an email to ' . $_POST['user_email'] . ' .
                                                    <span class="block">Please check your email- a password reset link will be included in a message from Zafran Perfumes. Please click on the link to complete your password reset Process.</span></p>
                                                    <br />Thank you,
                                                    <br />zafran perfumes Shop Account Support');
                redirect('login/notice');
            }
        }
        //$data['container']='login';
        $data['title'] = 'Forgot Password';
        $data['dir'] = $this->dir;
        $data['page'] = 'forgot_password';
        $this->load->view('main', $data);
    }

    function is_user() {
        $valid = sql::count('user', "user_email='{$_POST['user_email']}'");
        if ($valid > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('is_user', '<div style="text-align:left; color:#f3f5bb; margin-left:3px;">Email is invalid!</div>');
            return FALSE;
        }
    }

    function notice() {
        $data['msg'] = $this->session->flashdata('msg');
        
        if ($data['msg'] == '') {
            redirect('home');
        }
        $data['title'] = 'Success Notice';
        $data['dir'] = $this->dir;
        $data['page'] = 'notice';
        $this->load->view('main', $data);
    }

    function reset_password($verification_code='') {
        if ($_POST['change_password']) {
            $this->form_validation->set_rules('new_password', 'Password', 'required|min_length[6]');
            $this->form_validation->set_rules('conf_password', 'Confirm Password', 'required|matches[new_password]');
            if ($this->form_validation->run()) {
                $this->mod_login->update_password($verification_code);
                $this->session->set_flashdata('msg', 'Password Changed Successfully!!!');
                redirect('login/notice', 'refresh');
            }
        }
        /*if ($verification_code == '') {
            redirect('home');
        }*/
        //if ($this->mod_login->is_password_verfiy($verification_code)) {
            $data['verify_code'] = $verification_code;
            $data['link_array'] = array(
                array('title' => 'Reset Password', 'url' => '')
            );
            //$data['container']='login';
            $data['dir'] = $this->dir;
            $data['page'] = 'reset_password';
            $data['title'] = 'Reset Password';
            $this->load->view('main', $data);
    }



    function user_email_check() {
        $str = $_POST['user_email'];
        if (sql::count('users', "user_email='$str'") > 0) {
            $this->form_validation->set_message('user_email_check', 'This Email is already used in another account.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    function success() {

        if ($this->session->flashdata('msg') == '')
            redirect('home');
        else
            echo $this->session->flashdata('msg');
    }



    function account_activation($activation_key='') {
        if ($activation_key == '') {
            redirect('home');
        }
        if($this->mod_login->activate_account($activation_key))
            $this->session->set_flashdata('msg', 'Your Account Is Activated! Please Login to continue.');
        else
             $this->session->set_flashdata('msg', 'Activation Key is wrong!!');
        redirect('login/notice', 'refresh');
    }

}
?>
