<?php

  /**
   *
   */
  class AboutModel extends MainModel
  {

    public function __construct(){
      $user = DB::table('users')->where('name', 'John')->first();
    
    }
    public function test(){
      $results = DB::table('users')->get();
      return $results;
    }
  }



 ?>
