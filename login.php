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

        <div class="container" style="max-width:650px; margin: 0 auto;">
                    <form class="form-horizontal" role="form">

                        <h2>Welcome Back to Relationship Repo! <br /> Please Sign In.</h2>

                        <?php
                         if ( isset($errMSG) ) {
                            echo $errMSG;
                          }
                        ?>

                        <div style="margin-left: 15%;">
                        <div class="form-group" style="margin-left:3%;">
                          <div class="col-sm-9">
                                <input type="email" name="email" placeholder="Your Email" class="form-control" required/>
                            </div>
                        </div>
                        <div class="form-group" style="margin-left:3%;">
                            <div class="col-sm-9">
                                <input type="password" name="pass" placeholder="Your Password" class="form-control" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                                <button style="margin-left: 35%;" type="submit" name="btn-login" class="btn btn-outline btn-xl">Register</button>
                            </div>
                        </div>
                        </div>
                    </form> <!-- /form -->
                </div> <!-- ./container -->

  </header>



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
