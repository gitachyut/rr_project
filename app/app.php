<?php

  include_once __DIR__.'/config/config.php';
  include_once __DIR__.'/config/autoload.php';
  //include_once __DIR__.'/../vendor/autoload.php';
  if(@$_GET['uri']){
    $uri = $_GET['uri'];
    $parts = explode('/', $uri);
    if($parts[0]){
      $control = $parts[0];
      @$controller = new $control;
      if(!$controller ){
        echo "sdad";
      }
      if(@$parts[1]){
         $method = $parts[1];
         if(@$parts[2]){
            unset($parts[0]);
            unset($parts[1]);
            $controller->$method($parts);
         }else{
            $controller->$method('');
         }
      }else{
           $controller->index();
      }
    }

  }





?>
