$(document).ready(function(){
  $('.claim').on('click', function(){
    var case_id = $(this).parent().parent().children(':first-child').text();
    $.post('dashboard.php', 'case_id=' + case_id, function (response) {
       location.reload();
    });
  });


  $('.complete').on('click', function(){
    var userId = $(this).parent().parent().children(':nth-child(3)').html();
    if(Math.floor(userId) == userId && $.isNumeric(userId)) {
      var case_id = $(this).parent().parent().children(':first-child').text();
      $.post('dashboard.php', 'complete=' + case_id, function (response) {
         location.reload();
      });
    }
    else {
      // User feedback somewhere
    }
  });

  // Stripe.JS stuff
    var $form = $('#payment-form');
    $form.submit(function(event) {
      // Disable the submit button to prevent repeated clicks:
      $form.find('.submit').prop('disabled', true);

      // Request a token from Stripe:
      Stripe.card.createToken($form, stripeResponseHandler);

      // Prevent the form from being submitted:
      return false;
    });

    function stripeResponseHandler(status, response) {
      // Grab the form:
      var $form = $('#payment-form');

      if (response.error) { // Problem!

        // Show the errors on the form:
        $form.find('.payment-errors').text(response.error.message);
        $form.find('.submit').prop('disabled', false); // Re-enable submission

      } else { // Token was created!

        // Get the token ID:
        var token = response.id;

        // Insert the token ID into the form so it gets submitted to the server:
        $form.append($('<input type="hidden" name="stripeToken">').val(token));

        // Submit the form:
        $form.get(0).submit();
      }
    };



});
