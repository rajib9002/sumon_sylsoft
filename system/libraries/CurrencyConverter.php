<?php
/**
 * Description of CurrencyConverter
 *
 * @author HOLY
 */
class CurrencyConverter{

   var $xml_file = "www.ecb.int/stats/eurofxref/eurofxref-daily.xml";
   var $mysql_host, $mysql_user, $mysql_pass, $mysql_db, $mysql_table;
   var $exchange_rates = array();

   function CurrencyConverter($host='localhost',$user='flamma_flammabd',$pass='flamma@sylhet',$db='flamma_gift_shop',$tb='currency'){

      $this->mysql_host = $host;
      $this->mysql_user = $user;
      $this->mysql_pass = $pass;
      $this->mysql_db = $db;
      $this->mysql_table = $tb;

      $this->checkLastUpdated();

      $conn = mysql_connect($this->mysql_host,$this->mysql_user,$this->mysql_pass);

      $rs = mysql_select_db($this->mysql_db,$conn);

      $sql = "SELECT * FROM ".$this->mysql_table;

      $rs =  mysql_query($sql,$conn);

      while($row = mysql_fetch_array($rs)){

         $this->exchange_rates[$row['currency']] = $row['rate'];
      }

   }

   /* Perform the actual conversion, defaults to £1.00 GBP to USD */
   function convert($amount=1,$from="GBP",$to="USD",$decimals=2){
    return(number_format(($amount/$this->exchange_rates[$from])*$this->exchange_rates[$to],$decimals));
   }

   /* Check to see how long since the data was last updated */
   function checkLastUpdated(){
      $conn = mysql_connect($this->mysql_host,$this->mysql_user,$this->mysql_pass);
      $rs = mysql_select_db($this->mysql_db,$conn);

      $sql = "SHOW TABLE STATUS FROM ".$this->mysql_db." LIKE '".$this->mysql_table."'";

      $rs =  mysql_query($sql,$conn);

      if(mysql_num_rows($rs) == 0 ){

         $this->createTable();
      } else{
         $row = mysql_fetch_array($rs);
         if(time() > (strtotime($row["Update_time"])+(12*60*60)) ) {

            $this->downloadExchangeRates();
         }
      }
   }

   /* Download xml file, extract exchange rates and store values in database */
   function downloadExchangeRates() {
      $currency_domain = substr($this->xml_file,0,strpos($this->xml_file,"/"));
      $currency_file = substr($this->xml_file,strpos($this->xml_file,"/"));
      $fp = @fsockopen($currency_domain, 80, $errno, $errstr, 10);
      if($fp) {

         $out = "GET ".$currency_file." HTTP/1.1\r\n";
         $out .= "Host: ".$currency_domain."\r\n";
         $out .= "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8) Gecko/20051111 Firefox/1.5\r\n";
         $out .= "Connection: Close\r\n\r\n";
         fwrite($fp, $out);
         while (!feof($fp)) {

            $buffer .= fgets($fp, 128);
         }
         fclose($fp);

         $pattern = "{<Cube\s*currency='(\w*)'\s*rate='([\d\.]*)'/>}is";
         preg_match_all($pattern,$buffer,$xml_rates);
         array_shift($xml_rates);

         for($i=0;$i<count($xml_rates[0]);$i++) {

            $exchange_rate[$xml_rates[0][$i]] = $xml_rates[1][$i];
         }

         $conn = mysql_connect($this->mysql_host,$this->mysql_user,$this->mysql_pass);

         $rs = mysql_select_db($this->mysql_db,$conn);

         foreach($exchange_rate as $currency=>$rate) {

            if((is_numeric($rate)) && ($rate != 0)) {

               $sql = "SELECT * FROM ".$this->mysql_table." WHERE currency='".$currency."'";
               $rs =  mysql_query($sql,$conn) or die(mysql_error());
               if(mysql_num_rows($rs) > 0){

                  $sql = "UPDATE ".$this->mysql_table." SET rate=".$rate." WHERE currency='".$currency."'";
               } else {

                  $sql = "INSERT INTO ".$this->mysql_table." VALUES('".$currency."',".$rate.")";
               }

               $rs =  mysql_query($sql,$conn) or die(mysql_error());
            }

         }
      }
   }

   /* Create the currency exchange table */
      function createTable() {

      $conn = mysql_connect($this->mysql_host,$this->mysql_user,$this->mysql_pass);

      $rs = mysql_select_db($this->mysql_db,$conn);

      $sql = "CREATE TABLE ".$this->mysql_table." ( currency char(3) NOT NULL default '', rate float NOT NULL default '0', PRIMARY KEY(currency) ) ENGINE=MyISAM";

      $rs =  mysql_query($sql,$conn) or die(mysql_error());

      $sql = "INSERT INTO ".$this->mysql_table." VALUES('EUR',1)";

      $rs =  mysql_query($sql,$conn) or die(mysql_error());

      $this->downloadExchangeRates();
   }
    //put your code here
}
?>
