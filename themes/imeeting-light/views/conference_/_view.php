<div class="view">
<?php
	$salt = BigBlueButtonConfig::getSalt();
	$url = BigBlueButtonConfig::getUrl();
	//get room info
	$response = BigBlueButton::getMeetingInfoArray( $data->id, $data->moderator_pw, $url, $salt ) ;
	$concurrentUser =0; 
	//$concurrentUser = BigBlueButton::countUsers( $data->id, $data->moderator_pw, $url, $salt ) ;
	
	//print_r($concurrentUser);

?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->company->name .' - '. $data->name), array('conference/join', 'room'=>$data->id), array('class'=>'white-title')); ?>
	
	<?php //echo CHtml::encode($data->name); ?>
	<br />
		
	<b>Trạng thái phòng hội thảo:</b>
	<?php
	if(array_key_exists ('returncode', $response)){
	 	if($response['returncode'] == 'FAILED'){
			echo 'Chưa bắt đầu';
		}
		else if($response['returncode'] == 'SUCCESS'){
			echo 'Đã bắt đầu';
		}
	}
	else{
		echo 'Đang hoạt động';
		$concurrentUser = count($response['attendees']);
	}
	?>
	
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_limit')); ?>:</b>
	<?php echo $concurrentUser.'/'. CHtml::encode($data->user_limit); ?>
	<br />
	
		<?php echo CHtml::link('Thông tin phòng', array('view', 'id'=>$data->id), array('class'=>'white-title')); ?>
	<br />

</div>