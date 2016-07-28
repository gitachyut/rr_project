<?php
/**
 *  Ajax Model
 */
class AjaxModel extends MainModel
{

  public function find_all_friend(){
    $results = DB::select('select * from monkeys where id != :id', ['id' => $_POST['id']]);
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




}


 ?>
