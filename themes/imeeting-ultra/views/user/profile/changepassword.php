<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change Password");
$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change Password"),
);
?>


<?php
$section_name = UserModule::t('Change password');
$this->widget('ext.imeeting-dashboard.ImeetingDashboardWidget',array('type'=>'quickshortcut'));
?>

	<!--[if !IE]>start section <![endif]-->
	<div class="section">

					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php echo $section_name;?></h2>

								<?php echo $this->renderPartial('menu'); ?>

							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner">
							<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
							<div class="success">
								<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
							</div>
							<?php endif; ?>
							<div class="table_tabs_menu">
							<!--[if !IE]>start  tabs<![endif]-->

							<!--[if !IE]>end  tabs<![endif]-->

							
							</div>
							
										<div class="form_wrapper" >
											
									<?php $form=$this->beginWidget('UActiveForm', array(
										'id'=>'changepassword-form',
										'enableAjaxValidation'=>true,
										'htmlOptions' => array('class'=>'search_form general_form')
									)); ?>

										<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
										<?php echo CHtml::errorSummary($model); ?>
										
										<div class="row">
										<?php echo $form->labelEx($model,'password'); ?>
										<?php echo $form->passwordField($model,'password'); ?>
										<?php echo $form->error($model,'password'); ?>
										<p class="hint">
										<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
										</p>
										</div>
										
										<div class="row">
										<?php echo $form->labelEx($model,'verifyPassword'); ?>
										<?php echo $form->passwordField($model,'verifyPassword'); ?>
										<?php echo $form->error($model,'verifyPassword'); ?>
										</div>
										
										
										<div class="row submit">
												<div style='float:left; width:115px'>&nbsp</div>
										<?php echo CHtml::submitButton(UserModule::t("Save")); ?>
										</div>

									<?php $this->endWidget(); ?>

											</div><!-- form -->

						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

