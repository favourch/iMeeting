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
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'Quản lý công ty', 'url'=>array('admin')),
	array('label'=>'Thêm mới', 'url'=>array('create')),
);
*/
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('company-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
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
								<h2><?php echo Yii::t('menu','Quản lý công ty');?></h2>
								
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner">

<p>
Bạn có thể sử dụng các biểu thức điều kiện như (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
hoặc <b>=</b>) để tìm kiếm chính xác hơn.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
							<div class="table_tabs_menu">
							<!--[if !IE]>start  tabs<![endif]-->

							
							<!--[if !IE]>end  tabs<![endif]-->
							
							<?php echo CHtml::link('<span><span><em>'. Yii::t('conference','Thêm mới').'</em><strong></strong></span></span>',array('company/create'), array("class"=>"update")); ?>
							</div>


							<!--[if !IE]>start table_wrapper<![endif]-->
							<div class="table_wrapper">
								<div class="table_wrapper_inner">
								<?php
								$widget= $this->widget('application.components.widgets.ImeetingGridView', array(
									'id' =>'company-grid',
									'pager'=>array('cssFile'=>false,'class'=>'ImeetingLinkPager'),

									'template'=>'{items} ',
									'dataProvider'=>$model->search(),
									'cssFile' => false,
									'columns'=>array(
										'id',
										'name',
										'room_limit',
										'user_limit',
										'address',
										'description',
										
										'phone',
										'email',
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

