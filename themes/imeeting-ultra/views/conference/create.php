<?php
$this->breadcrumbs=array(
	'Phòng họp'=>array('index'),
	'Tạo phòng',
);
/*
$this->menu=array(
	array('label'=>'Danh sách phòng', 'url'=>array('index')),
	array('label'=>'Quản lý phòng', 'url'=>array('admin')),
);*/
$isMod = false;
$rights = Rights::getAssignedRoles(Yii::app()->user->id);
foreach($rights as $r){
	if($r->name =='Moderator' || $r->name =='Admin'){
		$isMod = true;
	}
}
?>
<?php 
//$this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',array('model'=>isset($model)?$model:null, 'controller'=>'conference', 'mod'=>$isMod || $isAdmin));
$this->widget('ext.imeeting-dashboard.ImeetingDashboardWidget',array('type'=>'quickshortcut'));
$section_name = Yii::t('conference','Tạo phòng họp');
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

