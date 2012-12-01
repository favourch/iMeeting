<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
?>

	<!--[if !IE]>start section <![endif]-->
	<div class="section">

					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php echo UserModule::t("Restore"); ?></h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner">
							<div class="table_tabs_menu">
							<!--[if !IE]>start  tabs<![endif]-->

							<!--[if !IE]>end  tabs<![endif]-->

							</div>
								
							<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
							<div class="success">
							<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
							</div>
							<?php else: ?>

							<div class="form_wrapper">
							<?php echo CHtml::beginForm('','POST', array('class'=>'search_form general_form')); ?>

								<?php echo CHtml::errorSummary($form); ?>
								
								<div class="row">
									<?php echo CHtml::activeLabel($form,'login_or_email'); ?>
									<div class="input" style="float:left">
										<span style="float:left">
										<?php echo CHtml::activeTextField($form,'login_or_email') ?>
										</span>
										
									</div>
									<p class="hint"><?php echo UserModule::t("Please enter your email address."); ?></p>
								</div>
								
								<div class="row submit">
									<div style="float:left; width: 115px">&nbsp;</div>
									<?php echo CHtml::submitButton(UserModule::t("Restore")); ?>
								</div>

							<?php echo CHtml::endForm(); ?>
							</div><!-- form -->
							<?php endif; ?>

						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

