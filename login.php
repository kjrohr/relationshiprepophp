<?php
 session_start();
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

   header("Location: index.php");
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
   header("Location: add_data.php");
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
     echo $row['user_id'];
     echo "\r\n";
     echo $row['username'];
     echo "\r\n";
     echo $password;
     echo "\r\n";
     echo $row['password'];
    $errMSG = "Incorrect Credentials, Try again...";
   }

  }

 }
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Relationship Repo! - Login</title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
  <h2>Sign In.</h2>


  <?php
   if ( isset($errMSG) ) {
      echo $errMSG;
    }
  ?>
  <form method="post">

  <input type="email" name="email" placeholder="Your Email" />
  <input type="password" name="pass" placeholder="Your Password"/>
  <button type="submit"  name="btn-login">Sign In</button>
  <a href="add_data.php">Sign Up Here...</a>

    </form>


</body>
</html>
