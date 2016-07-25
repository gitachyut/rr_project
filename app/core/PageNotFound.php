<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Page not found class
 */
class PageNotFound extends MainController
{
  public function index($arg){
    $this->view('error/error_404',[]);
    die();
  }
}




 ?>
