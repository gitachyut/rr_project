<?php
/**
 *  Register Model
 */
class RegisterModel extends MainModel
{
  public function register(){
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $count  = DB::table('users')
                ->where('email', $_POST['email'])
                ->count();
    if($count == 0){
      $output =   DB::table('users')->insertGetId(
            [
              'username' => $_POST['username'] ,
              'email' => $_POST['email'],
              'age' => $_POST['age'],
              'password' =>$password
            ],'user_id'
          );
      return $output;
    }else{
      return false;
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
