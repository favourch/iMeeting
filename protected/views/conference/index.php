<?php
$this->breadcrumbs=array(
	'Phòng họp',
);
$isMod = false;
$rights = Rights::getAssignedRoles(Yii::app()->user->id);
foreach($rights as $r){
	if($r->name =='Moderator' || $r->name =='Admin'){
		$isMod = true;
	}
}
/*
if($isMod){
	$this->menu=array(
		array('label'=>'Danh sách phòng họp', 'url'=>array('index')),
		array('label'=>'Quản lý phòng họp', 'url'=>array('admin')),
		array('lasel'=>'Tạo phòng', 'url'=>array('create')),
		
	);
}
*/
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'conference', 'mod'=>$isMod)
); ?>

<h1><?php echo Yii::t('conference','Vui lòng chọn phòng họp');?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	//'pagerCssClass' => 'i-Pager'
)); ?>
