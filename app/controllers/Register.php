<?php
/**
 *
 */
class Register extends MainController
{

  public function index($arg){
    if(Auth::check()){
        redirect('dashboard');
    }else{
      $this->formvalidation = $this->library('FormValidation');
      $this->view('register');
    }


  }

  public function addme(){
    $this->formvalidation = $this->library('FormValidation');
    if(isset($_POST)){
      if(Csrf::check_token(isset($_POST['csrf_token']))){
        $this->formvalidation->set_rule('username','User Name','/^[A-z0-9\s]{3,}$/');
        $this->formvalidation->set_rule('email','Email','/^[A-z0-9]{2,}@[A-z0-9]{2,}\.[a-z]{2,}$/');
        $this->formvalidation->set_rule('age','Age','/^[0-9]{1,3}$/');
        $this->formvalidation->set_rule('password','Password','/^.{6,}$/');

        if($this->formvalidation->run()){
          $this->register = $this->model('register');
          if($this->register->register())
          {
            $hash = hash('sha1',uniqid());
            Auth::init(  $hash );
            redirect('dashboard');
          }else{
            $this->formvalidation->flash->flash_set('error','<p class="alert alert-dismissible alert-danger">
            Email-id alreday in used!</p>');
            redirect('register');
          }

        }else{
          redirect('register');
        }
      }else{
        $this->view('error/error_csrf');
      }
    }
  }
}



 ?>
