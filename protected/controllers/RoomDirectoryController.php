<?php

class RoomDirectoryController extends GxController {

public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'users'=>array('admin', 'nxtnhan'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
//9109c85a45b703f87f1413a405549a2cea9ab556
//667be543b02294b7624119adc3a725473df39885
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'RoomDirectory'),
		));
	}

	public function actionCreate() {
		$model = new RoomDirectory;
		$company = Company::model()->findAll();
		


		if (isset($_POST['RoomDirectory'])) {
			$model->setAttributes($_POST['RoomDirectory']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model, 'company'=>$company));
	}
	public function actionGetRoom(){
		$data=Rooms::model()->findAll('company_id=:company_id', 
	                  array(':company_id'=>(int) $_POST['company_id']));
	 
	    $data=CHtml::listData($data,'id','name');
	    foreach($data as $value=>$name)
	    {
	        echo CHtml::tag('option',array('value'=>$value),CHtml::encode($name),true);
	    }
	}
	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'RoomDirectory');


		if (isset($_POST['RoomDirectory'])) {
			$model->setAttributes($_POST['RoomDirectory']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'RoomDirectory')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('RoomDirectory');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new RoomDirectory('search');
		$model->unsetAttributes();

		if (isset($_GET['RoomDirectory']))
			$model->setAttributes($_GET['RoomDirectory']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}