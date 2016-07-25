<?php
/**
 *
 */
class Dashboard extends MainController
{
  public function index(){
    if(Auth::check()){
        $this->view('dashboard');
    }else{
      redirect('register');
    }
  }
}



 ?>
