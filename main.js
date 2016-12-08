$(document).ready(function(){
  $('.claim').on('click', function(){
    var case_id = $(this).parent().parent().children(':first-child').text();
    console.log(case_id);
    $.post('dashboard.php', 'case_id=' + case_id, function (response) {
       alert(response);
    });
  });




});
