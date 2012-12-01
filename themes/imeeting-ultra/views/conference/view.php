<?php
$this->breadcrumbs=array(
	'Phòng họp'=>array('index'),
	$model->name,
);
$isMod = false;
$rights = Rights::getAssignedRoles(Yii::app()->user->id);
foreach($rights as $r){
	if($r->name =='Moderator' || $r->name =='Admin'){
		$isMod = true;
	}
}
?>


<?php
$attributes = 
	array(
		//'id',
		'name',
		array(
			'name' => 'company',
			'value' => $model->company->name,
		),
		'description',
		
		
		'user_limit',
		array(
			'name'=>'created_date',
			'value'=>date("d.m.Y H:i:s",$model->created_date) 
		));
	
?>

<?php
$section_name = Yii::t('conference','Thông tin phòng') . ': ' . $model->name;
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
								
								<?php if(UserModule::isMod() || UserModule::isAdmin()): ?>	
									<?php echo CHtml::link(Yii::t('conference','Quản lý phòng họp'),array('/conference/admin'),array('class'=>'view_all_orders')); ?>
								<?php else: ?>
									<?php echo CHtml::link(Yii::t('conference','Chọn phòng họp'),array('/conference'),array('class'=>'view_all_orders')); ?>
									 
								<?php endif; ?>
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
							<?php if(UserModule::isMod() || UserModule::isAdmin()): ?>
								<?php echo CHtml::link('<span><span><em>'. Yii::t('conference','Thêm mới').'</em><strong></strong></span></span>',array('conference/create'), array("class"=>"update")); ?>
							<?php endif; ?>
							<!--[if !IE]>end  tabs<![endif]-->
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

