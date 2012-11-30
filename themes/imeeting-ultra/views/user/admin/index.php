<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('admin'),
	UserModule::t('Manage'),
);
?>


<?php
	/*echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Create User'),array('create')),
		),
	));
	*/
?>
  <?php
  	//	$this->widget('ext.imeeting-dashboard.ImeetingDashboardWidget',array('type'=>'dashboard'));
       $this->widget('ext.imeeting-dashboard.ImeetingDashboardWidget',array('type'=>'quickshortcut'));
    ?>
	<div class="section">

					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php echo Yii::t('conference','Quản lý tài khoản'); ?></h2>

								<?php echo CHtml::link(Yii::t('conference', 'Xem toàn bộ'), array('/user/admin/admin'),array('class'=>'view_all_orders')); ?>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>

					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner">
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
										array('header'=>'No.','value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)'),
										/*
										array(
											'name' => 'id',
											'type'=>'raw',
											'value' => 'CHtml::link(CHtml::encode($data->id),array("admin/update","id"=>$data->id))',
										),*/
										array(
											'name' => 'username',
											'type'=>'raw',
											'value' => 'CHtml::link(CHtml::encode($data->username),array("admin/view","id"=>$data->id))',
										),
										array(
											'name'=>'email',
											'type'=>'raw',
											'value'=>'CHtml::link(CHtml::encode($data->email), "mailto:".$data->email)',
										),
										array(
											'name' => 'createtime',
											'value' => 'date("d.m.Y",$data->createtime)',
											'htmlOptions' => array("style"=>"width:40px"),
										),
										array(
											'name' => 'lastvisit',
											'value' => '(($data->lastvisit)?date("d.m.Y",$data->lastvisit):UserModule::t("Not visited"))',

										),
										array(
											'name'=>'status',
											'value'=>'User::itemAlias("UserStatus",$data->status)',
										),
										array(
											'name'=>'superuser',
											'value'=>'User::itemAlias("AdminStatus",$data->superuser)',
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

