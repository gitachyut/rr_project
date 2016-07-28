<?php
/**
 *
 */
class AjaxController extends MainController
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

    public function addfriend(){
      $results['output'] = $this->monkey->add_friend();
      header( "Content-Type: application/json" );
      echo  json_encode($results);
      die();
    }


}





 ?>
