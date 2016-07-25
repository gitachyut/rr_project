<?php
/**
 *  This is Formvalidation class
 */
class FormValidation
{
    private static $_Name = [];
    private static $_Field = [];
    private static $_Regex = [];
    private static $_Rule = [];
    public function set_rule($field,$name,$regex){
        self::$_Field [] = $field;
        self::$_Name [] = $name;
        self::$_Regex [] = $regex;

        self::$_Rule =  [
          self::$_Field,
          self::$_Name,
          self::$_Regex
        ];
    }

    public function __construct(){
      $this->flash = new SessionSet();
    }

    public function run(){
      if($_REQUEST){
        $this->error = 0;
        foreach ($_REQUEST as $key => $value) {
          if ( in_array($key, self::$_Rule[0])){
            $k = array_search($key,self::$_Rule[0]);

                if($key=='password'){
                  $password = $_REQUEST[$key];
                  if($_REQUEST['confirm_password'] != $password ){
                       $this->error ++ ;
                       $msg = '<p class="alert alert-dismissible alert-warning">
                       Error: Password mismatch!</p>';
                       $this->flash->form_error_set('confirm_password',$msg);
                    }
                 }
                 if (!preg_match(self::$_Rule[2][$k],$_REQUEST[$key])){
                   $msg = '<p class="alert alert-dismissible alert-warning">
                   Error: Invalid '.self::$_Rule[1][$k].'!</p>';
                   $this->flash->form_error_set(self::$_Rule[0][$k],$msg);
                   $this->error ++ ;
                 }else{
                   $value = $_REQUEST[$key];
                   $this->flash->form_value_set(self::$_Rule[0][$k],$value);
                 }

          }
        }
         if($this->error == 0){
           $this->flash->unset_form_value();
           return true;
         }else{
           return false;
         }
      }
    }


}






 ?>
