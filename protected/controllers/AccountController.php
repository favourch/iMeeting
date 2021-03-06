<?php

class AccountController extends RController
{
	public $defaultAction = 'admin';

	private $_model;
	private $_company_id;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(

			'rights',
		);
	}
	public function createCriteria(){
		if(Yii::app()->getModule('user')->isAdmin()){
			$msg = Yii::t('conference','Truy cập không hợp lệ. Admin không được phép sử dụng chức năng này');
			Yii::app()->user->setFlash('warning',$msg );
			this->redirect(array("user/admin"));
		}
		$criteria=new CDbCriteria;
		$thisUser = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
		$this->_company_id = $thisUser->company_id;
		if($this->_company_id < 0 ){
			$msg = Yii::t('conference',"Vui lòng liên hệ người quản lý tổ chức hoặc công ty của bạn.
					Bạn cần tham gia vào 1 tổ chức hoặc công ty để có thể sử dụng phòng họp.");
			Yii::app()->user->setFlash('error',$msg );
			$this->redirect(array("user/login"));
		}
		$criteria->compare('company_id',$this->_company_id );
		return $criteria;

	}
	public function actionIndex(){
		$this->actionAdmin();
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$criteria = $this->createCriteria();
		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>$criteria,
			'pagination'=>array(
				'pageSize'=>Yii::app()->getModule('user')->user_page_size,
			),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new User;
		$profile=new Profile;
		$presenterName = Rights::module()->presenterName;
		$rights = Rights::getAssignedRoles($model->id);
		$isPresenter = false;
		foreach($rights as $r){
			if($r->name == $presenterName){
				$isPresenter = true;
			}

		}
		if(isset($_POST['User']))
		{
			list($_POST['User']['username']) = @split('@',$_POST['User']['email']);

			$model->attributes=$_POST['User'];
			$model->activkey=Yii::app()->getModule('user')->encrypting(microtime().$model->password);
			$model->createtime=time();
			$model->lastvisit=time();
			$model->company_id = $this->getCompanyId();

			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;


			if($model->validate()&&$profile->validate()) {
				$model->password=Yii::app()->getModule('user')->encrypting($model->password);
				if($model->save()) {
					//iMeeting.vn - Set permisstion
					$authenticatedName = Rights::module()->authenticatedName;
					Rights::assign($authenticatedName, $model->id);
					
					if(isset($_POST['presenter'])){
						Rights::assign($presenterName, $model->id);
					}
					$profile->user_id=$model->id;
					$profile->save();

				}
				$this->redirect(array('view','id'=>$model->id));
			} else $profile->validate();
		}


		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
			'presenter' => $isPresenter,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$profile=$model->profile;
		$rights = Rights::getAssignedRoles($model->id);
		$presenterName = Rights::module()->presenterName;

		$isPresenter = false;
		foreach($rights as $r){
			if($r->name == $presenterName){
				$isPresenter = true;
			}

		}
		if(isset($_POST['User']))
		{
			list($_POST['User']['username']) = @split('@',$_POST['User']['email']);
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];

			if($model->validate()&&$profile->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->getModule('user')->encrypting($model->password);
					$model->activkey=Yii::app()->getModule('user')->encrypting(microtime().$model->password);
				}

				if(isset($_POST['presenter'])){
					Rights::assign($presenterName, $model->id);
				}
				else{
					Rights::revoke($presenterName, $model->id);
				}
				$model->save();
				$profile->save();
				$this->redirect(array('view','id'=>$model->id));
			} else $profile->validate();
		}


		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
			'presenter' => $isPresenter

		));
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$model = $this->loadModel();
			$profile = Profile::model()->findByPk($model->id);
			$profile->delete();
			$model->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('/account/admin'));
		}
		else
			throw new CHttpException(400,Yii::t('conference','Truy cập không hợp lệ. Xin vui lòng không lặp lại hành động này'));
	}
	public function getCompanyId(){
		if(!$this->_company_id)
		{
			$thisUser = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
			$this->_company_id = $thisUser->company_id;
		}
		return $this->_company_id;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{

		$this->getCompanyId();
		if($this->_model===null)
		{
			if(isset($_GET['id'])){
				$this->_model=User::model()->notsafe()->findbyPk($_GET['id']);
				if($this->_model->company_id != $this->_company_id){
					$msg = Yii::t('conference','Tài khoản bạn đang thao tác không thuộc thẩm quyền của bạn');
					Yii::app()->user->setFlash('error',$msg );
					$this->redirect(array("account/index"));
				}
			}
			if($this->_model===null)
				throw new CHttpException(404,Yii::t('Truy cập không hợp lệ, xin vui lòng thử lại sau'));
		}
		return $this->_model;
	}

}