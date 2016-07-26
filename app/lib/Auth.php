<?php
/**
 *
 */
class Auth
{
  private static $_Hash ;
  private static $_Remember;
  private static $_Table = 'users_meta';
  private static $_Filed =  'session_token';
  public static function init($remember=false,$exp=''){
    if($remember){
        $exp = time() + (86400 * 30);
     }else{
      if($exp == ''  ){
        $exp = time() + (86400 * 1);
      }else{
        $exp = time() + $exp;
      }
    }
    Auth::$_Hash = hash('sha1', uniqid());
    setcookie('Auth', Auth::$_Hash ,$exp ,'/','','',true);
    return Auth::$_Hash;
  }

  public static function reinit($remember=false,$exp=''){
    $old = Auth::$_Hash;
    if($remember){
        $exp = time() + (86400 * 30);
    }else{
      if($exp == ''  ){
        $exp = time() + (86400 * 1);
      }else{
        $exp = time() + $exp;
      }
    }
    Auth::$_Hash = hash('sha1', uniqid());
    setcookie('Auth', Auth::$_Hash ,$exp ,'/','','',true);
    return ['oldhash'=>$old, 'newhash' =>Auth::$_Hash ];
  }


  public static function check(){
    if(isset($_COOKIE["Auth"])){
      $return = DB::table(self::$_Table)->select('user_id')
                    ->where(self::$_Filed, $_COOKIE["Auth"])
                    ->get();
      if($return[0]['user_id']){
        return $return[0]['user_id'];
      }else{
        return false;
      }
    }
  }

  public static function logout(){
      $val = $_COOKIE['Auth'];
      setcookie('Auth', '' ,time() - 30  ,'/');
      return $val;
  }



}
