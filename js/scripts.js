$(document).ready(function(){

  $('#Tabs a').click(function (e) {
    e.preventDefault();
    $(this).tab('show');
    if($( "#addfriends" ).hasClass( "active" )){
      addFriends();
    }
    if($("#friends").hasClass( "active" )){
      Friends();
    }
    if($("#favfriend").hasClass( "active" )){
      favFriend();
    }
  });

  var favFriend = function(){
    var $id = $("#user_id").val();
    var $url = $("#base_url").val();
    $.post(
      $url+"/AjaxController/favfriendslist/",
      {
        'id':$id
      },
      function( data ) {

        if(data.output.length !=0){
          var $output = `<table class="favfrndtab table table-striped table-hover ">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Age</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>`;

          $.each(data.output, function (index, monkey) {

              $output += ` <tr id="friend`+monkey.id+`">
                            <td><a href="`+$url+`/monkey/profile/`+monkey.id+`">`+monkey.username+`</a></td>
                            <td>`+monkey.email+`</td>
                            <td>`+monkey.age+`</td>
                            <td>
                            <a href="#" class="btn btn-primary frndrm" onclick="favfrndrm(this.id);" id="`+monkey.id+`">Remove</a>
                            </td>
                          </tr>`;
          });
          $output +=`</tbody>
        </table>`;
      }else{
        $output =`Nobody Found!`;
      }
      $("#favfriend").html($output);
    });
  }

  var Friends = function(){
    var $id = $("#user_id").val();
    var $url = $("#base_url").val();
      $.post(
        $url+"/AjaxController/friendslist/",
        {
          'id':$id
        },
        function( data ) {

            if(data.output.length !=0){
              var $output = `<table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>`;
              $.each(data.output, function (index, monkey) {
                  $output += ` <tr id="friend`+monkey.id+`">
                                <td><a href="`+$url+`/monkey/profile/`+monkey.id+`">`+monkey.username+`</a></td>
                                <td>`+monkey.email+`</td>
                                <td>`+monkey.age+`</td>
                                <td>
                                <a href="#" class="btn btn-primary frndrm" onclick="frndrm(this.id);" id="`+monkey.id+`">Remove</a>
                                <a href="#" class="btn btn-primary frndfav" onclick="addfrndfav(this.id);" id="`+monkey.id+`">Add To Favourite</a>
                                </td>
                              </tr>`;
              });
              $output +=`</tbody>
            </table>`;
          }else{
            $output =`Nobody Found!`;
          }
          $("#friends").html($output);
      });

  };


  var addFriends = function(){
    var $id = $("#user_id").val();
    var $url = $("#base_url").val();
      $.post(
        $url+"/AjaxController/addfriendslist/",
        {
          'id':$id
        },
        function( data ) {

            if(data.output.length !=0){
              var $output = `<table class="table table-striped table-hover ">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Age</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>`;
              $.each(data.output, function (index, monkey) {
                  $output += ` <tr id="fr`+monkey.id+`">
                                <td><a href="`+$url+`/monkey/profile/`+monkey.id+`">`+monkey.username+`</a></td>
                                <td>`+monkey.email+`</td>
                                <td>`+monkey.age+`</td>
                                <td><a href="#" class="btn btn-primary frnd" onclick="addfrnd(this.id);" id="`+monkey.id+`">ADD</a></td>
                              </tr>`;
              });
              $output +=`</tbody>
            </table>`;
          }else{
            $output =`Nobody Found!`;
          }
          $("#addfriends").html($output);
      });

  };



  $("#rmac").click(function(e) {
    var conf = confirmation();
    if (conf  == true) {
      var $id = $("#user_id").val();
      var $url = $("#base_url").val();
      window.location.href = $url+"/monkey/delete/"+$id ;
    } else {
      return false;
    }
  });

 });


function confirmation(){
    var conf = confirm("Are You Sure?");
    return conf
}


 var addfrnd = function (fid){
   var $auid = $("#user_id").val();
   var $url = $("#base_url").val();
   $.post(
     $url+"/AjaxController/addfriend/",
     {
      'auid' :$auid,
       'fid':fid
     },
     function( data ) {
       console.log(data);
       if(data.output){
         $('#fr'+fid).hide();
       }
    });
 };

  var frndrm = function( fid ){
    var $auid = $("#user_id").val();
    var $url = $("#base_url").val();
    var conf = confirmation();
    if (conf  == true) {
      $.post(
        $url+"/AjaxController/delfriend/",
        {
         'auid' :$auid,
          'fid':fid
        },
        function( data ) {
          console.log(data);
          if(data.output == true){
            $('#friend'+fid).hide();
          }
       });
     }else {
       return false;
     }
  };
  var favfrndrm = function( fid ){
    var $auid = $("#user_id").val();
    var $url = $("#base_url").val();
    var conf = confirmation();
    if (conf  == true) {
      $.post(
        $url+"/AjaxController/delfavfriend/",
        {
         'auid' :$auid,
          'fid':fid
        },
        function( data ) {
          console.log(data);
          if(data.output == true){
            $('.favfrndtab').hide();
          }
       });
     }else {
       return false;
     }
  };

  var addfrndfav = function(fid){
    var $auid = $("#user_id").val();
    var $url = $("#base_url").val();
    $.post(
      $url+"/AjaxController/favfriend/",
      {
       'auid' :$auid,
        'fid':fid
      },
      function( data ) {
        console.log(data);
        if(data.output == true){
          $('.frndfav').hide();
        }
     });
  };
