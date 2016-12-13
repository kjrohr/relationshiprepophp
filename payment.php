<?php
session_start();
include "header.php";
require_once 'dbconfig.php';

if( !isset($_SESSION['user']) || !isset($_SESSION['content'])) {
 header("Location: login.php");
 exit;
}

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
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand page-scroll" style="padding-top:5px;" href="#page-top">
                <img src="img/logo3.png" id="pagelogo" alt="Relationship Repo"/>
                </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li>
                    <a>Please Finish Creating Your Case</a>
                </li>
                  <li>
                      <a href="logout.php?logout"><strong>Logout</strong></a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>
<div class='container'>
  <div class="page-header">
    <h1 style="margin:25% 0 0; font-size: 57px;">Update User</h1>
  </div>
<section style="background: #A26F6E; padding:75px 0;" class="download bg-primary text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

  <form method="POST" id="payment-form" class="form-horizontal">
  <div class="container" style="max-width:530px; margin: 0 auto;">
    <h2 style="color:white; margin-left: 10%;">$10.00 Case Creation Service Fee</h2>
    <div style="margin-left: 30%;">
  <span class="payment-errors"></span>

  <div class="form-row">
    <label>
      <span>Card Number</span>
      <input style='color: black !important;'type="text" size="20" data-stripe="number">
    </label>
  </div>

  <div class="form-row">
    <label>
      <span>Expiration (MM/YY)</span>
      <input style='color: black !important;' type="text" size="2" data-stripe="exp_month">
    </label>
    <span> / </span>
    <input style='color: black !important;' type="text" size="2" data-stripe="exp_year">
  </div>

  <div class="form-row">
    <label>
      <span>CVC</span>
      <input style='color: black !important;' type="text" size="4" data-stripe="cvc">
    </label>
  </div>


  <input style='color: black !important;' type="submit" class="submit" value="Submit Payment">
</div>
</div>
</form>
</div>
</div>
</div>
</section>
</div>
<footer>
    <div class="container">
        <p>&copy; 2016 Relationship Repo. All Rights Reserved.</p>
        <ul class="list-inline">
            <li>
                <a href="#">Privacy</a>
            </li>
            <li>
                <a href="#">Terms</a>
            </li>
            <li>
                <a href="#">FAQ</a>
            </li>
        </ul>
    </div>
</footer>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
  Stripe.setPublishableKey('pk_test_mVRIEcTc4r6RkVTj74wurQFE');
</script>
<script type="text/javascript" src="payment.js"></script>
</body>
</html>
