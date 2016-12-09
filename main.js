$(document).ready(function(){
  $('.claim').on('click', function(){
    var case_id = $(this).parent().parent().children(':first-child').text();
    console.log(case_id);
    $.post('dashboard.php', 'case_id=' + case_id, function (response) {
       location.reload();
    });
  });


  $('.complete').on('click', function(){
    var userId = $(this).parent().parent().children(':nth-child(3)').html();
    if(Math.floor(userId) == userId && $.isNumeric(userId)) {
      alert('yes its an int!');
    }

    console.log(userId);
  });


});
