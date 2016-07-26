<?php
/**
 *  Register Model
 */
class UsersModel extends MainModel

{
  public function search_user($offset,$limit){
    $search = $_GET['search'];
    if(  $id = Auth::check()){

    $users =  DB::table('users')
            ->where('user_id', '!=', $id )
            ->where(function ($query) {
                $search = $_GET['search'];
                $query->where('username', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");

            })  ->skip($offset)->take($limit)
            ->get();

    }else{

      $users = DB::table('users')
                      ->where('username', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->skip($offset)->take($limit)
                      ->get();
    }

    return $users;
  }
  public function count_search_user(){
    $search = $_GET['search'];
    if(  $id = Auth::check()){

    $users =  DB::table('users')
            ->where('user_id', '!=', $id )
            ->where(function ($query) {
                $search = $_GET['search'];
                $query->where('username', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%");

            })
            ->count();

    }else{

      $users = DB::table('users')
                      ->where('username', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->count();
    }

    return $users;
  }
  public function list_user($offset,$limit){
    $users = DB::table('users')->skip($offset)->take($limit)
                  ->get();
    return $users;

  }
  public function count_all_user(){
    return DB::table('users')->count();
  }

}


?>
