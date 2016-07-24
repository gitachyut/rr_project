<?php
  /**
   *
   */
  class Contact extends MainController
  {

    public function index($arg)
    {
      $contact = $this->model('Contact');
      $paginate = $this->library('paginate');
      $paginate->init(
                      $contact->user_count(),
                      @$arg['page'],
                      3,
                      2
                    );
      $result = $contact->users($paginate->page_limit(),$paginate->page_offset());
      $paginate = $paginate->show();

      $this->data = [
          'meta_title'=>'conatct page index method',
          'meta_desc'=>'ds sddadadadsa adsasdas ddsSda',
          'pagination' =>   $paginate  ,
          'result'  => $result
      ];

      $this->view('contact');

    }
    public function form(){
      if(isset($_REQUEST)){
        if(Csrf::check_token(isset($_REQUEST['csrf_token']))){
          $this->flash_set('fail','your form submission fail! try again..');
          redirect('welcome');
        }else{
          $this->view('error/error_csrf');
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
