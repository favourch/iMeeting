<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'room-directory-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->labelEx($model,'company'); ?>
	<div class="row">
			<?php
			
			
			echo CHtml::dropDownList('company_id',''
			 ,
			    CHtml::listData($company,'id','name'),
			   // array('empty'=>'All companies'),
				array(
					'empty'=>'Please chose...',
					'ajax' => array(
					'type'=>'POST', //request type
					'url'=>CController::createUrl('roomDirectory/getRoom'), //url to call.
					//Style: CController::createUrl('currentController/methodToCall')
					'update'=>'#RoomDirectory_room_id', //selector to update
					//'data'=>'js:javascript statement' 
					//leave out the data key to pass all form values through
				)
				));  
		?>
	</div>
	
		<div class="row">
		
	
		<?php echo $form->labelEx($model,'room_id'); ?>
		<?php
		echo CHtml::dropDownList('RoomDirectory[room_id]','', array());
		
		//$company_id = isset($_GET['company_id'])?$_GET['company_id']:'0';
		// echo $form->dropDownList($model, 'room_id', GxHtml::listDataEx(Rooms::model()->findAllAttributes('name', true ) , 'id', 'name'));
		  ?>
		<?php echo $form->error($model,'room_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'directory'); ?>
		<?php echo $form->textField($model, 'directory', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'directory'); ?>
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->