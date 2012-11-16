<div class="form">

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
	<div class="row">
		<input size="35" type="text" name="username" onclick="javascript:this.value=''" value="<?php echo Yii::t('conference','Tên của bạn'); ?>"/>		<?php echo CHtml::submitButton(Yii::t('conference','Vào phòng')); ?>
		<br/>
		<div style="float:left; width:150px"><label for="attendee" ><?php echo Yii::t('conference','Người nghe'); ?></label><input style="vertical-align:middle" type="radio" id="attendee" name="type" value="0" checked="true"/></div>                     
		<div style="float:left;width:180px"><label for="mod" ><?php echo Yii::t('conference','Người thuyết trình'); ?></label><input style="vertical-align:bottom"  type="radio" id="mod" name="type" value="1" /></div>
	</div>
		

	<div class="row buttons">
		<div style='float:left; width:240px'>&nbsp</div>

	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->