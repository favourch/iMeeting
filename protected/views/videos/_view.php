<div class="list-video" align="center">
	<?php echo CHtml::link('<img src="'. $data->image  .'" alt="'.$data->name.'" />', array('view', 'id'=>$data->id)); ?>
	<br/>
	<?php echo CHtml::encode($data->name); ?>
</div>