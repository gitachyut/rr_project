<?php
/**
 *
 */
class ajaxcontroller extends MainController
{

    public function __construct(){
        parent::__construct();
        $this->paginate = $this->library('paginate');
        $this->monkey = $this->model('Ajax');

    }

    public function addfriendslist(){
      if(isset($_POST)){
        $results['output'] = $this->monkey->find_all_friend();
        header( "Content-Type: application/json" );
        echo  json_encode($results);
        die();
      }else{
        $this->view('error/error_csrf');
      }
    }

    public function friendslist(){
      if(isset($_POST)){
        $results['output'] = $this->monkey->friends();
        header( "Content-Type: application/json" );
        echo  json_encode($results);
        die();
      }else{
        $this->view('error/error_csrf');
      }
    }

    public function addfriend(){
      if(isset($_POST)){
        $results['output'] = $this->monkey->add_friend();
        header( "Content-Type: application/json" );
        echo  json_encode($results);
        die();
      }else{
        $this->view('error/error_csrf');
      }
    }

    public function delfriend(){
      if(isset($_POST)){
        $results['output'] = $this->monkey->del_friend();
        header( "Content-Type: application/json" );
        echo  json_encode($results);
        die();
      }else{
        $this->view('error/error_csrf');
      }
    }

    public function favfriend(){
      if(isset($_POST)){
        $results['output'] = $this->monkey->fav_friend();
        header( "Content-Type: application/json" );
        echo  json_encode($results);
        die();
      }else{
        $this->view('error/error_csrf');
      }
    }

    public function favfriendslist(){
      if(isset($_POST)){
        $results['output'] = $this->monkey->list_fav_friend();
        header( "Content-Type: application/json" );
        echo  json_encode($results);
        die();
      }else{
        $this->view('error/error_csrf');
      }
    }

    public function delfavfriend(){
      if(isset($_POST)){
        $results['output'] = $this->monkey->del_fav_friend();
        header( "Content-Type: application/json" );
        echo  json_encode($results);
        die();
      }else{
        $this->view('error/error_csrf');
      }
    }
}





 ?>
