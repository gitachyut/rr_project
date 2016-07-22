<?php
  function panination_url(){
    $url = BASE_URL.URL;
    if(substr($url , -1) != '/'){
        $url = $url.'/page/';
    }else{
        $url = $url.'page/';
    }
    $url = explode('page/', $url);
    $url = $url[0] .'page/';
    return  $url;
  }





 ?>
