<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	Yii::t('app', 'Manage'),
);
/*
$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

 */ 

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('presentations-grid', {
		data: $(this).serialize()
	});
	return false;
});
$('.reset').submit(function(){
	$('#form').reset();	
});

");
?>

<div class="section">

					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php echo Yii::t("conference","Quản lý tài liệu");?></h2>
								
								<?php echo CHtml::link(Yii::t('conference','Xem toàn bộ'),array('/presentations'), array("class"=>"view_all_orders")); ?>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>

					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner">

						<!-- form search -->		
						<?php $form=$this->beginWidget('CActiveForm', array(
						    'id'=>'form',
						    'enableAjaxValidation'=>true,
						)); ?>
						<div class="form"> 
						<div>
							<div style="width:400px; float: left">
								<label style="width: 80px"><?php echo Yii::t('conference', 'Từ ngày'); ?></label>
								<?php
								$this->widget('zii.widgets.jui.CJuiDatePicker', array(
								    'name'=>'from_date',  // name of post parameter
								    'value'=>isset(Yii::app()->request->cookies['from_date']) ? Yii::app()->request->cookies['from_date']->value : '',  // value comes from cookie after submittion
								     'options'=>array(
								        'showAnim'=>'fold',
								        'dateFormat'=>'dd.mm.yy',
								    ),
								    'htmlOptions'=>array(
								        'style'=>'height:20px;'
								    ),
								));
								?>
								<label style="width: 80px"><?php echo Yii::t('conference', 'Đến ngày');?></label>
								<?php
								$this->widget('zii.widgets.jui.CJuiDatePicker', array(
								    'name'=>'to_date',
								    'value'=>isset(Yii::app()->request->cookies['to_date']) ? Yii::app()->request->cookies['to_date']->value : '',
								     'options'=>array(
								        'showAnim'=>'fold',
								        'dateFormat'=>'dd.mm.yy',
								 
								    ),
								    'htmlOptions'=>array(
								        'style'=>'height:20px;'
								    ),
								));
								?>
						
							</div>

							<div class="button">
							
							<?php echo CHtml::submitButton( Yii::t('conference', 'Tìm kiếm')); ?>
							
							</div>
						</div>
						

						<?php $this->endWidget(); ?>
						</div>
						<!-- end search form -->
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
									'cssFile' => false,
									'columns'=> array(
											array(
												'name'=>Yii::t('conference','Tập tin'),
												'value' => '$data->name',
											//	'htmlOptions'=>array("width"=>"200px")
												)
												,
											array(
												'name'=>Yii::t('conference','Thời điểm họp'),
												'value' => 'date("d/m/Y h:i",$data->meeting_time)',
											//	'htmlOptions'=>array("width"=>"50px")
												),

											array(
												'header'=>Yii::t('conference','Thao tác'),
												'class' => 'CButtonColumn',
												 'template'=>'{download}{update}{delete}',
												  'buttons'=>array
												    (
												        'download' => array
												        (
												            'label'=>'Download',
												            'imageUrl'=>Yii::app()->request->baseUrl.'/images/download.png',
												            'url'=>'Yii::app()->createUrl("presentations/download", array("id"=>$data->id))',
												        ),
												        'update' =>array
												        (
												          'imageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',


														),
														'delete' =>array
												        (
												          'imageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
          													'options'=>array('class'=>'cssGridButton'),
														),
												    ),
												    
												'htmlOptions'=>array("width"=>"100px",'align'=>'center')
											),
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

