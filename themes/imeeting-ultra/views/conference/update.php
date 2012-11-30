<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
$isMod = false;
$rights = Rights::getAssignedRoles(Yii::app()->user->id);
foreach($rights as $r){
	if($r->name =='Moderator' || $r->name =='Admin'){
		$isMod = true;
	}
}
if($isMod){
	$this->menu=array(
		array('label'=>'Danh sách phòng', 'url'=>array('index')),
		array('label'=>'Tạo phòng', 'url'=>array('create')),
		array('label'=>'Xem phòng này', 'url'=>array('view', 'id'=>$model->id)),
		array('label'=>'Quản lý phòng họp', 'url'=>array('admin')),
	);
}
?>





<?php

$this->widget('ext.imeeting-dashboard.ImeetingDashboardWidget',array('type'=>'quickshortcut'));
$section_name = Yii::t('conference','Cập nhật phòng họp') . ': '.  $model->name;
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
								<?php echo CHtml::link(Yii::t('conference','Quản lý phòng họp'),array('/conference/admin'),array('class'=>'view_all_orders')); ?>
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

								<?php echo $this->renderPartial('_form', array('model'=>$model, 'company'=>$company)); ?>

						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

