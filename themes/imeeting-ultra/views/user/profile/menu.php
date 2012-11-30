<!--
<ul class="actions">
<?php 
if(UserModule::isAdmin()) {
?>
<li><?php echo CHtml::link(UserModule::t('Manage User'),array('/user/admin')); ?></li>
<?php 
} else {
?>
<li><?php echo CHtml::link(UserModule::t('List User'),array('/user')); ?></li>
<?php
}
?>
<?php
$userRoles=Rights::getAssignedRoles();

foreach($userRoles as $i)
{
    if($i->name == "Moderator")
    {
        echo '<li>'.CHtml::link(Yii::t('Account','Quản lý thành viên'),array('/account')).'</li>';
        
    }
}
?>
<li><?php echo CHtml::link(UserModule::t('Profile'),array('/user/profile')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Edit'),array('edit')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Change password'),array('changepassword')); ?></li>
<li><?php echo CHtml::link(UserModule::t('Logout'),array('/user/logout')); ?></li>
</ul>

-->

<?php 
$uniqueId =  $this->getUniqueId().'/'.$this->getAction()->getId();

?>
<ul class="section_menu right">
	<li><?php echo CHtml::link('<span class="l"><span></span></span><span class="m"><em>'. UserModule::t('Profile').'</em><span></span></span><span class="r"><span></span></span>',
		array('/user/profile'),array('class'=> ($this->getUniqueId().'/'.$this->getAction()->getId()=='user/profile/profile')?'selected_lk':'')	); ?>
	</li>
	<li><?php echo CHtml::link('<span class="l"><span></span></span><span class="m"><em>'.UserModule::t('Edit').'</em><span></span></span><span class="r"><span></span></span>',
		array('/user/profile/edit'),array('class'=> ($this->getUniqueId().'/'.$this->getAction()->getId()=='user/profile/edit')?'selected_lk':'')	); ?>
	</li>
	<li><?php echo CHtml::link('<span class="l"><span></span></span><span class="m"><em>'.UserModule::t('Change password').'</em><span></span></span><span class="r"><span></span></span>',
		array('/user/profile/changepassword'),array('class'=> ($this->getUniqueId().'/'.$this->getAction()->getId()=='user/profile/changepassword')?'selected_lk':'')	); ?>
	</li>
	
</ul>
