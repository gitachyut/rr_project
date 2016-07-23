<?php
/**
 *
 */

class MainController
{
  public $model;

  public function __construct(){}

  public function model($model){
    $model = $model.'Model';
    return new $model;
  }

  public function library($lib){
    return new $lib;
  }

  public function view($path,$data = []){
    include_once __DIR__.'/../views/'.$path.'.php';
  }

   public function page($page,$con){
      $con = new $con;
      $con->index(['page'=>$page]);
   }
}


 ?>
