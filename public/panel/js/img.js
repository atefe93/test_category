
$(document).ready(function(){
    $(".delImg").click(function(){
        console.log('cfcfvb');
    var id = $(this).attr('id');


        $.ajax({
            // assign a controller function to perform search action - route name is search
            url:"/dashboard/destroy_photo",
            data :{id:id} ,
            // since we are getting data methos is assigned as GET
            type:"post",
            // data are sent the server

            // if search is successfully done, this callback function is called
            success:function (status) {

                $('#' + id + '.delImg').remove();
                $('#' + id + '.remove').remove();
            }

        });

    });

});

