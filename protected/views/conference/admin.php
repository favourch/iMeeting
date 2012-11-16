<?php
$this->breadcrumbs=array(
	'Rooms'=>array('index'),
	'Manage',
);
/*
$this->menu=array(
	array('label'=>'Danh sách phòng', 'url'=>array('admin')),
	array('label'=>'Tạo phòng', 'url'=>array('create')),
);
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
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('rooms-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php $this->widget('ext.imeeting-toolbars.ImeetingToolbarsWidget',
						array('model'=>isset($model)?$model:null, 'controller'=>'conference', 'mod'=>$isMod || $isAdmin)
); ?>
<h1><?php echo Yii::t('conference','Quản lý phòng họp') ; ?></h1>
<!--
<p>
Bạn có thể sử dụng các biểu thức điều kiện như (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
hoặc <b>=</b>) để tìm kiếm chính xác hơn.
</p>
-->
<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 

if(Yii::app()->getModule('user')->isAdmin()){
$columns = array(
		
		array( 'name'=>'company_name', 'value'=>'$data->company->name' ),
		'name',
		'attendee_pw',
		'moderator_pw',
		'user_limit',
		array(
			'class'=>'CButtonColumn',
		));
}else{
$columns = array(
		
		'name',
		//'attendee_pw',
		//'moderator_pw',
		'user_limit',
		'description',
				array(
			'class'=>'CButtonColumn',
			'deleteButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/delete.png',
			'updateButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/update.png',
			'viewButtonImageUrl'=>Yii::app()->request->baseUrl.'/images/view.png',
			'buttons' =>array(
			 	'delete'=>array(
                        'label'=>'Approve for Review >>',
                        //'url'=>Yii::app()->controller->createUrl("project/makeReviewable",array("id"=>$model->id)),
                        'options'=>array('class'=>'cssGridButton'),
                        
                            ),
				),
			'htmlOptions'=>array('width'=>'110px')
		),
		);
		
}
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=> $columns,
	'itemsCssClass'=>'table-admin',
	//'afterAjaxUpdate'=>'function(id, options){alert("aa";)}',
)); ?>
