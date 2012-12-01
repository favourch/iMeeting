<?php
	$isMod = false;
	if(Yii::app()->user->isGuest){
		$isGuest = true;
	}else{
		$isUser = true;
		$rights = Rights::getAssignedRoles(Yii::app()->user->id);
		foreach($rights as $r){
			if($r->name =='Moderator'){
				$isMod = true;
			}

		}



	}
	$isAdmin = Yii::app()->getModule('user')->isAdmin()	;
?>
	<!--[if !IE]>start section<![endif]-->
				<div class="section">

					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2></h2>
								<ul class="section_menu right">
									<li><a href="#" class="selected_lk"><span class="l"><span></span></span><span class="m"><em><?php echo Yii::t('conference','Bảng điều khiển'); ?></em><span></span></span><span class="r"><span></span></span></a></li>
									<!--
									<li><a href="#"><span class="l"><span></span></span><span class="m"><em>To Do</em><span></span></span><span class="r"><span></span></span></a></li>
									<li><a href="#"><span class="l"><span></span></span><span class="m"><em>Products</em><span></span></span><span class="r"><span></span></span></a></li>
									-->
								</ul>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->

					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>

						<div class="section_content_inner">
							<!--[if !IE]>start dashboard menu<![endif]-->
								<div class="dashboard_menu_wrapper">
								<ul class="dashboard_menu">
									<li><?php echo CHtml::link("<span>".Yii::t('menu','Chọn phòng họp') ."</span>",array("/conference/index"),array('class'=>"d4")); ?></li>
									
									<li><?php echo CHtml::link("<span>".Yii::t('menu','Tài khoản') ."</span>",array("/user/profile"),array('class'=>"d17")); ?></li>
									<?php if($isMod): ?>
										<li><?php echo CHtml::link("<span>".Yii::t('menu','Quản lý tài khoản') ."</span>",array("/account/index"),array('class'=>"d1")); ?></li>
										<li><?php echo CHtml::link("<span>".Yii::t('menu','Quản lý tài liệu') ."</span>",array("/presentations/index"),array('class'=>"d2")); ?></li>
									<?php  endif; ?>
									<?php if($isAdmin): ?>
										<li><?php echo CHtml::link("<span>".Yii::t('menu','Quản lý tài khoản') ."</span>",array("/user/admin/admin"),array('class'=>"d1")); ?></li>
										<li><?php echo CHtml::link("<span>".Yii::t('menu','Quản lý quyền') ."</span>",array("/rights"),array('class'=>"d10")); ?></li>
										<li><?php echo CHtml::link("<span>".Yii::t('menu','Quản lý công ty') ."</span>",array("/company"),array('class'=>"d9")); ?></li>
									<?php  endif; ?>
									<li><?php echo CHtml::link("<span>".Yii::t('menu','Góp ý') ."</span>",array("/site/helpus"),array('class'=>"d6")); ?></li>
							<!--
									<li><a href="#" class="d7"><span>Homepage and Static Pages</span></a></li>
									<li><a href="#" class="d2"><span>Setup upload folders</span></a></li>
									<li><a href="#" class="d3"><span>Manage photo galleries</span></a></li>
									<li><a href="#" class="d4"><span>Change site templates</span></a></li>
									<li><a href="#" class="d5"><span>SEO Tools and Settings</span></a></li>
									<li><a href="#" class="d6"><span>Email Settings and Templates</span></a></li>
									
									<li><a href="#" class="d8"><span>Website Security Settings</span></a></li>
									<li><a href="#" class="d9"><span>Printable Pages Template</span></a></li>
									<li><a href="#" class="d10"><span>Date and Time Setup</span></a></li>
									<li><a href="#" class="d11"><span>Favorires Settings</span></a></li>
									<li><a href="#" class="d12"><span>Statistics and Graphs</span></a></li>
									<li><a href="#" class="d13"><span>Favorires Settings</span></a></li>
									<li><a href="#" class="d14"><span>Setup upload folders</span></a></li>
									<li><a href="#" class="d15"><span>Statistics and Graphs</span></a></li>
									<li><a href="#" class="d16"><span>Change site templates</span></a></li>

								-->
								</ul>
								</div>
								<!--[if !IE]>end dashboard menu<![endif]-->
						</div>

						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->
