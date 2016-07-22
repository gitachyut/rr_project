<?php
/**
 * All configuration info need to be set here
 */
session_start();
session_regenerate_id(true);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
define('BASE_URL','http://localhost');
define('URL',$_SERVER["REQUEST_URI"]);

 ?>
