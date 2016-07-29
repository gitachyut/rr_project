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


  });

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
                  $output += ` <tr id="`+monkey.id+`">
                                <td>`+monkey.username+`</td>
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
                  $output += ` <tr id="`+monkey.id+`">
                                <td>`+monkey.username+`</td>
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
    var conf = confirm("Are You Sure?");
    if (conf  == true) {
      var $id = $("#user_id").val();
      var $url = $("#base_url").val();
      window.location.href = $url+"/monkey/delete/"+$id ;
    } else {
      return false;
    }
  });

 });

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
         $('#'+fid).hide();
       }
    });
 }
