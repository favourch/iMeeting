<?php
$this->breadcrumbs=array(
	(UserModule::t('Users'))=>array('admin'),
	$model->username=>array('view','id'=>$model->id),
	(UserModule::t('Update')),
);
?>



<?php  

$section_name =  UserModule::t('Update User').": ".$model->username;
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
								
								<?php echo CHtml::link(Yii::t('conference','Quản lý tài khoản'),array('/user/admin/admin'),array('class'=>'view_all_orders')); ?>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner">
							<div class="table_tabs_menu">
							<!--[if !IE]>start  tabs<![endif]-->
							<?php echo $this->renderPartial('_menu', array(
								'list'=> array(
									CHtml::link(UserModule::t('Create User'),array('create')),
									CHtml::link(UserModule::t('View User'),array('view','id'=>$model->id)),
								),
							));
							?>
							<!--[if !IE]>end  tabs<![endif]-->

							<?php echo CHtml::link('<span><span><em>'. Yii::t('conference','Thêm mới').'</em><strong></strong></span></span>',array('conference/create'), array("class"=>"update")); ?>
							</div>
								<?php echo $this->renderPartial('_form', array('model'=>$model,'profile'=>$profile, 'company'=>$company));?>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->

