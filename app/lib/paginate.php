<?php
/**
 *
 */
use Kilte\Pagination\Pagination as Pagination ;
class Paginate
{
  public $pages;
  public static $get_part ;
  public function init($x,$y,$a='',$b=''){
      $this->pages = new Pagination($x,$y,$a,$b);
      return   $this->pages;
  }

  public function show(){
    $pages = $this->pages->build();
    $output = '';
    $output .= '<ul>';
    foreach ($pages as $key => $value) {
      $output .='<a href="'.self::panination_url(). $key.self::$get_part.'"><li>'.$value.'</li></a>';
    }
    $output .= '</ul>';
    return $output;
  }

  public function page_offset(){
    $offset = $this->pages->offset();
    return $offset;
  }
  public function page_limit(){
    $limit = $this->pages->limit();
    return $limit;
  }

  public static  function panination_url(){
      $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
      $get_part =  explode('?', $url);
      $url = $get_part[0];
      if(isset($get_part[1])){
        self::$get_part = '?'.$get_part[1];
      }else{
        self::$get_part = '';
      }
      if(substr($url , -1) != '/'){
          $url = $url.'/page/';
      }else{
          $url = $url.'page/';
      }
      $url = explode('page/', $url);
      $url = $url[0] .'page/';
      return  $url;
    }
}



 ?>
