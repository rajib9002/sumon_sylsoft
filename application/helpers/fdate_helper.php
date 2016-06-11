<?php

/**
 * Description of common_helper
 *
 * @author anwar
 */
class fdate {

    public static function get_year($sel='') {
        $opt.="<option value=''>--Year--</option>";
        for ($i = 1900; $i <= 2020; $i++) {
            if ($sel == $i)
                $opt.="<option value='$i' selected='selected'>$i</option>";
            else
                $opt.="<option value='$i'>$i</option>";
        }
        return $opt;
    }

    public static function get_month($sel='') {
        $months = array('01' => 'January', '02' => 'Febrary', '03' => 'March', '04' => 'April', '05' => 'May', '06' => 'June', '07' => 'July', '08' => 'August', '09' => 'September', '10' => 'October', '11' => 'November', '12' => 'December');
        $opt.="<option value=''>----Month----</option>";
        foreach ($months as $k => $row) {
            if ($k == $sel) {
                $opt.="<option value='$k' selected='selected'>$row</option>";
            } else {
                $opt.="<option value='$k'>$row</option>";
            }
        }
        return $opt;
    }

    public static function get_day($sel='') {
        $opt.="<option value=''>--Day--</option>";
        for ($i = 1; $i <= 31; $i++) {
            $day = str_pad($i, 2, 0, STR_PAD_LEFT);
            if ($sel == $day)
                $opt.="<option value='$day' selected='selected'>$day</option>";
            else
                $opt.="<option value='$day'>$day</option>";
        }
        return $opt;
    }

    public static function get_hour($sel='') {
        $opt.="<option value=''>-Hour-</option>";
        for ($i = 0; $i <= 23; $i++) {
            $hour = str_pad($i, 2, 0, STR_PAD_LEFT);
            if ($sel == $hour)
                $opt.="<option value='$hour' selected='selected'>$hour</option>";
            else
                $opt.="<option value='$hour'>$hour</option>";
        }
        return $opt;
    }

     public static function get_minute($sel='') {
        $opt.="<option value=''>-Minute-</option>";
        for ($i = 0; $i <= 59; $i++) {
            $minute = str_pad($i, 2, 0, STR_PAD_LEFT);
            if ($sel == $minute)
                $opt.="<option value='$minute' selected='selected'>$minute</option>";
            else
                $opt.="<option value='$minute'>$minute</option>";
        }
        return $opt;
    }

     public static function get_second($sel='') {
        $opt.="<option value=''>-Second-</option>";
        for ($i = 0; $i <= 59; $i++) {
            $sec = str_pad($i, 2, 0, STR_PAD_LEFT);
            if ($sel == $sec)
                $opt.="<option value='$sec' selected='selected'>$sec</option>";
            else
                $opt.="<option value='$sec'>$sec</option>";
        }
        return $opt;
    }

    public static function get_time_option($sel='') {
        $arr = array('12:00', '12:30', '01:00', '01:30', '02:00', '02:30', '03:00', '03:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30', '07:00', '07:30', '08:00', '08:30', '09:00', '09:30', '10:00', '10:30', '11:00', '11:30');
        $ampm = array('AM', 'PM');
        foreach ($ampm as $ap) {
            foreach ($arr as $row) {
                $val = $row . ' ' . $ap;
                if ($val == $sel) {
                    $opt.="<option value='$val' selected='selected'>$val</option>";
                } else {
                    $opt.="<option value='$val'>$val</option>";
                }
            }
        }
        return $opt;
    }

     public static function get_recent_year($sel=''){
        $opt="";
        $current_year=date('Y',time());
        for ($i = $current_year; $i <= $current_year+20; $i++) {
            if ($sel == $i)
                $opt.="<option value='$i' selected='selected'>$i</option>";
            else
                $opt.="<option value='$i'>$i</option>";
        }
        return $opt;

    }

    public static function get_numbered_month($sel='') {
        $months = array('01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05', '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10', '11' => '11', '12' => '12');
        $opt="";
        foreach ($months as $k => $row) {
            if ($k == $sel) {
                $opt.="<option value='$k' selected='selected'>$row</option>";
            } else {
                $opt.="<option value='$k'>$row</option>";
            }
        }
        return $opt;
    }

}