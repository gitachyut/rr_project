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
 $GLOBALS['DB'] =[
   'driver'=>'mysql',
   'host' => 'localhost',
   'user' => 'root',
   'password' =>'12345',
   'database'=>'rr_project'
 ];



 ?>
