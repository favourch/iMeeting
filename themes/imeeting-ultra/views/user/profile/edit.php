<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile")=>array('profile'),
	UserModule::t("Edit"),
);
?>


<?php
$section_name = UserModule::t('Edit profile');
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
							
										<div class="form_wrapper">
											<?php $form=$this->beginWidget('UActiveForm', array(
												'id'=>'profile-form',
												'enableAjaxValidation'=>true,
												'htmlOptions' => array('enctype'=>'multipart/form-data', 'class'=>'search_form general_form'),
											)); ?>

												<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

												<?php echo $form->errorSummary(array($model,$profile)); ?>
												<div class="row">
													<?php echo $form->labelEx($model,'email'); ?>
													<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
													<?php echo $form->error($model,'email'); ?>
												</div>
											<?php 
													$profileFields=$profile->getFields();
													if ($profileFields) {
														foreach($profileFields as $field) {
														?>
												<div class="row">
													<?php echo $form->labelEx($profile,$field->varname);
													
													if ($field->widgetEdit($profile)) {
														echo $field->widgetEdit($profile);
													} elseif ($field->range) {
														echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
													} elseif ($field->field_type=="TEXT") {
														echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
													} else {
														echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
													}
													echo $form->error($profile,$field->varname); ?>
												</div>	
														<?php
														}
													}
											?>
												

												<div class="row buttons">
													<div style='float:left; width:115px'>&nbsp</div>
													<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save')); ?>
												</div>

											<?php $this->endWidget(); ?>

											</div><!-- form -->

						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

