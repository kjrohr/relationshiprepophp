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
<!DOCTYPE html>
<body>

  <header>
      <div class="container">

          <div class="row">
              <div class="col-sm-7">
                  <div class="header-content">
                      <div class="header-content-inner">
                          <h1 style="margin-bottom:0; font-size: 57px;">Sometimes, Things Just Don't Work Out</h1>
                          <h2 style="margin-top:0; margin-bottom:30px; font-size:30px;">Relationship Repo is here for you - through the good times, and the bad.</h2>
                          <a href="#signup-modal" data-toggle="modal" class="btn btn-outline btn-xl page-scroll">Sign Up Today</a>










                      </div>
                  </div>
              </div>
              <div class="col-sm-5">
                  <div class="device-container">
                      <div class="device-mockup iphone6_plus portrait white">
                          <div class="device">
                              <div class="screen">
                                  <!-- Demo image for screen mockup, you can put an image here, some HTML, an animation, video, or anything else! -->
                                  <img src="img/demo-screen-1.jpg" class="img-responsive" alt="">
                              </div>
                              <div class="button">
                                  <!-- You can hook the "home button" to some JavaScript events or just remove it -->
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>

  
  <div id="body">
   <div id="content">



  <?php
   if ( isset($errMSG) ) {
      echo $errMSG;
    }
  ?>
  <form method="post">

    <div class="container" style="max-width:530px; margin: 0 auto;">
                <form class="form-horizontal" role="form">
                  <h2>Sign In.</h2>
                  <div style="margin-left: 25%;">
                  <div class="form-group">
                    <div class="col-sm-12">
  <input type="email" name="email" placeholder="Your Email" />
</div> </div>
<div class="form-group">
    <div class="col-sm-12">
  <input type="password" name="pass" placeholder="Your Password"/>
</div></div>
<div class="form-group">
    <div class="col-sm-9">
  <button type="submit"  name="btn-login" class="btn btn-primary btn-block">Sign In</button>
</div></div><br /><br />
<div class="col-sm-9">
  <a href="add_data.php" class="btn btn-primary btn-block">Sign Up Here...</a>
</div>
    </form>

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
</html>
