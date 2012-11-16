<?php
$this->breadcrumbs=array(
	'Rooms',
);

$this->menu=array(
	array('label'=>'Create Rooms','url'=>array('create')),
	array('label'=>'Manage Rooms','url'=>array('admin')),
);
?>

<h1>Rooms</h1>

<?php $this->widget('bootstrap.widgets.BootListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
