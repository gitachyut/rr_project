<?php
/**
 *  Add monkey
 */
class monkey extends MainController
{

    public function __construct(){

        parent::__construct();
        $this->formvalidation = $this->library('FormValidation');
        $this->paginate = $this->library('paginate');
        $this->monkey = $this->model('Monkey');

    }
    public function add(){
        $this->view('monkey/add_monkey');
    }

    public function edit($arg){
        if(isset($arg[2])){
          $this->profile = $this->monkey->monkey_info($arg[2]);
          $this->view('monkey/edit_monkey');
        }else {
            redirect('monkey/all/');
        }
    }

    public function AddMonkey(){
        if(isset($_POST)){
          if(Csrf::check_token(isset($_POST['csrf_token']))){
            $this->formvalidation->set_rule('username','User Name','/^[A-z0-9\s]{3,}$/');
            $this->formvalidation->set_rule('email','Email','/^[A-z0-9]{2,}@[A-z0-9]{2,}\.[a-z]{2,}$/');
            $this->formvalidation->set_rule('age','Age','/^[0-9]{1,3}$/');
            $this->formvalidation->set_rule('bio','Bio','/^(.)*$/');
            if($this->formvalidation->run()){
              if($id = $this->monkey->register())
              {
                redirect('monkey/profile/'.$id);
              }else{
                $this->formvalidation->flash->flash_set('error','<div class="alert alert-dismissible alert-danger">
                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        Email-id alreday in used!</div>');
                redirect('monkey/add');
              }

            }else{
              redirect('monkey/add');
            }
          }else{
            $this->view('error/error_csrf');
          }
        }
    }


    public function UpdateMonkey(){
        if(isset($_POST)){
          if(Csrf::check_token(isset($_POST['csrf_token']))){
            $this->formvalidation->set_rule('username','User Name','/^[A-z0-9\s]{3,}$/');
            $this->formvalidation->set_rule('email','Email','/^[A-z0-9]{2,}@[A-z0-9]{2,}\.[a-z]{2,}$/');
            $this->formvalidation->set_rule('age','Age','/^[0-9]{1,3}$/');
            $this->formvalidation->set_rule('bio','Bio','/^(.)*$/');
            if($this->formvalidation->run()){
              if( $this->monkey->update())
              {
                redirect('monkey/profile/'.$_POST['id']);
              }else{
                $this->formvalidation->flash->flash_set('error','<div class="alert alert-dismissible alert-danger">
                                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        Email-id alreday in used!</div>');
                redirect('monkey/edit/'.$_POST['id']);
              }

            }else{
              redirect('monkey/edit/'.$_POST['id']);
            }
          }else{
            $this->view('error/error_csrf');
          }
        }
    }

    public function profile($arg){
      if(isset($arg[2])){
        if($this->profile = $this->monkey->monkey_info($arg[2])){
            $this->view('monkey/profile');
        }else{
            redirect('monkey/all/');
        }
      }else{
          redirect('monkey/all/');
      }
    }

    public function all($arg){
      $this->count = $this->monkey->count_all_monkey();
      $this->paginate->init(
                      $this->count,
                      @$arg['page'],
                      6,
                      4
                    );
      $this->monkeys = $this->monkey->list_monkey(
                        $this->paginate->page_offset(),
                        $this->paginate->page_limit()
                      );

      $this->view('monkey/list');
    }



    public function search($arg){

        if(Csrf::check_token(isset($_GET['csrf_token']))){
          $this->count =   $this->monkey->count_search_monkey();
          $this->paginate->init(
                          $this->count,
                          @$arg['page'],
                          6,
                          4
                        );

        $this->monkeys = $this->monkey->search_monkey(
                          $this->paginate->page_offset(),
                          $this->paginate->page_limit()
                        );
        $this->view('monkey/list');

      }else{
        $this->view('error/error_csrf');
      }
    }

    public function delete($arg){
      $this->monkey->delete_monkey($arg[2]);
      $this->formvalidation->flash->flash_set('success','<span style="text-align:center;" class="center-block msg label label-success">
      You successfully Deleted !</span');
      redirect('monkey/all');

    }



}



 ?>
