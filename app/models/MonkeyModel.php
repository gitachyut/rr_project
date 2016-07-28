<?php
/**
 *   Model 
 */
class MonkeyModel extends MainModel
{
  public function register(){
    $count  = DB::table('monkeys')
                ->where('email', $_POST['email'])
                ->count();
    if($count == 0){
      $output =   DB::table('monkeys')->insertGetId(
            [
              'username' => $_POST['username'] ,
              'email' => $_POST['email'],
              'age' => $_POST['age'],
              'bio' =>$_POST['bio']
            ]
          );
      return $output;
    }else{
      return false;
    }
  }

  public function update(){
    $count  = DB::table('monkeys')
                ->where('id','!=', $_POST['id'])
                ->where('email', $_POST['email'])
                ->count();
    if($count == 0){
     DB::table('monkeys')
            ->where('id', $_POST['id'])
            ->update([
              'username' => $_POST['username'] ,
              'email' => $_POST['email'],
              'age' => $_POST['age'],
              'bio' =>$_POST['bio']
            ]
          );
      return true;
    }else{
      return false;
    }
  }
  public function delete_monkey($id){
    $count  = DB::table('monkeys')
                ->where('id', '=' , $id )
                ->count();
    if($count == 1){
      DB::table('monkeys')->where('id', '=', $id)->delete();
      return true;
    }else{
      return false;
    }
  }
  public function monkey_info($id){
    $count  = DB::table('monkeys')
                ->where('id', '=' , $id )
                ->count();
    if($count == 1){
      $monkey = DB::table('monkeys')->where('id', $id)->first();
      return $monkey;
    }else{
      return false;
    }
  }
  public function list_monkey($offset,$limit){
    $monkeys = DB::table('monkeys')->skip($offset)->take($limit)
                  ->get();
    return $monkeys;

  }
  public function count_all_monkey(){
    return DB::table('monkeys')->count();
  }



  public function search_monkey($offset,$limit){
    $search = $_GET['search'];
    $monkeys = DB::table('monkeys')
                      ->where('username', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->skip($offset)->take($limit)
                      ->get();


    return $monkeys;
  }

  public function count_search_monkey(){
    $search = $_GET['search'];
    $monkeys = DB::table('monkeys')
                      ->where('username', 'like', "%$search%")
                      ->orWhere('email', 'like', "%$search%")
                      ->count();


    return $monkeys;
  }

}






 ?>
