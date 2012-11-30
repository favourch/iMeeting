<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'Danh sách phòng', 'url'=>array('admin')),
	array('label'=>'Tạo phòng', 'url'=>array('create')),
);
*/
	$isMod = false;
	if(Yii::app()->user->isGuest){
		$isGuest = true;
	}else{
		$isUser = true;
		$rights = Rights::getAssignedRoles(Yii::app()->user->id);
		foreach($rights as $r){
			if($r->name =='Moderator'){
				$isMod = true;
			}

		}



	}
	$isAdmin = Yii::app()->getModule('user')->isAdmin()	;
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rooms-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php //$this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',array('model'=>isset($model)?$model:null, 'controller'=>'conference', 'mod'=>$isMod || $isAdmin)); ?>

<!--
<p>
Bạn có thể sử dụng các biểu thức điều kiện như (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
hoặc <b>=</b>) để tìm kiếm chính xác hơn.
</p>
-->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php

if(Yii::app()->getModule('user')->isAdmin()){
$columns = array(

		array( 'name'=>'company_name', 'value'=>'$data->company->name' ),
			'name',
			'attendee_pw',
			'moderator_pw',
			'user_limit',
		
	);
}else{
$columns = array(

		'name',
		//'attendee_pw',
		//'moderator_pw',
		'user_limit',
		'description',
		);
}
$columns[] = 		array(
			'class'=>'CButtonColumn',
			'deleteButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
			'updateButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
			'viewButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
			'buttons' =>array(
			 	'delete'=>array(
                        'label'=>'Delete?',
                        
                        'options'=>array('class'=>'cssGridButton'),

                            ),
				),
			'htmlOptions'=>array('width'=>'110px')
		);
	

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
								<h2><?php echo Yii::t("conference","Quản lý các phòng họp");?></h2>
								<?php echo CHtml::link(Yii::t('conference','Chọn phòng họp'),array('/conference/index'),array('class'=>'view_all_orders')); ?>
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
									'dataProvider'=>$model->search(),
									'cssFile'=>false,
									'columns'=> $columns
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

