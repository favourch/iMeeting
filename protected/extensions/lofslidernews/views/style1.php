
<script type="text/javascript">
 $(document).ready( function(){
		// buttons for next and previous item
		var buttons = { previous:$('#jslidernews1 .button-previous') ,
						next:$('#jslidernews1 .button-next') };
		 $('#jslidernews1').lofJSidernews( { interval : 3500,
											direction		: 'opacitys',

											easing			: 'easeInOutExpo',
                      //easing      : 'easeOutElastic',
											duration		: 2000,
											auto		 	: true,
											maxItemDisplay  : 4,
											navPosition     : 'horizontal', // horizontal
											navigatorHeight : 32,
											navigatorWidth  : 80,
											mainWidth		: 960,
											buttons			: buttons } );
	});
</script>


	<div id="container">


<!------------------------------------- THE CONTENT ------------------------------------------------->
<div id="jslidernews1" class="lof-slidecontent" style="width:960px; height:238;">
	<div class="preload"><div></div></div>
    		 <!-- MAIN CONTENT -->
              <div class="main-slider-content" style="width:960px; height:238px;">
                <ul class="sliders-wrap-inner">
                      <li>

                          <img src="/images/banner-2.png" title="HỌP TRỰC TUYẾN" >

                          <div class="slider-description">
                            <div class="slider-meta">
                            <h4>HỌP TRỰC TUYẾN</h4>
                            <p>Giảm chi phí đi lại và vận hành.
                              Cải thiện khả năng chia sẻ, tương tác
                            <!--<a class="readmore" href="#">Read more </a>-->
                            </p>
                         </div>

                    </li>
                     <li>

                          <img src="/images/banner-1.png" title="ĐÀO TẠO TRỰC TUYẾN" >


                          <div class="slider-description">
                          <h4> ĐÀO TẠO TRỰC TUYẾN</h4>
                            <p>Đào tạo mọi lúc mọi nơi nhằm nâng cao kỹ năng cho đội ngũ nhân viên


                            <!--<a class="readmore" href="#">Read more </a>-->
                            </p>
                         </div>

                    </li>

                   <li>
                      <img src="/images/banner-0.png" title="MARKETING TRỰC TUYẾN" >

                          <div class="slider-description">
                             <h4>MARKETING TRỰC TUYẾN</h4>
                            <p>Thúc đẩy doanh số nhờ tăng cường tính tương tác với khách hàng


                            </p>
                         </div>

                    </li>

                    <!--<li>
                      <img src="<?php echo $this->_assetUrl ;?>/images/thumbl_980x340_004.png" title="Chủ đề 5" >
                        <div class="slider-description">
                          <div class="slider-meta"><a target="_parent" title="Chủ đề 4" href="#Category-4">/ Chủ đề 4 /</a>	<i> — Monday, February 15, 2010 12:42</i></div>
                            <h4>Tiêu đề 4</h4>
                            <p>Nội dung 4,...
                            <a class="readmore" href="#">Read more </a>
                            </p>
                         </div>
                    </li>
                    <li>
                      <img src="<?php echo $this->_assetUrl ;?>/images/thumbl_980x340_005.png" title="Chủ đề 5" >
                        <div class="slider-description">
                           <div class="slider-meta"><a target="_parent" title="Chủ đề 5" href="#">/ Chủ đề 5 /</a>	<i> — Monday, February 15, 2010 12:42</i></div>
                           <h4>Tiêu đề 5</h4>
                            <p>Nội dung 5,...
                            <a class="readmore" href="#">Read more </a>
                            </p>
                         </div>
                    </li>
                    <li>

                      <img src="<?php echo $this->_assetUrl ;?>/images/thumbl_980x340_006.png" title="Chủ đề 5" >
                        <div class="slider-description">
                          <div class="slider-meta"><a target="_parent" title="Chủ đề 6" href="#">/ Chủ đề 6 /</a>	<i> — Monday, February 15, 2010 12:42</i></div>
                            <h4>Tiêu đề 6</h4>
                            <p>Nội dung 6,...
                            <a class="readmore" href="#">Read more </a>
                            </p>
                         </div>
                    </li>
                     <li>
                      <img src="<?php echo $this->_assetUrl ;?>/images/thumbl_980x340_007.png" title="Chủ đề 5" >
                        <div class="slider-description">
                          <div class="slider-meta"><a target="_parent" title="Chủ đề 7" href="#">/ Chủ đề 7 /</a>	<i> — Monday, February 15, 2010 12:42</i></div>
                            <h4>Tiêu đề 7</h4>
                            <p>Nội dung 7,...
                            <a class="readmore" href="#">Read more </a>
                            </p>
                         </div>
                    </li>
                      <li>
                      <img src="<?php echo $this->_assetUrl ;?>/images/thumbl_980x340_008.png" title="Chủ đề 8" >
                        <div class="slider-description">

                          <div class="slider-meta"><a target="_parent" title="Chủ đề 8" href="#">/ Chủ đề 8 /</a>	<i> — Monday, February 15, 2010 12:42</i></div>
                            <h4>Tiêu đề 8</h4>
                            <p>Nội dung 8,...
                                <a class="readmore" href="#">Read more </a>
                            </p>
                         </div>
                    </li>
                  -->
                  </ul>
            </div>
 		   <!-- END MAIN CONTENT -->
           <!-- NAVIGATOR -->
          <!--
           	<div class="navigator-content">
                  <div class="button-next">Next</div>
                  <div class="navigator-wrapper">
                        <ul class="navigator-wrap-inner">
                           <li><img src="<?php echo $this->_assetUrl ;?>/images/thumbs/thumbl_980x340.png" /></li>
                           <li><img src="<?php echo $this->_assetUrl ;?>/images/thumbs/thumbl_980x340_002.png" /></li>
                           <li><img src="<?php echo $this->_assetUrl ;?>/images/thumbs/thumbl_980x340_003.png" /></li>
                           <li><img src="<?php echo $this->_assetUrl ;?>/images/thumbs/thumbl_980x340_004.png" /></li>
                           <li><img src="<?php echo $this->_assetUrl ;?>/images/thumbs/thumbl_980x340_005.png" /></li>
                           <li><img src="<?php echo $this->_assetUrl ;?>/images/thumbs/thumbl_980x340_006.png" /></li>
                           <li><img src="<?php echo $this->_assetUrl ;?>/images/thumbs/thumbl_980x340_007.png" /></li>
                           <li><img src="<?php echo $this->_assetUrl ;?>/images/thumbs/thumbl_980x340_008.png" /></li>
                        </ul>
                  </div>
                  <div  class="button-previous">Previous</div>
             </div>
           -->
          <!----------------- END OF NAVIGATOR --------------------->
          <!-- BUTTON PLAY-STOP -->
          <div class="button-control"><span></span></div>
           <!-- END OF BUTTON PLAY-STOP -->

 </div>


<!------------------------------------- END OF THE CONTENT ------------------------------------------------->


    </div>

