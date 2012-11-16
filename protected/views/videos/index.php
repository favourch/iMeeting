<?php
$this->breadcrumbs=array(
	'Videoses',
);

$this->menu=array(
	array('label'=>'Create Videos', 'url'=>array('create')),
	array('label'=>'Manage Videos', 'url'=>array('admin')),
);
?>

<h2><?php echo Yii::t('videos','Danh sách video');?></h2>
<?php
foreach ($dataProvider->data as $data) {
	 	//var_dump($data);
	 echo $this->renderPartial('_view', array('data'=>$data));
}
?>