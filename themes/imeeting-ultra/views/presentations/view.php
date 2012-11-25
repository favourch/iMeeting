<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model),
);
/*
$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(), 'url'=>array('update', 'id' => $model->id)),
	array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(), 'url'=>'#', 'linkOptions' => array('submit' => array('delete', 'id' => $model->id), 'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);
 */ 
?>

<h1> <?php echo CHtml::link('<span class="item-title" >Quản lý tài liệu</span>',array('presentations/index'));
echo ' - ';
 echo Yii::t('app', 'Xem tài liệu'); ?>
 
 </h1>

<?php

 $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
//'id',
/*array(
			'name' => 'room',
			'type' => 'raw',
			'value' => $model->room !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->room)), array('tblRooms/view', 'id' => GxActiveRecord::extractPkValue($model->room, true))) : null,
			),*/
//'directory_id',
//'path',

'name',
	array('name'=>'Meeting date',
			'value' => date("d.m.Y",$model->meeting_time)),
		
array(
	'name'=> 'Image',
	'type'=>'html',
	'value'=> CHtml::image(Yii::app()->controller->createUrl("presentations/thumb", array("id"=>"$model->id")))
),
	),
)); 

?>

