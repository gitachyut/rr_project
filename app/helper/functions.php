<?php
  function debug(){
    if(DEBUG){
      ini_set('display_errors', 1);
      ini_set('display_startup_errors', 1);
      error_reporting(E_ALL);
    }
  } // Debug function ends here ..

  function base_url(){
      $url = BASE_URL;
      return $url;
  }// base_url function ends here

  
  debug();
 ?>
