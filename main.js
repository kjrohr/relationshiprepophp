$(document).ready(function(){
  // $('.claim').on('click', function(){
  //   var x = $(this).parent().parent().children(':first-child').text();
  //   console.log(x);
  // });

  $('.claim').on('click', function(){

    var x = $(this).parent().parent().children(':first-child').text();
    $.ajax({
      method: "POST",
      url: "dashboard.php",
      data: { case_id: x}
    })
      .done(function( msg ) {
        alert( "Data Saved: " + msg );
      });
  });

});
