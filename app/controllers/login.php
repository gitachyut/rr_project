<?php
/**
 *
 */
class login extends MainController
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
          $id =  $this->login->check();
          if( $id == 'ERROR_IEI' )
          {
            $this->formvalidation->flash->flash_set('error','<p class="alert alert-dismissible alert-danger">
            You Are Not A Registred User!</p>');
            redirect('login');
          }elseif( $id == 'ERROR_WEPC'){
            $this->formvalidation->flash->flash_set('error','<p class="alert alert-dismissible alert-danger">
            Wrong Email Password Combination!</p>');
            redirect('login');
          }else{
            if(isset($_POST['remember'])){
                $hash = Auth::init(true);
            }else{
                $hash = Auth::init(false);
            }

            $this->login->register_session_token($id,$hash);
            redirect('dashboard');
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
