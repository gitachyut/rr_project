<?php
/**
 * Session flash class
 */
class SessionSet
{
  
  public function flash_set($name,$msg){
    $_SESSION[$name]= $msg;
  }
  public  function flash_get($name){
    if(isset($_SESSION[$name])){
      $msg = $_SESSION[$name];
      unset($_SESSION[$name]);
      return $msg;
    }
  }



}



 ?>
