$(document).ready(function(){
    
    //Profile attach hover
    $('.user-image').hover(
				
        function () {
          $('.upload-img').css('opacity','1');
          $('.avatar').css('opacity','0.3');
        }, 
         
        function () {
            $('.upload-img').css('opacity','0');
            $('.avatar').css('opacity','1');
        }
     );

     $('#fileinput').change(function(e){
        $('#profile_data').submit();
        
     })
     ///////////////////////////////////////
    // file input user on upload
        // jQuery('#fileinput').change(function(e){
        //     e.preventDefault();
        //     $.ajaxSetup({
        //         headers: {
        //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //         }
        //       });

        //       $.ajax({
        //         type: "POST",
        //         url: '/profile/upload',
        //         data: {  test : "test",
        //               },
        //         success: function (data) {
        //            console.log(data);
        //         },
        //         error: function (data, textStatus, errorThrown) {
        //             console.log(data);
             
        //         },
        //        });
        //     });
            /////////////////////////

           

     
























});
//Regular Javascript. Jquery seems not working on file inpit
function performclick(){
    document.getElementById('fileinput').click();
}