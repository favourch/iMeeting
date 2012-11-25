<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'presentations-form',
	'enableAjaxValidation' => false,
));
?>


	<?php echo $form->errorSummary($model); ?>

	
		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		
		<?php echo CHtml::submitButton(Yii::t('conference','Lưu thay đổi')); ?>
		
		
		</div><!-- row -->
	

		
<?php

$this->endWidget();
?>
</div><!-- form -->