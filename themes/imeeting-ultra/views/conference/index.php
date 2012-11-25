<?php
$this->breadcrumbs=array(
	'Phòng họp',
);
$isMod = false;
$rights = Rights::getAssignedRoles(Yii::app()->user->id);
foreach($rights as $r){
	if($r->name =='Moderator' || $r->name =='Admin'){
		$isMod = true;
	}
}
/*
if($isMod){
	$this->menu=array(
		array('label'=>'Danh sách phòng họp', 'url'=>array('index')),
		array('label'=>'Quản lý phòng họp', 'url'=>array('admin')),
		array('lasel'=>'Tạo phòng', 'url'=>array('create')),

	);
}
*/

$section_name = Yii::t('conference','Danh sách phòng họp');
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

							<?php echo CHtml::link('<span><span><em>'. Yii::t('conference','Thêm mới').'</em><strong></strong></span></span>',array('conference/create'), array("class"=>"update")); ?>
							</div>
							<!--[if !IE]>start table_wrapper<![endif]-->
							<div class="table_wrapper">
								<div class="table_wrapper_inner">
								<?php
								$widget= $this->widget('application.components.widgets.ImeetingGridView', array(
									'id' =>'grid',
									'pager'=>array('cssFile'=>false,'class'=>'ImeetingLinkPager'),

									'template'=>'{items} ',
									'dataProvider'=>$dataProvider,
									'cssFile'=>false,
									'columns'=> array(
										array('header'=>'No.','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
											 'htmlOptions'=>array('width'=>'10px'),
											),
										array('name'=>'name',
											'type'=>'html',
											'value'=> 'CHtml::link(CHtml::encode($data->name), array("conference/join", "room"=>$data->id),array("title"=>"Join conference"))',
										),
										array(
											'name'=> Yii::t('conference','Conference information'),
											'value'=>array($this,'gridDataColumn'), 

										),
										array(
											'type'		=>'html',
											'value'=>'CHtml::link(\'<img src="/images/play.png" title="Join Conference" width="100px" height="100px"/>\',array(\'/confernce/join\',\'room\'=>$data->id))',
											'htmlOptions'=>array('style'=>'text-align:center'),
											)
									)
								));

								 ?>
 						<div class="pagination_wrapper">
							<span class="pagination_top"></span>
							<div class="pagination_middle">
							<div class="pagination">
								<span class="page_no"><?php $widget->renderSummary(); ?></span>
								<?php $widget->renderPager(); ?>
							</div>
							</div>
							<span class="pagination_bottom"></span>
							</div>

								</div>
							</div>
							<!--[if !IE]>end table_wrapper<![endif]-->
						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

