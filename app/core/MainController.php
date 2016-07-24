<?php
/**
 *
 */

abstract class MainController
{

  public function __construct(){
    if(DEBUG){
      ini_set('display_errors', 'On');
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL | E_STRICT);
    }
  }
  abstract public function index($arg);

  public function __call($method, $args) {
    $error_404 = new PageNotFound();
    $error_404->index('');
  }

  public function model($model){
    $model = $model.'Model';
    return new $model;
  }

  public function library($lib){
    return new $lib;
  }

  public function view($path){
    include_once __DIR__.'/../views/'.$path.'.php';
  }
  public function flash_set($name,$msg){
    $_SESSION[$name]= $msg;
  }
  public  function flash_get($name){
    if(isset($_SESSION[$name])){
      $msg = $_SESSION[$name];
      unset($_SESSION[$name]);
      return $msg;
    }
  }

  public function get_header($path=''){
    if(empty($path)){
      $path = 'header';
    }else{
      $path = 'header_'.$path;
    }
    include_once __DIR__.'/../views/'.$path.'.php';
  }


  public function get_footer($path=''){
    if(empty($path)){
      $path = 'footer';
    }else{
      $path = 'footer_'.$path;
    }
    include_once __DIR__.'/../views/'.$path.'.php';
  }

  public function page($page,$con){
      $con = new $con;
      $con->index(['page'=>$page]);
   }
}


 ?>
