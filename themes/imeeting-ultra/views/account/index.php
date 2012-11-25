<?php
	$isMod = false;

	$role[] =  Yii::t('conference',Rights::module()->authenticatedName);
	if(Yii::app()->user->isGuest){
		$isGuest = true;
	}else{
		$isUser = true;
		$rights = Rights::getAssignedRoles(Yii::app()->user->id);
		foreach($rights as $r){
			if($r->name == Rights::module()->moderatorName){
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
<?php //$this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',array('model'=>isset($model)?$model:null, 'controller'=>'account', 'mod'=>$isMod || $isAdmin, 'index' =>FALSE)); ?>
<h1><?php// echo UserModule::t("Manage Users"); ?></h1>

<?php
/*
 echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create User'),array('create')),
		),
	));*/
$this->widget('ext.imeeting-dashboard.ImeetingDashboardWidget',array('type'=>'quickshortcut'));
?>
<!--[if !IE]>start section<![endif]-->
	<div class="section">

					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php echo Yii::t("conference","Quản lý tài khoản");?></h2>
								
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner">
							<div class="table_tabs_menu">
							<!--[if !IE]>start  tabs<![endif]-->

							<!--[if !IE]>end  tabs<![endif]-->
							
							<?php echo CHtml::link('<span><span><em>'. Yii::t('conference','Thêm mới').'</em><strong></strong></span></span>',array('account/create'), array("class"=>"update")); ?>
							</div>
							<!--[if !IE]>start table_wrapper<![endif]-->
							<div class="table_wrapper">
								<div class="table_wrapper_inner">
								<?php
								$widget= $this->widget('application.components.widgets.ImeetingGridView', array(
									'id' =>'grid',
									'pager'=>array('cssFile'=>false,'class'=>'ImeetingLinkPager'),

									'template'=>'{items} ',
									'dataProvider'=>$dataProvider,
									'cssFile' => false,
									'columns'=>array(

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
										'name' => 'role',
										'value' => '$data->getRole()'
										),
									array(
										'class'=>'CButtonColumn',
										'deleteButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
										'updateButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
										'viewButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
										'htmlOptions'=>array('width'=>'110px'),
										'buttons' =>array(
										 	'delete'=>array(
							                        'label'=>'Delete?',
							                        //'url'=>Yii::app()->controller->createUrl("project/makeReviewable",array("id"=>$model->id)),
							                        'options'=>array('class'=>'cssGridButton'),
							                        
							                            ),
										),

									),
								),
								));

								 ?>
 						<div class="pagination_wrapper">
							<span class="pagination_top"></span>
							<div class="pagination_middle">
							<div class="pagination">
								<span class="page_no"><?php $widget->renderSummary(); ?></span>
								<?php $widget->renderPager(); ?>
							</div>
							</div>
							<span class="pagination_bottom"></span>
							</div>

								</div>
							</div>
							<!--[if !IE]>end table_wrapper<![endif]-->
						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

