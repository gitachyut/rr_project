<?php
/**
 *
 *
 */
class Loader
{
  public static $load = null;
  public function view($path,$data = []){
    include_once __DIR__.'/../views/'.$path.'.php';
  }
  public function model($model){
    $model = $model.'Model';
    return new $model;
  }

  function __set($name,$value) {
    $this->name = $value;
  }
  public static  function load(){
      if(self::$load == null ){
      self::$load = new Loader();
      return self::$load;
    }
  }
}




 ?>
