<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		Yii::app()->language = 'en';
		$model=new UserLogin;
		//$this->renderPartial('/user/login');
		$this->render('index', array('model'=>$model));
		
	}
	
	public function actionSupport()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$videos = Videos::model()->getTop(4);
		$this->render('support', array('videos'=> $videos));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$mail = array (
					'toEmail' => Yii::app()->params['adminEmail'],
					'toName' => Yii::app()->params['adminName'],
					'fromEmail' => $model->email,
					'fromName' => $model->name,
					'subject' => $model->subject,
					'body' => $model->body,
					);
				$this->sendEmail($mail);
				Yii::app()->user->setFlash('contact','Cám ơn bạn rất nhiều, chúng tôi sẽ phản hồi trong thời gian sớm nhất.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the helpus page
	 */
	public function actionHelpus()
	{
		$model=new ContactForm;
		if(Yii::app()->user->id)
			$user=User::model()->findByPk(Yii::app()->user->id);
		if($user===null)
			$this->redirect(Yii::app()->controller->module->loginUrl);
		
		$model->email = $user->email;
		$model->name = $user->username;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$mail = array (
					'toEmail' => Yii::app()->params['adminEmail'],
					'toName' => Yii::app()->params['adminName'],
					'fromEmail' => $model->email,
					'fromName' => $model->name,
					'subject' => $model->subject,
					'body' => $model->body,
					);
				$this->sendEmail($mail);
				Yii::app()->user->setFlash('contact','Cám ơn bạn rất nhiều, chúng tôi sẽ phản hồi trong thời gian sớm nhất.');
				$this->refresh();
			}
		}
		$this->render('helpus',array('model'=>$model));
	}
 protected function sendEmail($mail=array()){
        
        if(empty($mail)) return false;
       
        $mailer =  Yii::app()->mail;
        $mailer->transportType='smtp';
        $mailer->transportOptions=array(
            'host'=>'smtp.gmail.com',
            'username'=>Yii::app()->params['authEmail'],
            'password'=>Yii::app()->params['authPassword'],
            'port'=>465,
            'encryption'=>'ssl',
        );
        
        $message = new YiiMailMessage();
        $message->setTo( array($mail['toEmail']=>$mail['toName']) );
        $message->setFrom( array($mail['fromEmail']=>$mail['fromName']) );
        $message->setReplyTo( array($mail['fromEmail']=>$mail['fromName']) );
        $message->setSubject($mail['subject']);
        $message->setBody($mail['body'] . '<br/>' . $mail['fromEmail']);
 
        return $mailer->send($message) > 0;
    } 
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}