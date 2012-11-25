<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_limit', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'room_limit'); ?>
		<?php echo $form->error($model,'room_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_limit', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'user_limit'); ?>
		<?php echo $form->error($model,'user_limit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email', array('style'=>"width:240px")); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'owner_id'); ?>
		<?php //echo $form->textField($model,'owner_id'); ?>
		<?php //echo $form->error($model,'owner_id'); ?>
	</div>

	<div class="row buttons">
		<div style='float:left; width:240px'>&nbsp</div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Lưu'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->