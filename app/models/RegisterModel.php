<?php
/**
 *  Register Model
 */
class RegisterModel extends MainModel
{
  public function register(){
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    DB::table('users')->insert(
      [
        'username' => $_POST['username'] ,
        'email' => $_POST['email'],
        'age' => $_POST['age'],
        'password' =>$password
      ]
    );

    


  }
}






 ?>
