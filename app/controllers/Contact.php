<?php
  /**
   *
   */
  class Contact extends MainController
  {

    function index($arg)
    {
      $about = $this->model('About');
      $data = $about->test();

      $paginate = $this->library('paginate');
      if(@$arg['page']){
          $pagination = $paginate->init(2000,$arg['page'],10,7);
      }else{
          $pagination = $paginate->init(2000,'',10,7);
      }

      $offset = $pagination->offset();
      $limit = $pagination->limit();

      echo   $offset.'-'.$limit;
      echo $paginate->view();



      $this->view('contact',  $data );
    }
    public function test($arg){
      $paginate = $this->library('paginate');
      if(@$arg['page']){
          $pagination = $paginate->init(2000,$arg['page'],10,7);
      }else{
          $pagination = $paginate->init(2000,'',10,7);
      }

      $offset = $pagination->offset();
      $limit = $pagination->limit();

      echo   $offset.'-'.$limit;
      echo $paginate->view();



      $this->view('contact',  $data='' );
    }

  }




 ?>
