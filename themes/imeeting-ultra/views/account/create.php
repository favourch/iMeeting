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
	UserModule::t('Create'),
);
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'account', 'mod'=>$isMod || $isAdmin, 'index' =>FALSE)
); ?>
<h1><?php echo UserModule::t("Create User"); ?></h1>

<?php 
	/*echo $this->renderPartial('_menu',array(
		'list'=> array(),
	));
	 * 
	 */
	echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile,'presenter'=>$presenter));
?>