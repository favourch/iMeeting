<div class="form_wrapper">

<?php
 CHtml::$errorMessageCss = 'system negative';
echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data','class'=>'search_form general_form')); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'email', array('style'=>"width:240px")); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php echo CHtml::activeTextField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
			</span>
			<?php echo CHtml::error($model,'email'); ?>
		</div>
		
	</div>
	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'password', array('style'=>"width:240px")); ?>		
		<div class='inputs' style='float:left'>
			<span style="float:left">
				<?php echo CHtml::activePasswordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
			</span>
			<?php echo CHtml::error($model,'password'); ?>
		</div>
		

	</div>



	<div class="row">
		<?php echo CHtml::activeLabelEx($model,'status', array('style'=>"width:240px")); ?>
		<div class='inputs' style='float:left'>
			<span style="float:left">
				<?php echo CHtml::activeDropDownList($model,'status',User::itemAlias('UserStatus')); ?>
			</span>
			<?php echo CHtml::error($model,'status'); ?>
		</div>
	</div>

	<div class="row">
		<label style="width:240px"> <?php echo Yii::t('conference','Quản lý phòng họp'); ?></label>
		<?php echo CHtml::CheckBox('presenter',$presenter); ?>

	</div>

<?php
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo CHtml::activeLabelEx($profile,$field->varname, array('style'=>"width:240px")); ?>

		<div class='inputs' style='float:left'>
			<span style="float:left">
			<?php
			if ($field->widgetEdit($profile)) {
				echo $field->widgetEdit($profile);
			} elseif ($field->range) {
				echo CHtml::activeDropDownList($profile,$field->varname,Profile::range($field->range));
			} elseif ($field->field_type=="TEXT") {
				echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
			} else {
				echo CHtml::activeTextField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
			}
			 ?>
			</span>
			<?php echo CHtml::error($profile,$field->varname); ?>
		</div>
	</div>
			<?php
			}
		}
?>
	<div class="row buttons">
		<div style='float:left; width:240px'>&nbsp</div>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Thêm mới' : 'Lưu thay đổi'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->