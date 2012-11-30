<div class="form_wrapper">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'company-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' =>array('class'=>'search_form general_form'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>400)); ?>
			</span>
		<?php echo $form->error($model,'name'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'room_limit' ); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo $form->textField($model,'room_limit'); ?>
			</span>
		<?php echo $form->error($model,'room_limit'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_limit'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
				<?php echo $form->textField($model,'user_limit'); ?>
			</span>
			<?php echo $form->error($model,'user_limit'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
				<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>400)); ?>
			</span>
		<?php echo $form->error($model,'address'); ?>
	</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
				<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1000)); ?>
			</span>
		<?php echo $form->error($model,'description'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left"><?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
			</span>
		<?php echo $form->error($model,'phone'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
			</span>
		<?php echo $form->error($model,'email'); ?>
		</div>
	</div>



	<div class="row buttons">
		<div style='float:left; width:115px'>&nbsp</div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Lưu'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->