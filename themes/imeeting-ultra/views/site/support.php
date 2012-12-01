<?php $this->pageTitle=Yii::app()->name; ?>
<?php //echo __FILE__; ?>
<?php //echo $this->getLayoutFile('main'); ?>
<?php
//$this->widget('ext.lofslidernews.LofSliderWidget');



?>
<style>
	#banner_boder {
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	-moz-border-radius: 10px;
	-webkit-border-radius: 10px;
	border-radius: 10px;
	}
</style>
	<div style="padding-left:20px" >
		<div style="float: left; width: 400px; padding-top: 15px; padding-left: 20px">
			<div class="row" style="height: 80px">
				<img width=100 height=80 class="thumbnail" src="images/phone.png" title="Phone"/>
				<p class="title" style="padding-top: 15px"><?php echo Yii::t('menu','08 - 2229 7648'); ?>
				<br><?php echo Yii::t('common','Kinh doanh'); ?>: 0988.369.516
				<br><?php echo Yii::t('common','Kỹ thuật'); ?>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 0908.990.855</p>
			</div>
			<div class="row" style="height: 80px">
				<img  width=100 height=80 class="thumbnail" src="images/email.png" title="Email"/>
				<p class="title" style="padding-top: 15px">sales@imeeting.vn</p>
			</div>
			<div class="row" style="height: 80px">
				<img  width=100 height=80 class="thumbnail" src="images/chat.png" title="Online support"/>

				<p class="title" style="padding-top: 15px"><?php echo Yii::t('common','Hỗ trợ trực tuyến'); ?>


				</p>
				<!--
Skype 'Skype Me™!' button
http://www.skype.com/go/skypebuttons
-->
<!--<script type="text/javascript" src="http://download.skype.com/share/skypebuttons/js/skypeCheck.js"></script>-->

 <a href="skype:trung.le.tran?call" ><img src="http://download.skype.com/share/skypebuttons/buttons/call_blue_transparent_34x34.png" style="border: none;" width="34" height="34" alt="Skype Me™!" /></a>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 <a href="skype:nxtnhan?call"><img src="http://download.skype.com/share/skypebuttons/buttons/call_blue_transparent_34x34.png" style="border: none;" width="34" height="34" alt="Skype Me™!" /></a>

<!-- end skype-->
			</div>

		</div>

		<div style="float: left; width: 500px; padding-top: 50px">

			<img src="images/support.png" />
		</div>
		<div style="clear:both"></div>
		<div style="margin-top: 20px;height: 330px" class="demo">
			<div style="width: 100%; padding-top: 20px">
				<div align="center" style="width: 33%; float: left">
					<a href="index.php?r=videos/index"><img height="77px" src="/images/support_video.jpg" title="<?php echo Yii::t('common','Video hướng dẫn'); ?>" /></a>
					<p class="title"><?php echo Yii::t('common','Video hướng dẫn'); ?></p>
					<div align="left"  class="gradient" style="width: 280px;">
						<div style="padding-left:30px">
						<?php
						//var_dump($videos);
							foreach($videos as $video){
								echo '<p>' .CHtml::link(CHtml::encode(Yii::t('common',$video['name'])), array('videos/view', 'id'=>$video['id'])) .'</p>';
						}?>
						</div>
					</div>
				</div>
				<div align="center"  style="width: 33%; float: left">
					<a href="index.php?r=site/page&view=faq"><img height="77px" src="/images/support_faq.jpg" title="<?php echo Yii::t('common','Câu hỏi thường gặp'); ?>" /></a>
					<p class="title"><?php echo Yii::t('common','Câu hỏi thường gặp'); ?></p>
					<div align="left"  class="gradient" style="width: 280px;">
						<div style="padding-left:30px">
							<p><a href="index.php?r=site/page&view=faq#Cai-dat-phan-mem"><?php echo Yii::t('common','Phần mềm cài đặt'); ?></a></p>
							<p><a href="index.php?r=site/page&view=faq#He-dieu-hanh"><?php echo Yii::t('common','Hệ điều hành'); ?></a></p>
							<p><a href="index.php?r=site/page&view=faq#Chi-phi-su-dung"><?php echo Yii::t('common','Chi phí bao nhiêu'); ?></a></p>
							<p><a href="index.php?r=site/page&view=faq#Tap-am-va-tieng-vong"><?php echo Yii::t('common','Tạp âm và tiếng vọng'); ?></a></p>
						</div>
					</div>
				</div>
				<div align="center"  style="width: 33%; float: left"><img height="77px" src="/images/support_download.jpg" title="<?php echo Yii::t('menu','Tài liệu hướng dẫn'); ?>" />
					<p class="title"><?php echo Yii::t('common','Tài liệu hướng dẫn'); ?></p>
					<div align="left" class="gradient" style="width: 280px;">
						<div style="padding-left:30px">
							<p><a href="http://www.imeeting.vn/resources/documents/iMeeting_Introduction.pdf"><?php echo Yii::t('common','Giới thiệu iMeeting'); ?></a></p>
							<p><a href="http://www.imeeting.vn/resources/documents/iMeeting_UserGuide_1.1.pdf"><?php echo Yii::t('common','Hướng dẫn sử dụng iMeeting'); ?></a></p>

							<p><a><?php echo Yii::t('common','Hướng dẫn tạo thành viên'); ?></a></p>
							<p><a><?php echo Yii::t('common','Xem chi phí cước'); ?></a></p>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

<div style="padding-bottom: 10px">&nbsp;</div>