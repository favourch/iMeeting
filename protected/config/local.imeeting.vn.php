<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'iMeeting - Họp trực tuyến, Hội nghị truyền hình, Web Conference, Video conference, hop truc tuyen, hoi nghi truyen hinh',
	'language' => 'vi',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.modules.user.models.*',
	    'application.modules.user.components.*',
	    'application.modules.rights.*', 
	    'application.modules.rights.components.*',
	    'ext.yii-mail.YiiMailMessage',
	    'ext.giix-components.*', // giix components
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
		 'user'=>array(
		 	'tableUsers' => 'tbl_users',
		  	'tableProfiles' => 'tbl_profiles',
		  	'tableProfileFields' => 'tbl_profiles_fields',
		  	'returnUrl' => array('/conference'),
		),
		'rights'=>array( 'install'=>false, 
		),
		
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'Ur123465',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','202.87.212.4','115.74.78.238'),
      	    'generatorPaths'=>array(
           		//'bootstrap.gii', // since 0.9.1
           		'ext.giix-core', // giix generators
      		 ),
		),
		
	
		'wdcalendar'    => array(
			//'admin' => 'install' 
			   'embed' => false ,
		),
		
		
	),
	 'behaviors'=>array(
        'onBeginRequest' => array(
            'class' => 'application.components.behaviors.BeginRequest'
        ),
    ),
	// application components
	'components'=>array(
		'bootstrap'=>array(
	        'class'=>'ext.bootstrap.components.Bootstrap', // assuming you extracted bootstrap under extensions
    	),
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
			'loginUrl' => array('/user/login'),
			'class' => 'RWebUser',
			
		),
		'authManager'=>array( 
			'class'=>'RDbAuthManager', 
			'connectionID'=>'db', 
			 //'defaultRoles'=>array('Authenticated'),
		),
		
		'mail' =>array(
			'class' => 'ext.yii-mail.YiiMail',
			'transportType' => 'smtp',
 			'viewPath' => 'application.views.mail',
 			'logging' => true,
 			'dryRun' => false
		),
		 'request'=>array(
            'enableCookieValidation'=>true,
            //'enableCsrfValidation'=>true,
        ),
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/
		/*
		'db'=>array(
			'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
		),
		// uncomment the following to use a MySQL database
		*/
		'db'=>array(
			'connectionString' => 'mysql:host=127.0.0.1;dbname=imeeting_db',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '',
			'charset' => 'utf8',
			/* for development */
			'enableProfiling' => true,
			'enableParamLogging' => true,
			
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				 array(
                'class'=>'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                'ipFilters'=>array('127.0.0.1','202.87.212.4'),
            ),
            	/*
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),*/
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),
	'defaultController'=>'user/login',
	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'sales@imeeting.vn',
		'adminName' => 'Info iMeeting',
		'authEmail'=>'info@imeeting.vn',
		'authPassword'=>'info!@#1',
		'languages'=>array('vi' => 'Tiếng Việt','en'=>'English'),
	),
);