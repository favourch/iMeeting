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
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Manage'),
);
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'account', 'mod'=>$isMod || $isAdmin, 'index' =>FALSE)
); ?>
<h1><?php echo UserModule::t("Manage Users"); ?></h1>

<?php
/*
 echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create User'),array('create')),
		),
	));*/
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=> 'grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		/*
		array(
			'name' => 'id',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id),array("account/update","id"=>$data->id))',
		),
		array(
			'name' => 'username',
			'type'=>'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username),array("account/view","id"=>$data->id))',
		),*/
		array(
			'name'=>'email',
			'type'=>'raw',
			'value'=>'CHtml::link(CHtml::encode($data->email), "mailto:".$data->email)',
		),
		array(
			'name' => 'createtime',
			'value' => 'date("d.m.Y H:i:s",$data->createtime)',
		),
		array(
			'name' => 'lastvisit',
			'value' => '(($data->lastvisit)?date("d.m.Y H:i:s",$data->lastvisit):UserModule::t("Not visited"))',
		),
		array(
			'name'=>'status',
			'value'=>'User::itemAlias("UserStatus",$data->status)',
		),

		array(
			'class'=>'CButtonColumn',
			'deleteButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
			'updateButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
			'viewButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
			'htmlOptions'=>array('width'=>'110px')
		),
	),
	'itemsCssClass'=>'table-admin',
)); ?>
