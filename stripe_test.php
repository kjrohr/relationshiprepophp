<?php
 include 'header.php';

 if (isset($_POST['stripeToken'])) {

   \Stripe\Stripe::setApiKey("sk_test_gB3FAuvgKMLtCNDhjVGIWcUu");
   $token = $_POST['stripeToken'];
   // Create a charge: this will charge the user's card
   echo 'token exists';
// try {
//   $charge = \Stripe\Charge::create(array(
//     "amount" => 1000, // Amount in cents
//     "currency" => "usd",
//     "source" => $token,
//     "description" => "Example charge"
//     ));
//     header('Location: dashboard.php');
// } catch(\Stripe\Error\Card $e) {
//   // The card has been declined
//   echo $e;
// }
 }
 else {
   echo 'token doesn not exist';
 }

 ?>
 </head>
 <body>
 <form method="POST" id="payment-form">
   <span class="payment-errors"></span>

   <div class="form-row">
     <label>
       <span>Card Number</span>
       <input type="text" size="20" data-stripe="number">
     </label>
   </div>

   <div class="form-row">
     <label>
       <span>Expiration (MM/YY)</span>
       <input type="text" size="2" data-stripe="exp_month">
     </label>
     <span> / </span>
     <input type="text" size="2" data-stripe="exp_year">
   </div>

   <div class="form-row">
     <label>
       <span>CVC</span>
       <input type="text" size="4" data-stripe="cvc">
     </label>
   </div>


   <input type="submit" class="submit" value="Submit Payment">
 </form>

 <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
 <script type="text/javascript">
  Stripe.setPublishableKey('pk_test_mVRIEcTc4r6RkVTj74wurQFE');
 </script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="main.js"></script>
</body>
</html>
