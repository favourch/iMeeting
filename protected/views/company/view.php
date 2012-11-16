<?php
	$isMod = false;
	if(Yii::app()->user->isGuest){
		$isGuest = true;
	}else{
		$isUser = true;
		$rights = Rights::getAssignedRoles(Yii::app()->user->id);
		foreach($rights as $r){
			if($r->name =='Moderator'){
				$isMod = true;
			}
		
		}
	
		
				
	}
	$isAdmin = Yii::app()->getModule('user')->isAdmin()	;
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->name,
);
/*
if(Yii::app()->getModule('user')->isAdmin()){
$this->menu=array(
	//array('label'=>'Danh sách công ty', 'url'=>array('index')),
	array('label'=>'Thêm mới công ty', 'url'=>array('create')),
	array('label'=>'Chỉnh sửa', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Xóa công ty', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Bạn có chắc chắn xóa?')),
	array('label'=>'Quản lý công ty', 'url'=>array('admin')),
);
 
}
 * 
 */
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'company', 'mod'=>$isMod || $isAdmin, 'index'=>false)
); ?>
<h1>Thông tin công ty: <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'room_limit',
		'user_limit',
		'address',
		'description',
		'phone',
		'email',
//		'owner_id',
		array('name'=>'created_date', 'value'=> date("d/m/Y H:i:s",$model->created_date))
	),
)); ?>
