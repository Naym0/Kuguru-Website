<?php
require_once __DIR__ . '/vendor/autoload.php';
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 */
define('ENVIRONMENT', isset($_SERVER['APP_ENV'])?$_SERVER['APP_ENV']:'development'); 

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
switch (ENVIRONMENT) {
	case 'development':
		error_reporting(-1); 
		ini_set('display_errors', 1); 
	break; 

	case 'testing':
	case 'production':
		ini_set('display_errors', 0); 
		if (version_compare(PHP_VERSION, '5.3', '>=')) {
			error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED); 
		}
		else {
			error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE); 
		}
	break; 

	default:
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503); 
		echo 'The application environment is not set correctly.'; 
		exit(1); // EXIT_ERROR
}

$dotenv=Dotenv\Dotenv::create(__DIR__); 
$dotenv->load(); 

define('BASE_URL', getenv('BASEPATH'));
define('ORDER_BASEURL', getenv('ORDER_BASEURL'));
define('ASSETS_URL', BASE_URL.'/assets');

// Paths
define('BASEPATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
define('ASSETS_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'assets'.DIRECTORY_SEPARATOR);
define('INC_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR.'inc'.DIRECTORY_SEPARATOR);

define('DS', DIRECTORY_SEPARATOR);