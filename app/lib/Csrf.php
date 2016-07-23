<?php
/**
 * This class fllows the singleton design pattern . This class is for
 * CSRF attack prevention.
 */
class Csrf
{
  private static $token = null, $x = null;
  public static function csrf_token(){
    if(self::$token == null){
      self::$token = new Csrf();
      self::$x =  self::$token->csrf_token_gen();
      return self::$x;
    }else{
      return self::$x;
    }

  }
  private static function csrf_token_gen(){
    $uniq = uniqid();
    $hash = hash('sha1',$uniq);
    $_SESSION['csrf_session'] = $hash;
    return $hash;
  }

  public static function check_token($val){
    if(isset($_SESSION['csrf_session'])){
        $x = $_SESSION['csrf_session'];
        unset($_SESSION['csrf_session']);
        if($val == $x)
          return true;
        else
          return false;
    }else{
      return false;
    }

  }
}




 ?>
