<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Rooms','url'=>array('index')),
	array('label'=>'Create Rooms','url'=>array('create')),
	array('label'=>'Update Rooms','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Rooms','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Rooms','url'=>array('admin')),
);
?>

<h1>View Rooms #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.BootDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'company_id',
		'attendee_pw',
		'moderator_pw',
		'user_limit',
		'description',
		'owner_id',
		'created_date',
	),
)); ?>
