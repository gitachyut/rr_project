<?php

/**
 *
 */
class LoginModel extends MainModel
{
  public function check(){
    $count  = DB::table('users')
                ->where('email', $_POST['email'])
                ->count();
    if($count == 1){
      $pass = DB::table('users')->select('password')
                    ->where('email', $_POST['email'])
                    ->get();

      $hash = $pass[0]["password"];
      if(password_verify($_POST['password'], $hash)){
        return 'YES';
      }else{
        return 'WEPC';
      }
    }else{
      return 'IEI';
    }

  }
}


 ?>
