<?php
/*
* Helper functions are written here.
*
*/
  function base_url(){
      $url = BASE_URL;
      return $url;
  }// base_url function ends here
  function redirect($arg){
      $url = BASE_URL.'/'.$arg;
      header('Location:'.$url);
  }

 ?>
