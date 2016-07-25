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
  public function form_error_set($name,$msg){
    $_SESSION['form'][$name]= $msg;
  }
  public  function form_error($name){
    if(isset($_SESSION['form'][$name])){
      $msg = $_SESSION['form'][$name];
      unset($_SESSION['form'][$name]);
      return $msg;
    }
  }
  public function form_value_set($name,$msg){
    $_SESSION['form_value'][$name]= $msg;
  }
  public  function form_value($name){
    if(isset($_SESSION['form_value'][$name])){
      $msg = $_SESSION['form_value'][$name];
      unset($_SESSION['form_value'][$name]);
      return $msg;
    }
  }

  public  function unset_form_value(){
      unset($_SESSION['form_value']);
  }

}



 ?>
