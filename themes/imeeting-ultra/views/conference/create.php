<?php
$this->breadcrumbs=array(
	'Phòng họp'=>array('index'),
	'Tạo phòng',
);
/*
$this->menu=array(
	array('label'=>'Danh sách phòng', 'url'=>array('index')),
	array('label'=>'Quản lý phòng', 'url'=>array('admin')),
);*/
$isMod = false;
$rights = Rights::getAssignedRoles(Yii::app()->user->id);
foreach($rights as $r){
	if($r->name =='Moderator' || $r->name =='Admin'){
		$isMod = true;
	}
}
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'conference', 'mod'=>$isMod || $isAdmin)
); ?>
<h1><?php echo Yii::t('conference','Tạo phòng họp'); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'company'=>$company)); ?>