<?php
/**
 *
 */
use Kilte\Pagination\Pagination as Pagination ;
class paginate
{
  public $paginate;


  public function init($x,$y,$a='',$b=''){
      $this->paginate = new Pagination($x,$y,$a,$b);
      return   $this->paginate;
  }

  public function view(){
    $pages = $this->paginate->build();
    $output = '';
    $output .= '<ul>';
    foreach ($pages as $key => $value) {
      $output .='<a href="'.panination_url(). $key.'"><li>'.$value.'</li></a>';
    }
    $output .= '</ul>';
    return $output;
  }
}



 ?>
