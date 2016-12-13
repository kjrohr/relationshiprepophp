<?php
session_start();
include "header.php";

if( !isset($_SESSION['user']) || !isset($_SESSION['content'])) {
 header("Location: login.php");
 exit;
}

echo $_SESSION['user'];

if (isset($_POST['stripeToken'])) {
  $user_id = $_SESSION['user'];
  $content = $_SESSION['content'];
  $sql_query="INSERT INTO cases(user_id,content) VALUES('$user_id','$content')";
  mysql_query($sql_query);
  $_SESSION['message'] = 'Payment Successful!';
  unset($_SESSION['content']);
  header("Location: dashboard.php");
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
<script type="text/javascript" src="payment.js"></script>
</body>
</html>
