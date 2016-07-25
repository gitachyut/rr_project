<?php
/**
 *
 */
class Auth
{
  public static function init($value,$exp=''){
    if($exp == ''){
      $exp = time() + (86400 * 30);
    }
    $_SESSION['Auth'] = $value;
    setcookie('Auth', $value ,$exp ,'/','','',true);
  }

  public static function check(){
    if(isset($_COOKIE["Auth"])){
      if($_COOKIE["Auth"] == $_SESSION['Auth'] ){
        return true;
      }else{
        return false;
      }
    }
  }

  public static function logout(){
      unset($_SESSION['Auth']);
      setcookie('Auth', '' ,time() - 30  ,'/');
  }



}
