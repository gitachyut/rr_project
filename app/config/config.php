<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * All configuration info need to be set here
 */


/**
 * session settings
 */
ini_set("session.cookie_httponly", 1); // to make the session secure
session_name('rr_project'); // set the session name
session_start();
session_regenerate_id(true); // to make the session secure

/**
*  Debug mode on/off option
*/

define('DEBUG',true);

/*
* Set your Database credentials bellow
*
*/
define('Driver','mysql');
define('Host','localhost');
define('DBUser','root');
define('DBPassword','12345');
define('Database','rr_project');
define('Charset','utf8');
define('Collation','utf8_unicode_ci');

/*
* Set Base URL
* eg; http://localhost or http://localhost/project
*/
define('BASE_URL','http://localhost/rr_project');

/*
* Set Default Controller, set home page
* eg; $GLOBALS['ROUTE'] = "Welcome/hello";
*/
$GLOBALS['DEFAULT_ROUTE'] = "Welcome";


?>
