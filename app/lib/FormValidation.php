<?php
/**
 *  This is Formvalidation class 
 */
class FormValidation
{
    private static $_Name = [];
    private static $_Field = [];
    private static $_Regex = [];
    public static $_Rule = [];
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
      $this->sessionset = new SessionSet();
    }

    public function run(){
      if($_REQUEST){
        $this->error = 0;
        foreach ($_REQUEST as $key => $value) {
          if ( in_array($key, self::$_Rule[0])){
            $k = array_search($key,self::$_Rule[0]);
             if (!preg_match(self::$_Rule[2][$k],$_REQUEST[$key])){
               $msg = 'Input '.self::$_Rule[1][$k].' field again!';
               $this->sessionset->form_error_set(self::$_Rule[0][$k],$msg);
               $this->error ++ ;
             }else{
               $value = $_REQUEST[$key];
               $this->sessionset->form_value_set(self::$_Rule[0][$k],$value);
             }
          }
        }
         if($this->error == 0){
           return true;
         }else{
           return false;
         }

      }
    }


}






 ?>
