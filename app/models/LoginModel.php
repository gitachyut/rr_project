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
      $pass = DB::table('users')->select('user_id','password')
                    ->where('email', $_POST['email'])
                    ->get();

      $hash = $pass[0]["password"];
      if(password_verify($_POST['password'], $hash)){
        return $pass[0]["user_id"];
      }else{
        return 'ERROR_WEPC';
      }
    }else{
      return 'ERROR_IEI';
    }

  }

  public function register_session_token($id,$hash){
    $output =   DB::table('users_meta')->insertGetId(
          [
            'user_id' => $id ,
            'session_token' =>$hash
          ]
        );
    return $output;
  }


}


 ?>
