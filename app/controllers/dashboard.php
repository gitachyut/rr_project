<?php
/**
 *
 */
class dashboard extends MainController
{
  protected $_id ;
  public function __construct(){
    parent::__construct();
    if($id = Auth::check()){
        $this->_id = $id;
    }else{
      redirect('register');
    }
  }
  public function index(){
        $this->dashboard = $this->model('dashboard')->user_info($this->_id);
        $this->view('dashboard');
  }





}



 ?>
