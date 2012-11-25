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