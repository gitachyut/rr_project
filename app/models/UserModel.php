<?php
/**
 *
 */
class UserModel extends MainModel
{

      public function user_info($id){
          $user = DB::table('users')->where('user_id', $id)->first();
          return $user;
      }

}


 ?>
