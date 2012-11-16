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
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'conference', 'mod'=>$isMod)
); ?>
<h1><?php echo Yii::t('conference','Thông tin phòng');?>: <?php echo $model->name; ?></h1>
<?php
$attributes = 
	array(
		'id',
		'name',
		array(
			'name' => 'Công ty',
			'value' => $model->company->name,
		),
		'description',
		
		
		'user_limit',
		array(
			'name'=>'created_date',
			'value'=>date("d.m.Y H:i:s",$model->created_date) 
		));
	
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=> $attributes, 
	'htmlOptions'=>array('class'=>'i-detail-view')
)); ?>
