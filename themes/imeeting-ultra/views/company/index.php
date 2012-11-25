<?php
$this->breadcrumbs=array(
	'Companies',
);
/*
$this->menu=array(
	array('label'=>'Tạo công ty', 'url'=>array('create')),
	array('label'=>'Quản lý công ty', 'url'=>array('admin')),
);
 * 
 */
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
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'company', 'mod'=>$isMod || $isAdmin, 'index'=>false)
); ?>
<h1>Companies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
