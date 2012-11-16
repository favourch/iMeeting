<?php

class DefaultController extends Controller
{
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$user = null;
		if(Yii::app()->getModule('user')->isAdmin()){
			$this->redirect(array('/user/admin'));
		}
		
		if(Yii::app()->user->id)
			$user=User::model()->findByPk(Yii::app()->user->id);
		if($user===null)
			$this->redirect(array("/user/login"));
		if($user->company_id){
			
			$dataProvider=new CActiveDataProvider('User', array(
				'criteria'=>array(
			        'condition'=>'status>'.User::STATUS_BANED . ' AND company_id=' . $user->company_id,
			    ),
				'pagination'=>array(
					'pageSize'=>Yii::app()->controller->module->user_page_size,
				),
			));
	
			$this->render('/user/index',array(
				'dataProvider'=>$dataProvider,
				'company'=>$user->company->name,
			));
		}
		else{
			throw new CHttpException(406,'Bạn chưa thuộc tổ chức nào, do vậy bạn không thể xem danh sách thành viên của tổ chức.');
			return;
		}
	}

}