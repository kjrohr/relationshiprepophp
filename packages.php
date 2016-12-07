<?php

session_start();
include 'header.php';
include 'nav.php';
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


<title>Relationship Repo!</title>
</head>
<body>

  <?php
   if ( isset($errMSG) ) {
      echo $errMSG;
    }
  ?>

  <div class="container">
  	<div class="row">
  		<a class="btn btn-primary" data-toggle="modal" href="#LoginModal" >Login</a>

          <div class="modal hide" id="LoginModal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">x</button>
              <h3>Login to Relationship Repo</h3>
            </div>
            <div class="modal-body">
              <form method="post" action='' name="login_form">
                <p><input type="email" name="email" placeholder="Your Email" /></p>
                <p><input type="password" name="pass" placeholder="Your Password"/></p>
                <p><button type="submit" class="btn btn-primary">Sign in</button>
                  <a href="#">Forgot Password?</a>
                </p>
              </form>
            </div>
            <div class="modal-footer">
              New To Relationship Repo?
              <a href="add_data.php" class="btn btn-primary btn-block">Register</a>
            </div>
          </div>
  	</div>
  </div>








  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
  var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
  (function(){
  var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
  s1.async=true;
  s1.src='https://embed.tawk.to/5845b8372d02a274f9b74057/default';
  s1.charset='UTF-8';
  s1.setAttribute('crossorigin','*');
  s0.parentNode.insertBefore(s1,s0);
  })();
  </script>
  <!--End of Tawk.to Script-->
</body>
