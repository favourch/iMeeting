<?php
Yii::import('application.controllers.ProcessPresentationsController');
class PresentationsController extends GxController {
	private $_user ;
	private $_dir = "/var/bigbluebutton";
	public $layout='//layouts/column1';
	public function filters() {
		return array(
				'accessControl',
				);
	}

	public function accessRules() {
		return array(

				array('allow',
					'actions'=>array('index','view', 'download', 'admin', 'update','delete', 'thumb'),
					'users'=>array('@'),
					),

				array('deny',
					'users'=>array('*'),
					),
				);
	}
	public function createCriteria(){
		if(Yii::app()->getModule('user')->isAdmin()){
			throw new CHttpException(400,'Invalid request. Admin cannot using this controller');
			return;
		}
		$criteria=new CDbCriteria;
		$thisUser = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
		$this->_company_id = $thisUser->company_id;
		if($this->_company_id < 0 ){
			throw new CHttpException(400,'Invalid request. Please verify your accout: missing company');
			return;
		}
		$criteria->compare('company_id',$this->_company_id );
		return $criteria;

	}
	public function actionView($id) {

		//$this->actionDownload($id);
		if(!$this->checkOwner($id)){
			throw new CHttpException(400,'you are not authorized to view this document.');
			//Yii::app()->clientScript->registerScript('uniqueid', 'alert("ok");');
			//$this->redirect(Yii::app()->user->returnUrl);
		};

		$this->render('view', array(
			'model' => $this->loadModel($id, 'Presentations'),
			//'model' =>$presentation,

		));
	}
	public function actionThumb($id){
		if(!$this->checkOwner($id)){
			throw new CHttpException(400,'you are not authorized to view this document.');
			//Yii::app()->clientScript->registerScript('uniqueid', 'alert("ok");');
			//$this->redirect(Yii::app()->user->returnUrl);
		};
		$presentation = Presentations::model()->findByPk($id);
		//$room_dir = RoomDirectory::model()->findByPk($presentation->room_sha1);

		$image = $this->_dir."/".$presentation->room_sha1."/".$presentation->path."/".$presentation->filename."/thumbnails/thumb-1.png";
		if(file_exists($image))
			  {
		//	  	echo (basename($presentation->filename.".".CFileHelper::getExtension($file)));

				@ob_end_clean();
			  	 return Yii::app()->getRequest()->sendFile(basename($presentation->id."-thumb.".CFileHelper::getExtension($image)),
			  	 	 @file_get_contents($image), CFileHelper::getMimeTypeByExtension($image),false);

			 }
	}
	public function checkMod(){
		$isMod = false;
		$rights = Rights::getAssignedRoles(Yii::app()->user->id);
		foreach($rights as $r){
			if($r->name =='Moderator'){
				$isMod = true;
			}

		}
		return $isMod;

	}
    public function checkOwner($docId){
    	$this->loadUser();

		$doc = Yii::app()->db->createCommand()
		    ->select('p.id')
		    ->from('tbl_presentations p,tbl_room_directory r, tbl_company c')
		    //->join('tbl_room_directory r, tbl_rooms room', 'r.id=p.room_dir_id')
		    ->where('p.id=:id AND p.room_sha1 = r.directory AND   r.company_id = c.id AND c.id = :company_id', array(':id'=>$docId, ':company_id'=>$this->_user->company_id))
		    ->queryRow();
		//if()

		if($doc == FALSE){
				echo $this->_user->company_id;
				return false;
		}
		return true;
    }
	public function actionUpdate($id) {
		if(!$this->checkOwner($id) || !$this->checkMod()){
			throw new CHttpException(400,'you are not authorized to edit this document.');

		};

		$model = $this->loadModel($id, 'Presentations');


		if (isset($_POST['Presentations'])) {
			
			$model->setAttributes($_POST['Presentations']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {

		if(!$this->checkOwner($id) || !$this->checkMod()){
			throw new CHttpException(400,'you are not authorized to delete this document.');

		};
		$presentation = Presentations::model()->findByPk($id);
		//$room_dir = RoomDirectory::model()->findByPk($presentation->room_dir_id);
		$dir = $this->_dir."/".$presentation->room_sha1 ."/".$presentation->path."/".$presentation->filename;
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'Presentations')->delete();

			/* process delete file in hard disk */
		 	//$this->rrmdir($dir);
			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$this->actionAdmin();
	}

	public function actionAdmin() {
		if(!$this->checkMod()){
			throw new CHttpException(400,'you are not authorized to manage documents.');

		};
		//ProcessPresentationsController::actionIndex();

		unset(Yii::app()->request->cookies['from_date']);  // first unset cookie for dates
		unset(Yii::app()->request->cookies['to_date']);

		$model = new Presentations('search');
		$model->unsetAttributes();

		if(!empty($_POST))
		{

			if(isset($_POST['yt0']) ){
			   	Yii::app()->request->cookies['from_date'] = new CHttpCookie('from_date', $_POST['from_date']);  // define cookie for from_date
				Yii::app()->request->cookies['to_date'] = new CHttpCookie('to_date', $_POST['to_date']);
				$model->from_date = strtotime($_POST['from_date']);
				$model->to_date = strtotime($_POST['to_date']);
			}
			elseif (isset($_POST['yt1']) && $_POST['yt1'] != 'Reset'){
				$model->from_date = null;
				$model->to_date = null;
			}
		}


		if (isset($_GET['Presentations']))
			$model->setAttributes($_GET['Presentations']);

		$this->render('admin', array(
			'model' => $model,
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
	public function actionDownload($id){

		if(!$this->checkOwner($id)){
			throw new CHttpException(400,'you are not authorized to view this document.');
			//Yii::app()->clientScript->registerScript('uniqueid', 'alert("ok");');
			//$this->redirect(Yii::app()->user->returnUrl);
		};
		$presentation = Presentations::model()->findByPk($id);
		//$room_dir = RoomDirectory::model()->findByPk($presentation->room_sha1);

		$dir = $this->_dir."/".$presentation->room_sha1."/".$presentation->path."/".$presentation->filename;


		$files = CFileHelper::findFiles($dir,array("fileTypes"=> array('doc', 'DOC','docx', 'DOCX', 'pdf', 'PDF', 'xls', 'XLS', 'xlsx', 'XLSX' ,'jpg' , 'JPG', 'png', 'PNG', 'bmp', 'BMP'),"level"=>0));

		foreach ($files as $file) {

			if(file_exists($file))
			  {
		//	  	echo (basename($presentation->filename.".".CFileHelper::getExtension($file)));

				@ob_end_clean();
			  	 return Yii::app()->getRequest()->sendFile(basename($presentation->name.".".CFileHelper::getExtension($file)),
			  	 	 @file_get_contents($file), CFileHelper::getMimeTypeByExtension($file),false);

			 }
		}

	}
	function rrmdir($dir) {
		//echo " <br>rrmdir start!";

	    if (is_dir($dir)) {
	    	//echo " <br>is dir";
		     $objects = scandir($dir);
		     foreach ($objects as $object) {
		       if ($object != "." && $object != "..") {
		         if (filetype($dir."/".$object) == "dir") $this->rrmdir($dir."/".$object); else unlink($dir."/".$object);
		       }
		     }
		     reset($objects);
		     rmdir($dir);
	    }
	}
}