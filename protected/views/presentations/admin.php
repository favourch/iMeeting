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

<h1><?php echo Yii::t('conference', 'Quản lý tài liệu')?></h1>


<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'form',
    'enableAjaxValidation'=>true,
)); ?>
<div class="form"> 
<label style="width: 80px"><?php echo Yii::t('conference', 'Từ ngày'); ?></label>
<div>
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
</div>
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

<div class="row button">
<?php echo CHtml::submitButton( Yii::t('conference', 'Tìm kiếm')); ?>
<?php echo CHtml::submitButton(Yii::t('conference','Toàn bộ')); ?>
</div>
<?php $this->endWidget(); ?>
</div>
<?php 
$user=User::model()->findByPk(Yii::app()->user->id);			
			
	/*	$room = Yii::app()->db->createCommand()
	    ->select('room.id, room.name')
	    ->from('tbl_rooms room, tbl_company c')
	    //->join('tbl_room_directory r, tbl_rooms room', 'r.id=p.room_dir_id')
	    ->where('room.company_id = c.id AND c.id = :company_id', 
	    		array(':company_id'=>$user->company_id))
	    ->queryRow();
		
	 * 
	 */
		

$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'grid',
	'dataProvider' => $model->search(),
	//'filter' => $model,
	'itemsCssClass'=>'table-admin',
	'columns' => array(
		//'id',
		/*
		array(
				'name'=>'room_dir_id',
				'value'=>'GxHtml::valueEx($data->room)',
				'filter'=>GxHtml::listDataEx(Rooms::model()->findAll(array('condition'=>'company_id=:company_id', 'params'=>array(':company_id'=>$user->company_id))),'id','name'),
				),*/
		//'directory_id',
		//'path',
		array(
			'name'=>Yii::t('conference','Tên tập tin'),
			'value' => '$data->name',
			'htmlOptions'=>array("width"=>"200px")
			)
			,
		array(
			'name'=>Yii::t('conference','Thời điểm họp'),
			'value' => 'date("d/m/Y h:i",$data->meeting_time)',
			'htmlOptions'=>array("width"=>"50px")
			),
		/*
		array(
			'name' => 'Thumbnail',
			//'type'=>'html',
			//'value' => 'CHtml::image(Yii::app()->controller->createUrl("presentations/thumb", array("id"=>"$data->id")))'
			 'type'=>'html',
		    'value'=>function($data){
		        return CHtml::tag('div', array('title'=>'CHtml::image(Yii::app()->controller->createUrl("presentations/thumb", array("id"=>"$data->id")))'), 'Cell content');
		    },	
		),*/
		/*
		array(
			'name' => 'Download',
			'type' => 'raw',
			'value' => 'CHtml::link("Download",array("presentations/download","id"=>"$data->id"))',
		) ,
		 * 
		 */
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
			            
					),
			    ),
			'htmlOptions'=>array("width"=>"180px",'align'=>'center')	
		),
	),
)); ?>