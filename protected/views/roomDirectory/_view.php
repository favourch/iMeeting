<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('room_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->room)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('directory')); ?>:
	<?php echo GxHtml::encode($data->directory); ?>
	<br />

</div>