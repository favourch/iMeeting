<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
//$this->breadcrumbs=array(	UserModule::t("Login"),);
?>
<div style="padding-bottom: 25px" >
	<img src="images/banner.png" />
</div>
<!--<h1><?php echo UserModule::t("Login"); ?></h1>-->

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>
<!--
<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>
-->
<div style="float: left; width: 45%">
	<div class="form box" style="margin:20px 0px 0px 40px">
	<?php echo CHtml::beginForm(); ?>
	
		<!--<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>-->
		
		<?php //echo CHtml::errorSummary($model); ?>
		
		<div class="row">
			<?php //echo CHtml::activeLabelEx($model,'username',array('style'=>"width:150px")); ?>
			<?php //echo CHtml::activeTextField($model,'username') ?>
			<?php echo CHtml::activeLabelEx($model,'email',array('style'=>"width:150px")); ?>
			<?php echo CHtml::activeTextField($model,'email') ?>
		</div>
		
		<div class="row">
			<?php echo CHtml::activeLabelEx($model,'password',array('style'=>"width:150px")); ?>
			<?php echo CHtml::activePasswordField($model,'password') ?>
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
		<div class="row submit" style="padding-left:150px">
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
	<div style="float: left; width: 50%">
		<a class="thumbnail" href="#">
			<img src="images/1.png" width="80px"/>
		</a>
		<p class="title"><?php echo Yii::t('menu','Tổ chức kinh doanh'); ?></p>
     	<p style="padding-right:3px"><?php echo Yii::t('menu','Họp trực tuyến, phỏng vấn tuyển dụng, bán hàng'); ?></p>
	</div>
	<div style="float: left; width: 50%">
		<a class="thumbnail" href="#">		
		<img src="images/2.png" width="80px" align="left"/>
		</a>
		<p class="title"><?php echo Yii::t('menu','Tổ chức đào tạo'); ?></p>
		<p style="padding-right:3px"><?php echo Yii::t('menu','Đào tạo trực tuyến, Hội nghị khoa học, thảo luận chuyên đề...'); ?></p>
	</div>
	<div style="float: left; width: 50%">
		<a class="thumbnail" href="#">
		<img src="images/3.png" width="80px" align="left"/>
		</a>
	 	<p class="title"><?php echo Yii::t('menu','Cá nhân'); ?></p>
 		<p style="padding-right:3px"><?php echo Yii::t('menu','Tư vấn, thuyết trình, trò chuyện, giải đáp..'); ?></p>
	</div>
	
	<div style="float: left; width: 50%">
		<a class="thumbnail" href="#">
			<img src="images/4.png" width="80px" height="80px"/>
		</a>
		<p class="title"><?php echo Yii::t('menu','Nhà phân phối'); ?> </p>
		<p style="padding-right:3px"><?php echo Yii::t('menu','Phân phối các sản phẩm công nghệ'); ?></p>
		
	</div>
	
</div>
