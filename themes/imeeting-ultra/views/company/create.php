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
	'Create',
);
/*
$this->menu=array(
	//array('label'=>'Danh sách công ty', 'url'=>array('index')),
	array('label'=>'Quản lý công ty', 'url'=>array('admin')),
);
 * 
 */
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'company', 'mod'=>$isMod || $isAdmin, 'index'=>false)
); ?>
<h1><?php echo Yii::t('menu','Tạo công ty');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>