<?php
  /**
   *
   */
  class Contact extends MainController
  {

    function index()
    {
      $about = $this->load->model('About');
      $data = $about->test();
      $this->load->view('contact',  $data );
    }

  }




 ?>
