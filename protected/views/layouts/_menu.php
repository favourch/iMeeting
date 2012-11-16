<div id="mainmenu">
		<div style='float:right'>
		<?php
		$isGuest= false;
		$isUser = false;
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
		
		<?php $this->widget('zii.widgets.CMenu',array(
		 	'activeCssClass'=>'active',
  			'activateParents'=>true,
			'items'=>array(
				array('label'=>Yii::t('menu','Trang chủ'), 'url'=>array('/user/login')),
				array('label'=>Yii::t('menu','Demo'), 'url'=>array('/demo/index')),
				//array('label'=>Yii::t('menu','Giới thiệu'), 'url'=>array('/site/page', 'view'=>'about')),
			//	array('label'=>Yii::t('menu','Chi phí'), 'url'=>array('/site/page','view'=>'price'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('menu','Hỗ trợ'), 'url'=>array('/site/support')),
				array('label'=>Yii::t('menu','Liên hệ'), 'url'=>array('/site/contact')),
			//	array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
			//	array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
//array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>$isGuest),

//array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
//array('url'=>array('/wdcalendar'), 'label'=>Yii::t('menu','Lịch họp'), 'visible'=>$isUser),
			array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>$isUser && (!$isMod) && (!$isAdmin)),
			array('url'=>array('/conference/index'), 'label'=>Yii::t('menu','Phòng hội thảo'), 'visible'=>$isUser && (!$isMod) && (!$isAdmin)),
			//Mod
			array('url'=>array('/conference/admin'), 'label'=>Yii::t('menu','Quản lý phòng'), 'visible'=>$isMod || $isAdmin),
			array('url'=>array('/account/admin'), 'label'=>Yii::t('menu','Quản lý tài khoản'), 'visible'=>$isMod),
			array('url'=>array('/presentations/index'), 'label'=>Yii::t('menu','Tài liệu'), 'visible'=>$isMod),
			//Admin
			
			array('url'=>array('/user/admin/admin'), 'label'=>Yii::t('menu','Quản lý tài khoản'), 'visible'=>$isAdmin),
			array('url'=> array('/rights/assignment'), 'label'=>Yii::t('menu','Quản lý quyền'), 'visible'=>$isAdmin),
			array('url'=> array('/company/admin'), 'label'=>Yii::t('menu','Quản lý công ty'), 'visible'=>$isAdmin),
			array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!$isGuest),
			),
		)); ?>
		</div>
	</div><!-- mainmenu -->