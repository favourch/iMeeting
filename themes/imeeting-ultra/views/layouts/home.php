<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
<meta name="google-site-verification" content="Cl62GPvIbnjrUgXkiNA9qnD6brv01Ynkeqlh-posoyg" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<!-- Start Uniform JS -->
	<?php 	$this->widget('ext.uniformjs.UniformJSWidget'); ?>
	
	 <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, textarea, select, button").uniform();
      });
    </script>
    <!-- End Uniform JS -->
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
		<img src="images/logo.gif" width="270px" title="<?php echo CHtml::encode(Yii::app()->name); ?>" />
		</div>
	</div><!-- header -->

	<div id="mainmenu">
		<div style='float:right'>
		<?php
		$isGuest= false;
		$isUser = false;
		$isMod = false;
		if(Yii::app()->user->isGuest){
			$isGuest = true;
		}else{
			$isUser = true;
			$rights = Rights::getAssignedRoles(Yii::app()->user->id);
			foreach($rights as $r){
				if($r->name =='Moderator'){
					$isMod = true;
				}
			
			}
		
			
					
		}
		$isAdmin = Yii::app()->getModule('user')->isAdmin()	;
		
		
		?>
		
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Trang chủ', 'url'=>array('/site/index')),
				array('label'=>'Giới thiệu', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Liên hệ', 'url'=>array('/site/contact')),
				array('label'=>'Hỗ trợ', 'url'=>array('/site/support')),
			//	array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			//	array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>$isGuest),
//array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>$isUser && (!$isMod) && (!$isAdmin)),
array('url'=>array('/user/admin'), 'label'=>'Quản lý tài khoản', 'visible'=>$isAdmin),
array('url'=>array('/conference'), 'label'=>'Phòng hội thảo', 'visible'=>$isUser && (!$isMod)),
//Mod
array('url'=>array('/conference'), 'label'=>'Quản lý phòng', 'visible'=>$isMod),
array('url'=>array('/account'), 'label'=>'Quản lý tài khoản', 'visible'=>$isMod),
//Admin
array('url'=> array('/rights'), 'label'=>'Quản lý quyền', 'visible'=>$isAdmin),
array('url'=> array('/company'), 'label'=>'Quản lý công ty', 'visible'=>$isAdmin),
array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!$isGuest),
			),
		)); ?>
		</div>
	</div><!-- mainmenu -->
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by iMeeting.<br/>
		All Rights Reserved.<br/>
		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
