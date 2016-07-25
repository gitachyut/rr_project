<?php

/**
 *
 */
class Login extends MainController
{
  public function index(){
    if(Auth::check()){
        redirect('dashboard');
    }else{
      $this->formvalidation = $this->library('FormValidation');
      $this->view('login');
    }
  }
  public function checking(){
    $this->formvalidation = $this->library('FormValidation');
    if(isset($_POST)){
      if(Csrf::check_token(isset($_POST['csrf_token']))){
        $this->formvalidation->set_rule('email','Email','/^[A-z0-9]{2,}@[A-z0-9]{2,}\.[a-z]{2,}$/');
        if($this->formvalidation->run()){
          $this->login= $this->model('login');
          if($this->login->check() == 'YES')
          {
            $hash = hash('sha1', uniqid());
            Auth::init(  $hash );
            redirect('dashboard');
          }elseif($this->login->check() == 'WEPC'){
            $this->formvalidation->flash->flash_set('error','<p class="alert alert-dismissible alert-danger">
            Wrong Email Password Combination!</p>');
            redirect('login');
          }else{
            $this->formvalidation->flash->flash_set('error','<p class="alert alert-dismissible alert-danger">
            You Are Not A Registred User!</p>');
            redirect('login');
          }

        }else{
          redirect('login');
        }
      }else{
        $this->view('error/error_csrf');
      }
    }
  }
}
