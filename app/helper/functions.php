<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
* Helper functions are written here.
*
*/


  function base_url(){
      $url = BASE_URL;
      return $url;
  }// base_url function ends here
  function redirect($arg){
      $url = BASE_URL.'/'.$arg;
      header("HTTP/1.1 301 Moved Permanently");
      header('Location:'.$url);
  }

  function _e($str){
   return  htmlspecialchars($str);
  }
  function f_name($str){
   $str =  explode(' ',$str);
   return $str[0];
  }

 ?>
