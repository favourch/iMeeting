<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'rooms-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Thông tin đánh dấu <span class="required">*</span> là bắt buộc.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php 
		if(Yii::app()->getModule('user')->isAdmin()){
		
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'company', array('style'=>"width:240px")); ?>
		<?php echo $form->dropDownList($model,'company', CHtml::listData($company,'id','name')); ?>
		<?php //echo CHtml::dropDownList("Chọn công ty", $model->company_id,CHtml::listData($company,'id','name'));?>
		
		<?php echo $form->error($model,'company'); ?>
		
	</div>

	
	<?php		
		}
	?>
	<div class="row">
		<?php echo $form->labelEx($model,'name', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'name'); ?>
		
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'description', array('style'=>"width:240px")); ?>
		<?php echo $form->textArea($model,'description',array('cols'=>60, 'size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'description'); ?>
		
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'attendee_pw', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'attendee_pw',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'attendee_pw'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moderator_pw', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'moderator_pw',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'moderator_pw'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_limit', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'user_limit',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'user_limit'); ?>
	</div>



	<div class="row buttons">
		<div style='float:left; width:240px'>&nbsp</div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo phòng' : 'Lưu thay đổi'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->