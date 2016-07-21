<?php
/**
 *
 */
class About extends MainController
{

  function __construct()
  {
  //  parent::__construct();
  }

  public function index(){
    echo "i m index";
  }
  public function test($arg ){
    echo "i m test";
    var_dump ($arg);

  }
}


 ?>
