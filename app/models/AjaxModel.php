<?php
/**
 *  Ajax Model
 */
class AjaxModel extends MainModel
{

  public function find_all_friend(){
    $results = DB::select(' SELECT * FROM `monkeys` WHERE id != :id
       AND ( id NOT IN ( SELECT `user_two_id` from `relationship`  where `user_one_id`= :idd )
       AND id NOT IN ( SELECT `user_one_id` from `relationship` where `user_two_id`= :idr  ) )',
      ['id' => $_POST['id'] , 'idd' => $_POST['id'] , 'idr' => $_POST['id']  ]);
    return   $results;
  }
  public function add_friend(){
    $count  = DB::table('relationship')
                ->where('user_one_id', $_POST['auid'])
                ->where('user_two_id', $_POST['fid'])
                ->count();
    if($count == 0){
      $output =   DB::table('relationship')->insertGetId(
            [
              'user_one_id' => $_POST['auid'] ,
              'user_two_id' => $_POST['fid'],
              'action_user_id' => $_POST['auid']
            ]
          );
      return $output;
    }else{
      return false;
    }
  }
  public function friends(){
    $results = DB::select('SELECT * FROM `monkeys` WHERE id != :id and ( id IN ( SELECT
       `user_two_id` from `relationship`  where `user_one_id`= :idd )
       OR id IN ( SELECT `user_one_id` from `relationship` where
      `user_two_id`= :idr ))', ['id' => $_POST['id'] , 'idd' => $_POST['id'] , 'idr' => $_POST['id']   ]);
    return   $results;
  }
  public function del_friend(){

    DB::table('relationship')
              ->where('user_one_id', $_POST['auid'])
              ->where('user_two_id', $_POST['fid'])
              ->orWhere(function ($query) {
                $query->where('user_one_id', '=',$_POST['fid'])
                      ->where('user_two_id', '=',$_POST['auid']);
                    })
              ->delete();
    $count  = DB::table('fav_friend')
                          ->where('monkey_id', $_POST['auid'])
                          ->where('fav_monkey_id', $_POST['fid'])
                          ->count();
    if($count == 1){
            DB::table('fav_friend')
            ->where('monkey_id', $_POST['auid'])
            ->where('fav_monkey_id', $_POST['fid'])
            ->delete();
    }


    return true;
  }

  public function fav_friend(){
    $count  = DB::table('fav_friend')
                ->where('monkey_id', $_POST['auid'])
                ->count();
    if($count == 0){
      $output =   DB::table('fav_friend')->insertGetId(
            [
              'monkey_id' => $_POST['auid'] ,
              'fav_monkey_id' => $_POST['fid']
            ]
          );
      return $output;
    }else{
      return false;
    }
  }


    public function list_fav_friend(){
      $results = DB::select('SELECT * FROM `monkeys` WHERE id =
        ( SELECT `fav_monkey_id` FROM `fav_friend` WHERE monkey_id = :id)', ['id' => $_POST['id'] ]);
      return   $results;
    }


    public function del_fav_friend(){
      $count  = DB::table('fav_friend')
                            ->where('monkey_id', $_POST['auid'])
                            ->where('fav_monkey_id', $_POST['fid'])
                            ->count();
      if($count == 1){
              DB::table('fav_friend')
              ->where('monkey_id', $_POST['auid'])
              ->where('fav_monkey_id', $_POST['fid'])
              ->delete();

          return true;
      }else{
        return false;
      }

    }



}


 ?>
