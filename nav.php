<?php

session_start();
include 'header.php';
require_once 'dbconfig.php';

// it will never let you open index(login) page if session is set
if ( isset($_SESSION['user'])!="" ) {
 header("Location: dashboard.php");
 exit;
}

$error = false;

if( isset($_POST['btn-login']) ) {
 $email = $_POST['email'];
 $pass = $_POST['pass'];


 if(empty($email)){
  $error = true;
  $emailError = "Please enter your email address.";
 } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
  $error = true;
  $emailError = "Please enter valid email address.";
 }

 if(empty($pass)){
  $error = true;
  $passError = "Please enter your password.";
 }

 // if there's no error, continue to login
 if (!$error) {

  $password = hash('sha256', $pass); // password hashing using SHA256

  $res=mysql_query("SELECT user_id, username, password FROM users WHERE email='$email'");
  $row=mysql_fetch_array($res);
  $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row

  if( $count == 1 && $row['password']==$password ) {
   $_SESSION['user'] = $row['user_id'];
   header("Location: dashboard.php");
  } else {
    $res=mysql_query("SELECT userId, user_name, password FROM agents WHERE email='$email'");
    $row=mysql_fetch_array($res);
    $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row


    if ($count == 1 && $row['password']==$password) {
      $_SESSION['user'] = $row['userId'];
      header("Location: dashboard.php");
    }
    else {
   $errMSG = "Incorrect Credentials, Try again...";
 }
  }

 }

}

?>

<nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand page-scroll" href="#page-top">Relationship Repo</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <li>
                  <a href="/index.php">Home</a>
              </li>
                <li>
                    <a href="/aboutus.php">About Us</a>
                </li>
                <li>
                    <a href="/packages.php">Packages</a>
                </li>
                <li>
                    <a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
