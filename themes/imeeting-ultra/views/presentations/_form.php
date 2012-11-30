<div class="form_wrapper">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'presentations-form',
	'enableAjaxValidation' => false,
	'htmlOptions' => array('class'=>'search_form general_form'),
));
?>


	<?php echo $form->errorSummary($model); ?>

	
		<div class="row">
		<?php echo $form->labelEx($model,'name', array('style'=>"width:200px")); ?>
		
		
		
		
		<div class='inputs' style='float:left'>
			<span style="float:left">
				<?php echo $form->textField($model, 'name', array('maxlength' => 255,'style'=>"width:240px")); ?>
			</span>
			
			<?php echo $form->error($model,'name'); ?>
		</div>
		</div><!-- row -->
		<div class="row buttons">
			
			<?php echo CHtml::submitButton(Yii::t('conference','Lưu thay đổi')); ?>

		</div>

	

		
<?php

$this->endWidget();
?>
</div><!-- form -->