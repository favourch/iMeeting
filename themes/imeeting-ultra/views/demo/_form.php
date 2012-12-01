<div class="form" style="padding-left:0px">

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>
	<div class="row" style="padding-top: 50px" >
		
		<label for="username" style="width: 100px"><?php echo Yii::t('conference','Tên của bạn'); ?></label>
		<input size="50" type="text" name="username" onclick="javascript:this.value=''" value=""/>		
	</div>
	<div class="row" style="padding-top:20px">
		<div style="float:left; width:120px; padding-left: 100px">
			<label for="attendee" style="padding-top:0px;padding-right: 5px" ><?php echo Yii::t('conference','Người nghe'); ?></label>
			<input style="vertical-align:middle" type="radio" id="attendee" name="type" value="0" />
		</div>                     
		<div style="float:left;width:160px;">
			<label for="mod" style="padding-top:0px; padding-right: 5px" ><?php echo Yii::t('conference','Người thuyết trình'); ?></label><input style="vertical-align:bottom"  type="radio" id="mod" name="type" value="1" checked="true"/>
		</div>
	</div>
	



	<div  class="row buttons" align="center" style="padding-top:30px; padding-left: 100px">
		<?php echo CHtml::submitButton(Yii::t('conference','Vào phòng')); ?>
	</div>


<?php echo CHtml::endForm(); ?>

</div><!-- form -->