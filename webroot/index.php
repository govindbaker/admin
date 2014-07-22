<?php

error_reporting(E_ALL);
ini_set('display_errors', True);

// change the following paths if necessary
$yii=dirname(__FILE__).'/../../yii-1.1.14.f0fee9/framework/yii.php';
$config=dirname(__FILE__).'/../protected/config/main.php';

// remove the following line when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);

//var_dump(phpinfo()); die();

require_once($yii);
Yii::createWebApplication($config)->run();
