<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);
$isMod = false;
$rights = Rights::getAssignedRoles(Yii::app()->user->id);
foreach($rights as $r){
	if($r->name =='Moderator' || $r->name =='Admin'){
		$isMod = true;
	}
}
if($isMod){
	$this->menu=array(
		array('label'=>'Danh sách phòng', 'url'=>array('index')),
		array('label'=>'Tạo phòng', 'url'=>array('create')),
		array('label'=>'Xem phòng này', 'url'=>array('view', 'id'=>$model->id)),
		array('label'=>'Quản lý phòng họp', 'url'=>array('admin')),
	);
}
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'conference', 'mod'=>$isMod || $isAdmin)
); ?>
<h1><?php echo Yii::t('conference','Cập nhật phòng họp');?>: <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'company'=>$company)); ?>