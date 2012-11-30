<?php
	$isMod = false;
	
	$role[] =  Yii::t('conference',Rights::module()->authenticatedName);
	if(Yii::app()->user->isGuest){
		$isGuest = true;
	}else{
		$isUser = true;
		$rights = Rights::getAssignedRoles(Yii::app()->user->id);
		foreach($rights as $r){
			if($r->name == Rights::module()->moderatorName){
				$isMod = true;
	
			}
			
		
		}
	}
	
	$rights = Rights::getAssignedRoles($model->id);
		foreach($rights as $r){
			if($r->name == Rights::module()->moderatorName){

				$role[] =  Yii::t('conference',Rights::module()->moderatorName);
			}
			if($r->name == Rights::module()->presenterName){

				$role[] =  Yii::t('conference',Rights::module()->presenterName);
			}
		
	}

	$userRole = implode(', ', $role);
	$isAdmin = Yii::app()->getModule('user')->isAdmin()	;
	$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	$model->username,
);
?>

<?php 


	$attributes = array(
	//	'id',
		'email',
	);
	
	$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
	if ($profileFields) {
		foreach($profileFields as $field) {
			array_push($attributes,array(
					'label' => UserModule::t($field->title),
					'name' => $field->varname,
					'type'=>'raw',
					'value' => (($field->widgetView($model->profile))?$field->widgetView($model->profile):(($field->range)?Profile::range($field->range,$model->profile->getAttribute($field->varname)):$model->profile->getAttribute($field->varname))),
				));
		}
	}
	
	array_push($attributes,
	//	'password',
	//	'email',
	//	'activkey',
		array(
			'name' => 'createtime',
			'value' => date("d.m.Y H:i:s",$model->createtime),
		),
		array(
			'name' => 'lastvisit',
			'value' => (($model->lastvisit)?date("d.m.Y H:i:s",$model->lastvisit):UserModule::t("Not visited")),
		),

		array(
			'name' => 'status',
			'value' => User::itemAlias("UserStatus",$model->status),
		),
		array(
			'name' => 'Room\'s role',
			'value' => $userRole
		)
	);
	
	
$section_name = UserModule::t('View User').' "'.$model->username.'"';
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
								
								<?php echo CHtml::link(Yii::t('conference','Quản lý tài khoản'),array('/conference/admin'),array('class'=>'view_all_orders')); ?>
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

							<?php echo CHtml::link('<span><span><em>'. Yii::t('conference','Thêm mới').'</em><strong></strong></span></span>',array('conference/create'), array("class"=>"update")); ?>
							</div>
								<div class="table_wrapper">
									<div class="table_wrapper_inner">
								<?php $this->widget('zii.widgets.CDetailView', array(
									'data'=>$model,
									'attributes'=> $attributes, 	
									'cssFile' => false,
									'htmlOptions'=>array('cellspacing'=>'0', 'cellpadding'=>'0', 'width'=>'50%')
								)); ?>
									</div>
								</div>
						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

