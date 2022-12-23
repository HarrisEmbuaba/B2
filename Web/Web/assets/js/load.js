// $(document).ready(function(){
//     // HIDE LOADING SPINNER WHEN PAGE IS LOADED [7000msec after the page is loaded]
//     $(window).on('load', function () {
//         setTimeout(function () {
//             $('.loader').hide(300);
//         }, 3000);
//     });
// });

$(document).ready(function () {
  if( $.cookie('splashscreen') == null ) {
      $("#splashscreen").fadeIn();
      $.cookie("splashscreen", 1, { expires : 10 });
  }
  $("#splashscreen").click(function () {
      $("#splashscreen").fadeOut(2000); 
  });
});