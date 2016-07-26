<?php

/**
 *
 */
class LogoutModel extends MainModel
{
  public function remove_session_token($token){
      DB::table('users_meta')->where('session_token', '=', $token )->delete();
  }

}

 ?>
