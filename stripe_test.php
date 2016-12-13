<?php
 include 'header.php';

 if (isset($_POST['stripeToken'])) {
   echo 'token exists';
 }
 else {
   echo 'token does not exist';
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


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="main.js"></script>
</body>
</html>