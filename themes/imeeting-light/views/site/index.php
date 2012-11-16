<?php $this->pageTitle=Yii::app()->name; ?>


<div id="cols2">
<img src="/images/home.jpg" class="homepageIcon" alt="iMeeting Web Conference">

<div id="col-left" class="box" style="float:left;width:600px">            
        <h1>Full Featured Web Conferencing</h1>
        <div class="col-text home-features" style="font-size: 12pt">
            <h4>
                <img src="/images/podcast.png" class="homepageIcon" alt="Webinars and Collaborative Online Meetings">Hold
                Large or Small Meetings</h4>
            <p>
                With meeting sizes of up to <strong>200 participants</strong>, you can host a large
                webinar or a small collaborative online meeting, for free.
            </p>
            <br>
			<h4>
                <img src="/images/screen_aqua.png" class="homepageIcon" alt="application sharing and screen sharing">Share
                Your Screen</h4>
            <p>
                Your audience will be able to see anything you choose to show them on your screen,
                so it doesn't get any easier.</p>
            <br>
            <h4>
                <img src="/images/mail_check.png" class="homepageIcon" alt="webinar service invitation system">Send
                Meeting Invitations &amp; Create Custom Registration Forms</h4>
            <p>
                Simply enter the emails of your participants, and they will be sent a link to join
                your webinar, along with time, date and instructions to join.
            </p>                				
            <br>                
            <h4>
                <img src="/images/webcam.png" class="homepageIcon" alt="video web conferencing">Live
                Video Conferencing</h4>
            <p>
                Use your webcam to add that personal touch, it’s almost like being there in person.
                Up to 6 people can video conference simultaneously.</p>
            <br>
            <h4>
                <img src="/images/show_reel.png" class="homepageIcon" alt="web conferencing recording">Record
                Your Meetings</h4>
            <p>
                Want to record a live meeting? Just click the record button during your meeting.
                We even host your recordings so you can share them easily.
            </p>
            <br>
			
            <h4>
				<img src="/images/lifesaver.png" class="homepageIcon" alt="video web conferencing" style="padding-bottom: 40px;">
                Great Support</h4>
            <p>					
                Web based support and video tutorials can be accessed anytime on the <a href="http://support.imeeting.com/" target="_blank">imeeting Customer Support Website</a>. Email support is provided
                by our expert staff.</p>                
            <br>

			More features and detailed descriptions are available <a href="/Free-Web-Conferencing-Features.aspx" title="web conferencing features">on our Features page</a>.
			<br>
			<br>
            </div>

            <h1 class="homepageSection">
            Frequently Asked Questions</h1>

            <div class="col-text home-features">
            <p>
            <strong>How can it be free?&nbsp; What’s the catch?</strong>
		    <br>
		    imeeting provides its services at no cost because the software is supported by
		    advertising.&nbsp; Advertisements appear in a non-intrusive way during your meetings and in the account management tools, are high-quality, and generally targeted to business
		    professionals.<strong>
		        <br>
		        <br>
		        Can I turn off the ads?</strong>
		    <br>
		    Absolutely!&nbsp; Even though advertisements make it possible for imeeting to
		    provide its services at no cost to its members, they can be turned off at any time by
		    signing up for one of our low cost subscription plans. &nbsp; <strong>
		        <br>
		        <br>
		        How do I get started?</strong>
		    <br>
		    Easy, just click here to <a href="http://www.imeeting.com/AccountManager/imeetingSignUp.aspx">
		        sign up for a 100% free imeeting account</a>.  
		        Or if you don't want ads, <a href="/landing/buy/Signupimeeting25.aspx">subscribe to an ad-free 25 Attendee account</a>, 
		        or <a href="/landing/buy/Signupimeeting200.aspx">or an ad-free 200 Attendee account</a>.
		        </p>
		        </div>
		
		        <div>
		    
		</div>           
    </div>
    
<div id="col-right" style="float:left;width: 260px; padding-left: 20px">
	
		
	
	<?php /** @var BootActiveForm $form */
	
	if(Yii::app()->user->isGuest) {
		$form = $this->beginWidget('bootstrap.widgets.BootActiveForm', array(
		    'id'=>'LoginForm',
		 
		    'htmlOptions'=>array('class'=>'box'),
		    'action'=>'index.php?r=/site/login',
		    
		)); ?>
		 
		<?php echo $form->textFieldRow($model, 'username', array('class'=>'span3')); ?>
		<?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>
		<?php //echo $form->checkboxRow($model, 'remember'); ?>
		<?php $this->widget('bootstrap.widgets.BootButton', array('buttonType'=>'submit', 'icon'=>'ok', 'label'=>'Submit')); ?>
		 
		<?php $this->endWidget(); 
	}
	?>
	<img width="300px" src="images/banner.jpg" title="iMeeting video conference" style="padding-bottom: 20px"/>
	</div>
</div>