<div class="form" style="padding-left:0px">

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
	<div class="row" >
		
		<label for="username" style="width: 100px"><?php echo Yii::t('conference','Tên của bạn'); ?></label>
		<input size="50" type="text" name="username" onclick="javascript:this.value=''" value=""/>		
	</div>
		
		<div style="float:left; width:150px; padding-top:20px">
			<label for="attendee" style="padding-top:0px;padding-right: 5px" ><?php echo Yii::t('conference','Người nghe'); ?></label>
			<input style="vertical-align:middle" type="radio" id="attendee" name="type" value="0" checked="true"/>
		</div>                     
		<div style="float:left;width:180px;padding-top:20px">
				<label for="mod" style="padding-top:0px; padding-right: 5px" ><?php echo Yii::t('conference','Người thuyết trình'); ?></label><input style="vertical-align:bottom"  type="radio" id="mod" name="type" value="1" /></div>
		<div  class="row" align="center" style="padding-top:60px">
		<?php echo CHtml::submitButton(Yii::t('conference','Vào phòng')); ?>
		</div>
		

	<div class="row buttons">
		<div style='float:left; width:240px'>&nbsp</div>

	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->