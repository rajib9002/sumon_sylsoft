<?php
class mod_settings extends Model {
    function __construct() {
        parent::__construct();
    }
   
    function update_settings($sel='') {
        if ($sel==2) {
            $key_list = array("company_name", "company_address", "company_phone", "company_mobile", "company_email","shipping_amount");
        }
        elseif ($sel == 1) {
             $key_list = array('business_email', 'api_user', 'api_password', 'api_signature', 'usd_to_bdt','admin_email');
        } 
        else {
            $key_list = array('admin_email');
        }
        foreach ($key_list as $key) {
            $sql = "select * from settings where key_flag='$key'";
            $query = $this->db->query($sql);

            if ($query->num_rows() > 0) {
                $mega_sql = "update settings set key_value=" . $this->db->escape($_POST[$key]) . " where key_flag='$key';";
            } else {
                $mega_sql = "insert into settings set key_flag='$key',key_value=" . $this->db->escape($_POST[$key]) . ";";
            }
            if (!$this->db->query($mega_sql)) {
                return false;
            }
        }
        return true;
    }

    function get_settings_data() {
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