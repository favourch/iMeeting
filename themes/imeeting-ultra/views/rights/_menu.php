<?php 
/*$this->widget('zii.widgets.CMenu', array(
	'firstItemCssClass'=>'first',
	'lastItemCssClass'=>'last',
	'htmlOptions'=>array('class'=>'actions'),
	'items'=>array(
		array(
			'label'=>Rights::t('core', 'Assignments'),
			'url'=>array('assignment/view'),
			'itemOptions'=>array('class'=>'item-assignments'),
		),
		array(
			'label'=>Rights::t('core', 'Permissions'),
			'url'=>array('authItem/permissions'),
			'itemOptions'=>array('class'=>'item-permissions'),
		),
		array(
			'label'=>Rights::t('core', 'Roles'),
			'url'=>array('authItem/roles'),
			'itemOptions'=>array('class'=>'item-roles'),
		),
		array(
			'label'=>Rights::t('core', 'Tasks'),
			'url'=>array('authItem/tasks'),
			'itemOptions'=>array('class'=>'item-tasks'),
		),
		array(
			'label'=>Rights::t('core', 'Operations'),
			'url'=>array('authItem/operations'),
			'itemOptions'=>array('class'=>'item-operations'),
		),
	)
));
*/	?>

<ul class="section_menu right">
	<li><?php echo CHtml::link('<span class="l"><span></span></span><span class="m"><em>'. Rights::t('core', 'Assignments').'</em><span></span></span><span class="r"><span></span></span>',
		array('/rights/assignment/view'),array('class'=> ($this->getUniqueId().'/'.$this->getAction()->getId()=='rights/assignment/view')?'selected_lk':'')	); ?>
	</li>
	<li><?php echo CHtml::link('<span class="l"><span></span></span><span class="m"><em>'.Rights::t('core', 'Permissions').'</em><span></span></span><span class="r"><span></span></span>',
		array('/rights/authItem/permissions'),array('class'=> ($this->getUniqueId().'/'.$this->getAction()->getId()=='rights/authItem/permissions')?'selected_lk':'')	); ?>
	</li>
	<li><?php echo CHtml::link('<span class="l"><span></span></span><span class="m"><em>'.Rights::t('core', 'Roles').'</em><span></span></span><span class="r"><span></span></span>',
		array('/rights/authItem/roles'),array('class'=> ($this->getUniqueId().'/'.$this->getAction()->getId()=='rights/authItem/roles')?'selected_lk':'')	); ?>
	</li>
	<li><?php echo CHtml::link('<span class="l"><span></span></span><span class="m"><em>'.Rights::t('core', 'Tasks').'</em><span></span></span><span class="r"><span></span></span>',
		array('/rights/authItem/tasks'),array('class'=> ($this->getUniqueId().'/'.$this->getAction()->getId()=='rights/authItem/tasks')?'selected_lk':'')	); ?>
	</li>
	<li><?php echo CHtml::link('<span class="l"><span></span></span><span class="m"><em>'.Rights::t('core', 'Operations').'</em><span></span></span><span class="r"><span></span></span>',
		array('/rights/authItem/operations'),array('class'=> ($this->getUniqueId().'/'.$this->getAction()->getId()=='rights/authItem/operations')?'selected_lk':'')	); ?>
	</li>
	
</ul>
