<?php
/**
 * @author Anwar
 */
class GoogleCurrencyConverter {
// GOOGLE URL
    CONST GOOGLE_URL = "http://finance.google.com/finance/converter?a=%d&amp;amp;from=%s&amp;amp;to=%s";
    /*
      Fetch with CURL
      params: amount, 3 Digit Currency Code From,3 Digit Currency Code to
     */

    private function load($a, $from, $to) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, sprintf(self::GOOGLE_URL, $a, $from, $to));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    /*
      Try to Convert
      params: amount, 3 Digit Currency Code From,3 Digit Currency Code to
     */

    public static function convert($amount, $from_Currency, $to_Currency) {
        $amount = urlencode($amount);
        $from_Currency = urlencode($from_Currency);
        $to_Currency = urlencode($to_Currency);
        $url = "http://www.google.com/finance/converter?a=$amount&from=$from_Currency&to=$to_Currency";
        $ch = curl_init();
        $timeout = 0;
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)");
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $rawdata = curl_exec($ch);
        curl_close($ch);

        $data = explode('bld>', $rawdata);
        $data = explode($to_Currency, $data[1]);
        return round($data[0], 2);
    }

    public static function get_currency($sel='') {
        $currency_array = array(
            'AED' => 'United Arab Emirates Dirham (AED)',
            'ANG' => 'Netherlands Antillean Guilder (ANG)',
            'ARS' => 'Argentine Peso (ARS)',
            'AUD' => 'Australian Dollar (AUD)',
            'BDT' => 'Bangladeshi Taka (BDT)',
            'BGN' => 'Bulgarian Lev (BGN)',
            'BHD' => 'Bahraini Dinar (BHD)',
            'BND' => 'Brunei Dollar (BND)',
            'BOB' => 'Bolivian Boliviano (BOB)',
            'BRL' => 'Brazilian Real (BRL)',
            'BWP' => 'Botswanan Pula (BWP)',
            'CAD' => 'Canadian Dollar (CAD)',
            'CHF' => 'Swiss Franc (CHF)',
            'CLP' => 'Chilean Peso (CLP)',
            'CNY' => 'Chinese Yuan (CNY)',
            'COP' => 'Colombian Peso (COP)',
            'CRC' => 'Costa Rican Colón (CRC)',
            'CZK' => 'Czech Republic Koruna (CZK)',
            'DKK' => 'Danish Krone (DKK)',
            'DOP' => 'Dominican Peso (DOP)',
            'DZD' => 'Algerian Dinar (DZD)',
            'EEK' => 'Estonian Kroon (EEK)',
            'EGP' => 'Egyptian Pound (EGP)',
            'EUR' => 'Euro (EUR)',
            'FJD' => 'Fijian Dollar (FJD)',
            'GBP' => 'British Pound Sterling (GBP)',
            'HKD' => 'Hong Kong Dollar (HKD)',
            'HNL' => 'Honduran Lempira (HNL)',
            'HRK' => 'Croatian Kuna (HRK)',
            'HUF' => 'Hungarian Forint (HUF)',
            'IDR' => 'Indonesian Rupiah (IDR)',
            'ILS' => 'Israeli New Sheqel (ILS)',
            'INR' => 'Indian Rupee (INR)',
            'JMD' => 'Jamaican Dollar (JMD)',
            'JOD' => 'Jordanian Dinar (JOD)',
            'JPY' => 'Japanese Yen (JPY)',
            'KES' => 'Kenyan Shilling (KES)',
            'KRW' => 'South Korean Won (KRW)',
            'KWD' => 'Kuwaiti Dinar (KWD)',
            'KYD' => 'Cayman Islands Dollar (KYD)',
            'KZT' => 'Kazakhstani Tenge (KZT)',
            'LBP' => 'Lebanese Pound (LBP)',
            'LKR' => 'Sri Lankan Rupee (LKR)',
            'LTL' => 'Lithuanian Litas (LTL)',
            'LVL' => 'Latvian Lats (LVL)',
            'MAD' => 'Moroccan Dirham (MAD)',
            'MDL' => 'Moldovan Leu (MDL)',
            'MKD' => 'Macedonian Denar (MKD)',
            'MUR' => 'Mauritian Rupee (MUR)',
            'MVR' => 'Maldivian Rufiyaa (MVR)',
            'MXN' => 'Mexican Peso (MXN)',
            'MYR' => 'Malaysian Ringgit (MYR)',
            'NAD' => 'Namibian Dollar (NAD)',
            'NGN' => 'Nigerian Naira (NGN)',
            'NIO' => 'Nicaraguan Córdoba (NIO)',
            'NOK' => 'Norwegian Krone (NOK)',
            'NPR' => 'Nepalese Rupee (NPR)',
            'NZD' => 'New Zealand Dollar (NZD)',
            'OMR' => 'Omani Rial (OMR)',
            'PEN' => 'Peruvian Nuevo Sol (PEN)',
            'PGK' => 'Papua New Guinean Kina (PGK)',
            'PHP' => 'Philippine Peso (PHP)',
            'PKR' => 'Pakistani Rupee (PKR)',
            'PLN' => 'Polish Zloty (PLN)',
            'PYG' => 'Paraguayan Guarani (PYG)',
            'QAR' => 'Qatari Rial (QAR)',
            'RON' => 'Romanian Leu (RON)',
            'RSD' => 'Serbian Dinar (RSD)',
            'RUB' => 'Russian Ruble (RUB)',
            'SAR' => 'Saudi Riyal (SAR)',
            'SCR' => 'Seychellois Rupee (SCR)',
            'SEK' => 'Swedish Krona (SEK)',
            'SGD' => 'Singapore Dollar (SGD)',
            'SKK' => 'Slovak Koruna (SKK)',
            'SLL' => 'Sierra Leonean Leone (SLL)',
            'SVC' => 'Salvadoran Colón (SVC)',
            'THB' => 'Thai Baht (THB)',
            'TND' => 'Tunisian Dinar (TND)',
            'TRY' => 'Turkish Lira (TRY)',
            'TTD' => 'Trinidad and Tobago Dollar (TTD)',
            'TWD' => 'New Taiwan Dollar (TWD)',
            'TZS' => 'Tanzanian Shilling (TZS)',
            'UAH' => 'Ukrainian Hryvnia (UAH)',
            'UGX' => 'Ugandan Shilling (UGX)',
            'USD' => 'US Dollar (USD)',
            'UYU' => 'Uruguayan Peso (UYU)',
            'UZS' => 'Uzbekistan Som (UZS)',
            'VEF' => 'Venezuelan Bolívar (VEF)',
            'VND' => 'Vietnamese Dong (VND)',
            'XOF' => 'CFA Franc BCEAO (XOF)',
            'YER' => 'Yemeni Rial (YER)',
            'ZAR' => 'South African Rand (ZAR)',
            'ZMK' => 'Zambian Kwacha (ZMK)'
        );
        if ($sel != '') {
            return $currency_array[$sel];
        } else {
            return $currency_array;
        }
    }

    function get_currency_options($sel='') {
        $currency_array = self::get_currency();
        foreach ($currency_array as $key => $value) {
            if ($sel == $key) {
                $opt .= '<option value="' . $key . '" selected="selected">' . $value . '</option>';
            } else {
                $opt .= '<option value="' . $key . '">' . $value . '</option>';
            }
        }
        return $opt;
    }

    public static function get_important_currency() {
        $currency_array = array(
            'AED' => 'United Arab Emirates Dirham (AED)',
            'AUD' => 'Australian Dollar (AUD)',
            'BDT' => 'Bangladeshi Taka (BDT)',
            'BND' => 'Brunei Dollar (BND)',
            'CAD' => 'Canadian Dollar (CAD)',
            'CNY' => 'Chinese Yuan (CNY)',
            'CZK' => 'Czech Republic Koruna (CZK)',
            'EUR' => 'Euro (EUR)',
            'GBP' => 'British Pound Sterling (GBP)',
            'HKD' => 'Hong Kong Dollar (HKD)',
            'IDR' => 'Indonesian Rupiah (IDR)',
            'ILS' => 'Israeli New Sheqel (ILS)',
            'INR' => 'Indian Rupee (INR)',
            'JOD' => 'Jordanian Dinar (JOD)',
            'JPY' => 'Japanese Yen (JPY)',
            'KRW' => 'South Korean Won (KRW)',
            'LKR' => 'Sri Lankan Rupee (LKR)',
            'MYR' => 'Malaysian Ringgit (MYR)',
            'NGN' => 'Nigerian Naira (NGN)',
            'NPR' => 'Nepalese Rupee (NPR)',
            'NZD' => 'New Zealand Dollar (NZD)',
            'PKR' => 'Pakistani Rupee (PKR)',
            'RUB' => 'Russian Ruble (RUB)',
            'SAR' => 'Saudi Riyal (SAR)',
            'SEK' => 'Swedish Krona (SEK)',
            'SGD' => 'Singapore Dollar (SGD)',
            'TND' => 'Tunisian Dinar (TND)',
            'TRY' => 'Turkish Lira (TRY)',
            'TWD' => 'New Taiwan Dollar (TWD)',
            'USD' => 'US Dollar (USD)',
            'YER' => 'Yemeni Rial (YER)',
            'ZAR' => 'South African Rand (ZAR)',
            'ZMK' => 'Zambian Kwacha (ZMK)'
        );
    }

}

?>
