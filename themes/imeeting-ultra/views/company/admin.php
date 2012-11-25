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
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'company', 'mod'=>$isMod || $isAdmin, 'index'=>false)
); ?>
<h1>Quản lý công ty</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'itemsCssClass'=>'table-admin',
	'columns'=>array(
		'id',
		'name',
		'room_limit',
		'user_limit',
		'address',
		'description',
		
		'phone',
		'email',
		//'owner_id',
		
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
	//
	),
)); ?>
