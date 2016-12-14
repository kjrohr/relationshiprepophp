<?php
session_start();
if (isset($_SESSION['user'])) {
  header("Location: dashboard.php");
}
include 'header.php';
include 'nav.php';

include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
 $username = $_POST['username'];
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $age = $_POST['age'];
 $email = $_POST['email'];
 $address = $_POST['address'];
 $pass = $_POST['pass'];

 $password = hash('sha256', $pass);
 // variables for input data

 // sql query for inserting data into database

        $sql_query = "INSERT INTO users(username,first_name,last_name,age,email,address,password) VALUES('$username','$first_name','$last_name','$age','$email','$address','$password')";
 mysql_query($sql_query);

        // sql query for inserting data into database

}
?>

<title>Relationship Repo!</title>
</head>
<body id="page-top">

  <header style="background: url('img/sun.jpg') no-repeat center center fixed;">
      <div class="container">

          <div class="row">
              <div class="col-sm-7">
                  <div class="header-content">
                      <div class="header-content-inner">
                          <h1 style="margin:150px 0 10px 0; font-size: 70px;">What is Relationship Repo?</h1>
                          <h3 style="margin-top:0; margin-bottom:10px; max-width:80%; font-size: 32px;">


                            Have you ever been in a relationship that ended on <br />less than favorable terms?<br /> Has your desire to evade a broken relationship lead to the loss of your valuable or sentimental possessions?<br /> Are your friends trying to remain neutral and refusing to aid in reclaiming your property,<br /> or are you just too embarrassed to ask for help?</h3>

                          <h3 style="margin-top:0; max-width:80%; font-size: 45px;">That's where we come in.</h3>


                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>

  <section style="background: #A26F6E; padding:90px 0;" class="download bg-primary text-center">
      <div class="container">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <h2 class="section-heading" style="font-size: 47px; margin-bottom:0;">Relationship Repo is a web service for any person who has lost their possessions to a relationship beyond repair. We are a company dedicated to connecting clients with with third-party sources who specialize in the delicate nature of recently ended relationships. Unlike any other company on the market today, Relationship Repo offers a unique and sought after service that
                   is both practical and comforting to those who may pursue further action.</h2>
              </div>
          </div>
      </div>
  </section>

  <section class="cta" style="padding: 90px 0">
      <div class="cta-content">
          <div class="container" style="margin-left:50%;">
            <div class="col-md-10" style="margin-left: 25%;">
            <h2 style="margin:0 0 25px 300px; font-size: 42.5px; max-width: 60%;">
              Remember that girlfriend back in college who stole your heart and your favorite hoodie? <br />There's still hope for the hoodie, and all the others out there like it.
            </h2>
            <a href="#signup-modal" data-toggle="modal" class="btn btn-outline btn-xl page-scroll" style="margin-left: 335px;">Sign Up Today</a>
            <a href="/login.php" class="btn btn-outline btn-xl page-scroll" style="margin-left:25px">Account Login</a>


            </div>
          </div>
      </div>
      <div class="overlay" style="background: url('img/giggle.jpg') no-repeat center center fixed;"></div>
  </section>

  <section class="cta" style="padding: 90px 0">
      <div class="cta-content">
          <div class="container">
            <h1 style="margin-bottom:0; font-size: 57px;">Meet Our Team</h1>
            <h2 style="margin-top:0; margin-bottom:30px; font-size:30px; color: #333; max-width:none;">We are always looking for new agents to join our team!</h2>
          </div>
      </div>
      <div class="overlay" style="background: transparent;"></div>
  </section>

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

  <!-- Modal for Sign Up -->


  <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
