<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="vi" />
	
<meta name="google-site-verification" content="Cl62GPvIbnjrUgXkiNA9qnD6brv01Ynkeqlh-posoyg" />
<meta name="google-site-verification" content="_n3PgHOkCz84O2O20AUcsfu5FMC6Vq49ucUTaWYAK0M" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<!-- blueprint CSS framework -->
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />-->
	
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->
	<link rel="icon" type="image/png" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	
	
	
	<link media="screen" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/imeeting-ultra/admin.css">
	
	<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin-ie.css" /><![endif]-->
	
	<!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin-ie.css" />-->
	<script type="text/javascript" src="js/behaviour.js"></script>
	
	<!-- Start Uniform JS -->
	<?php 

		$this->widget('ext.uniformjs.UniformJSWidget'); ?>
	
	 <script type="text/javascript" charset="utf-8">
      $(function(){
        //$("input, textarea, select, button").uniform();
        $("input, textarea, select, button").uniform();
      });
    </script>
    <!-- End Uniform JS -->
</head>

<body>

<!--<div class="container" id="page">-->
<div id="wrapper">
	<div class="container">
	<div class="inner">
	<div id="header" style="align:center">
		<div id="logo-normal">
		<a href="index.php">	
		<img src="images/logo.png" width="190px" title="<?php echo CHtml::encode(Yii::app()->name); ?>" />
		</a>
		<div  id="language-selector" style="float:right; margin-top:30px; padding-right: 12px">
		    <?php 
		        $this->widget('application.components.widgets.LanguageSelector');
		    ?>
		</div>
		</div>
	</div><!-- header -->
</div>
	<?php require_once('_menu.php'); ?>
	<?php 
	 //setting lang
	 /*
	 if (isset($_POST['lang']) || isset($_GET['lang']))
        {
            	
            Yii::app()->language = isset($_POST['lang'])?$_POST['lang']:$_GET['lang'];
            Yii::app()->session['lang'] = Yii::app()->language;
			Yii::app()->user->setState('language',Yii::app()->language);
			 Yii::app()->setLanguage(isset($_SESSION['lang'])?$_SESSION['lang']:'vi');
        }
        else if (isset(Yii::app()->session['_lang']))
        {
            Yii::app()->language = Yii::app()->session['_lang'];
			Yii::app()->user->setState('language',Yii::app()->language);
			 Yii::app()->setLanguage(isset($_SESSION['lang'])?$_SESSION['lang']:'vi');
        }*/
	?>
	<?php
	 /*
	if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif
	*/
	?>

	
	<?php
	//echo Yii::app()->controller->id;
	 if(Yii::app()->controller->id =='login') {
		?>
	<div style="float:left; width:1000px; height: 16px"></div>
	<div style="width:1000px; height:235px; padding-bottom: 0px" >
		<div style="float:left; width:20"><img src="images/border-left.png" /></div>
		<div style="float:left;width:980">	 
			<div style="float:left;width:980">
				<div style="float:left; width:960px">
					<?php 
					$this->widget('ext.lofslidernews.LofSliderWidget');
					?>
					<!--<img height="205px" width="960px" src="images/banner-1.png" />-->
					<img src="images/border-bottom.png" />
				</div>
				<div style="float:left; width:20px"><img src="images/border-right.png" /></div>
			</div>
		</div>
		
		
	</div>
	<?php } ?>
	<?php $this->widget('ext.Flashes'); ?>
	<?php echo $content; ?>
	

	
		<div class="inner">
			<div id="footer">
		<div style="float:left">
		Copyright &copy; <?php echo date('Y'); ?> by iMeeting.<br/>
		All Rights Reserved.<br/>
		</div>
		<div style="float: right">
			<!-- Place this tag where you want the +1 button to render -->
<!-- Place this tag where you want the +1 button to render -->
<g:plusone annotation="none"></g:plusone>

<!-- Place this render call where appropriate -->
<!--
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
-->
<a href="http://www.youtube.com/user/imeetingvietnam"><img src="images/youtube.png" width="25px" title="iMeeting on Youtube" /></a>
			
			<a href="https://plus.google.com/share?url=www.imeeting.vn" ><img src="images/google_plus.png" alt="Google+" title="Google+" width="25px" /></a>			
			<a href="http://www.facebook.com/imeeting.vn"><img src="images/facebook.png" width="25px" title="iMeeting on Facebook" /></a>
			<a href="http://twitter.com/#!/imeeting"><img src="images/twitter.png" width="25px" title="iMeeting on Twitter" /></a>
		</div>	
	</div><!-- footer inner -->
	</div><!-- footer -->


<div><!-- container -->
</div> <!-- wrapper -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-30664052-1']);
  _gaq.push(['_setDomainName', 'imeeting.vn']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body>
</html>

