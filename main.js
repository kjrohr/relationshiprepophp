$(document).ready(function(){
  $('.claim').on('click', function(){
    var x = $(this).parent().parent().children(':first-child').text();
    console.log(x);
  });

});
