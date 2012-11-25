<?php

$this->breadcrumbs = array(
	$model->label(2) => array('index'),
	GxHtml::valueEx($model) => array('view', 'id' => GxActiveRecord::extractPkValue($model, true)),
	Yii::t('app', 'Update'),
);
/*
$this->menu = array(
	array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label' => Yii::t('app', 'View') . ' ' . $model->label(), 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	array('label' => Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')),
);*/
?>
<h1> <?php echo CHtml::link('<span class="item-title" >'. Yii::t('conference','Quản lý tài liệu') .'</span>',array('presentations/index'));
echo ' - ';
 echo Yii::t('conference', 'Cập nhật tài liệu'); ?>
 
 </h1>

<?php
$this->renderPartial('_form', array(
		'model' => $model));
?>