<?php
  class App{
   public function __construct(){
     define('BASEPATH',TRUE);
     self:: load_config_files();
     $url = base_url().'/';
     $sep = 'http://'.$_SERVER['HTTP_HOST'].'/';
     $output = explode($sep,$url);
     $output = explode($output[1],$_SERVER["REQUEST_URI"]);
      if(!empty($output[1])){

        $uri = $output[1];
        $parts = explode('?', $uri);
        $parts = explode('/', $parts[0]);
        self::routeset($parts);
      }else{
        $route = $GLOBALS['DEFAULT_ROUTE'];
        $parts = explode('/', $route);
        self::routeset($parts);
      }
  }

  private static function senitize($z){

    $z = strtolower($z);
    $z = preg_replace('/[^a-z0-9 -]+/', '', $z);
    $z = str_replace(' ', '-', $z);
    return trim($z, '-');

  }

  public static function routeset($parts){
    foreach ($parts as  $value) {
      $r[] = self::senitize($value);
    }
    $parts  = $r;


    if($parts[0]){
      $control = $parts[0];
      if($control  != 'page' ){
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
       }elseif (@$parts[1]=='page' ) {

          if(@$parts[2]){
             unset($parts[0]);
             $controller->page($parts[2],$control);
           }else{
             unset($parts[0]);
             $controller->page('',$control);
           }
        }else{
             $controller->index('');
        }

      }else{
        $route = $GLOBALS['DEFAULT_ROUTE'];
        $r = explode('/', $route);
        $controller = new $r[0];
        if(@$r[1]){
            $controller->$r[1](['page'=>$parts[1]]);
        }else{
            $controller->page($parts[1],$r[0]);
        }


      }

    }
  }

  private static  function load_config_files(){
    include_once __DIR__.'/config/config.php';
    include_once __DIR__.'/lib/vendor/autoload.php';
    include_once __DIR__.'/config/autoload.php';
    include_once __DIR__.'/config/db.php';
    include_once __DIR__.'/helper/functions.php';
  }




}



?>
