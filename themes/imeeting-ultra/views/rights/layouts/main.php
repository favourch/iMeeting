<?php 
$section_name = Yii::t('menu', 'Quản lý quyền');
$this->beginContent(Rights::module()->appLayout); 


?>


<div class="inner">
<!--<div id="rights" class="container">-->

	<div id="content">
		<?php $this->widget('ext.imeeting-dashboard.ImeetingDashboardWidget',array('type'=>'quickshortcut'));	?>
		


			<!--[if !IE]>start section <![endif]-->
			<div class="section">

					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2><?php echo $section_name;?></h2>
							<?php if( $this->id!=='install' ): ?>

								<div id="menu">

									<?php $this->renderPartial('/_menu'); ?>

								</div>

							<?php endif; ?>	
							
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
							
							<!--[if !IE]>end  tabs<![endif]-->

							</div>
								<?php echo $content ?>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->
		

	</div><!-- content -->

</div>



<?php $this->endContent(); ?>