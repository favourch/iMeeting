<?php
/*
 * (c) iMeeting.vn
 * Author: Nguyen Nhan 
 * Email: nxtnhan@gmail.com
 */

class BigBlueButtonConfig
{
	/*
	 * This is static function return the security salt that must match the value set in the BigBlueButton server
	 */ 
	public static function getSalt(){
		$salt = "d6cc20d3f12db6ea98df7b4f8da16ccd";
		return $salt;
	}

	/*
	 *  This is static function return the URL for the BigBlueButton server
	 * Make sure the url ends with /bigbluebutton/
	 */ 
	
	public static function getUrl(){
		$url = "http://hcm.imeeting.vn/bigbluebutton/";
		return $url; 
	} 
	
}

?>

