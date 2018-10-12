<?php

define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', dirname(DIRECTORY_SEPARATOR));
define('CORE', ROOT.DS.'core');
define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME'])));
if (stripos($_SERVER['SERVER_SOFTWARE'], "Win")) {
	define('BASE_URL',dirname(dirname($_SERVER['SCRIPT_NAME']))."/");
}

// die(BASE_URL);

require CORE.DS.'includes.php';
$dispatcher = new Dispatcher;

// $model = new Model();
// $model->connectWebsite();
// $model->connectTeamspeak();