<?php
/**
 *
 */
class User extends MainController
{

  function profile($arg)
  {
      
      $this->profile = $this->model('user')->user_info($arg[2]);
      $this->view('user');
  }
}
 ?>
