<?php
/**
 * Users controller
 */
class users  extends MainController
{


  function __construct(){
    parent::__construct();

    $this->paginate = $this->library('paginate');
  }


  public function index($arg){
    $this->users = $this->model('users');

    $this->count = $this->users->count_all_user();
    $this->paginate->init(
                    $this->count,
                    @$arg['page'],
                    6,
                    4
                  );
    $this->users = $this->users->list_user(
                      $this->paginate->page_offset(),
                      $this->paginate->page_limit()
                    );

    $this->view('users');

  }
  public function search($arg){
        $this->users = $this->model('users');
        $this->count =   $this->users->count_search_user();
        $this->paginate->init(
                        $this->count,
                        @$arg['page'],
                        6,
                        4
                      );

      $this->users = $this->users->search_user(
                        $this->paginate->page_offset(),
                        $this->paginate->page_limit()
                      );
      $this->view('users');


  }
}

 ?>
