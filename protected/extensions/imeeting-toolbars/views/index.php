
<div id="navcontainer" align="right"  >
	<ul style="width:500px" >
		
		
		<?php if($mod) { ?>
			
		<?php if(isset($model) && $model->id){ ?>
		
				<li style="width:80px"><?php echo CHtml::link('<img src="'. $this->_assetUrl.'/images/remove.png" alt="Xóa"/><span class="item-title" >Xóa</span>',array($controller.'/delete', 'id' => $model->id),array('submit'=>array('delete','id'=>$model->id),'confirm'=>Yii::t('conference','Bạn có chắc chắn xóa?'))); ?></li>
				<li style="width:80px"><?php echo CHtml::link('<img src="'. $this->_assetUrl.'/images/edit.png" alt="Chỉnh sửa"/><span class="item-title" >' . Yii::t('conference','Chỉnh sửa') .'</span>',array($controller.'/update', 'id' => $model->id)); ?></li>
		<?php } else {
			?>
			
			<li style="width:80px"><?php echo CHtml::link('<img src="'. $this->_assetUrl.'/images/remove.png" alt="Xóa"/><span class="item-title" >Xóa</span>',array('#'),array('class'=>'btn_disabled')); ?></li>
			<li style="width:80px"><?php echo CHtml::link('<img src="'. $this->_assetUrl.'/images/edit.png" alt="Chỉnh sửa"/><span class="item-title" >' . Yii::t('conference','Chỉnh sửa') .'</span>',array('#'),array('class'=>'btn_disabled')); ?></li>
		<?php
		}
		?>
			<li style="width:80px"><?php echo CHtml::link('<img src="'. $this->_assetUrl.'/images/add.png" alt="Thêm"/><span class="item-title" >' . Yii::t('conference','Thêm') .'</span>',array($controller.'/create')); ?></li>
			<li style="width:80px"><?php echo CHtml::link('<img src="'. $this->_assetUrl.'/images/man.png" alt="Quản lý"/><span class="item-title" >' . Yii::t('conference','Quản lý') .'</span>',array($controller.'/admin')); ?></li>
			<?php if($index) { 
				if($controller=='conference')
					$indexName = Yii::t('conference','Chọn phòng họp');	
			?>
			
			<li style="width:80px"><?php echo CHtml::link('<img src="'. $this->_assetUrl.'/images/list.png" alt="Danh sách"/><span class="item-title" >'.$indexName.'</span>',array($controller.'/index')); ?></li>
			<?php } ?>
		<?php
		}else {
			?>
			<li style="width:80px"><?php echo CHtml::link('<img src="'. $this->_assetUrl.'/images/list.png" alt="Danh sách phòng họp"/><span class="item-title" >' . Yii::t('conference','Danh sách') .'</span>',array($controller.'/index'));?> 
			</li>
			
			<?php
		}
		?>
		
	</ul>
</div>