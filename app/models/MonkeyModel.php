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
    $monkeys = DB::select('
      select m.id,m.username,m.email,m.age,f.fav_monkey_id as favfriend_id,
      (select mk.username from monkeys as mk where mk.id = f.fav_monkey_id ) as favfriend,
      (select count(rel.rel_id) from relationship as rel where (m.id = rel.user_one_id OR m.id = rel.user_two_id)) as friendcount
      FROM monkeys as m
      left join fav_friend as f
      on f.`monkey_id` = m.id
      left join relationship as r
      on ( m.id = r.user_one_id OR m.id = r.user_two_id )
      GROUP BY m.email LIMIT :offset, :limit',
      [ 'limit' => $limit ,'offset' =>$offset  ]
    );
    return $monkeys;
  }
  public function count_all_monkey(){
    return DB::table('monkeys')->count();
  }



  public function search_monkey($offset,$limit){
    $search = $_GET['search'];
    $monkeys = DB::select('
      select m.id,m.username,m.email,m.age,f.fav_monkey_id as favfriend_id,
      (select mk.username from monkeys as mk where mk.id = f.fav_monkey_id ) as favfriend,
      (select count(rel.rel_id) from relationship as rel where (m.id = rel.user_one_id OR m.id = rel.user_two_id)) as friendcount
      FROM monkeys as m
      left join fav_friend as f
      on f.`monkey_id` = m.id
      left join relationship as r
      on ( m.id = r.user_one_id OR m.id = r.user_two_id )
      where (  m.username like "%'.$search.'%"  OR m.email like "%'.$search.'%"  )
      GROUP BY m.email LIMIT :offset, :limit',
      [ 'limit' => $limit ,'offset' =>$offset  ]
    );
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
