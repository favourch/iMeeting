<?php
$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);

$this->widget('ext.imeeting-dashboard.ImeetingDashboardWidget',array('type'=>'quickshortcut'));
$section_name = Yii::t('menu','Góp ý'); 
?>
	<!--[if !IE]>start section <![endif]-->
	<div class="section">

					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php echo $section_name;?></h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner">
							<?php if(Yii::app()->user->hasFlash('contact')): ?>
							<div class="success">
								<?php echo Yii::app()->user->getFlash('contact'); ?>
							</div>
							<?php endif; ?>
							<div class="table_tabs_menu">
							<!--[if !IE]>start  tabs<![endif]-->

							<!--[if !IE]>end  tabs<![endif]-->
							</div>
							<p>
								<?php echo Yii::t('contact','Nếu bạn có bất kỳ câu hỏi nào về chúng tôi, hay sản phẩm & dịch vụ, vui lòng liên hệ chúng tôi. Cám ơn.'); ?> 
							</p>
							<div class="form_wrapper" >
									
									<?php $form=$this->beginWidget('CActiveForm', array(
										'id'=>'contact-form',
										'enableClientValidation'=>true,
										'clientOptions'=>array(
											'validateOnSubmit'=>true,
										),
										'htmlOptions'=> array('class'=>'search_form general_form')
									)); ?>
									
										<!--<p class="note">Thông tin đánh dấu <span class="required">*</span> là bắt buộc.</p>-->
									
										<?php echo $form->errorSummary($model); ?>
									
										<div class="row">
											
											<label style="width:150px"><?php echo Yii::t('contact','Tên của bạn');?></label>
											<div class='inputs' style='float:left'>
												<span style="float:left">	<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>128)); ?>
												</span>
											<?php echo $form->error($model,'name'); ?>
										</div>
										</div>
									
										<div class="row">
											
											<label style="width:150px"><?php echo Yii::t('contact','Email');?></label>
											<div class='inputs' style='float:left'>
											<span style="float:left"><?php echo $form->textField($model,'email',array('size'=>40,'maxlength'=>128)); ?>
											</span>
											<?php echo $form->error($model,'email'); ?>
										</div>
										</div>
									
										<div class="row">
											<label style="width:150px"><?php echo Yii::t('contact','Tiêu đề');?></label>
											<div class='inputs' style='float:left'>
											<span style="float:left">
												<?php echo $form->textField($model,'subject',array('size'=>40,'maxlength'=>128)); ?>
											</span>
											<?php echo $form->error($model,'subject'); ?>
											</div>
										</div>
									
										<div class="row">
											<label style="width:150px"><?php echo Yii::t('contact','Nội dung');?></label>
											<div class='inputs' style='float:left'>
											<span style="float:left">
											
											<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>42)); ?>
											</span>
											<?php echo $form->error($model,'body'); ?>
											</div>
										</div>
									
										<?php if(CCaptcha::checkRequirements()): ?>
										<div class="row">
											<label style="width:150px"><?php echo Yii::t('contact','Mã bảo vệ');?></label>
											
											
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
											
											
											<div class='inputs' style='float:left'>
											<span style="float:left">
											<?php echo $form->textField($model,'verifyCode',array('style'=>'margin-left:150px')); ?>
											</span>
											<?php echo $form->error($model,'verifyCode'); ?>
										</div>
											<!--
											<div class="hint">Vui lòng nhập các ký tự từ hình ảnh. <br/>Các ký tự không phân biệt HOA-thường.
											</div>
											-->
											
										</div>
										<?php endif; ?>
										<div class="row buttons">
											<div style='float:left; width:150px'>&nbsp</div>
											<?php echo CHtml::submitButton(Yii::t('contact','Gởi thông tin'), array('class'=>'button')); ?>
										</div>
									
									<?php $this->endWidget(); ?>
									
									</div><!-- form -->
						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

