<?php

/**
 * Description of INetLoad
 *
 * @author Anwar
 */
class INetLoad {

    private $loadURL = 'http://load24bd.com/m.load24bd/mobile/flexi.jsp?Request=TopUp&CountryCode=BD';
    private $responseURL = 'http://load24bd.com/m.load24bd/mobile/response.jsp?';
    private $loadUserName = 'sweettopup';
    // Agent User Name
    private $loadUserPassword = '1230654'; //Agent Password

    public function INetLoad() {

    }

    public function rechargeMobile($amount, $mobileNumber, $mobileType) {
        $amount = urlencode($amount);
        $mobileNumber = urlencode($mobileNumber);
        $mobileType = urlencode($mobileType);
        $url = $this->loadURL . '&UserId=' . $this->loadUserName . '&Password=' . $this->loadUserPassword . '&MobileNumber=' . $mobileNumber . '&Amount=' . $amount . '&NumberType=' . $mobileType;
        $ch = curl_init();
        $timeout = 0;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $rawdata = curl_exec($ch);
        curl_close($ch);
        $data = explode('=', $rawdata);
        return $data;
    }

    public function get_recharge_error($index) {
        $error_message = array(
            '1' => 'Enough required information not supplied',
            '2' => 'Unauthorized user',
            '3' => 'Mobile no format error',
            '4' => 'Minimum or maximum recharge amount not matched',
            '5' => 'This recharge amount not available for you',
            '6' => 'Already sent a request for the number in last 15 minutes.',
            '7' => 'System error'
        );
        return $error_message[$index];
    }

    public function getRechargeResponse($requestID) {
        $url = $this->responseURL . 'RequestID=' . $requestID . '&UserId=' . $this->loadUserName . '&Password=' . $this->loadUserPassword;
        $ch = curl_init();
        $timeout = 0;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $rawdata = curl_exec($ch);
        curl_close($ch);
        $data = explode('=', $rawdata);
        return $data;
    }

    public function get_response_error($index) {
        $error_message = array(
            '1' => 'Enough required information not supplied',
            '2' => 'Unauthorized user',
            '3' => 'System error'
        );
        return $error_message[$index];
    }

    public function get_recharge_status($index) {
        $error_message = array(
            '1' => 'Pending',
            '2' => 'Successful',
            '3' => 'Rejected'
        );
        return $error_message[$index];
    }

}
?>