<?php
Yii::import('application.vendors.bbb.*');
require('bbb_api.php');
require('bbb_api_conf.php'); //enter the salt, and url in this file
class ConferenceController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
	private $_user ;

	private $_logoutUrl = 'http://imeeting.vn/index.php?r=conference/logout';
	//$this->_logoutUrl = Yii::app()->getRequest()->getHostInfo();
	private $_debug = true; //For debug only

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform these actions
				'actions'=>array('index','view','join', 'info', 'logout'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		$this->loadUser();
		if(!Yii::app()->getModule('user')->isAdmin()){
			if($id && ($model->company_id != $this->_user->company_id)){
				Yii::app()->user->setFlash('error',Yii::t('conference','Phòng hội thảo này không thuộc tổ chức của bạn'));
				$this->redirect(array("/conference"));
			}
		}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionLogout($room_id){
		$info  = array(
					'user_id' => Yii::app()->user->id,
					'room_id' => intval($room_id),
					'created_time' => time(),
					'ip_address' =>	  CHttpRequest::getUserHostAddress(),
					'action' => 2 //logout
					);
				$log_model = new RoomHistory();
				$log_model->attributes = $info;
				$log_model->save();

		$this->redirect(array('/'));
	}
	/*
	 *
	 *
	*/
	public function actionJoin($room, $hash=null){

		if(Yii::app()->getModule('user')->isAdmin()){
			Yii::app()->user->setFlash('warning',Yii::t('conference','Bạn không được quyền vào khu vực này'));
			$this->redirect(array("conference/index"));
			return;
		}


		$salt = BigBlueButtonConfig::getSalt();
		$url = BigBlueButtonConfig::getUrl();
		$bbb = new BigBlueButton();
		$profile = $this->loadUser()->profile;
		$username = $profile->firstname  . " " . $profile->lastname;

		//Load room information

		$room_model = Rooms::model()->findByPk(intval(trim($room)));
		if(!$room_model){
			Yii::app()->user->setFlash('warning',Yii::t('conference',"Phòng bạn muốn sử dụng không tồn tại, vui lòng kiểm tra lại thông tin.<br/>Danh sách phòng họp bạn được phép sử dụng bên dưới"));
			$this->redirect(array("index"));
			return;
		}
		//Check room permission for this user
		if($room_model->company_id != $this->_user->company_id){

			Yii::app()->user->setFlash('warning',Yii::t('conference','Rất tiếc, bạn không được phép vào phòng này.<br/>Danh sách phòng họp bạn được phép sử dụng bên dưới'));
			$this->redirect(array("index"));
			return;
		}



		$concurrentUser = $bbb->countUsers( $room_model->id, $room_model->moderator_pw, $url, $salt ) ;
		if($concurrentUser >= $room_model->user_limit){
			Yii::app()->user->setFlash('error',Yii::t('conference','Phòng').' "'. $room_model->name .'" ' . Yii::t('conference','đã đạt giới hạn thành viên.'));
			$this->redirect(array("index"));
			return;
		}
		//var_dump($room);

		if (trim($username) && trim($room)){

			//Calls endMeeting on the bigbluebutton server
			$response = $bbb->createMeetingArray($username, $room, null, $room_model->moderator_pw, $room_model->attendee_pw, $salt, $url, $this->_logoutUrl . '&room_id='.$room_model->id);

			$meetingInfo = $bbb->getMeetingInfoIntoObject($room, $room_model->moderator_pw,$url, $salt);

			//die(CJSON::encode(BigBlueButton::getMeetings($url, $salt)));
			//Analyzes the bigbluebutton server's response
			if(!$response){//If the server is unreachable
				$msg = 'Không thể tham gia vào phòng họp. Xin vui lòng kiểm tra đường dẫn đúng máy chủ của iMeeting';

			}

			else if( $response['returncode'] == 'FAILED' ) { //The meeting was not created
				if($response['messageKey'] == 'checksumError'){
					$msg = 'Có lỗi xảy ra, vui lòng kiểm tra chắc chắn bạn sử dụng máy chủ iMeeting';
				}
				else{
					$msg = $response['message'];
				}
			}
			else{
			//The meeting was created, and the user will now be joined
				$isMod = false;
				$rights = Rights::getAssignedRoles(Yii::app()->user->id);
				foreach ($rights as $r) {
					if($r->name=='Presenter'){
						$isMod = true;
					}
				}

				if($room_model->owner_id == Yii::app()->user->id || $isMod){
					$pw = $room_model->moderator_pw;
				}else{

					$pw = $room_model->attendee_pw;
				}

				$bbb_joinURL = $bbb->joinURL($room, $username,$pw, $salt, $url);
				/* write log */
				$info  = array(
					'user_id' => Yii::app()->user->id,
					'room_id' => $room_model->id,
					'created_time' => time(),
					'ip_address' =>	  Yii::app()->request->userHostAddress ,
					'action' => 1 //login
					);
				$log_model = new RoomHistory();
				$log_model->attributes = $info;
				$log_model->save();
				$this->redirect($bbb_joinURL);
				/*
				<script type="text/javascript">
					window.location = "<?php echo $bbb_joinURL; ?>";
					//alert(" <?php echo $bbb_joinURL; ?>");
				</script>*/

				return;
			}
		}
		else {
			$msg = "You must enter your name.";
		}
		if(isset($msg)){
			Yii::app()->user->setFlash('warning',$msg );
		}
	}
	  /**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$model=new Rooms;


		// Uncomment the following line if AJAX validation is needed
		//$this->performAjaxValidation($model);

		if(isset($_POST['Rooms']))
		{
			$this->loadUser();
			$model->attributes=$_POST['Rooms'];
			if(Yii::app()->getModule('user')->isAdmin()){
				$company_id = $_POST['Rooms']['company'];

			}
			else{

				$company_id =  $this->_user->company_id;
			}
			if(!$company_id ){

				$msg = Yii::t('confercen','Phòng hội thảo phải thuộc công ty/tổ chức. Vui lòng kiểm tra lại');
				Yii::app()->user->setFlash('error',$msg );
				$this->redirect(array("conference/create"), array('model'=>$model));
				return;
			}else{
				$company = Company::model()->findByPk($company_id);
				//check room limit for this company
				$roomCount = Rooms::model()->count('company_id=:company_id',array(':company_id'=> $company_id));

				if($company->room_limit < ($roomCount + 1)){
					$msg =
					 Yii::t('conference','Công ty đã có {RoomCount} phòng, số lượng phòng giới hạn là {RoomLimit}, không thể tạo thêm được'
					 	,array('{RoomCount}'=> $roomCount, '{RoomLimit}'=> $company->room_limit ));
					 ;
				}else{
				//check user limit for this room
					$sumUser  = Yii::app()->db->createCommand('SELECT SUM(user_limit) FROM ' . $model->tableName() . ' WHERE company_id = ' . $company_id)->queryScalar();
					if($company->user_limit < ($sumUser + $model->user_limit)){
						$i = $company->user_limit - $sumUser;
						if($i > 0){
							$msg = Yii::t('conference','Số lượng thành viên của phòng vượt giới hạn, bạn chỉ có thể tạo thêm {i} thành viên.',array('{i}'=>$i)) ;
						}else{
							$msg = Yii::t('conference','Phòng hội thảo đã đạt giới hạn số lượng thành viên là {UserLimit}, bạn không thể tạo thêm.',array('{UserLimit}'=>$company->user_limit));
							//'SumUser'=>$sumUser)
						}
					}else{
						$model->company_id =  $company_id;
						if(!$model->owner_id)
							$model->owner_id = Yii::app()->user->id;
						$model->created_date = time();
						if($model->save()){
							$info  = array(
								'company_id' => $company_id,
								'room_id' => $model->getPrimaryKey(),
								'directory' => sha1($model->getPrimaryKey()),

							);
							var_dump($info);

							$roomdir_model = new RoomDirectory;
							$roomdir_model->attributes = $info;
							$roomdir_model->save();

							$this->redirect(array('view','id'=>$model->id));
						}
					}
				}
			}
		}
		$company = array();
		if(isset($msg)){
			Yii::app()->user->setFlash('warning',$msg );
		}
		if(Yii::app()->getModule('user')->isAdmin()){
			$criteria=new CDbCriteria;
			$criteria->select='id, name';
			$company = Company::model()->findAll($criteria);

		}
		$this->render('create',array(
			'model'=>$model,
			'company'=> $company,
		));
	}
	public function loadUser()
	{
		if($this->_user===null)
		{
			if(Yii::app()->user->id)
				$this->_user=User::model()->findByPk(Yii::app()->user->id);
			if($this->_user===null)
				$this->redirect(array("user/login"));
		}
		return $this->_user;
	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$this->loadUser();
		$old_LimitUser = $model->user_limit;
		if(!Yii::app()->getModule('user')->isAdmin()){
			if($id && ($model->company_id != $this->_user->company_id)){


				Yii::app()->user->setFlash('warning',Yii::t('conference','Phòng hội thảo này không thuộc quyền quản lý của bạn'));
				$this->redirect(array("conference/admin"));
			}
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Rooms']))
		{

			$this->loadUser();
			$model->attributes=$_POST['Rooms'];
			if(Yii::app()->getModule('user')->isAdmin()){
				$company_id = $_POST['Rooms']['company'];
			}else{
				$company_id =  $this->_user->company_id;
			}
			if(!$company_id ){
				$msg = 'Phòng hội thảo phải thuộc công ty/tổ chức. Vui lòng kiểm tra lại';

			}else{
				$company = Company::model()->findByPk($company_id);
				//check user limit for this room
				$sumUser  = Yii::app()->db->createCommand('SELECT SUM(user_limit) FROM ' . $model->tableName() . ' WHERE company_id = ' . $company_id)->queryScalar();

				if($company->user_limit < ($sumUser + $model->user_limit - $old_LimitUser)){
					$i = $company->user_limit - $sumUser - $old_LimitUser;
					if($i > 0){
						$msg = 'Số lượng thành viên của phòng vượt giới hạn, bạn chỉ có thể tạo thêm ' . $i . ' thành viên.' ;
					}else{
						$msg = 'Phòng hội thảo đã đạt giới hạn số lượng thành viên, bạn không thể tạo thêm ';
					}
				}
				else{
					$model->company_id =  $company_id;
					if(!$model->owner_id)
						$model->owner_id = $this->_user->id;
					$model->created_date = time(); //update time
					if($model->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}
		}
		$company = array();
		if(isset($msg)){
			Yii::app()->user->setFlash('warning',$msg );
		}
		if(Yii::app()->getModule('user')->isAdmin()){
			$criteria=new CDbCriteria;
			$criteria->select='id, name';
			$company = Company::model()->findAll($criteria);

		}

		$this->render('update',array(
			'model'=>$model,
			'company'=> $company,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{

		if(Yii::app()->request->isPostRequest)
		{


				$this->loadModel($id)->delete();

			// we only allow deletion via POST request


			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	public function actionInfo($room_id){
		$salt = BigBlueButtonConfig::getSalt();
		$url = BigBlueButtonConfig::getUrl();
		//get room info
		$room = Rooms::model()->findByPk($room_id);
		$bbb = new BigBlueButton();
		$response = $bbb->getMeetingInfo( $data->id, $data->moderator_pw, $url, $salt ) ;

		return $response;
	}
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=$this->loadUser();
		$criteria=new CDbCriteria;

		if(Yii::app()->getModule('user')->isAdmin()){

			if(isset($_GET['company_id'])){
				$criteria->compare('company_id',intval($_GET['company_id']));
			}

		}
		else{
			if($model->company_id < 0){
				$msg = Yii::t('conference',"Vui lòng liên hệ người quản lý tổ chức hoặc công ty của bạn.
						Bạn cần tham gia vào 1 tổ chức hoặc công ty để có thể sử dụng phòng họp.");
				Yii::app()->user->setFlash('warning',$msg );
				$this->redirect(array("user/login"));
			}
			$criteria->compare('company_id',$model->company_id);
		}


		$dataProvider=new CActiveDataProvider('Rooms',array(
			'criteria'=>$criteria,
			 'pagination'=>array(
                        'pageSize'=>5,
                ),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));

	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$user = $this->loadUser();
		$model=new Rooms('search');



		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Rooms']))
			$model->attributes=$_GET['Rooms'];
		if(!Yii::app()->getModule('user')->isAdmin()){
			if($user->company_id < 0){
				$msg = Yii::t('conference',"Vui lòng liên hệ người quản lý tổ chức hoặc công ty của bạn.
						Bạn cần tham gia vào 1 tổ chức hoặc công ty để có thể sử dụng phòng họp.");
				Yii::app()->user->setFlash('warning',$msg );
				$this->redirect(array("user/login"));
			}
			else{
				$model->company_id = $user->company_id;
			}
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Rooms::model()->findByPk($id);

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='rooms-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	  protected function gridDataColumn($data,$row)
     {
          // ... generate the output for the column
 
          // Params:
          // $data ... the current row data   
         // $row ... the row index    
         return $this->renderPartial('_view', array('data'=>$data));    
    }      
    
}
