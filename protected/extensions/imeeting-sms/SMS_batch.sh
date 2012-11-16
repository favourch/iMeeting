#!/usr/bin/php
<?php
/*****************************************
 * cli_sms.php
 *
 * A simple script to send an SMS via various SMS gateways' HTTP APIs.
 *
 * Version History:
 *
 * v0.1 2007-09-11 - zabbix wiki user 'rts'
 * v0.2 2010-07-08 - Walter Heck <walter AT tribily DOT com>
 * v0.3 2012-02-06 – Jyri-Petteri Paloposki <jyri-petteri.paloposki@iki.fi>
 *  * Support for Nexmo and BudgetSMS (previously only Clickatell)
 *
 *****************************************/
 
// The service you're using. Choices include clickatell, budgetsms and nexmo
$service = 'kisvn';
 
// The API key.
$apikey = "";
 
// Username and password. With BudgetSMS use userid as password. Username not needed for Nexmo.
$user                = "";
$password            = "";
 
// The sender name / number. This has to conform to your service provider's
//+regulations.
$from                = "Zabbix";
 
// Where should this script log to? The directory must already exist.
$logfilelocation    = "/var/log/zabbix-server/sms/";
 
// if debug is true, log files will be generated
$debug    = true;
 
/**********************************************************************
  !! Do not change anything below this line unless
         you _really_ know what you are doing !!
 **********************************************************************/
 
if (count($argv)<3) {
    die ("Usage: ".$argv[0]." recipientmobilenumber \"subject\" \"message\"\n");
}
 
if ( $debug )
    file_put_contents($logfilelocation."sms_alert_" . $service . "_".date("YmdHis"), serialize($argv));
 
$to         = $argv[1];
$subject    = $argv[2];
$message    = $argv[3];
 
$text = $subject.": ".$message;
 
switch ($service) {
  case 'kisvn':
	  $apiargs = array(
	  "PhoneNumber" =>$to,
	  "Text" => $text, 
	  );
	  $baseurl = "http://172.25.2.6:8888/"; 
	  break;
  case 'clickatell':
    $apiargs = array(
      "api_id"     => $apikey,
      "user"         => $user,
      "password"     => $password,
      "to"         => $to,
      "text"        => $text,
      "from"        => $from,
    );
    $baseurl    = "http://api.clickatell.com/http/sendmsg";
    break;
  case 'budgetsms':
    $apiargs = array(
      "handle"     => $apikey,
      "username"         => $user,
      "userid"     => $password,
      "to"         => $to,
      "msg"        => $text,
      "from"        => $from,
    );
    $baseurl = 'http://www.budgetsms.net/api/sendsms';
    break;
  case 'nexmo':
    $apiargs = array(
      "username"         => $apikey,
      "password"     => $password,
      "to"         => $to,
      "text"        => $text,
      "from"        => $from,
    );
    $baseurl = 'http://rest.nexmo.com/sms/json';
    break;
}
 
$params    = "";
foreach ($apiargs as $k=>$v) {
    if ( $params != "" ) {
        $params .= "&";
    }
    $params .= $k."=".urlencode($v);
}
 
$url = $baseurl . '?' . $params;
 
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url );
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
 
if ( $result === false ) {
    file_put_contents($logfilelocation."sms_alert_" . $service . "_error_".date("YmdHis"), curl_error($curl));
    die(curl_error($curl)."\n");
} else {
    if ( $debug || $result != 100 )
        file_put_contents($logfilelocation."sms_alert_" . $service . "_answer_".date("YmdHis"), $result);
}