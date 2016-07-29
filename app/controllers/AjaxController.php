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
      $results['output'] = $this->monkey->find_all_friend();
      header( "Content-Type: application/json" );
      echo  json_encode($results);
      die();
    }

    public function friendslist(){
      $results['output'] = $this->monkey->friends();
      header( "Content-Type: application/json" );
      echo  json_encode($results);
      die();
    }

    public function addfriend(){
      $results['output'] = $this->monkey->add_friend();
      header( "Content-Type: application/json" );
      echo  json_encode($results);
      die();
    }

    public function delfriend(){
      $results['output'] = $this->monkey->del_friend();
      header( "Content-Type: application/json" );
      echo  json_encode($results);
      die();
    }

    public function favfriend(){
      $results['output'] = $this->monkey->fav_friend();
      header( "Content-Type: application/json" );
      echo  json_encode($results);
      die();
    }

    public function favfriendslist(){
      $results['output'] = $this->monkey->list_fav_friend();
      header( "Content-Type: application/json" );
      echo  json_encode($results);
      die();
    }

    public function delfavfriend(){
      $results['output'] = $this->monkey->del_fav_friend();
      header( "Content-Type: application/json" );
      echo  json_encode($results);
      die();
    }
}





 ?>
