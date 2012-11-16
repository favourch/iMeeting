<?php
class SMS {
	// The service you're using. Choices include clickatell, budgetsms and nexmo
	public $service = 'clickatell';
	 
	// The API key.
	public $apikey = "";
	 
	// Username and password. 
	// Some provider not need it.
	public $user                = "";
	public $password            = "";
	 
	// The sender name / number. This has to conform to your service provider's
	//+regulations.
	public $from                = "iMeeting";
	 
	// Where should this script log to? The directory must already exist.
	public $logfilelocation    = "/logs";
	 
	// if debug is true, log files will be generated
	public $debug    = true;
	 
	/**********************************************************************
	  !! Do not change anything below this line unless
	         you _really_ know what you are doing !!
	 **********************************************************************/
	public static function send($to, $message, $subject = null)  {
		$text = $message;
			
		if($subject!=null){
			$text = $subject.": ".$message;
		}
		switch ($service) {
	
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
	}	
} 

