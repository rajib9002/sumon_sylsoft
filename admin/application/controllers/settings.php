<?php

class settings extends Controller {

    private $dir = 'settings';

    public function __construct() {
        parent::__construct();
        common::is_logged();
        $this->load->model('mod_settings');
    }
    function set_paypal() {
        if ($_POST['update']) {
            if ($this->mod_settings->update_settings(1)) {
                $msg = "Settings Updated Successfully!!!";
            }
        }
        $data = $this->mod_settings->get_settings_data();
        $data['nav_array'] = array(
            array('title' => 'Paypal Settings', 'url' => '')
        );
        $data['msg'] = $msg;
        $data['title'] = "Paypal Settings";
        $data['dir'] = $this->dir;
        $data['page'] = 'set_email';
        $this->load->view('main', $data);
    }
     function setting_company() {
        if ($_POST['company_info']) {
            if ($this->mod_settings->update_settings(TRUE,FALSE)) {
                $msg = "Settings Updated Successfully!!!";
            }
        }
        $data = $this->mod_settings->get_settings_data();
        $data['msg'] = $msg;
        $data['title'] = "Company Settings";
        $data['dir'] = $this->dir;
        $data['page'] = 'setting_company';
        $this->load->view('main', $data);
    }
}
?>