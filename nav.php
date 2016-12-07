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


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="loginmodal-container">
          <form method="post">
            <div class="container" style="max-width:530px; margin: 0 auto;">
                        <form class="form-horizontal" role="form">
                            <h2 style="color:white; margin-left: 10%;">Sign Up With Relationship Repo</h2>
                            <div style="margin-left: 30%;">
                            <div class="form-group">
                              <div class="col-sm-9">
                                    <input type="text" name="username" placeholder="Username" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-9">
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-9">
                                    <input type="email" name="email" placeholder="Email Address" class="form-control" required />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <input type="text" name="address" placeholder="Address, City, State, Zip" class="form-control" required />
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                              <div class="col-sm-9">
                                <input type="number" name="age" placeholder="Your Age" class="form-control" required />
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                              <div class="col-sm-9">
                                <input type="password" name="pass" placeholder="Your Password" class="form-control" required />
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox">
                                            <p style="color:white; font-size:13px;">By checking this box, I hearby accept Relationship Repo's <br /><a href="#" style="color:#b0d0d1;">Terms and Conditions</a>.</p>
                                        </label>
                                    </div>
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <button type="submit" name="btn-save" class="btn btn-primary btn-block" style="background:#415c6f;">Register</button><br />
                                    <a href="/login.php" class="btn btn-block btn-outline">Already A Member?</a>
                                </div>
                            </div>
                            </div>
                        </form> <!-- /form -->
        </div>
      </div>
    </div>
