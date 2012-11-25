<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('room_dir_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->room)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('path')); ?>:
	<?php echo GxHtml::encode($data->path); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('filename')); ?>:
	<?php echo GxHtml::encode($data->filename); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('meeting_time')); ?>:
	<?php echo GxHtml::encode($data->meeting_time); ?>
	<br />

</div>