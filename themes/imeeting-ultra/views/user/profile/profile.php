<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
?>
<?php $section_name = UserModule::t('Your profile'); ?>

<?php
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
							<?php if(UserModule::isMod()): ?>
							<?php echo CHtml::link('<span><span><em>'. Yii::t('menu','Thêm mới').'</em><strong></strong></span></span>',array('admin/create'), array("class"=>"update")); ?>
							<?php endif; ?>
							</div>
								<div class="table_wrapper">
									<div class="table_wrapper_inner">

										<table class="dataGrid">
										<tr>
											<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>
										</th>
										    <td><?php echo CHtml::encode($model->username); ?>
										</td>
										</tr>
										<?php

												$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
												if ($profileFields) {
													foreach($profileFields as $field) {
														//echo "<pre>"; print_r($profile); die();
													?>
										<tr>
											<th class="label"><?php echo CHtml::encode(UserModule::t($field->title)); ?>
										</th>
										    <td><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?>
										</td>
										</tr>
													<?php
													}//$profile->getAttribute($field->varname)
												}
										?>
										<tr>
											<th class="label">Công ty
										</th>
										    <td><?php echo CHtml::encode($company->name); ?>
										</td>
										</tr>
										<tr>
											<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
										</th>
										    <td><?php echo CHtml::encode($model->email); ?>
										</td>
										</tr>

										<tr>
											<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
										</th>
										    <td><?php echo date("d.m.Y H:i:s",$model->createtime); ?>
										</td>
										</tr>
										<tr>
											<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?>
										</th>
										    <td><?php echo date("d.m.Y H:i:s",$model->lastvisit); ?>
										</td>
										</tr>
										<tr>
											<th class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>
										</th>
										    <td><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status));
										    ?>
										</td>
										</tr>

										</table>
									</div>
								</div>
						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

