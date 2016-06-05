<?php

class account extends Controller {

    private $dir = 'account';

    function account() {
        parent::Controller();
        common::is_logged();
        $this->load->model('mod_account');
        $this->load->model('mod_product');
    }

    function index() {
        $data['dir'] = 'account';
        $data['page'] = 'index';
        $data['current_page'] = 'my_account';
        $this->load->view('main', $data);
    }

    function my_info() {
        $user_id = $this->session->userdata('user_id');
        $data['info'] = sql::row('user', "user_id='$user_id' and user_status=1");
        $data['dir'] = "account";
        $data['page'] = "my_info";
        $data['current_page'] = "my_info";
        $this->load->view('main', $data);
    }

    function edit_info() {
        $user_id = $this->session->userdata('user_id');
        $data['info'] = sql::row('user', "user_id='$user_id'");
        if ($_POST['submit'] == 'Submit') {
            $this->mod_account->save_info('user_id');
            redirect('account/my_info');
        } else {
            if ($_POST['cancel'] == 'Cancel') {
                redirect('account/my_info');
            }
        }

        $data['dir'] = "account";
        $data['action'] = "account/edit_info";
        $data['page'] = "edit_info";
        $data['current_page'] = "edit_info";
        $this->load->view('main', $data);
    }

    function account_password() {
        $user_id = $this->session->userdata('user_id');
        if ($_POST['change_password']) {
            if ($this->form_validation->run('valid_change_password')) {
                $data = array(
                    'user_password' => $_POST['user_password']
                );
                $this->db->update('user', $data, array('user_id' => $user_id));
                $this->session->set_flashdata('msg', 'Your Password changed Successfully!!! Please Login');
                $this->session->unset_userdata('user_id');
                $this->session->unset_userdata('logged_in');
                redirect('login');
            }
        }
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = $this->dir;

        $data['page'] = 'cng_password';
        $data['page_title'] = 'Change Password';
        $this->load->view('main', $data);
    }

    function is_valid_user_password() {
        $user_id = $this->session->userdata('user_id');
        if (sql::count('user', "user_password='{$_POST['old_password']}' and user_id='$user_id'") > 0) {
            return TRUE;
        } else {
            $this->form_validation->set_message('is_valid_user_password', 'Invalid Password! Please Try again!');
            return FALSE;
        }
    }

    function account_deactive() {
        $data['dir'] = $this->dir;
        $data['page'] = 'deactivate';
        $data['current_page'] = 'account';
        $this->load->view('main', $data);
    }

}
?>
