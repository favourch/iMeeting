<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../../../../../WebServer/www/yii/framework/yii.php';
//$yii= 'D:\WebServer\www\yii\framework\yii.php';

$hostname = $_SERVER['SERVER_NAME'];
switch ( strtolower($hostname))
{

	case 'local.imeeting.vn':
		$config=dirname(__FILE__).'/protected/config/local.imeeting.vn.php';
		// database 1
	break;
 
	default:
	$config=dirname(__FILE__).'/protected/config/main.php';
}





// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
