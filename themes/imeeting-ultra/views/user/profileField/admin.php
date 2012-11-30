<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Manage'),
);
?>

<!--[if !IE]>start section<![endif]-->
	<div class="section">

					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php echo UserModule::t('Manage Profile Fields');?></h2>
								
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

							<?php echo $this->renderPartial('_menu', array(
									'list'=> array(
										CHtml::link(UserModule::t('Create Profile Field'),array('create')),
									),
								));
							?>
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
										'id',
										'varname',
										array(
											'name'=>'title',
											'value'=>'UserModule::t($data->title)',
										),
										'field_type',
										'field_size',
										//'field_size_min',
										array(
											'name'=>'required',
											'value'=>'ProfileField::itemAlias("required",$data->required)',
										),
										//'match',
										//'range',
										//'error_message',
										//'other_validator',
										//'default',
										'position',
										array(
											'name'=>'visible',
											'value'=>'ProfileField::itemAlias("visible",$data->visible)',
										),
										//*/
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

