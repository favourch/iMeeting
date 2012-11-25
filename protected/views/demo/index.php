	<div  style="width: 960px; height: 400px; padding-top: 20px; margin-top: 10px">
	<div style="width: 400px;height: 250px;display: block;float: left;">
	<h2><?php echo Yii::t('common','Dùng thử dịch vụ iMeeting');?></h2>
	<?php
	
	echo $this->renderPartial('_form'); 
	?>
	<br/>
	<br/>
	<br/>
	<p><strong><?php echo Yii::t('common','Chú ý');?>:</strong> <?php echo Yii::t('common','Bạn cần có webcam, headphone, và microphone để sử dụng đầy đủ chức năng');?></p>
	
	<script src="js/flash_detect_min.js"></script>
	<script type="text/javascript"> 
	if(!FlashDetect.installed){
		document.write("<br/><font color='red'>" + "<?php echo Yii::t('common','Trình duyệt của bạn chưa cài Flash') ;?>" +"</font>. " + "<?php echo Yii::t('common','Vui lòng vào'); ?>" + " <a href='get.adobe.com/flashplayer'>http://get.adobe.com/flashplayer </a> để cài đặt");     	
	}else{
		document.write("<br/> <font color='#A6A6A6'>" + "<?php echo Yii::t('common','Bạn đã sẵn sàng sử dụng iMeeting'); ?>" + " (Flash:"  + FlashDetect.major + "." + FlashDetect.minor+  "." + FlashDetect.revision + ") </font>");
	}
	</script>	

	
	</div>
	<div style="width: 535px;height: 400px;display: block;float: right; padding-left: 20px">
		<div style="padding-left: 25px;"><img src="images/demo-2.png" title="iMeeting demo" /></div>
		<!--<img src="images/features.jpg" title="iMeeting features" />-->
		<br/>
		<div style="padding-top: 10px">
			<h2>iMeeting</h2>
			<p>
				<?php echo Yii::t('common','iMeeting là dịch vụ hội thảo trực tuyến trên nền tảng web cung cấp nhiều tính năng ưu việt');?>:
				
			</p>
			<ul>
				<li><?php echo Yii::t('common','Hỗ trợ trình diễn nội dung (PowerPoint hay PDF), trình diễn bảng.');?></li>
				<li><?php echo Yii::t('common','Tán gẫu, hoặc nói chuyện trực tiếp Voip, và có thể chia sẽ màn hình làm việc.');?></li>
				<li><?php echo Yii::t('common','Tất cả cuộc họp đều có thể lưu và xem lại được.');?></li>
			</ul>
		</div>
	</div>
	
</div>