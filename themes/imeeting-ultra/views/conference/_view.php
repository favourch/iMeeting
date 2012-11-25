<div class="view">
<?php
	$salt = BigBlueButtonConfig::getSalt();
	$url = BigBlueButtonConfig::getUrl();
	//get room info
	$bbb = new BigBlueButton();
	$response = $bbb->getMeetingInfoArray( $data->id, $data->moderator_pw, $url, $salt ) ;
	$concurrentUser =0; 
	//$concurrentUser = BigBlueButton::countUsers( $data->id, $data->moderator_pw, $url, $salt ) ;
	
	//print_r($concurrentUser);

?>
	<br/>
	<b><?php echo Yii::t('conference','Trạng thái phòng hội thảo');?>:</b>
	<?php
	if(array_key_exists ('returncode', $response) ){
	 	if($response['returncode'] == 'FAILED'){
			echo Yii::t('conference','Chưa bắt đầu');
		}
		else if($response['returncode'] == 'SUCCESS'){
			echo Yii::t('conference','Đã bắt đầu');
		}
	}
	else if ($response['running'] == 'false'){
		echo Yii::t('conference','Chưa hoạt động');
		
		//$concurrentUser = count($response['attendees']);
		//var_dump($response['attendees']);
	}else{
		$concurrentUser =intval($bbb->countUsers( $data->id, $data->moderator_pw, $url, $salt )) ;
		
	}
	?>
	
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_limit')); ?>:</b>
	<?php echo $concurrentUser.'/'. CHtml::encode($data->user_limit); ?>
	<br />
	
		<?php echo CHtml::link(Yii::t('conference','Thông tin chi tiết phòng họp'), array('view', 'id'=>$data->id), array('class'=>'white-title')); ?>
	<br />


</div>