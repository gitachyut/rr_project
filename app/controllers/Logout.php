<?php
/**
 *
 */
class Logout extends MainController
{
  public function index(){
    Auth::logout();
    redirect('register');
  }
}




 ?>
