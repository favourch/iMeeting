<?php
$this->breadcrumbs=array(
	'Videoses'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Videos', 'url'=>array('index')),
	array('label'=>'Create Videos', 'url'=>array('create')),
	array('label'=>'Update Videos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Videos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Videos', 'url'=>array('admin')),
);
?>

<h2><?php echo CHtml::link(Yii::t('menu','Danh sách video'), array('videos/index'), array('class'=>'watch-title')); ?> - <?php echo $model->name; ?></h2>

<div class="watch-video">
	<?php
	echo $model->content;
 ?>
</div>
<div class="top_video">
	<?php foreach($list as $video){
			?>
			<div class="video">
				<?php echo CHtml::link('<img class="thumbnail" src="'. $video['image']  .'" alt="'.$video['name'].'" />', array('view', 'id'=>$video['id'])); ?>
				<p class="video_title"><?php echo CHtml::encode($video['name']); ?></p>
			</div>
			<?php
			}
	?>
	
</div>
