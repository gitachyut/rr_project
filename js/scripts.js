$(document).ready(function(){
    $(".del").click(function(){
        var $val=$( this ).val();
        $('#myModal').modal('show');      
        console.log($val); 
        $('#article_id').val($val);
    });

    $("#cencel").click(function(){ 
        $('#myModal').modal('hide');
    });
      
    function reposition() {
        var modal = $(this),
        dialog = modal.find('.modal-dialog');
        modal.css('display', 'block');      
        // Dividing by two centers the modal exactly, but dividing by three 
        // or four works better for larger screens.
        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
    }
    $('.modal').on('show.bs.modal', reposition);
    // Reposition when the window is resized
    $(window).on('resize', function() {
        $('.modal:visible').each(reposition);
    });
 });