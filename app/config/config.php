<?php
/**
 * All configuration info need to be set here
 */


/**
 * session settings
 */
ini_set("session.cookie_httponly", 1);
session_name('rr_project');
session_start();
session_regenerate_id(true);
define('SECURE_SESSION',true);

/**
*  Debug mode on/off option
*/

define('DEBUG',true);

/*
* Set your database credentials here
*/
define('Driver','mysql');
define('Host','localhost');
define('DBUser','root');
define('DBPassword','12345');
define('Database','rr_project');

/*
* Set Base URL
*/
define('BASE_URL','http://localhost/rr_project');

/*
* Set Default Controller
* eg; $GLOBALS['ROUTE'] = "Welcome/hello";
*/
$GLOBALS['DEFAULT_ROUTE'] = "Welcome";


?>
