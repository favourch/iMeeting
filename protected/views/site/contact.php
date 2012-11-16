<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>
<div style="width: 950px;height: 400px;">
	<div style="padding: 10px 0 0 10px">
		
	<h1><?php echo Yii::t('contact','Liên hệ'); ?></h1>
	
	<?php if(Yii::app()->user->hasFlash('contact')): ?>
	
	<div class="flash-success">
		<?php echo Yii::app()->user->getFlash('contact'); ?>
	</div>
	
	<?php else: ?>
	
	<p>
	<?php echo Yii::t('contact','Nếu bạn có bất kỳ câu hỏi nào về chúng tôi, hay sản phẩm & dịch vụ, vui lòng liên hệ chúng tôi. Cám ơn.'); ?> 
	</p>
	<div>
		<div class="form" style="float:left; width:50%">
		
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'contact-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>
		
			<!--<p class="note">Thông tin đánh dấu <span class="required">*</span> là bắt buộc.</p>-->
		
			<?php echo $form->errorSummary($model); ?>
		
			<div class="row">
				
				<label style="width:150px"><?php echo Yii::t('contact','Tên của bạn');?></label>
				<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>128)); ?>
				<?php echo $form->error($model,'name'); ?>
			</div>
		
			<div class="row">
				
				<label style="width:150px"><?php echo Yii::t('contact','Email');?></label>
				<?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>128)); ?>
				<?php echo $form->error($model,'email'); ?>
			</div>
		
			<div class="row">
				<label style="width:150px"><?php echo Yii::t('contact','Tiêu đề');?></label>
				
				<?php echo $form->textField($model,'subject',array('size'=>40,'maxlength'=>128)); ?>
				<?php echo $form->error($model,'subject'); ?>
			</div>
		
			<div class="row">
				<label style="width:150px"><?php echo Yii::t('contact','Nội dung');?></label>
				
				<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>42)); ?>
				<?php echo $form->error($model,'body'); ?>
			</div>
		
			<?php if(CCaptcha::checkRequirements()): ?>
			<div class="row">
				<label style="width:150px"><?php echo Yii::t('contact','Mã bảo vệ');?></label>
				
				<div style="margin-left: 10px">
				<?php $this->widget('CCaptcha',
				  array('showRefreshButton'=>true,
                                    'buttonType'=>'button',
                                    'buttonOptions'=>
                                                        array('type'=>'image',
                                                              'src'=>"/images/refresh-icon.png",
                                                              'width'=>40,
                                                              'style'=>'background:none',
                                                        ),                                                            
                                    'buttonLabel'=>Yii::t('menu','Lấy mã mới')),
                              false);  ?>
				
				</div>
				<?php echo $form->textField($model,'verifyCode',array('style'=>'margin-left:150px')); ?>
				<!--
				<div class="hint">Vui lòng nhập các ký tự từ hình ảnh. <br/>Các ký tự không phân biệt HOA-thường.
				</div>
				-->
				<?php echo $form->error($model,'verifyCode'); ?>
			</div>
			<?php endif; ?>
		
			<div class="row buttons">
				<div style='float:left; width:150px'>&nbsp</div>
				<?php echo CHtml::submitButton(Yii::t('contact','Gởi thông tin'), array('class'=>'button')); ?>
			</div>
		
		<?php $this->endWidget(); ?>
		
		</div><!-- form -->
		<div style="float:left; width:40%; margin-top:250px; text-align:right">
			<font style="font-weight: bold">
			
				<?php echo Yii::t('contact','Công  ty TNHH Đầu tư Công nghệ Trường Giang');?>,
			</font><br/>
			<?php echo Yii::t('contact','VPĐD: 701, M1, c/c Tôn Thất Thuyết, Phường 1, Quận 4');?><br/>
			
			<?php //echo Yii::t('contact','489/21c Lê Đức Thọ, P.16, Q. Gò Vấp');?>
			<?php echo Yii::t('contact','TP. Hồ Chí Minh');?><br/>
			Tel: (+84) 08 2229 7648<br/>
			Email: sales@imeeting.vn<br/>
			Website: www.imeeting.vn<br/>
			
		</div>
		</div>
	</div>
</div>
<?php endif; ?>