<?php
  /**
   *
   */
  class Contact extends MainController
  {


    function __construct(){
      parent::__construct();
      $this->flash = $this->library('SessionSet');
      $this->formvalidation = $this->library('FormValidation');
    }

    public function index($arg)
    {

      $this->conatct = $this->model('Contact');
      $this->paginate = $this->library('paginate');
      $this->paginate->init(
                      $this->conatct->user_count(),
                      @$arg['page'],
                      3,
                      2
                    );
      $this->result = $this->conatct->users(
                        $this->paginate->page_limit(),
                        $this->paginate->page_offset()
                      );
      //  $paginate = $this->paginate->show();
      $this->data = [
                'meta_title'=>'conatct page index method',
                'meta_desc'=>'ds sddadadadsa adsasdas ddsSda',
      ];
      $this->view('contact');
    }



    public function form(){

      if(isset($_REQUEST)){
        if(Csrf::check_token(isset($_REQUEST['csrf_token']))){
          $this->formvalidation->set_rule('name','User Name','/^[A-z0-9\s]{6,}$/');
          $this->formvalidation->set_rule('email','Email','/^[A-z0-9]{3,}@[A-z0-9]{3,}\.[a-z]{2,}$/');
          $this->formvalidation->set_rule('password','Password','/^.{8,}$/');
          if($this->formvalidation->run()){
            echo "sucess";
          }else{
            redirect('contact');
          }
        }else{
          $this->view('error/error_csrf');
        }
      }

    }




  }




 ?>
