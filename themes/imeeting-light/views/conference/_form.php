<?php $form=$this->beginWidget('bootstrap.widgets.BootActiveForm',array(
	'id'=>'rooms-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>400)); ?>

	<?php echo $form->textFieldRow($model,'company_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'attendee_pw',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'moderator_pw',array('class'=>'span5','maxlength'=>50)); ?>

	<?php echo $form->textFieldRow($model,'user_limit',array('class'=>'span5')); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'owner_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_date',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.BootButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
