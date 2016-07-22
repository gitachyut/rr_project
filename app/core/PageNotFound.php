<?php
/**
 * Page not found class
 */
class PageNotFound extends MainController
{

  function __construct()
  {
      parent::__construct();
      $this->view('error/error_404',[]);
  }
}




 ?>
