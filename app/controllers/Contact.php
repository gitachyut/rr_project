<?php
  /**
   *
   */
  class Contact extends MainController
  {

    public function index($arg)
    {
      $about = $this->model('About');
      $result = $about->test();
      $paginate = $this->library('paginate');
      $paginate->init(200,@$arg['page'],10,7);
      $paginate = $paginate->show();
      //$offset = $paginate->offset();
      $_SESSION['name']= 'akdd9';
    //  session_unset();
    //  session_destroy();
      $data = [
          'pagination' =>   $paginate  ,
          'result'  => $result
      ];
      $this->view('contact',  $data );

    }
    public function form(){
      if(isset($_POST)){
        if(Csrf::check_token($_POST['csrf_token'])){
          echo "go";
        }else{
          echo "stop";
        }
      }

    }

    public function xyz(){
      if(isset($_POST)){
        if(Csrf::check_token($_POST['csrf_token'])){
          echo "go";
        }else{
          echo "stop";
        }
      }

    }
    public function test($arg){
      $about = $this->model('About');
      $result = $about->test();

      $paginate = $this->library('paginate');
      $paginate->init(2000,@$arg['page'],10,7);
      $paginate = $paginate->show();
      //$offset = $paginate->offset();

      $data = [
          'pagination' =>   $paginate  ,
          'result'  => $result
      ];
      $this->view('contact',  $data );
    }

  }




 ?>
