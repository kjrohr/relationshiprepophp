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
?>

<title>Relationship Repo!</title>
</head>
<body>

  <?php
   if ( isset($errMSG) ) {
      echo $errMSG;
    }
  ?>



  <!-- Modal -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="ModalLabel">Login to Portal</h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" action="" method="post">
              <fieldset>
                <div class="form-group">
                  <label for="inputID" class="col-lg-2 control-label">Email Address:</label>
                  <div class="col-lg-10">
                    <input type="email" name="email" placeholder="JohnDoe@email.com" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                  <div class="col-lg-10">
                    <input type="password" name="pass" placeholder="Password"/>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" name="btn-login" class="btn btn-primary">Submit</button>
                  <button class="btn btn-primary" href="add_data.php">Sign Up</button>
                </div>
              </fieldset>
            </form>
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
