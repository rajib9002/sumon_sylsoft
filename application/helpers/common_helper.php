<?php

class common {

    public static function redirect() {
        $CI = & get_instance();
        $uri = $CI->session->userdata('cur_uri');
        redirect($uri);
    }
 public static function is_logged_in() {
        $CI = & get_instance();
        if ($CI->session->userdata('logged_in')) {
            return true;
        } else {
            return false;
        }
    }
    function user_account_activation($email='', $user_name='', $agent=false) {

        $CI = & get_instance();
        if ($email != '') {
            $site = common::get_settings_data();
            $activation_key = md5(date("F j, Y, g:i a"));
            $sql = "update user set user_activation_key='$activation_key' where user_email='$email'";
            $CI->db->query($sql);
            $base_url = base_url();
            $msg_content = "Hi<br>
            Thanks for your interest in zafran perfumes<br>
            ";

            $msg_content.= "<br /><br />Please click on the link below to activate your account.
                        <br /><br />
                        Account Activation URL: <a href='" . site_url('login/account_activation/' . $activation_key) . "'>Click Here For Activate Your Account</a>";
            if ($user_name == '') {
                $user_name = $email;
            }
            $from = "Admin";
            $from_name = 'zafran perfumes';
            $to = $email;
            $subject = "Account Activation";
            common::sending_mail($from, $from_name, $to, $subject, $msg_content);
            if ($agent) {
                $admin_subject = "Register Agent Info: " . date('Y-m-d h:i A');
            } else {
               $admin_subject = "Register Customer Info: " . date('Y-m-d h:i A');
            }
           
            $user = sql::row("user", "user_username='$user_name'");
            $content.= "User ID: " . $user['user_username'] . "<br/>" . "User Name: " . $user['user_first_name'] . ' ' . $user['user_last_name'] . "<br/>User Password: " . $user['user_password'];
            common::sending_mail($to, $user_name, $site['admin_email'], $admin_subject, $content);
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
        //$CI->email->cc('another@another-example.com');
        $CI->email->subject($subject);
        $CI->email->message($msg);
        $CI->email->send();
//        echo $msg;
    }

    public static function is_logged() {
        $CI = & get_instance();
        if (!$CI->session->userdata('logged_in') || $CI->session->userdata('user_id') == '') {
            redirect('login');
        }
    }

    function get_all_meta_data() {
        $c_name = $this->uri->segment(1);
        //$CI = & get_instance();
        if ($c_name == "" || !common::check_controller_data($c_name))
            $c_name = "home";
        $q = $this->db->query("select title,meta_tag,meta_keyword,meta_description from seo where controller_name='$c_name'");
        return $q->row_array();
    }

    function check_controller_data($c_name) {
        $q = $this->db->query("select title,meta_tag,meta_keyword,meta_description from seo where controller_name='$c_name'");
        return $q->num_rows();
    }

    function set_language() {
        if ($_REQUEST['language'] == 'dutch')
            $this->load->language('label_dutch');
        else
            $this->load->language('label_eng');
    }

    function get_site_currency() {

        $CI = & get_instance();
        if ($_POST['currency'] != NULL) {
            $cur = $CI->session->set_userdata('currency', $_POST['currency']);
        } else if ($_POST['currency'] == '' && $this->session->userdata('currency') != '') {
            $CI->session->set_userdata('currency', $this->session->userdata('currency'));
        } else {
            $CI->session->set_userdata('currency', 'USD');
        }

        return true;
    }

    public static function get_credit_card_type($sel='') {
        $credit_card_type = sql::rows("credit_card_type");
        $opt = "";

        foreach ($credit_card_type as $item) {
            if ($item['credit_card_type_id'] == $sel) {
                $opt.="<option value='$item[credit_card_type_id]' selected='selected'>$item[credit_card_type]</option>";
            } else {
                $opt.="<option value='$item[credit_card_type_id]'>$item[credit_card_type]</option>";
            }
        }
        return $opt;
    }

    public static function credit_card_type($credit_card_type_id) {
        $CI = & get_instance();
        $query = $CI->db->query("select credit_card_type from credit_card_type where credit_card_type_id=$credit_card_type_id");
        $res = $query->row_array();
        return $res['credit_card_type'];
    }

    /* Added by holy 17 November 2011 */

    public static function config($key_flag) {

        $row = sql::row('settings', "key_flag='$key_flag'");
        return $row['key_value'];
    }

    /* Added by holy 06-02-2012 */

    public static function get_state($sel='') {
        $state = sql::rows('state');
        $opt.="<option value='' >--Select State--</option>";
        foreach ($country as $item) {
            if ($item['state_id'] == $sel) {
                $opt.="<option value='$item[state_id]' selected='selected'>$item[state_name]</option>";
            } else {
                $opt.="<option value='$item[state_id]'>$item[state_name]</option>";
            }
        }

        return $opt;
    }



    function slider_list() {
        $CI = & get_instance();
        $sql = "select * from wb_slider where status=1 order by slider_id desc";
        $query = $CI->db->query($sql);
        return $query->result_array();
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


//    zafran new


    public static function get_main_cat(){
        $CI = & get_instance();
        $sql = "select * from product_category where status=1 and parent_id=0 order by sort asc";
        $query = $CI->db->query($sql);
        return $query->result_array();
        
    }

    public static function get_country($sel='') {
        $country_list = array("Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Central African Republic", "Chad", "Chile", "China", "Colombi", "Comoros", "Congo (Brazzaville)", "Congo", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor (Timor Timur)", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia, The", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, North", "Korea, South", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepa", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe");
        $opt.="<option value='' >--Select Country--</option>";
        for ($i = 0; $i < count($country_list); $i++) {
            if ($country_list[$i] == $sel) {
                $opt.="<option value='$country_list[$i]' selected='selected'>$country_list[$i]</option>";
            } else {
               
                    $opt.="<option value='$country_list[$i]'>$country_list[$i]</option>";
            }
        }
        return $opt;
    }


 

}
?>
