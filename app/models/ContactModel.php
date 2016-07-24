<?php
/**
 *
 */
class ContactModel extends MainModel
{

  public function users($limit,$offset){
    $results = DB::table('users')->skip($offset)->take($limit)->get();
    return $results;
  }
  public function user_count(){
    return DB::table('users')->count();
  }
}



 ?>
