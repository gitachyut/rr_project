<?php
  include_once __DIR__.'/lib/vendor/autoload.php';
  include_once __DIR__.'/config/config.php';
  include_once __DIR__.'/config/autoload.php';
  include_once __DIR__.'/config/db.php';
  include_once __DIR__.'/helper/functions.php';

  if(@$_GET['uri']){
    $uri = $_GET['uri'];
    $parts = explode('/', $uri);
    if($parts[0]){
      $control = $parts[0];
      @$controller = new $control;
      if(@$parts[1] && $parts[1]!='page' ){
        if(in_array("page", $parts)){
          $page = count($parts)-1;
          $page = $parts[$page];
          $method = $parts[1];
          unset($parts[0]);
          unset($parts[1]);
          $page = ['page'=>$page];
          $args = $parts;
          $controller->$method(array_merge($page,$args));
        }else{
         $method = $parts[1];
         if(@$parts[2]){
            unset($parts[0]);
            unset($parts[1]);
            $controller->$method($parts);
         }else{
            $controller->$method('');
         }
       }
      }elseif ($parts[1]=='page' ) {
        if(@$parts[2]){
           unset($parts[0]);
           print_r($parts);
           $controller->page($parts[2],$control);
         }

      }else{
           $controller->index('');
      }
    }

  }else{

  }





?>
