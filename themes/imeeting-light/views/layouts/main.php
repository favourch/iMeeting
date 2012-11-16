<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">
			<a href="index.php">	
				<img src="images/logo.jpg" width="270px" title="<?php echo CHtml::encode(Yii::app()->name); ?>" />
			</a>
		</div>
	<div  id="language-selector" style="float:right; margin:5px;">
		    <?php 
		        $this->widget('application.components.widgets.LanguageSelector');
		    ?>
		</div>
	<div id="nav" style="padding-bottom: 15px">
		<?php 
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>Yii::t('menu','Trang chủ'), 'url'=>array('/site/index')),
				array('label'=>Yii::t('menu','Tính năng'),  'url'=>array('/site/page', 'view'=>'features')),
				/*
	 * 'items'=>array(
							array('label'=>'Individual', 'url'=>'#'),
							array('label'=>'Business', 'url'=>'#'),
							array('label'=>'Training', 'url'=>'#'),
							array('label'=>'Distribution', 'url'=>'#')
							)
						),
	 */
			
				array('label'=>Yii::t('menu','Chi phí'),'url'=>array('/site/page', 'view'=>'prices')),
				array('label'=>Yii::t('menu','Giới thiệu'), 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>Yii::t('menu','Liên hệ'), 'url'=>array('/site/contact')),
				array('label'=>Yii::t('menu','Đăng nhập'), 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('menu','Thoát').'('.Yii::app()->user->name.')', 'url'=>array('/user/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		));
		  
		  ?>
	</div><!-- mainmenu -->
	
	</div><!-- header -->


<hr>

	
	
	
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.BootBreadcrumbs', array(
    	'links'=>$this->breadcrumbs,
		)); ?>
		<?php endif?>
	<?php 
		/*
		$this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		));
		  */ ?><!-- breadcrumbs -->
	
	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by iMeeting.<br/>
		All Rights Reserved.<br/>
		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
