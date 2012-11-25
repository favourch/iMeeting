<!--[if !IE]>start section<![endif]-->
				<div class="section">
					
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2>Dashboard</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner">
						<!--[if !IE]>start lists<![endif]-->
						<div class="lists">
							<div class="lists_inner">
								<dl>
									<dt><?php echo Yii::t('conference','Tài khoản'); ?></dt>
									<dd>
										<div class="dd_top">
											<ul class="dd_bottom">
												<li><?php echo CHtml::link(Yii::t('conference','Danh sách'),array('/account/index')); ?></li>
												<li><?php echo CHtml::link(Yii::t('conference','Thêm mới'),array('/account/create')); ?></li>
											</ul>
										</div>
									</dd>
								</dl>
								
								<dl>
									<dt><?php echo Yii::t('conference','Phòng họp'); ?></dt>
									<dd>
										<div class="dd_top">
											<ul class="dd_bottom">
												<li><?php echo CHtml::link(Yii::t('conference','Chọn phòng họp'),array('/conference/index')); ?></li>
													<li><?php echo CHtml::link(Yii::t('conference','Quản lý phòng họp'),array('/conference/admin')); ?></li>
													<li><?php echo CHtml::link(Yii::t('conference','Thêm mới'),array('/conference/admin')); ?></li>

											
											</ul>
										</div>
									</dd>
								</dl>
								
								<dl>
									<dt><?php echo Yii::t('conference','Phân quyền'); ?></dt>
									<dd>
										<div class="dd_top">
											<ul class="dd_bottom">
												<li><?php echo CHtml::link(Yii::t('conference','Danh sách phân quyền'),array('/rights/assignment/view')); ?></li>
												<li><?php echo CHtml::link(Yii::t('conference','Phân quyền'),array('/rights/authItem/permissions')); ?></li>
												<li><?php echo CHtml::link(Yii::t('conference','Vai trò'),array('/rights/authItem/roles')); ?></li>
												<li><?php echo CHtml::link(Yii::t('conference','Nhiệm vụ'),array('/rights/authItem/tasks')); ?></li>
												<li><?php echo CHtml::link(Yii::t('conference','Vận hành'),array('/rights/authItem/operations')); ?></li>
												
											</ul>
										</div>
									</dd>
								</dl>
								<dl>
									<dt><?php echo Yii::t('conference','Công ty'); ?></dt>
									<dd>
										<div class="dd_top">
											<ul class="dd_bottom">
												<li><?php echo CHtml::link(Yii::t('conference','Danh sách'),array('/company/admin')); ?></li>
												<li><?php echo CHtml::link(Yii::t('conference','Danh sách'),array('/company/create')); ?></li>
												
											</ul>
										</div>
									</dd>
								</dl>
							
							</div>
						</div>
						<!--[if !IE]>end lists<![endif]-->
						</div>
						
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->
				