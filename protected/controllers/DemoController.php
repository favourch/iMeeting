<?php
Yii::import('application.vendors.bbb.*');
require('bbb_api.php');
require('bbb_api_conf.php'); //enter the salt, and url in this file
 
class DemoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	private $_logoutUrl ;
	//private $_logoutUrl = 'http://imeeting.vn/index.php?r=conference/index';
	private $_debug = true; //For debug only
	private $_attendee = 'imeetingdemoattendee';
	private $_mod = 'imeetingdemomod';
	private $_room = 'iMeeting - Demo';
	private $_room_limit = 20;
	/*
	 * 
	 * 
	*/
	public function actionLogout(){
		$info  = array(
					'user_id' => -1,
					'room_id' => -1,
					'created_time' => time(),
					'ip_address' =>	  CHttpRequest::getUserHostAddress(),
					'action' => 2 //logout
					);
				$log_model = new RoomHistory();
				$log_model->attributes = $info;
				$log_model->save();
		
		$this->redirect(array('/site/contact'));
	}
	public function actionJoin($username = null, $mod=1, $hash=null){
			
		 // room config
		$this->_logoutUrl = Yii::app()->getRequest()->getHostInfo() . '/index.php?r=demo/logout';
		$salt = BigBlueButtonConfig::getSalt();
		$url = BigBlueButtonConfig::getUrl();
		//Username
		
		$room = $this->_room;
		//Load room information
		
		$concurrentUser = BigBlueButton::countUsers( $this->_room, $this->_mod, $url, $salt ) ;
		if($concurrentUser >= $this->_room_limit){
			Yii::app()->user->setFlash('error','Phòng "'. $this->_room . '" đã đạt giới hạn thành viên.');
			$this->redirect(array("/demo"));
			return;
		} 
		if($username == null || $username == ''){
			$username = 'Demo - ' . ($concurrentUser + 1);
		}
		//var_dump($room);
		 
	

		//Calls endMeeting on the bigbluebutton server
		$response = BigBlueButton::createMeetingArray($username, $room, null, $this->_mod, $this->_attendee, $salt, $url, $this->_logoutUrl);
		//$response =BigBlueButton::createMeetingAndGetJoinURL($username, $room, null, $this->_mod, $this->_attendee, $salt, $url, $this->_logoutUrl);
		
		//var_dump($response);
		//die();		
		//Analyzes the bigbluebutton server's response
		if(!$response){//If the server is unreachable
			$msg = 'Unable to join the meeting. Please check the url of the bigbluebutton server AND check to see if the bigbluebutton server is running.';
		}
		else if( $response['returncode'] == 'FAILED' ) { //The meeting was not created
			if($response['messageKey'] == 'checksumError'){
				$msg = 'A checksum error occured. Make sure you entered the correct salt.';
			}
			else{
				$msg = $response['message'];
			}
		}
		else{ 
		//The meeting was created, and the user will now be joined
			
			if($mod){
			// Moderator privileged
				$pw = $this->_mod;
			}else{
			//Attendee 			
				$pw = $this->_attendee;
			}
			
			$bbb_joinURL = BigBlueButton::joinURL($room, $username,$pw, $salt, $url);
				/* write log */
				//die(BigBlueButton::getChecksumFromUrl($bbb_joinURL));
				$info  = array(
					'user_id' => -1,
					'room_id' => -1,
					'created_time' => time(),
					'ip_address' =>	  CHttpRequest::getUserHostAddress(),
					'action' => 1 //login
					);
				$log_model = new RoomHistory();
				$log_model->attributes = $info;
				$log_model->save();
				$this->redirect($bbb_joinURL);
			?>
			<?php
			return;
		}

			
	}
	
	public function actionIndex()
	{
		if(isset($_POST['type'])){
			if(isset($_POST['username'])){
				$this->actionJoin($_POST['username'], $_POST['type']);
			}else{
				$this->actionJoin(null, $_POST['type']);
			}
			
		}else{
			$this->render('index');	
		}
	}

}
