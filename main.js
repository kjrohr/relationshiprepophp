$(document).ready(function(){
  // $('.claim').on('click', function(){
  //   var x = $(this).parent().parent().children(':first-child').text();
  //   console.log(x);
  // });

  $('.claim').on('click', function(){

    var x = $(this).parent().parent().children(':first-child').text();
    $.ajax({
                url: 'dashboard.php',
                dataType: 'text',
                type: 'post',
                contentType: 'application/x-www-form-urlencoded',
                data: x
            });
  });

});
