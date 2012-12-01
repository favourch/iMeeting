<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
//$this->breadcrumbs=array(	UserModule::t("Login"),);
?>

<!--<h1><?php echo UserModule::t("Login"); ?></h1>-->

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>
<!--
<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>
-->
<div style="height: 170px; padding-bottom: 15px;">
<div style="float: left; width: 45%; padding-top: 30px">
	<div class="form box" style="margin:10px 0px 0px 40px">
	<?php echo CHtml::beginForm(); ?>
	
		<!--<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>-->
		
		<?php //echo CHtml::errorSummary($model); ?>
		
		<div class="row" style="padding-top:4px">
			<?php //echo CHtml::activeLabelEx($model,'email',array('style'=>"width:100px")); ?>
			<label class="color_white" for="UserLogin_email" style="width: 100px">Email</label>
			<?php echo CHtml::activeTextField($model,'email',array('style'=>"width:150px")) ?>
		</div>
		
		<div class="row">
			<?php //echo CHtml::activeLabelEx($model,UserModule::t('password'),array('style'=>"width:100px")); ?>
			<label class="color_white" for="UserLogin_email" style="width: 100px"><?php echo UserModule::t('Password'); ?></label>
			<?php echo CHtml::activePasswordField($model,'password',array('style'=>"width:150px")) ?>
		</div>
		<!--
		<div class="row">
			<p class="hint">
			<?php echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
			</p>
		</div>
		
		<div class="row rememberMe">
			<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
			<?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
		</div>
	-->
		<div class="row " style="padding-left:100px">
			<?php echo CHtml::submitButton(UserModule::t("Login")); ?>
		</div>
		
	<?php echo CHtml::endForm(); ?>
	</div><!-- form -->
	
	
	<?php
	$form = new CForm(array(
	    'elements'=>array(
	        'username'=>array(
	            'type'=>'text',
	            'maxlength'=>32,
	        ),
	        'password'=>array(
	            'type'=>'password',
	            'maxlength'=>32,
	        ),
	        'rememberMe'=>array(
	            'type'=>'checkbox',
	        )
	    ),
	
	    'buttons'=>array(
	        'login'=>array(
	            'type'=>'submit',
	            'label'=>'Login',
	        ),
	    ),
	), $model);
	?>
</div>
<div  style="float: left; width: 55%">
	<div style="float: left;">
	<div style="float: left; width: 50%; padding-top: 20px">
		<a class="thumbnail" href="#" style="height: 80px">
			<img src="images/podcast.png" width="50px"/>
		</a>
		<p class="title"><?php echo Yii::t('menu','Họp quy mô lớn'); ?></p>
     	<p class="home" style="padding-right:3px"><?php echo Yii::t('menu','Giải pháp quy mô lớn lên đến 200 thành viên tham gia. iMeeting có mức chi phí thấp phù hợp với nhiều loại hình và nhu cầu họp trực tuyến khác nhau'); ?></p>
	</div>
	<div style="float: left; width: 50%; padding-top: 20px">
		<a class="thumbnail" href="#" style="height: 80px">		
		<img src="images/webcam.png" width="50px" align="left"/>
		</a>
		<p class="title"><?php echo Yii::t('menu','Chia sẻ mạnh mẽ'); ?></p>
		<p class="home" style="padding-right:3px"><?php echo Yii::t('menu','Cung cấp khả năng họp trực tuyến đồng thời với 30 webcam cùng lúc, chia sẻ file với nhiều định dạng khác nhau, ghi chú ngay trên tài liệu chia sẻ.'); ?></p>
	</div>
	</div>
	<div style="float: left;">
	<div style="float: left; width: 50%; padding-top: 20px">
		<a class="thumbnail" href="#" style="height: 80px">
		<img src="images/screen_aqua.png" width="50px" align="left"/>
		</a>
	 	<p class="title"><?php echo Yii::t('menu','Ứng dụng trực quan'); ?></p>
 		<p class="home" style="padding-right:3px"><?php echo Yii::t('menu','iMeeting cho phép người dùng chia sẻ màn hình làm việc trong quá trình họp, giúp cuộc họp trở nên trực quan và dễ dàng hơn bao giờ hết'); ?></p>
	</div>
	
	<div style="float: left; width: 50%; padding-top: 20px">
		<a class="thumbnail" href="#" style="height: 80px">
			<img src="images/lifesaver.png" width="50px" />
		</a>
		<p class="title"><?php echo Yii::t('menu','Hỗ trợ chuyên nghiệp'); ?> </p>
		<p class="home" style="padding-right:3px"><?php echo Yii::t('menu','Hỗ trợ toàn diện với các tài liệu hướng dẫn có sẵn trên website, iMeeting còn hỗ trợ qua email, điện thoại hoặc ngay trong phòng hỗ trợ trực tuyến của công ty'); ?></p>
		
	</div>
	</div>
</div>
</div>