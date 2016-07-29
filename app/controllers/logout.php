<?php
/**
 *
 */
class logout extends MainController
{
  public function index(){
    $this->model('logout')->remove_session_token(Auth::logout());
    redirect('register');
  }
}




 ?>
