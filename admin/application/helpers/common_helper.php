<?php

class common {

    public static function redirect() {
        $CI = & get_instance();
        $uri = $CI->session->userdata('cur_uri');
        redirect($uri);
    }

    public static function track_uri() {
        $CI = & get_instance();
        $uri = $CI->uri->uri_string();
        $CI->session->set_userdata('cur_uri', $uri);
    }

    public static function is_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in')) {
            return true;
        } else {
            return false;
        }
    }

    function is_admin() {

        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_name') == 'admin') {
            return true;
        } else {
            common::redirect();
        }
    }

    function is_admin_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('admin_logged_in')) {
            return true;
        } else {
            return false;
        }
    }

    function is_admin_logged() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_name') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function is_admin_user() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in') && $CI->session->userdata('user_type') == 'admin') {
            return true;
        } else {
            return false;
        }
    }

    public static function is_logged() {
        $CI = & get_instance();
        if (!$CI->session->userdata('logged_in')) {
            redirect('login');
        }
    }

    public static function nav_menu_link($nav_array) {
        $link = "<div class='nav_menu'>";
        if (is_array($nav_array)) {
            $link.="<a href='" . site_url('home') . "'>Home</a> &raquo; ";
            foreach ($nav_array as $nav) {
                if ($nav[url] != '') {
                    $link.="<a href='" . $nav[url] . "'>$nav[title]</a> &raquo; ";
                } else {
                    $link.="<span class='b'>$nav[title]</span>";
                }
            }
        }
        $link.="</div>";
        return $link;
    }

    public static function status($status='') {
        if ($status == 1) {
            return 'Active';
        } else {
            return 'Inactive';
        }
    }

    public static function change_status($table, $con, $status) {
        $CI = & get_instance();
        $sql = "update $table set status=$status where $con";
        return $CI->db->query($sql);
    }

    function user_account_activation($email='', $user_name='') {
        $CI = & get_instance();
        if ($email != '') {
            //$site = common::get_settings_data();
            $activation_key = md5(date("F j, Y, g:i a"));
            $sql = "update user set user_activation_key='$activation_key' where user_email='$email'";
            $CI->db->query($sql);
            $base_url = base_url();
//            $config['base_url']	= "http://".$_SERVER['HTTP_HOST']."";
            $msg_content = "Hi<br>
            Thanks for your interest in Sweettopup<br>
            ";
            $front_url = $this->config->item('front_url');
            $msg_content.= "<br /><br />Please click on the link below to activate your account.
                        <br /><br />
                        Account Activation URL: <a href='". $front_url . 'login/account_activation/' . $activation_key . "'>Click here  </a>";
            if ($user_name == '') {
                $user_name = $email;
            }
            $from = "Admin";
            $from_name = 'Sweettopup';
            $to = $email;
            $subject = "Account Activation";
            common::sending_mail($from, $from_name, $to, $subject, $msg_content);
        }
    }

    public static function sending_mail($from, $from_name, $to, $subject, $msg) {
        $CI = & get_instance();
        $CI->load->library('email');
        $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'utf-8';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';
        $CI->email->initialize($config);
        $CI->email->from($from, $from_name);
        $CI->email->to($to);
        $CI->email->subject($subject);
        $CI->email->message($msg);
        $CI->email->send();
        //echo $msg;
    }

    public static function view_permit() {
        $CI = & get_instance();
        $permit = $CI->session->userdata('permission');

        if ($permit == 1 || $permit == 3 || $permit == 5 || $permit == 7) {
            return true;
        } else {
            return false;
        }
    }

    public static function add_permit($permit='') {
        $CI = & get_instance();
        if ($permit == '') {
            $permit = $CI->session->userdata('permission');
        }
        if ($permit == 2 || $permit == 3 || $permit == 6 || $permit == 7) {
            return true;
        } else {
            return false;
        }
    }

    public static function update_permit($permit='') {
        $CI = & get_instance();
        if ($permit == '') {
            $permit = $CI->session->userdata('permission');
        }
        if ($permit == 4 || $permit == 5 || $permit == 6 || $permit == 7) {
            return true;
        } else {
            return false;
        }
    }

    function getVar($var, $default='') {
        if (isset($_REQUEST[$var]) && !empty($_REQUEST[$var]))
            return $_REQUEST[$var];
        elseif (!empty($default)) {
            return $default;
        }
        else
            return "";
    }

    public static function get_album_category($sel='') {
        $rows = sql::rows('album');
        $opt = "<option value=''>-----Select----</option>";
        if (count($rows) > 0) {
            foreach ($rows as $row) {

                if ($sel == $row['album_id']) {
                    $opt.="<option value='$row[album_id]' selected='selected'>$row[album_name]</option>";
                } else {
                    $opt.="<option value='$row[album_id]'>$row[album_name]</option>";
                }
            }
        }
        return $opt;
    }

    public static function get_controller_name($sel='') {

        $rows = sql::rows('seo');
        $opt = "<option value=''>-----Select-----</option>";
        if (count($rows) > 0) {

            foreach ($rows as $row) {
                if ($sel == $row['id']) {

                    $opt.="<option value='$row[controller_name]' selected='selected'>$row[controller_name]</option>";
                } else {
                    $opt.="<option value='$row[controller_name]' selected='selected'>$row[controller_name]</option>";
                }
            }
        }
        return $opt;
    }

    /* Added by holy 17 November 2011 */

    public static function config($key_flag) {

        $row = sql::row('settings', "key_flag='$key_flag'");
        return $row['key_value'];
    }


    public static function get_settings_data() {
        $data = null;
        $rows = sql::rows('settings');
        if (count($rows) > 0) {
            foreach ($rows as $row) {
                $data[$row['key_flag']] = $row['key_value'];
            }
        }
        return $data;
    }
}
?>