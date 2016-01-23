// (function($){


//     var url="../AFK/app/model/notification.php";
//     var timer = window.setInterval(getMessages,5000);
//     // clearInterval(timer);

//     function getMessages() {
//         $.post(url, {action: "getMessages"}).done( function( data ) {
//             if (data.erreur == "ok") {
//                 //alert(data.result);
//                 $(".notif").append(data.result);
//                 $(".notif").show();//.velocity("transition.slideLeftIn", {delay: 30, duration: 250});
//             }
//             else {
//                 alert(data.erreur);
//                 console.log(data.erreur);
//             }
//         } , "json");
//     }

//         // {action: "getMessages"},
        
//         // $.get(url,  function ( data ){
//         //     alert(data.result);
//         //     traitement(data);
//         // } , "json");
        
        
//     } 

//     // function getMessages() {
//     //     $.post(url, {action: "getMessages"}, function (data) {
//     //         if (data.erreur == "ok") {
//     //                 alert('gitan');
//     //         }
//     //         else {
//     //             alert(data.erreur);
//     //         }
//     //     }, "json");
//     //     return false;
//     // }

//         $('.notif').click(function(e) {
//             e.preventDefault();
//             e.stopPropagation();

//             $(this).velocity("fadeOut", {delay: 30, duration: 250});
//         }); // $('.error').click()

// })(jQuery);