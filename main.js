$(document).ready(function(){
  $('.claim').on('click', function(){
    var x = $('.claim').parent().children(':first-child').text();
    console.log(x);
  });

});
